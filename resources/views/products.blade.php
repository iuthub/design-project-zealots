@extends('layouts.app')
@section('content')
<div class="content-wrapper page-block">
	<div class="container">
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