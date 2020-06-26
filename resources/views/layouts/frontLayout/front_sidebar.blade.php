@php use App\product; @endphp
<form action="{{ url('/products-filter') }}" method="post"> {{ csrf_field() }}
	@if(!empty($url))
		<input type="hidden" name="url" value="{{ $url }}">
	@endif
	@if(!empty($pattern))
		<input type="hidden" name="pattern" value="{{ $pattern }}">
	@endif
	@if(!empty($outlet))
		<input type="hidden" name="outlet" value="{{ $outlet }}">
	@endif
	<!-- START CATGEORIES -->
	<div class="filter-widget">
		<h4 class="fw-title">Categories</h4>
		<ul class="filter-catagories">
			@foreach($categories as $cat)
				@if($cat->status == 1)
					<li>
						<a class="a_sidebar" href="{{asset('/products/'.$cat->url)}}">{{$cat->name}}</a>
						<ul style="margin-left:30px;" class="filter-catagories">
							@foreach($cat->categories as $subcat)
								@if($subcat->status == "1")
									<li><a class="a_sidebar" href="{{asset('/products/'.$subcat->url)}}">{{$subcat->name}}</a></li>
								@endif
							@endforeach
						</ul>
					</li>
				@endif
			@endforeach
		</ul>
	</div>
	<!-- END CATEGORIES -->


	<!-- START BRAND -->
	@if(!empty($url) || !empty($pattern) || !empty($outlet)) 
		<div class="filter-widget">
			<h4 class="fw-title">Brand</h4>
			<div class="fw-brand-check">
				@foreach($brandArray as $brand)
					@if(!empty($_GET['brand']))
						<?php $brandArr = explode('-',$_GET['brand']) ?>
						@if(in_array($brand->brand, $brandArr))
							<?php $brandcheck="checked"; ?>
						@else
							<?php $brandcheck=""; ?>
						@endif 
					@else
						<?php $brandcheck=""; ?>
					@endif
					<div class="bc-item">
						<label for="{{ $brand->brand }}">
							{{ $brand->brand }}
								<input name="brandFilter[]" id="{{ $brand->brand }}" value="{{ $brand->brand }} " type="checkbox" {{ $brandcheck }} onchange="javascript:this.form.submit()">
								<span class="checkmark"></span>
							</form>
						</label>
					</div>
				@endforeach
			</div>
		</div>
	@endif

	<!-- END BRAND -->
</form>

