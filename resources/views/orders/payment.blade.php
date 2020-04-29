@extends ('layouts.frontLayout.front_design')
@section('content')
<section>
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Payment</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
    @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block" style="background-color:#f2dfd0;">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong> {!! session ('flash_message_error') !!}</strong>
        </div>
    @endif
    @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong> {!! session ('flash_message_success') !!}</strong>
        </div>
    @endif

    <?php $stripe_total = Session::get('grand_total'); ?>

    <section class="checkout-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-1 order-lg-2">
                    <form action="/api/confirm-payment" method="post" id="payment_form">{{csrf_field()}}
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
</section>



@endsection

