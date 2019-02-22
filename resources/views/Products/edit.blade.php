<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Page</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form action="{{route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
					@csrf
					@method('patch')
					<h1 class="text-center">Product Edition</h1>
					<div class="form-group">
						<label for="name">Product Name</label>
						@if($errors->has('name'))
							<input type="text" name="name" value="{{old('name')}}" class="form-control">		
							<small class="text-danger">
								{{ $errors->first("name") }}
							</small>			
						@else
							<input type="text" name="name" value="{{$product->name}}" class="form-control">
						@endif
					</div>
					<div class="form-group">
						<label for="price">Product Price (MMK) </label>
						@if($errors->has('price'))
							<input type="number" name="price" value="{{old('price')}}" class="form-control">
							<small class="text-danger">
								{{ $errors->first("price") }}
							</small>					
						@else
							<input type="number" name="price" value="{{$product->price}}" class="form-control">
						@endif
					</div>
					<div class="form-group">
						<label for="stock_quantity">Stock Quantity</label>
						@if($errors->has('stock_quantity'))
							<input type="number" name="stock_quantity" value="{{old('stock_quantity')}}" class="form-control">
							<small class="text-danger">
								{{ $errors->first("stock_quantity") }}
							</small>					
						@else
							<input type="number" name="stock_quantity" value="{{$product->stock_quantity}}" class="form-control">
						@endif
					</div>
					<div class="form-group">
						<img src="{{url('storage/images/'.$product->image)}}" alt="" width="150" height="100" name="image">
						<input type="file" name="image" value="{{$product->image}}">
					</div>
					<div class="form-group">
						<label for="description">Description</label>
						@if($errors->has('description'))
							<textarea name="description" id="" class="form-control" rows="3">{{old('description')}}</textarea>
							<small class="text-danger">
								{{ $errors->first("description") }}
							</small>					
						@else
							<textarea name="description" id="" class="form-control" rows="3">{{$product->description}}</textarea>
						@endif
					</div>
					<button type="submit" class="btn btn-primary btn-block btn-lg">Edit Form</button>
				</form>
			</div>
		</div>
	</div>
	<script src="{{asset('js/app.js')}}"></script>
</body>
</html>