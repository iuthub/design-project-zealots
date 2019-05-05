@extends('layouts.app')
@section('content')
<div class="content-wrapper page-block">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h4>Categories: </h4>
				<ul class="nav justify-content-center">
					@foreach($categories as $cat)
						<li class="nav-item">
							<a class="nav-link active" href="/site/products/cat/{{ $cat->id }}">{{ $cat->name }}</a>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<form method="POST" class="form-inline my-2 my-lg-0" action="{{ route("site.search") }}">
					@csrf
					<input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 block-title-wrap">
				<h2 class="block-title">Products</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
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
			<div class="col-lg-12">
				{{ $products->links() }}
			</div>
		</div>
	</div>
</div>

@endsection