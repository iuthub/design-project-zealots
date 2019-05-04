@extends('layouts.admin')
@section('content')
<div class="content">
	<div class="row">
		<div class="col-lg-12">
			<a href="{{ route("tag.create") }} "><button type="button" class="btn btn-primary">Create Tag</button></a>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<table class="table table-hover" style="margin-top: 20px;">
				<thead class="thead-dark">
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Tag</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($tags as $tag)
					<tr>
						<th scope="row"> {{ $tag->id }} </th>
						<td> {{ $tag->name }} </td>
						<td><a href="{{ route("tag.update", ["id" => $tag->id]) }}"><i class="far fa-edit"></i></a>
							<a href="#" data-id={{ $tag->id }} class="delete-item">
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