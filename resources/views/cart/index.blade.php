@extends('layouts.app')
@section('content')
<div class="content-wrapper">
	<div class="container" style="padding-bottom: 250px;">
		<div class="row">
			<div class="col-lg-9">
				<h2>Products in your cart.</h2>
				<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th style="width: 5%">#</th>
							<th>Product</th>
							<th>Price</th>
							<th style="width: 20%"></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($cart->products as $index => $product)
							<tr>
								<td>{{ $index+1 }}</td>
								<td>{{ $product->name }}</td>
								<td>${{ $product->price }}</td>
								<td><a href="{{ route("cart.remove", ["id" => $product->id])}}" class="btn btn-danger">Remove from cart</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="col-lg-3">
				<div class="checkout">
					<div class="card" style="padding: 10px;">
						<h4 style="margin-bottom: 50px;">Checkout: <b>${{ $cart->total() }}</b></h4>
						@guest
							<a href="{{ route("register") }}" class="btn btn-success"> Order </a>
						@else
							<a href="{{ route("order.create") }}" class="btn btn-success">Order</a>
						@endguest
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection