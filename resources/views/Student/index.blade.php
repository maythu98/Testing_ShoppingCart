<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Home Page OF Student RECORDS</title>
	<link rel="stylesheet" href="{{ asset('css/app.css')}} ">
</head>
<body>
	<div id="app" class="container">
		<h1 align="center">STUDENT RECORDS</h1>
		<br>
		<a href="{{ route('students.create') }}" class="btn btn-primary">Create Student</a>
		<hr>
		@if($students->count() > 0)
		<h4>Total Student = {{ $students->count() }}</h4>
		<table class="table table-striped">
			<thead>
				<tr>
					<td>ID</td>
					<td>Student Name</td>
					<td>Age</td>
					<td>Class</td>
					<td>Address</td>
					<td>Action</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				@foreach($students as $student)
				<tr>
					<td> {{ $student->id }} </td>
					<td> {{ $student->name }} </td>
					<td> {{ $student->age }} </td>
					<td> {{ $student->class }} </td>
					<td> {{ $student->address }} </td>
					<td> 
						<a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">EDIT</a>
					</td>
					<td>
						<form action="{{ route('students.destroy', $student->id) }}" method="post">
							@csrf
							@method('delete')
							<button class="btn btn-danger">DELETE</button>
						</form> 
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{ $students->links() }};

		@else
			<h2>No Student Records</h2>
		@endif
	</div>
	<script href=" {{ asset('js/app.js') }} " ></script>
</body>
</html>