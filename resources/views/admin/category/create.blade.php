@extends('layouts.admin')
@section('content')
@include('partials.breadcrumbs')
<div class="content">
	<div class="row">
		<div class="col-lg-12">
			<a href="{{ route("category.create") }} "><button type="button" class="btn btn-success">Save</button></a>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			@include('admin.category._form')
		</div>
	</div>
</div>
@endsection