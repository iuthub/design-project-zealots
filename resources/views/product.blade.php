@extends('layouts.app')
@section('content')
<div class="content-wrapper">
	<div class="container">
		<div class="content product-page">
			<div class="row">
				<div class="col-lg-12">
					<h2>{{ $product->name }}</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="slider-wrap">
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
							<a class="nav-link active" data-toggle="tab" href="#desc" role="tab" aria-controls="desc" aria-selected="true">Description</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active tab-section" id="desc" role="tabpanel" aria-labelledby="desc-tab">{{ $product->desc }}</div>
						<div class="tab-pane fade tab-section" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
								
							<div class="reviews-list">
								@foreach ($reviews as $review)
								<div class="row">
									<div class="col-lg-8">
										<div class="card border-primary">
											<div class="card-body">
												<h5 class="card-title"><b>{{ $review->getAuthorName() }}</b></h5>
												
												<div class="rating">
													<ul>
														@for ($b = 1; $b <= 5; $b++)
															@if ($b > $review->rating)
																<li><i class="far fa-star"></i></li>
															@else
																<li><i class="fas fa-star"></i></li>
															@endif

														@endfor
													</ul>
												</div>
												<p class="card-text">{{ $review->comment }}</p>
												<p class="card-text"><small class="text-muted">{{ $review->getDate() }}</small></p>

											</div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<form method="POST" action="{{ route("review.create", ["id" => $product->id]) }}" id="form">
								@csrf
								<div class="row">
									<div class="col-lg-6">
										<div class="radio">
											<h2>Your score</h2>
											<label><input type="radio" name="rating" value="1">1</label>
											<label><input type="radio" name="rating" value="2">2</label>
											<label><input type="radio" name="rating" value="3">3</label>
											<label><input type="radio" name="rating" value="4">4</label>
											<label><input type="radio" name="rating" value="5" checked>5</label>
										</div>
									</div>
								</div>
								@if (!Auth::check())
								<div class="row">
									<div class="col-lg-4">
										<div class="form-group">
											<label for="name">Your name *</label>
											<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required maxlength="100">
											@error('name')
											<div class="alert alert-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="email">Your email *</label>
											<input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" required maxlength="100">
											@error('email')
											<div class="alert alert-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="phone">Your phone</label>
											<input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone">
											@error('phone')
											<div class="alert alert-danger">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>
								@endif
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="comment">Comment</label>
											<textarea name="comment" class="form-control @error('comment') is-invalid @enderror" required></textarea>
											@error('comment')
											<div class="alert alert-danger ">{{ $message }}</div>
											@enderror
										</div>
									</div>
								</div>
							</form>
							<button class="btn btn-success" id="submit-form">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready( function() {

		$("#submit-form").click( function(){
			let name_r = new RegExp("^[a-zA-Z ]+$");
			let email_r = new RegExp("^\S+@\S+\.\S+$");
			let phone_r = new RegExp("^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$");


			if(!name_r.test( $("#name").val() )){
				alert("Check entered name!");
				return;
			}

			if(!email_r.test( $("#email").val() )){
				console.log( $("#email").val());
				alert("Check entered email!");
				return;
			}

			if(!phone_r.test( $("#phone").val() )){
				alert("Check entered phone!");
				return;
			}


			$("#form").submit();
		});
	});
</script>
@endsection