<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Create Form for Student Records</title>
	<link rel="stylesheet" href=" {{ asset('css/app.css') }} ">
</head>
<body>
	<div class="container">
		<form action=" {{ route('students.store') }} " method="post">
			@csrf
			<h1 align="center">Student-Record Create Form</h1>
			<div class="form-group">
				<label for="name">Student Name</label>
				<input type="text" class="form-control" name="name" value="{{ old('name') }}">
				@if($errors->has('name'))
					<small class="text-danger">
						{{ $errors->first('name') }}
					</small>
				@endif
			</div>
			<div class="form-group">
				<label for="age">Student Age</label>
				<input type="text" class="form-control" name="age" value="{{ old('age') }}">
				@if($errors->has('age'))
					<small class="text-danger">
						{{ $errors->first('age') }}
					</small>
				@endif
			</div>
			<div class="form-group">
				<label for="class">Student Class</label>
				<input type="text" class="form-control" name="class" value="{{old('class')}}">
				@if($errors->has('class'))
					<small class="text-danger">
						{{ $errors->first('class') }}
					</small>
				@endif
			</div>
			<div class="form-group">
				<label for="address">Address</label>
				<textarea name="address" class="form-control" id="" cols="30" rows="5">{{ old('address') }}</textarea>
				@if($errors->has('address'))
					<small class="text-danger">
						{{ $errors->first('address') }}
					</small>
				@endif
			</div>
			<button class="btn btn-primary btn-block">Create Record</button>
		</form>
	</div>
</body>
</html>