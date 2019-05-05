<h2>HI, thank you for buying from BrandShop!</h2>
<p>We got your order, and will try to answer as fast as possible!!. thank you!</p>
<table class="table table-hover table-bordered">
	<thead>
		<tr>
			<th style="width: 5%">#</th>
			<th>Product</th>
			<th>Price</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($order->products as $index => $product)
			<tr>
				<td>{{ $index+1 }}</td>
				<td>{{ $product->name }}</td>
				<td>${{ $product->price }}</td>
			</tr>
		@endforeach
	</tbody>
</table>