@extends('layouts.admin')
@section('content')
@include('partials.breadcrumbs')
<div class="content">
	<div class="row">
		<div class="col-lg-12">
			<form method="POST" action="{{ route("category.update", ["id" => $model->id]) }}">
				@include('admin.category._form')
			</form>
		</div>
	</div>
</div>
@endsection