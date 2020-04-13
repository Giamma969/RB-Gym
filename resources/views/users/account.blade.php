@extends ('layouts.frontLayout.front_design')
@section('content')

<!--form-->
<section id="form" style="margin-top:20px;">
    <div class="container">
        <div>
            <ol class="breadcrumb">
                <li><a style="color:#333 !important;" href="/">Home</a></li>
                <li><a style="color:#333 !important;" href="account">Account</a></li>
            </ol>
        </div>
        <div class="row">
            @if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block" style="background-color:#f2dfd0; margin-right:15px; margin-left:15px;">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> {!! session ('flash_message_error') !!}</strong>
                </div>
            @endif
            @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block" style="margin-right:15px; margin-left:15px;">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> {!! session ('flash_message_success') !!}</strong>
                </div>
            @endif
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">
                    <h2>Update account (Billing address)</h2>
                    <form id="accountForm" name="accountForm" action="{{ url('/account') }}" method="post">
                        {{ csrf_field() }}
                        <input value="{{ $userDetails->name }}" style="margin-top:10px;" id="name" name="name" type="text" readonly />
                        <input value="{{ $userDetails->surname }}" style="margin-top:10px;" id="surname" name="surname" type="text" readonly/>
                        <input value="{{ $userDetails->username }}" style="margin-top:10px;" id="username" name="username" type="text" readonly/>
                        <input value="{{ $userDetails->email }}" style="margin-top:10px;" id="email" name="email" type="email" placeholder="Email" readonly/>
                        <select id="country" name="country">
                            <option value="">Select country</option>
                            @foreach($countries as $country)
                            <option value="{{ $country->country_name }}" @if($country->country_name == $bill_address->country) selected @endif >{{ $country->country_name }}</option>
                            @endforeach
                        </select>
                        <input value="{{ $bill_address->province }}" style="margin-top:10px;" id="province" name="province" type="text" placeholder="Province"/>
                        <input value="{{ $bill_address->city }}"id="city" name="city" type="text" placeholder="City"/>
                        <input value="{{ $bill_address->address }}"id="address" name="address" type="text" placeholder="Address"/>
                        <input value="{{ $bill_address->pincode }}"id="pincode" name="pincode" type="text" placeholder="Pin code"/>
                        <input value="{{ $bill_address->mobile }}"id="mobile" name="mobile" type="text" placeholder="Mobile"/>
                        <button type="submit" class="btn btn-default">Update account</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-1">
                <h2 class="or">Or</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form">
                    <h2>Update password</h2>
                    <form id="passwordForm" name="passwordForm" action="{{ url('/update-user-pwd') }}" method="post">
                        {{ csrf_field() }}
                        <input id="current_pwd" name="current_pwd" type="password" placeholder="Current password"/>
                        <span id="chkPwd"></span>
                        <input id="new_pwd" name="new_pwd" type="password" placeholder="New password"/>
                        <input id="confirm_pwd" name="confirm_pwd" type="password" placeholder="Confirm password"/>
                        <button type="submit" class="btn btn-default">Update password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/form-->
	

@endsection