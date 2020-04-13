@php use App\product; @endphp
<form action="{{ url('/products-filter') }}" method="post"> {{ csrf_field() }}
	@if(!empty($url))
		<input type="hidden" name="url" value="{{ $url }}">
	@endif 
	
	<div class="left-sidebar">
		<h2>Categories</h2>
		<div class="panel-group category-products" id="accordian">
			<div class="panel panel-default">
				@foreach($categories as $cat)
					@if($cat->status == 1)
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordian" href="#{{$cat->id}}">
									<span class="badge pull-right"><i class="fa fa-plus"></i></span>
									{{$cat->name}}
								</a>
							</h4>
						</div>
						<div id="{{$cat->id}}" class="panel-collapse collapse">
							<div class="panel-body">
								<ul>
								@foreach($cat->categories as $subcat)
									@php
										$productSubcatCount = Product::productSubcatCount($subcat->id);
									@endphp 
									@if($subcat->status == "1")
										<li><a href="{{asset('/products/'.$subcat->url)}}">{{$subcat->name}} ({{$productSubcatCount}})</a></li>
									@endif
								@endforeach
								</ul>
							</div>
						</div>
					@endif
				@endforeach
			</div>
		</div>

		<!-- start brands_products-->
		@if(!empty($url))
			<h2>Brand</h2>
			<div class="panel-group category-products" id="accordian2">
				@foreach($brandArray as $brand)
					 
					@if(!empty($_GET['brand']))
						<?php $brandArr = explode('-',$_GET['brand']) 
						//$brand_test = explode('-', $_GET['brand']);
						//echo '<pre>'; print_r($brand_test); die;
						//$brandArray= array_flatten(json_decode(json_encode($brandArray),true)); ?>

						
						@if(in_array($brand->brand, $brandArr))
							<?php $brandcheck="checked"; ?>
						@else
							<?php $brandcheck=""; ?>
						@endif 
					@else
						<?php $brandcheck=""; ?>
					@endif
					<div class="panel panel-default">
						<div class="panel-heading">
							<span class="badge pull-right">  
								{{ $brand->brand }} 
							</span>
							<input align="right" name="brandFilter[]" id="{{ $brand->brand }} " value="{{ $brand->brand }} " type="checkbox" {{ $brandcheck }} onchange="javascript:this.form.submit()">
							
							<h4 class="panel-title">
								
							</h4>
						</div>
					</div>
				@endforeach
			</div>
		@endif
		<!-- end brands_products-->
		
		
		
		
		<!--shipping-->
		<div class="shipping text-center">
			<img src="{{asset('images/frontend_images/home/shipping.jpg')}}" alt="" />
		</div>
		<!--/shipping-->

	</div>
</form>