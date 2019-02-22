<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product Show Page</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center">Product Index Page</h1>
				<a href="{{route('products.create')}}" class="btn btn-success">Create New Product</a>
				<br>
				<br>
				<br>
			</div>
			<div class="col-md-12">
				<p class="text-right">
					<a href="{{route('carts.index')}}" class="btn btn-primary">
						<span class="glyphicon glyphicon-shopping-cart"></span>
						Shopping Cart ({{$count}})
					</a>
				</p>
			</div>
			@if($products->count() > 0 )
				<div class="col-md-12">
					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Image</th>
								<th scope="col">Product Name</th>
								<th scope="col">Price</th>
								<th scope="col">Stock Quantity</th>
								<th scope="col">Description</th>
								<th scope="col" colspan="3">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($products as $product)
							<tr>
								<th scope="row">{{$product->id}}</th>
								<td>
									<img src="{{url('storage/images/'.$product->image)}}" alt="" width="150" height="100">
								</td>
								<td>
									<b>{{$product->name}}</b>
								</td>
								<td>{{$product->price}} MMK</td>
								<td>{{$product->stock_quantity}}</td>
								<td>
									{{$product->description}}
								</td>
								<td>
									<a href="{{route('carts.edit', $product->id)}}" class="btn btn-success">
										Add To Cart
									</a>
								</td>
								<td>
									<a href="{{route('products.edit', $product->id)}}" class="btn btn-primary">
										<span class="glyphicon glyphicon-edit"></span>
										Edit
									</a>
								</td>
								<td>
									<form action="{{route('products.destroy', $product->id)}}" method="post">
										@csrf
										@method('delete')
										<button class="btn btn-danger">
											<span class="glyphicon glyphicon-edit"></span>
											Delete
										</button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				@else
				<div class="col-md-12">
					<h3>NO Product Found</h3>
				</div>
			@endif
		</div>
	</div>

	<script src="{{asset('js/app.js')}}"></script>
</body>
</html>