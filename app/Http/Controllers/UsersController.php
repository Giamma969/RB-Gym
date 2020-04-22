<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Country;
use App\Address;
use Auth;
use Session;
use \DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class UsersController extends Controller
{

    public function userLoginRegister(){
        return view('users.login_register');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            if(empty($data['email']) || empty($data['password'])){
                return redirect()->back()->with('flash_message_error','Tutti i campi devono essere compilati');
            }

            $request->session()->flush();

            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                //check if account is actived
                $userStatus = User::where('email',$data['email'])->first();
                if($userStatus->status == 0){
                    return redirect()->back()->with('flash_message_error','Il tuo account non è attivo. Ti abbiamo inviato una mail di conferma, attivalo ora!');
                }
                
                Session::put('front_session',$data['email']);
                $new_session=str_random(40);
                Session::put('session_id',$new_session);
                $session_id=Session::get('session_id');
                
                $user_id=Auth::user()->id;

                //create empty cart if first login
                $countCart=DB::table('cart')->where(['user_id'=>$user_id])->count();
                if($countCart==0){
                    DB::table('cart')->insert([
                        'user_id'=> $user_id,
                        'session_id'=> $session_id
                    ]);
                }
                
                //create empty wishlist if first login
                $countWish=DB::table('wishlists')->where(['user_id'=>$user_id])->count();
                if($countWish ==0){
                    DB::table('wishlists')->insert([
                        'user_id'=> $user_id,
                        'session_id'=> $session_id
                    ]);
                }
                

                return redirect('/cart');
            }else{
                return redirect()->back()->with('flash_message_error','Credenziali errate!');
            }
        }

    }

    public function register(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            //controllo se l'utente già esiste
            if(empty($data['name']) || empty($data['surname']) || empty($data['username']) || empty($data['email']) || empty($data['password']) || empty($data['confirm_password'])){
                return redirect()->back()->with('flash_message_error','Tutti i campi devono essere compilati');
            }
            $usersCount=User::where('email',$data['email'])->count();
            if($usersCount > 0)
                return redirect()->back()->with('flash_message_error','Email già esistente!');
        
            $userscount1=User::where('username',$data['username'])->count();
            if($userscount1 > 0)
                return redirect()->back()->with('flash_message_error','Username già esistente!');
            
            if($data['password'] != $data['confirm_password'])
                return redirect()->back()->with('flash_message_error','Password non coincidenti!');
            
            $user=new User;
            $user->name = $data['name'];
            $user->surname = $data['surname'];
            $user->username = $data['username'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->save();
           
            $user_id=DB::getPdo()->lastInsertId();
            //create billing address
            $bill_address = new Address;
            $bill_address->user_id=$user_id;
            $bill_address->is_billing=1;
            $bill_address->is_shipping=0;
            $bill_address->user_name=$data['name'];
            $bill_address->user_surname=$data['surname'];
            $bill_address->save();

            //update billing_id field in users table
            $billing_id=DB::getPdo()->lastInsertId();
            DB::table('users')->where(['id'=>$user_id])->update(['billing_id'=>$billing_id]);

            
            
            //send confirmation email
            $email=$data['email'];
            $messageData = ['email'=>$data['email'], 'name'=>$data['name'], 'code'=>base64_encode($data['email'])];
            Mail::send('emails.confirmation', $messageData, function($message) use($email){
                $message->to($email)->subject('Confirm your RB-Gym account');
            });

            $request->session()->flush();
            /*Session::put('front_session',$data['email']);
            $new_session=str_random(40);
            Session::put('session_id',$new_session);
            
            $session_id = Session::get('session_id');*/
        
           

            return redirect()->back()->with('flash_message_success','Please confirm your email to activate your account!');
        

        }
    }

    public function confirmAccount($email){
        $email = base64_decode($email);
        $usersCount = User::where('email',$email)->count();
        if($usersCount == 1){
            $userDetails = User::where('email',$email)->first();
            if($userDetails->status == 1){
                return redirect('login-register')->with('flash_message_success','Email dell\'account già attiva. Puoi effettuare il login!');
            }else{
                User::where('email',$email)->update(['status'=> 1,'email_verified_at' => DB::raw('now()')]);
                //send welcome mail
                $messageData = ['email'=>$email, 'name'=>$userDetails->name];
                Mail::send('emails.welcome', $messageData, function($message) use($email){
                    $message->to($email)->subject('Welcome to RB-Gym');
                });
                return redirect('login-register')->with('flash_message_success','Email dell\'account attivata con successo. Ora puoi effettuare il login!');
            }
        }else{
            abort(404);
        }

    }

    public function account(Request $request){
        $user_id=Auth::user()->id;
        $userDetails = User::find($user_id);
        $countries = DB::table('countries')->get(); 
        $bill_address = Address::where(['user_id'=>$user_id, 'is_billing'=>1])->first();

        if($request->isMethod('post')){
            $data=$request->all();

            if( empty($data['name']) || empty($data['surname']) || empty($data['username']) || empty($data['email']) ||
                 empty($data['country']) || empty($data['province']) || empty($data['city']) || empty($data['address'])
                 || empty($data['pincode']) || empty($data['mobile'])){
                return redirect()->back()->with('flash_message_error','Tutti i campi devono essere compilati');
            }

            //check if email already exists
            $userEmailCount=User::where('email',$data['email'])->count();
            if($userEmailCount > 0){
                if($userDetails->email != $data['email'])
                    return redirect()->back()->with('flash_message_error','Email non disponibile');
            }

            //check if username already exists
            $usernameCount=User::where('username',$data['username'])->count();
            if($usernameCount > 0){
                if($userDetails->username != $data['username'])
                    return redirect()->back()->with('flash_message_error','Username non disponibile');
            }
            if(!empty($data['email'])){
                //cambia il nome alla sessione
                Session::put('front_session',$data['email']);
            }

            $user=User::find($user_id);

            $bill_address->country=$data['country'];
            $bill_address->province=$data['province'];
            $bill_address->city=$data['city'];
            $bill_address->address=$data['address'];
            $bill_address->pincode=$data['pincode'];
            $bill_address->mobile=$data['mobile'];
            $bill_address->save();
            return redirect()->back()->with('flash_message_success','Account aggiornato con successo!');
        }
        return view('users.account')->with(compact('countries','userDetails','bill_address'));
    }

    public function forgotPassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $usersCount = User::where('email',$data['email'])->count();
            if($usersCount == 0){
                return redirect()->back()->with('flash_message_error','L\'Email non esiste!');
            }
            //get user details
            $userDetails=User::where('email',$data['email'])->first();
            $user_id = $userDetails->id;
            $old_password = $userDetails->password;
            
            //generate random password
            $random_password=str_random(10);
            $new_password =bcrypt($random_password);
            
            //update user table
            User::where('email',$data['email'])->update(['password'=>$new_password]);

            //insert data in password resets
            DB::table('password_resets')->insert([
                'user_id'=>$user_id,
                'old_password'=>$old_password,
                'new_password' => $new_password,
                'recovered' => 1
            ]);

            //send forgot password email
            $email=$data['email'];
            $name=$userDetails->name;
            $messageData = [
                'email' => $email,
                'password'=>$random_password,
                'name'=>$name
            ];

            Mail::send('emails.forgotpassword', $messageData, function($message) use($email){
                $message->to($email)->subject('New Password RB-Gym');
            });

            return redirect('login-register')->with('flash_message_success','Please check your email for new password!');

        }
        return view('users.forgot_password');
    }

    public function chkUserPassword(Request $request){
        $data = $request->all();
        $current_password=$data['current_pwd'];
        $user_id=Auth::User()->id;
        $check_password=User::where('id',$user_id)->first();
        if(Hash::check($current_password, $check_password->password)){
            echo "true"; die;
        }else{
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            $user_id=Auth::User()->id;
            $userDetails=User::where('id',$user_id)->first();
            $old_pwd=$userDetails->password;
            $current_pwd=$data['current_pwd'];

            if(Hash::check($current_pwd, $old_pwd)){
                //update password
                $new_pwd=bcrypt($data['new_pwd']);
                User::where('id',$user_id)->update(['password'=>$new_pwd]);

                //insert data in password resets
                DB::table('password_resets')->insert([
                    'user_id'=>$user_id,
                    'old_password'=>$old_pwd,
                    'new_password' => $new_pwd,
                    'updated' => 1
                ]);
                return redirect()->back()->with('flash_message_success','Password modificata con successo!');
            }
            else{
                return redirect()->back()->with('flash_message_error','La password corrente non è corretta!');
            }
        }
    }

    public function logout(){
        Session::flush();
        Auth::logout();

        //inizializzo una nuova sessione casuale
        $session_id = str_random(40);
        Session::put('session_id',$session_id);

        return redirect('/');
    }

    public function checkEmail(Request $request){
        $data=$request->all();
        $usersCount=User::where('email',$data['email'])->count();
        if($usersCount > 0)
            echo "false";
        else
            echo "true";
    }

    public function checkUsername(Request $request){
        $data=$request->all();
        $usersCount=User::where('username',$data['username'])->count();
        if($usersCount > 0)
            echo "false";
        else
            echo "true";
    }

    public function viewUsers(){
        $usersDetails = DB::table('addresses')->where(['is_billing'=>1])
            ->join('users', 'users.id', '=', 'addresses.user_id')
            ->select('addresses.country','addresses.city','addresses.province','addresses.address','addresses.pincode','addresses.mobile','users.*')
            ->get();
        return view('admin.users.view_users')->with(compact('usersDetails'));
    }

    
}
