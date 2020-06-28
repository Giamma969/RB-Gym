<?php

use Illuminate\Http\Request;
// use Auth;
// use DB;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::group(['middleware'=>['auth']],function(){
    // Route::post('/confirm-payment',function (Request $request){
    //     $data = $request->all();
        
    //     // $user_id=Auth::id();
    //     // $countCartProducts = DB::table('cart')->where(['user_id'=>$user_id])->count();
    //     // if($countCartProducts == 0){
    //     //     return redirect()->action('ProductsController@cart');
    //     // }

    //     \Stripe\Stripe::setApiKey('sk_test_mNyCHBwuchkp1UIYLhMCfYbz0032U9yKA5');
    //     $token = $_POST['stripeToken'];
        
    //     $stripe_total = $data['stripe_total'];
    //     $stripe_total = $stripe_total * 100;
        

    //     $charge = \Stripe\Charge::create([
    //     'amount' => $stripe_total,
    //     'currency' => 'eur',
    //     'description' => 'Example charge',
    //     'source' => $token,
    //     'statement_descriptor' => 'Custom descriptor',
    //     ]);

    //     return redirect('/thanks-payment');
    // });
//});