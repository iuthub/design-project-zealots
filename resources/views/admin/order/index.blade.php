@extends('layouts.admin')
@section('content')
<div class="content">
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-hover" style="margin-top: 20px;">
				<thead class="thead-dark">
					<tr>
						<th scope="col">ID</th>
						<th scope="col">User</th>
						<th scope="col">Status</th>
						<th scope="col">Date</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($orders as $order)
					<tr>
						<th scope="row"> {{ $order->id }} </th>
						<td> {{ $order->user->name }} </td>
						<td> {{ ucfirst($order->status) }} </td>
						<td> {{ $order->created_at }} </td>
						<td><a href="{{ route("order.update", ["id" => $order->id]) }}"><i class="far fa-edit"></i></a>
							<a href="#" data-id={{ $order->id }} class="delete-item">
								<i class="fas fa-trash-alt"></i>
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	$("document").ready( function(){
		$(".delete-item").click(function(){
			let id = $(this).attr("data-id");
			if(confirm("Are your sure, you want to delete this?")){
				window.location.href = window.location.href+"/delete/"+id;
			}
		});
	});
</script>
@endsection