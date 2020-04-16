@extends('layouts.adminlayout.admin_design')

@section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Groups</a> <a href="#" class="current">Add group</a> </div>
        <h1>Groups</h1>
        @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block">
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
    </div>
    <div class="container-fluid"><hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title" style="border-top:1px solid #CDCDCD; border-bottom:0px;"> 
                        <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Add group</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{url('/admin/add-group')}}" name="add_group" id="add_group" novalidate="novalidate"> {{csrf_field()}}
                        
                            <div class="control-group"> 
                                <label class="control-label">Group name</label>
                                <div class="controls">
                                    <input type="text" name="group_name" id="group_name">
                                </div>
                            </div>
                            <div class="control-group" style="float:left;">
                                <label class="control-label">Enable/Disable group</label>
                                <div class="controls">
                                    <input type="checkbox" name="status" id="status" value="1">
                                </div>
                            </div>
                          
                            
                            <!-- Categories permissions -->
                            <div class="widget-title" style="clear:left; border-top:1px solid #CDCDCD; border-bottom:0px;"> 
                                <h5>Categories permissions</h5>
                            </div>                            
                            <div style="clear:left;">
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">View categories</label>
                                    <div class="controls">
                                        <input type="checkbox" name="view_categories_permission" id="view_categories_permission" value="view_categories">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Add category</label>
                                    <div class="controls">
                                        <input type="checkbox" name="add_category_permission" id="add_category_permission" value="add_category">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Edit category</label>
                                    <div class="controls">
                                        <input type="checkbox" name="edit_category_permission" id="edit_category_permission" value="edit_category">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Delete category</label>
                                    <div class="controls">
                                        <input type="checkbox" name="delete_category_permission" id="delete_category_permission" value="delete_category">
                                    </div>
                                </div>
                            </div>

                           <!-- <div style="clear:left;">
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Category description</label>
                                    <div class="controls">
                                        <input type="checkbox" name="category_description_permission" id="category_description_permission">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Enable/Disable categories</label>
                                    <div class="controls">
                                        <input type="checkbox" name="enable_disable_categories" id="enable_disable_categories">
                                    </div>
                                </div>
                            </div> -->
                            
                            <!-- Products permissions -->
                            <div class="widget-title" style="clear:left; border-top:1px solid #CDCDCD; border-bottom:0px;"> 
                                <h5>Products permissions</h5>
                            </div>
                            
                            <div style="clear:left;">
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">View products</label>
                                    <div class="controls">
                                        <input type="checkbox" name="view_products_permission" id="view_products_permission" value="view_products">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Add product</label>
                                    <div class="controls">
                                        <input type="checkbox" name="add_product_permission" id="add_product_permission" value="add_product">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Edit product</label>
                                    <div class="controls">
                                        <input type="checkbox" name="edit_product_permission" id="edit_product_permission" value="edit_product">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Delete product</label>
                                    <div class="controls">
                                        <input type="checkbox" name="delete_product_permission" id="delete_product_permission" value="delete_product">
                                    </div>
                                </div>

                                <div class="control-group" style="clear:left;">
                                    <label class="control-label">Manage alternative images</label>
                                    <div class="controls">
                                        <input type="checkbox" name="manage_alternative_images" id="manage_alternative_images" value="alternative_images">
                                    </div>
                                </div>
                            </div>

                            <!--<div style="clear:left;">
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Product main image</label>
                                    <div class="controls">
                                        <input type="checkbox" name="product_main_image" id="product_main_image">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Product description</label>
                                    <div class="controls">
                                        <input type="checkbox" name="product_description_permission" id="product_description_permission">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Product price</label>
                                    <div class="controls">
                                        <input type="checkbox" name="product_price_permission" id="product_price_permission">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Product stock</label>
                                    <div class="controls">
                                        <input type="checkbox" name="product_stock_permission" id="product_stock_permission">
                                    </div>
                                </div>

                                <div class="control-group" style="clear:left;">
                                    <label class="control-label">Enable/Disable product</label>
                                    <div class="controls">
                                        <input type="checkbox" name="enable_disable_product" id="enable_disable_product">
                                    </div>
                                </div>
                            </div> -->

                            <!-- Coupons permissions -->
                            <div class="widget-title" style="clear:left; border-top:1px solid #CDCDCD; border-bottom:0px;"> 
                                <h5>Coupons permissions</h5>        
                            </div>
                        
                            <div style="clear:left;">
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">View coupons</label>
                                    <div class="controls">
                                        <input type="checkbox" name="view_coupons_permission" id="view_coupons_permission" value="view_coupons">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Add coupon</label>
                                    <div class="controls">
                                        <input type="checkbox" name="add_coupon_permission" id="add_coupon_permission" value="add_coupon">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Edit coupon</label>
                                    <div class="controls">
                                        <input type="checkbox" name="edit_coupon_permission" id="edit_coupon_permission" value="edit_coupon">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Delete coupon</label>
                                    <div class="controls">
                                        <input type="checkbox" name="delete_coupon_permission" id="delete_coupon_permission" value="delete_coupon">
                                    </div>
                                </div>

                            </div>

                            <!-- Orders permissions -->
                            <div class="widget-title" style="clear:left; border-top:1px solid #CDCDCD; border-bottom:0px;"> 
                                <h5>Orders permissions</h5>        
                            </div>
                        
                            <div style="clear:left;">
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">View orders</label>
                                    <div class="controls">
                                        <input type="checkbox" name="view_orders_permission" id="view_orders_permission" value="view_orders">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Update order status</label>
                                    <div class="controls">
                                        <input type="checkbox" name="update_order_status_permission" id="update_order_status_permission" value="update_order_status">
                                    </div>
                                </div>
                            </div>

                            <!-- Banners permissions -->
                            <div class="widget-title" style="clear:left; border-top:1px solid #CDCDCD; border-bottom:0px;"> 
                                <h5>Banners permissions</h5>        
                            </div>
                        
                            <div style="clear:left;">
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">View banners</label>
                                    <div class="controls">
                                        <input type="checkbox" name="view_banners_permission" id="view_banners_permission" value="view_banners">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Add banner</label>
                                    <div class="controls">
                                        <input type="checkbox" name="add_banner_permission" id="add_banner_permission" value="add_banner">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Edit banner</label>
                                    <div class="controls">
                                        <input type="checkbox" name="edit_banner_permission" id="edit_banner_permission" value="edit_banner">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Delete banner</label>
                                    <div class="controls">
                                        <input type="checkbox" name="delete_banner_permission" id="delete_banner_permission" value="delete_banner">
                                    </div>
                                </div>

                            </div>

                        

                            <!-- Users permissions -->
                            <div class="widget-title" style="clear:left; border-top:1px solid #CDCDCD; border-bottom:0px;"> 
                                <h5>Users permissions</h5>        
                            </div>
                        
                            <div style="clear:left;">
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">View users</label>
                                    <div class="controls">
                                        <input type="checkbox" name="view_users_permission" id="view_users_permission" value="view_users">
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews permissions -->
                            <div class="widget-title" style="clear:left; border-top:1px solid #CDCDCD; border-bottom:0px;"> 
                                <h5>Reviews permissions</h5>        
                            </div>
                        
                            <div style="clear:left;">
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">View reviews</label>
                                    <div class="controls">
                                        <input type="checkbox" name="view_reviews_permission" id="view_reviews_permission" value="view_reviews">
                                    </div>
                                </div>
                            </div>



                            <div class="form-actions" style="clear:left;">
                                <input type="submit" value="Add group" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
