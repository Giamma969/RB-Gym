@extends('layouts.adminlayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">Edit Product</a> </div>
    <h1>Products</h1>
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
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Product</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{url('/admin/edit-product/'.$productDetails->id)}}" name="edit_product" id="edit_product" novalidate="novalidate"> {{csrf_field()}}
              
              <div class="control-group">
                <label class="control-label">Subcategory</label>
                <div class="controls">
                  <select name="category_id" style="width: 220px;">
                    <?php echo $categories_dropdown;?>
                    
                  </select>
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Product name</label>
                <div class="controls">
                  <input type="text" name="product_name" id="product_name" value="{{$productDetails->product_name}}">
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Product code</label>
                <div class="controls">
                  <input type="text" name="product_code" id="product_code" value="{{$productDetails->product_code}}" readonly>
                  <input type="button" name="makeProductCode" id="makeProductCode" class="btn btn-success" value="Generate">
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Product color</label>
                <div class="controls">
                  <input type="text" name="product_color" id="product_color" value="{{$productDetails->product_color}}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <textarea name="description" id="description">{{$productDetails->description}}</textarea>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Price (€)</label>
                <div class="controls">
                  <input type="number" min="0" step="0.01" name="price" id="price" value="{{$productDetails->price}}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Stock</label>
                <div class="controls">
                  <input type="number" min="0" name="stock" id="stock" value="{{$productDetails->stock}}">
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Brand</label>
                <div class="controls">
                  <input type="text" name="brand" id="brand" value="{{$productDetails->brand}}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Height (cm)</label>
                <div class="controls">
                  <input type="number" min="0" name="height" id="height" value="{{$productDetails->height}}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Width (cm)</label>
                <div class="controls">
                  <input type="number" min="0" name="width" id="width" value="{{$productDetails->width}}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Depth (cm)</label>
                <div class="controls">
                  <input type="number" min="0" name="depth" id="depth" value="{{$productDetails->depth}}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Material</label>
                <div class="controls">
                  <input type="text" name="material" id="material" value="{{$productDetails->material}}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Weight (Kg)</label>
                <div class="controls">
                  <input type="number" min="0" step="0.01" name="weight" id="weight" value="{{$productDetails->weight}}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Maximum load supported (Kg)</label>
                <div class="controls">
                  <input type="number" min="0" step="0.01" name="maximum_load_supported" id="maximum_load_supported" value="{{$productDetails->maximum_load_supported}}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                  <input type="file" name="image" id="image">
                  <input type="hidden" name="current_image" value=" {{ $productDetails->image }}">
                  @if(!empty($productDetails->image))
                    <img style="width:40px;" src="{{asset ('/images/backend_images/products/small/'.$productDetails->image) }}"> 
                  @endif
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Active</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" @if($productDetails->status=="1") checked @endif value="1" >
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Edit product" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">

  </div>
</div>


@endsection