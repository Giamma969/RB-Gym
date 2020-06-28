@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Groups</a> <a href="#" class="current">View groups</a> </div>
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

  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-group"></i></span>
            <h5>View groups</h5>
          </div>
          <div class="widget-content nopadding">
          <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th rowspan="2">Group ID</th>
                  <th rowspan="2">Group name</th>
                  <th rowspan="2">Status</th>
                  <th colspan="5">Services</th>
                  <th rowspan="2">Actions</th>
                </tr> 
                
                <!-- <tr> 
                  <th>Products</th>
                  <th>Categories</th>
                  <th>Coupons</th>
                  <th>Orders</th>
                  <th>Banners</th>
                  <th>Users</th>
                  <th>Reviews</th>
                  <th>Developers</th>
                  <th>Groups</th>
                  <th>Services</th>

                </tr>  -->
                
              </thead>
              
              <tbody>
              
              @foreach($Details as $group)
              <?php //echo'<pre>'; print_r($group); die;  ?>
                <tr class="gradeX">
                  <td rowspan="17" > {{$group[0]}} </td>
                  <td rowspan="17">{{$group[1]}} </td>
                  <td rowspan="17"> 
                    @if($group[2] == 1) 
                      <span style="color:green">Active</span> 
                    @else 
                      <span style="color:red">Inactive</span>
                    @endif 
                  </td>
                  
                  <!-- Catgories --> 
                  <td>View categories @if(in_array("view_categories", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Add category @if(in_array("add_category", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Edit category @if(in_array("edit_category", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Delete category @if(in_array("delete_category", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td></td>
                  <td rowspan="17" class="center">
                    <a style="width:75%;" href="{{ url('/admin/edit-group/'.$group[0])  }} " class="btn btn-primary btn-mini" title="Edit">Edit</a>
                    <a style="width:75%;" rel="{{$group[0]}}" rel1="delete-group"  href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                  </td> 
                </tr>

                <!-- Products --> 
                <tr class="gradeX">
                  <td>View products  @if(in_array("view_products", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Add product @if(in_array("add_product", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Edit product @if(in_array("edit_product", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Delete product @if(in_array("delete_product", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Alternative images @if(in_array("alternative_images", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                </tr>

                <!-- Brands --> 
                <tr class="gradeX"> 
                  <td>View brands @if(in_array("view_brands", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Add brand @if(in_array("add_brand", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Edit brand @if(in_array("edit_brand", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Delete brand @if(in_array("delete_brand", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td></td>
                </tr>

                <!-- Coupon --> 
                <tr class="gradeX"> 
                  <td>View coupons @if(in_array("view_coupons", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Add coupon @if(in_array("add_coupon", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Edit coupon @if(in_array("edit_coupon", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Delete coupon @if(in_array("delete_coupon", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td></td>
                </tr>
                
                <!-- Orders -->
                <tr class="gradeX">
                  <td>View orders @if(in_array("view_orders", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Update order status @if(in_array("update_order_status", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>

                <!-- Homepages -->
                <tr class="gradeX">
                  <td>View homepages @if(in_array("view_homepages", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Customize homepage @if(in_array("customize_homepage", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <!-- Banners -->
                <tr class="gradeX">
                  <td>View banners @if(in_array("view_banners", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Add banner @if(in_array("add_banner", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Edit banner @if(in_array("edit_banner", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Delete banner @if(in_array("delete_banner", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td></td>
                </tr>

                <!-- Sales -->
                <tr class="gradeX">
                  <td>View sales  @if(in_array("view_sales", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Add sale @if(in_array("add_sale", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Edit sale @if(in_array("edit_sale", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Delete sale @if(in_array("delete_sale", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Products in sale @if(in_array("products_sale", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>  
                </tr>

                <!-- Users  -->
                <tr class="gradeX">
                  <td>View users @if(in_array("view_users", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>

                <!-- Reviews -->
                <tr class="gradeX">
                  <td>View reviews @if(in_array("view_reviews", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>

                <!-- Developers -->
                <tr class="gradeX">
                  <td>View developers @if(in_array("view_developers", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Add developer @if(in_array("add_developer", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Edit developer @if(in_array("edit_developer", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Delete developer @if(in_array("delete_developer", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td></td>
                </tr>

                <!-- Groups -->
                <tr class="gradeX">
                  <td>View groups @if(in_array("view_groups", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Edit group @if(in_array("edit_group", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Add group @if(in_array("add_group", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Delete group @if(in_array("delete_group", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td></td>
                </tr>

                <!-- Services -->
                <tr class="gradeX">
                  <td>View services @if(in_array("view_services", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>

                <!-- Shipping charges -->
                <tr class="gradeX">
                  <td>View shipping charges @if(in_array("view_shipping_charges", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Edit shipping charges @if(in_array("edit_shipping_charges", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>

                <!-- CMS -->
                <tr class="gradeX">
                  <td>View CMS @if(in_array("view_cms", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Edit CMS @if(in_array("edit_cms", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>

                <!-- Messages -->
                <tr class="gradeX">
                  <td>View messages @if(in_array("view_messages", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Edit message @if(in_array("edit_message", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>

                <!-- Faqs -->
                <tr class="gradeX">
                  <td>View faqs @if(in_array("view_faqs", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Add faq @if(in_array("add_faq", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Edit faq @if(in_array("edit_faq", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td>Delete faq @if(in_array("delete_faq", $group, true))<span class="glyphicon icon-ok">@else <span class="glyphicon icon-remove"> @endif </span></td>
                  <td></td>
                </tr>
              @endforeach
              </tbody>
            </table>            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
