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
                        <span class="icon"> <i class="icon-group"></i> </span>
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

                            <!-- Brands permissions -->
                            <div class="widget-title" style="clear:left; border-top:1px solid #CDCDCD; border-bottom:0px;"> 
                                <h5>Brands permissions</h5>        
                            </div>
                        
                            <div style="clear:left;">
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">View brands</label>
                                    <div class="controls">
                                        <input type="checkbox" name="view_brands_permission" id="view_brands_permission" value="view_brands">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Add brand</label>
                                    <div class="controls">
                                        <input type="checkbox" name="add_brand_permission" id="add_brand_permission" value="add_brand">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Edit brand</label>
                                    <div class="controls">
                                        <input type="checkbox" name="edit_brand_permission" id="edit_brand_permission" value="edit_brand">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Delete brand</label>
                                    <div class="controls">
                                        <input type="checkbox" name="delete_brand_permission" id="delete_brand_permission" value="delete_brand">
                                    </div>
                                </div>

                            </div>

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

                            <!-- Homepages permissions -->
                            <div class="widget-title" style="clear:left; border-top:1px solid #CDCDCD; border-bottom:0px;"> 
                                <h5>Homepages permissions</h5>        
                            </div>
                        
                            <div style="clear:left;">
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">View homepages</label>
                                    <div class="controls">
                                        <input type="checkbox" name="view_homepages_permission" id="view_homepages_permission" value="view_homepages">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Customize homepage</label>
                                    <div class="controls">
                                        <input type="checkbox" name="customize_homepage_permission" id="customize_homepage_permission" value="customize_homepage">
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

                            <!-- Sales permissions -->
                            <div class="widget-title" style="clear:left; border-top:1px solid #CDCDCD; border-bottom:0px;"> 
                                <h5>Sales permissions</h5>
                            </div>
                            
                            <div style="clear:left;">
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">View sales</label>
                                    <div class="controls">
                                        <input type="checkbox" name="view_sales_permission" id="view_sales_permission" value="view_sales">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Add sale</label>
                                    <div class="controls">
                                        <input type="checkbox" name="add_sale_permission" id="add_sale_permission" value="add_sale">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Edit sale</label>
                                    <div class="controls">
                                        <input type="checkbox" name="edit_sale_permission" id="edit_sale_permission" value="edit_sale">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Delete sale</label>
                                    <div class="controls">
                                        <input type="checkbox" name="delete_sale_permission" id="delete_sale_permission" value="delete_sale">
                                    </div>
                                </div>

                                <div class="control-group" style="clear:left;">
                                    <label class="control-label">Products in sale</label>
                                    <div class="controls">
                                        <input type="checkbox" name="products_sale_permission" id="products_sale_permission" value="products_sale">
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
                                <h5>Reviews permissions
                                </h5>        
                            </div>
                        
                            <div style="clear:left;">
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">View reviews</label>
                                    <div class="controls">
                                        <input type="checkbox" name="view_reviews_permission" id="view_reviews_permission" value="view_reviews">
                                    </div>
                                </div>
                            </div>

                            <!-- Developers permissions -->
                            <div class="widget-title" style="clear:left; border-top:1px solid #CDCDCD; border-bottom:0px;"> 
                                <h5>Developers permissions
                                </h5>        
                            </div>
                        
                            <div style="clear:left;">
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">View developers</label>
                                    <div class="controls">
                                        <input type="checkbox" name="view_developers_permission" id="view_developers_permission" value="view_developers">
                                    </div>
                                </div>
                           
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Add developer</label>
                                    <div class="controls">
                                        <input type="checkbox" name="add_developer_permission" id="add_developer_permission" value="add_developer">
                                    </div>
                                </div>
                           
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Edit developer</label>
                                    <div class="controls">
                                        <input type="checkbox" name="edit_developer_permission" id="edit_developer_permission" value="edit_developer">
                                    </div>
                                </div>
                            
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Delete developer</label>
                                    <div class="controls">
                                        <input type="checkbox" name="delete_developer_permission" id="delete_developer_permission" value="delete_developer">
                                    </div>
                                </div>
                            </div>

                            <!-- Groups permissions -->
                            <div class="widget-title" style="clear:left; border-top:1px solid #CDCDCD; border-bottom:0px;"> 
                                <h5>Groups permissions
                                </h5>        
                            </div>
                        
                            <div style="clear:left;">
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">View groups</label>
                                    <div class="controls">
                                        <input type="checkbox" name="view_groups_permission" id="view_groups_permission" value="view_groups">
                                    </div>
                                </div>
                           
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Add group</label>
                                    <div class="controls">
                                        <input type="checkbox" name="add_group_permission" id="add_group_permission" value="add_group">
                                    </div>
                                </div>
                           
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Edit group</label>
                                    <div class="controls">
                                        <input type="checkbox" name="edit_group_permission" id="edit_group_permission" value="edit_group">
                                    </div>
                                </div>
                            
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Delete group</label>
                                    <div class="controls">
                                        <input type="checkbox" name="delete_group_permission" id="delete_group_permission" value="delete_group">
                                    </div>
                                </div>
                            </div>

                            <!-- Services permissions -->
                            <div class="widget-title" style="clear:left; border-top:1px solid #CDCDCD; border-bottom:0px;"> 
                                <h5>Services permissions
                                </h5>        
                            </div>
                        
                            <div style="clear:left;">
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">View services</label>
                                    <div class="controls">
                                        <input type="checkbox" name="view_services_permission" id="view_services_permission" value="view_services">
                                    </div>
                                </div>
                            </div>


                            <!-- Shipping charges permissions -->
                            <div class="widget-title" style="clear:left; border-top:1px solid #CDCDCD; border-bottom:0px;"> 
                                <h5>Shipping charges permissions
                                </h5>        
                            </div>

                            <div style="clear:left;">
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">View shipping charges</label>
                                    <div class="controls">
                                        <input type="checkbox" name="view_shipping_charges_permission" id="view_shipping_charges_permission" value="view_shipping_charges">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Edit shipping charges</label>
                                    <div class="controls">
                                        <input type="checkbox" name="edit_shipping_charges_permission" id="edit_shipping_charges_permission" value="edit_shipping_charges">
                                    </div>
                                </div>
                            </div>

                            <!-- CMS permissions -->
                            <div class="widget-title" style="clear:left; border-top:1px solid #CDCDCD; border-bottom:0px;"> 
                                <h5>CMS permissions</h5>        
                            </div>

                            <div style="clear:left;">
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">View CMS</label>
                                    <div class="controls">
                                        <input type="checkbox" name="view_cms_permission" id="view_cms_permission" value="view_cms">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Edit CMS</label>
                                    <div class="controls">
                                        <input type="checkbox" name="edit_cms_permission" id="edit_cms_permission" value="edit_cms">
                                    </div>
                                </div>
                            </div>

                            <!-- Messages permissions -->
                            <div class="widget-title" style="clear:left; border-top:1px solid #CDCDCD; border-bottom:0px;"> 
                                <h5>Messages permissions</h5>        
                            </div>

                            <div style="clear:left;">
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">View Messages</label>
                                    <div class="controls">
                                        <input type="checkbox" name="view_messages_permission" id="view_messages_permission" value="view_messages">
                                    </div>
                                </div>

                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Edit message</label>
                                    <div class="controls">
                                        <input type="checkbox" name="edit_message_permission" id="edit_message_permission" value="edit_message">
                                    </div>
                                </div>
                            </div>

                            <!-- Faqs permissions -->
                            <div class="widget-title" style="clear:left; border-top:1px solid #CDCDCD; border-bottom:0px;"> 
                                <h5>Faqs permissions
                                </h5>        
                            </div>
                        
                            <div style="clear:left;">
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">View faqs</label>
                                    <div class="controls">
                                        <input type="checkbox" name="view_faqs_permission" id="view_faqs_permission" value="view_faqs">
                                    </div>
                                </div>
                           
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Add faq</label>
                                    <div class="controls">
                                        <input type="checkbox" name="add_faq_permission" id="add_faq_permission" value="add_faq">
                                    </div>
                                </div>
                           
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Edit faq</label>
                                    <div class="controls">
                                        <input type="checkbox" name="edit_faq_permission" id="edit_faq_permission" value="edit_faq">
                                    </div>
                                </div>
                            
                                <div class="control-group" style="float:left;">
                                    <label class="control-label">Delete faq</label>
                                    <div class="controls">
                                        <input type="checkbox" name="delete_faq_permission" id="delete_faq_permission" value="delete_faq">
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
