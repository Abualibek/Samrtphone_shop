@extends('layouts.app')

@section('content')</br>
<script src="https://js.stripe.com/v3/"></script>
<!--SubTotal - Tax - Total -->
<div class="cart-total">
  <h4>Total Amount</h4>
  <table>
    <tbody>
      <tr>
        <td>Sub Total</td>
        <td>EUR {{Cart::subtotal() }}</td>
      </tr>
      <tr>
        <td>Tax (%)</td>
        <td>EUR </td>
      </tr>
      <tr>
        <td>Total</td>
        <td>EUR {{Cart::total()}}</td>
      </tr>
    </tbody>
  </table>
</div>

<div class="container">
@foreach(Cart::content() as $item)
<div class="cart-row">
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 text-center"><img src="images/thumb1.jpg" class="img-responsive pull-left" /><span class="pull-left top20"><strong>{{$item->name}}</strong></span></div>
    <div class="col-xs-12 col-sm-3 col-md-3">
      <div class="cart-qty"> <span>Qty : </span>
        <input type="text" class="qty-fill" value="{{$item->qty}}">
      </div>
      <div class="cart-remove">Update</div>
      <a href="{{url('cart/remove')}}/{{$item->rowId}}" class="cart-remove">Remove</a>
    </div>
    <div class="col-xs-12 col-sm-3 col-md-3">
      <h6>Unit Price</h6>
      <p>{{$item->price}}</p>
      <hr />
      <h6 class="redtext">Total: EUR {{$item->price * $item->qty}}</h6>
    </div>
  </div>
</div></br>
@endforeach
</div>

<div class="container">
@if (session()->has('success_message'))
            <div class="spacer"></div>
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="spacer"></div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif
  <form action="{{route('checkout.store')}}" method="POST" id="payment-form">
    {{csrf_field()}}
    <div class="form-group">
      <label for="email">Email Address</label>
      <input type="email" class="form-control" id="email" name="email" value="" required>
    </div>
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="" required>
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" class="form-control" id="address" name="address" value="" required>
    </div>
    <div class="half-form">
      <div class="form-group">
        <label for="city">City</label>
        <input type="text" class="form-control" id="city" name="city" value="" required>
      </div>
      <div class="form-group">
        <label for="province">Province</label>
        <input type="text" class="form-control" id="province" name="province" value=""> required
      </div>
    </div> <!-- end half-form -->

    <div class="half-form">
      <div class="form-group">
        <label for="postalcode">Postal Code</label>
        <input type="text" class="form-control" id="postalcode" name="postalcode" value="" required>
      </div>
      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="" required>
      </div>
    </div> <!-- end half-form -->

    <div class="spacer"></div>

    <h2>Payment Details</h2>

    <div class="form-group">
      <label for="name_on_card">Name on Card</label>
      <input type="text" class="form-control" id="name_on_card" name="name_on_card" value="">
    </div>

    <div class="form-group">
      <label for="card-element">
        Credit or debit card
      </label>
      <div id="card-element">
        <!-- A Stripe Element will be inserted here. -->
      </div>

      <!-- Used to display form errors. -->
      <div id="card-errors" role="alert"></div>
    </div>
    <button id="complete-order">Submit Payment</button>
  </form>
</div>

<script >
  (function() {
    // Create a Stripe client.
    var stripe = Stripe('pk_test_51IAnMlKaxVB3fzZhZWuUHwNfEFIFmxt5iHp9z22DJnd7g8KFGKBdTM6qm5jsGCP1DueGRhpCKyOjciMXnuymBJoZ00nIxmP81v');

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
      base: {
        color: '#32325d',
        fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
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
    var card = elements.create('card', {
      style: style,
      hidePostalCode: true
    });

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element.
    card.on('change', function(event) {
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

      //Disable submit button to avoid double charge
      document.getElementById('complete-order').disabled = true;

      var options = {
        name: document.getElementById('name_on_card').value,
        address_line1: document.getElementById('address').value,
        address_city: document.getElementById('city').value,
        address_state: document.getElementById('province').value,
        address_zip: document.getElementById('postalcode').value
      }

      stripe.createToken(card, options).then(function(result) {
        if (result.error) {
          // Inform the user if there was an error.
          var errorElement = document.getElementById('card-errors');
          errorElement.textContent = result.error.message;

          //Enable the Submit Payment
          document.getElementById('complete-order').disabled = false;
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
  })();
</script>


@endsection