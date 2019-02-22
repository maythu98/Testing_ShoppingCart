<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shopping Cart</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center">Shopping Cart Items</h1>
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Tax</th>
							<th>Total Price</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($cartitems as $cartitem)
							<tr>
								<th scope="row">{{$cartitem->id}}</th>
								<td>{{$cartitem->name}}</td>
								<td>{{$cartitem->price}}</td>
								<td>{{$cartitem->qty}}</td>
								<td>{{$cartitem->tax}}</td>
								<td>{{$cartitem->total}}</td>
								<td class="text-center">
									<form action="{{route('carts.destroy', $cartitem->rowId)}}" method="post">
										@csrf
										@method('delete')
										<button class="close" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</form>
								</td>
							</tr>
						@endforeach
						<tr>
							<td colspan="5" class="text-center">
								<b>Total Charges:</b>
							</td>
							<td>{{ Cart::total() }} MMK</td>
						</tr>
						<tr>
							<td colspan="3">
								<a href="{{route('products.index')}}"> <<<<<< Continue Shopping </a>
							</td>

							<td colspan="4" class="text-right">
								<a href="{{route('orders.create')}}" class="btn btn-primary btn-lg">CHECK OUT</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script src="{{asset('js/app.js')}}"></script>
</body>
</html>