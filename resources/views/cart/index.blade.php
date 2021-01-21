@extends('/layouts.app')

@section('content')
<!-- Design of list in cart -->

@if(Cart::count()!="0")
<div class="row">
	<div class="cart">
		<div class="col-sm-12">
			<h2>Shopping Cart</h2>
			<div class="row">
				<div class="col-sm-8">
					@foreach($data as $product)
					<div class="cart-row">
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6 text-center"><img src="images/thumb1.jpg" class="img-responsive pull-left" /><span class="pull-left top20"><strong>{{$product->name}}</strong></span></div>
							<div class="col-xs-12 col-sm-3 col-md-3">
								<div class="cart-qty"> <span>Qty : </span>
									<input type="text" class="qty-fill" value="{{$product->qty}}">
								</div>
								<div class="cart-remove">Update</div>
								<a href="{{url('cart/remove')}}/{{$product->rowId}}" class="cart-remove">Remove</a>
							</div>
							<div class="col-xs-12 col-sm-3 col-md-3">
								<h6>Unit Price</h6>
								<p>{{$product->price}}</p>
								<hr />
								<h6 class="redtext">Total: EUR {{$product->price * $product->qty}}</h6>
							</div>
						</div>
					</div></br>
					@endforeach
				</div>
			
				<div class="col-sm-4">
					<div class="cart-total">
						<h4>Total Amount</h4>
						<table>
							<tbody>
								<tr>
									<td>Sub Total</td>
									<td>EUR {{Cart::subtotal()}}</td>
								</tr>
								<tr>
									<td>Tax (%)</td>
									<td>EUR {{$product->tax()}}</td>
								</tr>
								<tr>
									<td>Total</td>
									<td>EUR {{$product->total()}}</td>
								</tr>
							</tbody>
						</table>
						<input type="submit" class="read-more  " value="Continue Shopping">
						
						<a class="read-more" href="{{route('checkout.index')}}">Check Out</a>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
@else
<h1>Shopping cart is empty</h1>
@endif
<!-- End design of list in cart -->
@endsection