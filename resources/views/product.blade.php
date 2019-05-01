@extends('layouts.app')
@section('content')

<div class="container">
	<div class="content product-page">
		<div class="row">
			<div class="col-lg-12">
				<h2>{{ $product->name }}</h2>
			</div>

		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="slider">
					<div id="product-images-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							@foreach( $product->images as $index => $image)
							@if ($loop->first)
							<li data-target="#product-images-carousel" data-slide-to="{{ $index }}" class="active"></li>
							@else
							<li data-target="#product-images-carousel" data-slide-to="{{ $index }}"></li>
							@endif;
							@endforeach
						</ol>
						<div class="carousel-inner">
							@foreach( $product->images as $image)
							@if ($loop->first)
							<div class="carousel-item active">
								<img src="{{ $image->url }}" class="d-block w-100" alt="{{ $image->caption }}">
								<div class="carousel-caption d-none d-md-block">
									<h5>{{ $image->title }}</h5>
									<p>{{ $image->caption }}</p>
								</div>
							</div>
							@else
							<div class="carousel-item">
								<img src="{{ $image->url }}" class="d-block w-100" alt="{{ $image->caption }}">
								<div class="carousel-caption d-none d-md-block">
									<h5>{{ $image->title }}</h5>
									<p>{{ $image->caption }}</p>
								</div>
							</div>
							@endif
							@endforeach
						</div>
						<a class="carousel-control-prev" href="#product-images-carousel" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#product-images-carousel" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="justify-content-center">
					<h2>{{ $product->name }}</h2>
					<h3><em>Price:</em> <strong>${{ $product->price }}</strong></h3>

					<a href="{{ route("cart.add", ["id" => $product->id])}}" class="btn btn-success">Add to cart</a>
				</div>


			</div>
			<div class="col-lg-12" style="margin-top: 20px;">
				<ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="desc" data-toggle="tab" href="#desc" role="tab" aria-controls="desc" aria-selected="true">Description</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="desc" role="tabpanel" aria-labelledby="desc-tab">{{ $product->desc }}</div>
					<div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">...</div>
					<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection