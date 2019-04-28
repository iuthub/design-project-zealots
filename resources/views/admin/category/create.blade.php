@extends('layouts.admin')
@section('content')
<div class="content">
	<div class="row">
		<div class="col-lg-12">
			<form method="POST" action="{{ route("category.create") }}">
				@include('admin.category._form')
			</form>
		</div>
	</div>
</div>
@endsection