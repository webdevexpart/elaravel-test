@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>

			@php

				$contents = Cart::content();
				
			@endphp
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image" style="width: 40px">Image</td>
							<td class="description" style="width: 25%">Name</td>
							<td class="price" style="width: 10%">Price</td>
							<td class="quantity" style="width: 13%">Quantity</td>
							<td class="total" style="width: 13%">Total</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
					@foreach($contents as $v_contents)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{ $v_contents->options->image }}" alt="" style="width: 50px"></a>
							</td>
							<td class="cart_description">
								<h4><a style="font-size: 12px !important;" href="">{{ $v_contents->name }}</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p style="font-size: 16px !important;">{{ $v_contents->price }}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{ url('/update-cart')}}" method="post">
										@csrf
										<input class="cart_quantity_input" type="text" name="qty" value="{{ $v_contents->qty }}" autocomplete="off" size="2">
										<input type="hidden" name="rowId" value="{{ $v_contents->rowId }}">
										<input type="submit" name="submit" value="Update" class="btn btn-sm btn-info">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price" style="font-size: 16px !important;">{{ $v_contents->total }}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{ URL::to('/delete-to-cart/'.$v_contents->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					@endforeach

						
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<!-- <div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div> -->
				<div class="col-sm-6 col-sm-offset-3">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{  Cart::subtotal() }}</span></li>
							<li>Eco Tax <span>{{ Cart::tax() }}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{ Cart::total() }}</span></li>
						</ul>
							<a class="btn btn-default update" href="#">Update</a>
							@php
							$customer_id = Session::get('customer_id');
							$shipping_id = Session::get('shipping_id');
							@endphp

							@if($customer_id != null && $shipping_id == null)
							<a class="btn btn-default check_out" href="{{ URL::to('/checkout') }}">Check Out</a>
							@elseif($customer_id != null && $shipping_id != null)
							<a class="btn btn-default check_out" href="{{ URL::to('/payment') }}">Check Out</a>
							@else
							<a class="btn btn-default check_out" href="{{ URL::to('/login-check') }}">Check Out</a>
							@endif
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->


@endsection