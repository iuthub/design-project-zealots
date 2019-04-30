@extends('layouts.admin')
@section('content')
<div class="content">
	<div class="row">
		<div class="col-lg-12">
			<a href="{{ route("slider.create") }} "><button type="button" class="btn btn-primary">Create Slider</button></a>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<table class="table table-hover" style="margin-top: 20px;">
				<thead class="thead-dark">
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Name</th>
						<th scope="col">Slug</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($sliders as $slider)
					<tr>
						<th scope="row"> {{ $slider->id }} </th>
						<td> {{ $slider->name }} </td>
						<td> {{ $slider->slug }} </td>
						<td><a href="{{ route("slider.update", ["id" => $slider->id]) }}"><i class="far fa-edit"></i></a>
							<a href="#" data-id={{ $slider->id }} class="delete-item">
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