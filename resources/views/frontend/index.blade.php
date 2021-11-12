@extends('frontend.layout.main')

@section('content')
	<div class="super_container_inner">
		<div class="super_overlay"></div>
		<!-- Home -->

		<div class="home">
			<!-- Home Slider -->
			<div class="home_slider_container">
				<div class="owl-carousel owl-theme home_slider">
					
					<!-- Slide -->
					@foreach ($jumbotron as $item)	
					<div class="owl-item">
						<div class="background_image" style="background-image:url({{ asset('storage/' . $item->image ) }})"></div>
						<div class="container fill_height">
							<div class="row fill_height">
								<div class="col fill_height">
									<div class="home_container d-flex flex-column align-items-center justify-content-start">
										<div class="home_content">
											<div class="home_title">{{ $item->title }}</div>		
											<div class="home_items">
												<div class="row">
													<div class="col-sm-3 offset-lg-1">
														<div class="home_item_side"><a href="product.html"><img src="{{ asset('storage/' . $item->image1 ) }}" alt=""></a></div>
													</div>
													<div class="col-lg-4 col-md-6 col-sm-8 offset-sm-2 offset-md-0">
														<div class="product home_item_large">
															<div class="product_image"><img src="{{ asset('storage/' . $item->image2 ) }}" alt=""></div>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="home_item_side"><a href="product.html"><img src="{{ asset('storage/' . $item->image3 ) }}" alt=""></a></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
					@endforeach

				</div>
				<div class="home_slider_nav home_slider_nav_prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
				<div class="home_slider_nav home_slider_nav_next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>

				<!-- Home Slider Dots -->
				
				<div class="home_slider_dots_container">
					<div class="container">
						<div class="row">
							<div class="col">
								<div class="home_slider_dots">
									<ul id="home_slider_custom_dots" class="home_slider_custom_dots d-flex flex-row align-items-center justify-content-center">
										@foreach ($jumbotron as $data)
										<li class="home_slider_custom_dot">{{ $loop->iteration }}</li>
										@endforeach
									</ul>
								</div>
							</div>
						</div>
					</div>	
				</div>

			</div>
		</div>

		<!-- Products -->

		<div class="products">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3">
						<div class="section_title text-center">Populer On Shop</div>
					</div>
				</div>
				<div class="row page_nav_row">
					<div class="col">
						<div class="page_nav">
							<ul class="d-flex flex-row align-items-start justify-content-center">
								@foreach ($categoryProduct as $item)									
								<li><a href="category.html">{{ $item->name }}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
				<div class="row products_row">
					
					@foreach ($product as $item)
					<div class="col-xl-4 col-md-6">
						<div class="product">
							<div class="card" style="" >
								<img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="...">
								<div class="card-body">
									<h3 class="card-title">{{ $item->name }}</h3>
									<i><p class="card-text">{{ $item->description }}</p></i>
								</div>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">Category : {{ $item->category }}</li>
									<li class="list-group-item">Rp. {{ $item->price }}.000</li>
									<a href="" class="btn btn-primary float-right">Order Now!</a>
								</ul>
							</div>
						</div>
					</div>
					@endforeach
                    
				</div>				
					<div class="center">
						{{ $product->links() }}
					</div>
			</div>
		</div>

		<!-- Boxes -->

		<div class="boxes">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="boxes_container d-flex flex-row align-items-start justify-content-between flex-wrap">

							@foreach ($catalog as $item)
							<!-- Box -->
							<div class="box">
								<div class="background_image" style="background-image:url({{ asset('storage/' . $item->image) }})"></div>
								<div class="box_content d-flex flex-row align-items-center justify-content-start">
									<div class="box_left">
										<div class="box_image">
											<div class="background_image" style="background-image:url({{ asset('storage/' . $item->image) }})"></div>
										</div>
									</div>
									
								</div>
							</div>
							@endforeach

						</div>
					</div>
				</div>
			</div>
		</div>

		@endsection