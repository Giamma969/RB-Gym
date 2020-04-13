@extends ('layouts.frontLayout.front_design')
@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Thanks</li>
            </ol>
        </div>
    </div>
</section> 

<?php $stripe_total = Session::get('grand_total'); ?>

<section id="do_action">
    <div class="container">
        <!--<h3>YOUR ORDER HAS BEEN PLACED</h3>
        <p>Your order number is {{ Session::get('order_id') }} and total payble about is € {{ Session::get('grand_total') }}</p>
        <p>Please make payment by clicking on below payment button.</p> -->
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="/api/confirm-payment" method="post" id="payment-form">
                    <div class="form-row">
                        <input type="hidden" name="stripe_total" id="stripe_total" value="{{ $stripe_total }}">
                        <label for="card-element">
                            Credit or debit card
                        </label>

                        <div id="card-element">
                            <!-- a stripe element will be inserted here-->
                        </div>

                        <!-- Used to display element error-->
                        <div id="card-errors" role="alert"></div>
                        </div>

                        <button> Submit payment</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</section>



@endsection

