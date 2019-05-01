@extends('layouts.app')
@section('content')
	<div class="content">
		@foreach ($products as $product)
			<div class="col-lg-4">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">{{ $product->name }}</h5>
						<p class="card-text">{{ $product->desc }}</p>
						<a href="{{ route("cart.add", ["id" => $product->id])}}" class="btn btn-success">Add to cart</a>
						<a href="{{ route("site.product", ["id" => $product->id])}}" class="btn btn-primary">View</a>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endsection