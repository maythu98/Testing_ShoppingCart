<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create Product Form</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<h1 class="text-center">Product Create Form</h1>
					<div class="form-group">
						<label for="name">Product Name</label>
						<input type="text" name="name" placeholder="Product Name" class="form-control" autofocus="" value="{{old('name')}}">
						@if($errors->has('name'))
							<small class="text-danger">
								{{ $errors->first("name") }}
							</small>						
						@endif
					</div>
					<div class="form-group">
						<label for="price">Product Price</label>
						<input type="number" class="form-control" name="price" placeholder="Product Price" value="{{old('price')}}">
						@if($errors->has('price'))
							<small class="text-danger">
								{{ $errors->first("price") }}
							</small>						
						@endif
					</div>
					<div class="form-group">
						<label for="stock">Stock Quantity</label>
						<input type="number" class="form-control" name="stock_quantity" placeholder="Product Stock" value="{{old('stock_quantity')}}">
						@if($errors->has('stock_quantity'))
							<small class="text-danger">
								{{ $errors->first("stock_quantity") }}
							</small>						
						@endif
					</div>
					<div class="form-group">
						<label for="description">Product Description</label>
						<textarea name="description" id="" class="form-control" rows="10"  placeholder="Product Description">{{old('description')}}</textarea>
						@if($errors->has('description'))
							<small class="text-danger">
								{{ $errors->first("description") }}
							</small>						
						@endif
					</div>
					<div class="form-group">
						<label for="image">Image</label>
						<input type="file" name="image" value="{{old('image')}}">
						@if($errors->has('image'))
							<small class="text-danger">
								{{ $errors->first("image") }}
							</small>						
						@endif
					</div>
					<button class="btn btn-primary" type="submit">Create Product</button>
					<br>
				</form>
			</div>
		</div>
	</div>
	<script src="{{asset('js/app.js')}}"></script>
</body>
</html>