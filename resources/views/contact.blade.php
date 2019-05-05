@extends('layouts.app')
@section('content')
<div class="content-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2>Send your message us!</h2>
				<form method="POST" action="{{ route("feedback.send") }}" id="form">
					@csrf

					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label for="name">Your name *</label>
								<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required maxlength="100">
								@error('name')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="email">Your email *</label>
								<input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" required maxlength="100">
								@error('email')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="phone">Your phone</label>
								<input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone">
								@error('phone')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label for="comment">Comment</label>
								<textarea name="comment" class="form-control @error('comment') is-invalid @enderror" required></textarea>
								@error('comment')
								<div class="alert alert-danger ">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>
				</form>
				<button class="btn btn-success" id="submit-form">Submit</button>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready( function() {

		$("#submit-form").click( function(){
			let name_r = new RegExp("^[a-zA-Z ]+$");

			let phone_r = new RegExp("^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$");


			if(!name_r.test( $("#name").val() )){
				alert("Check entered name!");
				return;
			}

			if(!/\S+@\S+\.\S+/.test( $("#email").val() )){
				console.log( $("#email").val());
				alert("Check entered email!");
				return;
			}

			if(!phone_r.test( $("#phone").val() )){
				alert("Check entered phone!");
				return;
			}


			$("#form").submit();
		});
	});
</script>
@endsection