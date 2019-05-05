@extends('layouts.app')
@section('content')
<div class="content-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<img src="/img/chuck.jpg" alt="" style="display: block; margin: 0 auto;">
				<blockquote class="blockquote">
				  <footer class="blockquote-footer"><cite title="Source Title">{{ $quote }}</cite></footer>
				</blockquote>
			</div>
		</div>
	</div>
</div>
@endsection