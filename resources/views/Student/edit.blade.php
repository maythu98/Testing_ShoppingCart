<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Edition Form of Student Records</title>
	<link rel="stylesheet" href=" {{ asset('css/app.css') }} ">
</head>
<body>
	<div class="container">
		<form action=" {{ route('students.update', $student->id) }} " method="post">
			@csrf
			@method('patch')
			<h1 align="center">Student-Record Update Form</h1>
			<div class="form-group">
				<label for="name">Student Name</label>
				@if($errors->has('name'))
					<input type="text" class="form-control" name="name" value="{{ old('name') }}">
					<small class="text-danger">
						{{ $errors->first('name') }}
					</small>
				@else 
					<input type="text" class="form-control" name="name" value="{{ $student->name }}">
				@endif

			</div>

			<div class="form-group">
				<label for="age">Student Age</label>
				@if($errors->has('age'))
					<input type="text" class="form-control" name="age" value="{{ old('age') }}">
					<small class="text-danger">
						{{ $errors->first('age') }}
					</small>
				@else
					<input type="text" class="form-control" name="age" value="{{ $student->age }}">
				@endif
			</div>

			<div class="form-group">
				<label for="class">Student Class</label>
				@if($errors->has('class'))
					<input type="text" class="form-control" name="class" value="{{old('class')}}">
					<small class="text-danger">
						{{ $errors->first('class') }}
					</small>
				@else
					<input type="text" class="form-control" name="class" value="{{$student->class}}">
				@endif
			</div>
			<div class="form-group">
				<label for="address">Address</label>
				@if($errors->has('address'))
					<textarea name="address" class="form-control" id="" cols="30" rows="10"> {{ old('address') }} </textarea>
					<small class="text-danger">
						{{ $errors->first('address') }}
					</small>
				@else
					<textarea name="address" class="form-control" id="" cols="30" rows="10"> {{ $student->address }} </textarea>
				@endif
			</div>

			<button class="btn btn-primary btn-block">Edit Record</button>
		</form>
	</div>
</body>
</html>