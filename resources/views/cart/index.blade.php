@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			@foreach ($cart->products as $product)
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">{{ $product->name }}</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							<a href="{{ route("cart.remove", ["id" => $product->id])}}" class="btn btn-primary">Remove from cart</a>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection
