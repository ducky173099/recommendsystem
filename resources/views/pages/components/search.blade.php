@extends('layouts.page_master')
	@section('title')
		<title>Search page</title>
	@endsection

	@section('content')

		<section>
			<div class="container">
				<div class="row">
					@include('pages.components.sidebar')
					
					<div class="col-sm-9 padding-right">
						<div class="features_items">
							<h2 class="title text-center">Kết quả tìm kiếm</h2>
						
							@foreach($search_product as $key => $productSearchItem)
								{{-- <a href="{{url('/product-detail', ['id' => $productSearchItem->id])}}"> --}}
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<form action="{{url('/product-detail', ['id' => $productSearchItem->id])}}" method="GET">
													{{ csrf_field() }}
													<div class="productinfo text-center">
														<img style="width: 255px; height:300px" src="public/uploads/product/{{$productSearchItem->product_image}}" alt="" />
														<h2>{{number_format($productSearchItem->price)}} VND</h2>
														<p>{{$productSearchItem->productname}}</p>
														<button type="submit" class="btn btn-default add-to-cart">
															<i class="fa fa-shopping-cart"></i>
															Thêm giỏ hàng
														</button>
													</div>
												</form>
											</div>
											<div class="choose">
												<ul class="nav nav-pills nav-justified">
													<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
													<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
												</ul>
											</div>
										</div>
									</div>
								{{-- </a> --}}
						
							@endforeach
							
						</div>
					</div>
				</div>
			</div>
		</section>
		

@endsection
  
