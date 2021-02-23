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
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Payment method</li>
			</ol>
		</div>
		<div class="paymentCont col-sm-8">
					<div class="headingWrap">
							<h3 class="headingTop text-center">Select Your Payment Method</h3>	
							<p class="text-center">Created with bootsrap button and using radio button</p>
					</div>
					<!-- <div class="paymentWrap">
						<div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
				            <label class="btn paymentMethod active">
				            	<div class="method visa"></div>
				                <input type="radio" name="options" checked> 
				            </label>
				            <label class="btn paymentMethod">
				            	<div class="method master-card"></div>
				                <input type="radio" name="options"> 
				            </label>
				            <label class="btn paymentMethod">
			            		<div class="method amex"></div>
				                <input type="radio" name="options">
				            </label>
				       <label class="btn paymentMethod">
			             		<div class="method vishwa"></div>
				                <input type="radio" name="options"> 
				            </label>
				            <label class="btn paymentMethod">
			            		<div class="method ez-cash"></div>
				                <input type="radio" name="options"> 
				            </label> 
				         
				        </div>        
					</div> -->

                    <form action="{{ url('/order-place') }}" method="post">
                        @csrf
                        <input type="radio" name="payment_method" value="Hand Cash"> Hand Cash<br>
                        <input type="radio" name="payment_method" value="Card"> Debit Card <br>
                        <input type="radio" name="payment_method" value="Bkash"> Bkash <br>
                        <br>
                        <div class="footerNavWrap clearfix">
                            <input type="submit" value="Complate Order" class="btn btn-success pull-left btn-fyi">
					    </div>
                    
                    </form>
					<!-- <div class="footerNavWrap clearfix">
						<div class="btn btn-success pull-left btn-fyi"><span class="glyphicon glyphicon-chevron-left"></span> Done</div>
					</div> -->
				</div>
	</div>
</section><!--/#do_action-->

@endsection