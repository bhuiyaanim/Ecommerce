@extends('layouts.app')
@section('content')
@include('layouts.menubar')



<style type="text/css">
/**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
 .StripeElement {
  box-sizing: border-box;

  height: 40px;
  width: 100%;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
</style>

<div class="contact_form pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 "  style="border-right: 1px solid grey; padding: 20px;">
                <div class="cart_container">
                    <div class="contact_form_title text-center">
                        <h3>Cart Products</h3>
                    </div>
                    
                    <div class="cart_items pb-5 mt-4 pl-2">
                        <div class="cart_items">
                            <ul class="cart_list">
                                @foreach ($cart as $cart)
                                    <li class="cart_item clearfix pr-2">
                                        
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between ml-4">
                                            <div class="cart_item_text">
                                                <img src="{{ asset($cart->options->image) }}" style="height: 80px; width:70px;">
                                            </div>
                                            <div class="cart_item_name cart_info_col pr-3">
                                                <div class="cart_item_title">Name</div>
                                                <div class="cart_item_text mt-4">{{ $cart->name }}</div>
                                            </div>
    
                                            @if ($cart->options->color == NULL)
                                            @else
                                                <div class="cart_item_color cart_info_col pr-3">
                                                    <div class="cart_item_title">Color</div>
                                                    <div class="cart_item_text mt-4">
                                                        {{ $cart->options->color }}
                                                    </div>
                                                </div>
                                            @endif
    
                                            @if ($cart->options->size == NULL)    
                                            @else
                                                <div class="cart_item_color cart_info_col pr-3">
                                                    <div class="cart_item_title">Size</div>
                                                    <div class="cart_item_text mt-4">
                                                        {{ $cart->options->size }}
                                                    </div>
                                                </div>
                                            @endif
                                            
                                            
                                            <div class="cart_item_quantity cart_info_col pr-3">
                                                <div class="cart_item_title">Quantity</div>
                                                <div class="cart_item_text mt-4">{{ $cart->qty }}</div>
                                            </div>
                                            <div class="cart_item_price cart_info_col pr-3">
                                                <div class="cart_item_title">Price(Tk)</div>
                                                <div class="cart_item_text mt-4">{{ $cart->price }}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col pr-3">
                                                <div class="cart_item_title">Total(Tk)</div>
                                                <div class="cart_item_text mt-4">{{ $cart->price * $cart->qty }}</div>
                                            </div>
                                            
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    
                    <hr>

                    <div class="cart_items mt-5">
                        <ul>
                            @if(Session::has('coupon'))
                                <li class="list-group-item">Subtotal : 
                                    <span style="float: right;">
                                        Tk {{ Session::get('coupon')['balance'] }}
                                    </span>
                                </li>
                                <li class="list-group-item">Coupon : ({{ Session::get('coupon')['name'] }}) 
                                    <span style="float: right;">
                                        {{ Session::get('coupon')['discount_pr'] }} %
                                    </span>
                                </li>
                                <li class="list-group-item">Discount Amount :
                                    <span style="float: right;">
                                        - Tk {{ Session::get('coupon')['discount_am'] }}
                                    </span>
                                </li>
                            @else
                                <li class="list-group-item">Subtotal : 
                                    <span style="float: right;">
                                        Tk {{ Cart::Subtotal() }}
                                    </span>
                                </li>
                            @endif
            
                            <li class="list-group-item">Shipping Charge: 
                                <span style="float: right;">
                                    Tk {{ $charge }}
                                </span>
                            </li>
                            <li class="list-group-item">Vat : 
                                <span style="float: right;">
                                    0
                                </span>
                            </li>
                            @if(Session::has('coupon'))
                                <li class="list-group-item">Total: 
                                    <span style="float: right;"> 
                                        Tk {{ Session::get('coupon')['balance'] + $charge }}
                                    </span>
                                </li>
                            @else
                                <li class="list-group-item">Total: 
                                    <span style="float: right;">
                                        Tk {{ \Cart::Subtotal(2,'.','') + $charge }}
                                    </span>
                                </li>
                            @endif
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-lg-5 " style=" padding: 20px;">
                <div class="contact_form_container">
                    <div class="contact_form_title text-center">
                        <h3>Pay Now</h3>
                    </div>
                    
                    <form action="{{ route('stripe.charge') }}" method="post" id="payment-form" style="border: 1px solid grey; padding: 20px;">
                        @csrf
                        <div class="form-row">
                          <label for="card-element">
                            Credit or debit card
                          </label>
                          <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                          </div>
                      
                          <!-- Used to display form errors. -->
                          <div id="card-errors" role="alert"></div>

                          <!-- Extra Data -->
                          <input type="hidden" name="shipping" value="{{ $charge }}">
                          <input type="hidden" name="vat" value="0">
                          @if(Session::has('coupon'))
                            <input type="hidden" name="total" value="{{ Session::get('coupon')['balance'] + $charge }}">
                          @else
                            <input type="hidden" name="total" value="{{ Cart::Subtotal(2,'.','') + $charge }}">
                          @endif

                          <!-- Shipping Details -->
                          <input type="hidden" name="ship_name" value="{{ $data['name'] }}">
                          <input type="hidden" name="ship_email" value="{{ $data['email'] }}">
                          <input type="hidden" name="ship_phone" value="{{ $data['phone'] }}">
                          <input type="hidden" name="ship_address" value="{{ $data['address'] }}">
                          <input type="hidden" name="ship_city" value="{{ $data['city'] }}">
                          <input type="hidden" name="payment_type" value="{{ $data['payment'] }}">

                        </div>
                        <div class="mt-3">
                            <button class="btn btn-info">Pay Now</button>
                        </div>
                    </form>
{{-- {{ Cart::content() }} --}}
                </div>
            </div>
        </div>
    </div>
    <div class="panel"></div>
</div>

<script type="text/javascript">
// Create a Stripe client.
var stripe = Stripe('pk_test_S7psLfX3CWXXZqRZtN3LC2h700clQPcZMy');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>

@endsection