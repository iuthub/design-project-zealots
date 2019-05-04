@extends('layouts.app')
@section('content')

@if($slider)
	<div class="slider">
		<div id="main-carousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				@foreach($slider->items as $item)
					@if ($loop->first)
						<div class="carousel-item active">
							<a href="{{ $item->url}}" style="display: block;">
								<img src="{{ $item->image }}" class="d-block w-100" alt="{{ $item->url }}">
								<div class="carousel-caption d-none d-md-block">
									<h5>{{ $item->text }}</h5>
								
								</div>
							</a>
						</div>
					@else
						<div class="carousel-item">
							<a href="{{ $item->url}}" style="display: block;">
								<img src="{{ $item->image }}" class="d-block w-100" alt="{{ $item->url }}">
								<div class="carousel-caption d-none d-md-block">
									<h5>{{ $item->text }}</h5>
							
								</div>
							</a>
						</div>
					@endif
				@endforeach
			</div>
			<a class="carousel-control-prev" href="#main-carousel" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#main-carousel" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
@endif
<div class="content container">
	<div id="why-us" class="page-block">
		<div class="row">
			<div class="col-lg-12 block-title-wrap">
				<h2 class="block-title" style="text-align:center; display: block;">Why us</h2>
			</div>
		</div>
		<div class="row icons">
			<div class="col-lg-4">
				<i class="fas fa-user-shield"></i>
				<h3>Trust</h3>
				<p>We are 10 years on market</p>
			</div>
			<div class="col-lg-4">
				<i class="fas fa-truck"></i>
				<h3>Delivery</h3>
				<p>We have rich delivery system</p>
			</div>
			<div class="col-lg-4">
				<i class="far fa-copyright"></i>
				<h3>Brands</h3>
				<p>Only true production</p>
			</div>
		</div>
	</div>
	<div class="separator"></div>
	<div class="products page-block">
		<div class="row">
			<div class="col-lg-12 block-title-wrap">
				<h2 class="block-title">Recently added products</h2>
				<a href="{{ route("site.products") }}" class="btn btn-primary all-list">All products</a>
			</div>
		</div>
		<div class="row">
			@foreach ($products as $product)
			<div class="col-lg-4">
				<div class="card" style="width: 18rem;">
					<img src="{{ $product->getFirstImg() }}" class="card-img-top" alt="">
					<div class="card-body">
						<h5 class="card-title">{{ $product->name }}</h5>
						<p class="card-text">{{ $product->desc }}</p>
						@if ($cart->has($product->id))
							<a href="{{ route("cart.remove", ["id" => $product->id])}}" class="btn btn-danger">Remove from cart</a>
						@else
							<a href="{{ route("cart.add", ["id" => $product->id])}}" class="btn btn-success">Add to cart</a>
						@endif
						<a href="{{ route("site.product", ["id" => $product->id])}}" class="btn btn-primary">View</a>
					</div>
				</div>
			</div>

			@endforeach
		</div>
	</div>
</div>

<div class="blog page-block">
	<div class="container" style="background: #fff">
		<div class="row">
			<div class="col-lg-12 block-title-wrap">
				<h2 class="block-title">Blog</h2>
				<a href="{{ route("site.posts") }}" class="btn btn-primary all-list">All post</a>
			</div>
		</div>
		<div class="row">
			@foreach($posts as $post)
			<div class="col-md-6">
				<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative post-item">
					<div class="col p-4 d-flex flex-column position-static">
						<h3 class="mb-0">{{ $post->title }}</h3>
						<div class="mb-1 text-muted">{{ $post->getDate() }}</div>
						<p class="card-text mb-auto">{{ $post->getExcerpt() }}</p>
						<a href="{{ route("site.post", ["id" => $post->id ]) }}" class="stretched-link">Continue reading</a>
					</div>
					<div class="col-auto d-none d-lg-block">
						@if ($post->thumbnail)
						<img src="{{ $post->thumbnail }}" alt="" class="bd-placeholder-img" width="200" height="250">
						@else
						<img src="img/no-image.svg" alt="" class="bd-placeholder-img" width="200" height="250">
						@endif
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
<div class="container">
	<div id="reviews" class="page-block">
		<div class="row">
			<div class="col-lg-12 block-title-wrap">
				<h2 class="block-title">Recent Reviews</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						@foreach ($reviews as $index => $review)
						
						<div class="carousel-item <?php echo $index == 0 ? "active" : "" ?>">
							<div class="row">
								@for ($i = 0; $i < 2; $i++)
								<?php
									if($i == 1)
										$index++;
									if(!isset($reviews[$index]))
										continue;
								?>
								<div class="col-lg-6">
									<div class="card mb-3">
										<div class="row no-gutters">
											<div class="col-lg-4 col-sm-12">
												<img src="{{ $reviews[$index]->product->getFirstImg() }}" class="card-img-top" alt="avatar">
												<div class="review-meta">
													<div class="rating">
														<ul>
															@for ($b = 1; $b <= 5; $b++)
															@if ($b > $reviews[$index]->rating)
															<li><i class="far fa-star"></i></li>
															@else
															<li><i class="fas fa-star"></i></li>
															@endif
															@endfor
														</ul>
													</div>
													<div class="product-title">
														<a href="{{ route("site.product", ["id" => $reviews[$index]->product->id])}}">{{ $reviews[$index]->product->name }}</a>
													</div>
												</div>
											</div>
											<div class="col-lg-8 col-sm-12">
												<div class="card-body">
													<p class="card-text">{{ $reviews[$index]->excerptComment() }}</p>
													<div class="author">
														<div class="avatar">
															<img src="{{ $reviews[$index]->getAvatar() }}" alt="">
														</div>
														<div class="name blockquote-footer">
															{{ $reviews[$index]->getAuthorName() }}
														</div>
													</div>
													<div class="clr"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endfor
							</div>
						</div>
						@endforeach
					</div>
					<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
						<i class="fas fa-angle-left"></i>
					</a>
					<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
						<i class="fas fa-angle-right"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

</div>
@endsection