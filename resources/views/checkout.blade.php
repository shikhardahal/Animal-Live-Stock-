@extends('layout.main')

@section('title', 'Livestock')


@section('main-container')

<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .newcard{
        height: 260px;
    }
</style>

<div class="container my-5">
    @if(session('success'))
        <div class="alert alert-danger">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-7">
            <?php
            if (session()->has('id')) {
                $user_id = session('id');

                $data = DB::table('add_to_cart')->where('user_id', $user_id)->get();

                // Use select to specify the columns you want from the product table
                $carts = DB::table('add_to_cart')
    ->join('product', 'product.id', '=', 'add_to_cart.product_id')
    ->select('product.id as product_id', 'add_to_cart.id as cart_id', 'product.*', 'add_to_cart.*')
    ->where('add_to_cart.user_id', $user_id)
    ->get();
    $count = count($carts);


            } else {
                return redirect()->route('login');
            }
            ?>
            @foreach ($carts as $cart )


            @php
                $img = DB::table('product_images')->where('product_id' , $cart->product_id)->take(1)->first();
            @endphp
            <div class="newcard">
                <div class="newcard1">
                    <input type="hidden" value="{{ $cart->product_id }}" id="cart_id" class="cart_id">
                  <h3 class="my-1">{{ $cart->name }}</h3>
                  <p class="my-3">{{ $cart->description }} </p>
                  <div class="griid">
                    <h6 style="margin-right: 15px">Price :{{ $cart->price}}</h6>
                    <h6>Quantity : {{ $cart->qty}}</h6>
                  </div>
                </div>
                <div class="newcard2">
                  <img src="{{ $img->image }}" class="none1" />
                </div>
                <div class="cross">
                    <a href="{{ route('delete_cart_item', ['delete_cart_item' => $cart->cart_id]) }}">
                        <i class="fas fa-times"></i>
                    </a>
                </div>

              </div>
            @endforeach
            <script>
                // JavaScript code to calculate and display the total price and quantity in an alert and update the total price <div> on page reload
                window.addEventListener('load', function () {
                    var priceElements = document.querySelectorAll('.griid h6:first-child');
                    var quantityElements = document.querySelectorAll('.griid h6:last-child');
                    var totalPrice = 0;
                    var totalQuantity = 0;

                    priceElements.forEach(function (element, index) {
                        var price = parseFloat(element.textContent.replace('Price :', '').trim());
                        var quantity = parseInt(quantityElements[index].textContent.replace('Quantity :', '').trim());
                        totalPrice += price * quantity; // Multiply price by quantity
                        totalQuantity += quantity;
                    });

                    var totalAmountDiv = document.getElementById('total_amount');
                    var totalqtyDiv = document.getElementById('total_qty');

                    if (totalAmountDiv) {
                        totalAmountDiv.textContent = totalPrice.toFixed(2);
                    }
                    if (totalqtyDiv) {
                        totalqtyDiv.textContent = totalQuantity.toFixed(2);
                    }
                });
            </script>




        </div>
        <div class="col-md-5 center1" style="flex-direction: column;">
            <div class="order">
              <h3> ORDER SUMMARY </h3>
              <div class="ordermain">
                <div class="ordermain1"> Items: </div>
                <div class="ordermain2"> {{ $count }} </div>
              </div>

              <div class="ordermain">
                <div class="ordermain1"> Quantity: </div>
                <div class="ordermain2" id="total_qty"> </div>
              </div>
              <div class="ordermain">
                <div class="ordermain1"> Delivery: </div>
                <div class="ordermain2"> Pending </div>
              </div>
              <div class="ordermain">
                <div class="ordermain1 green"> Order Total: </div>
                <div class="ordermain2 border1" id="total_amount"> </div>
              </div>
            </div>
            <div class="new">
              <div class="yellowbtn">Select Truck</div>
            </div>
          </div>
    </div>

</div>
<!-- Bootstrap Modal -->
<div class="modal fade" id="myModal" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                @php
                    $trucks = DB::table('truck')->get();
                @endphp
                @foreach ($trucks as $truck)
                <div class="newcard">
                    <div class="newcard1">
                        <h4 class="my-1">{{ $truck->truck_name }}</h4>
                        <p class="my-4">{{ $truck->comments }} </p>
                        <div class="griid">
                            <h5 style="margin-right: 15px">Price Per Km : {{ $truck->price }}</h5>
                        </div>
                        <h5>Animal Capacity : {{ $truck->capacity }}</h5>
                        <input type="hidden" class="truck_id" value="{{ $truck->id }}">
                        <button class="truck_submit btn btn-secondary btn-sm">Send an Offer</button>

                    </div>
                    <div class="newcard2">
                        <img src="{{ $truck->image }}" class="none1" /><br>
                  </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Make sure to include jQuery -->

<script>
    $(document).ready(function () {
        $('.yellowbtn').click(function () {
            $('#myModal').modal('show'); // Show the modal
        });

        $('.truck_submit').click(function () {
            var cartIds = [];
            $('.cart_id').each(function () {
                cartIds.push($(this).val());
            });
            var cartIdsString = cartIds.join(', ');
            var qty = $('#total_qty').text();
            var amount = $('#total_amount').text();
            var truck_id = $(this).prev('.truck_id').val(); // Get truck_id related to the clicked button

            console.log(truck_id);

            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            var data = {
                cart_ids: cartIdsString,
                total_qty: qty,
                total_amount: amount,
                truck_id: truck_id, // Use the correct truck_id
                _token: csrfToken
            };

            $.ajax({
                type: 'POST',
                url: '{{ route('send_an_offer_from_addtocart') }}',
                data: data,
                success: function (response) {
                   window.location.href="{{ route('welcome') }}";
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>





    <div class="contact my-5">
      <div class="contactrow">
        <div class="contactbtn"><a href="{{ route('contact_us') }}">CONTACT US</a></div>
    </div>
    </div>
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
          acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
              panel.style.maxHeight = null;
            } else {
              panel.style.maxHeight = panel.scrollHeight + "px";
            }
          });
        }
        </script>
      <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"
    ></script>
    <script>
        // Get references to the buttons and count element
        const plusBtn = document.getElementById('plusBtn');
        const minusBtn = document.getElementById('minusBtn');
        const countElement = document.getElementById('count');

        // Initialize the count variable
        let count = 1;

        // Function to increment the count
        function increment() {
          count++;
          countElement.textContent = count;
        }

        // Function to decrement the count
        function decrement() {
          if (count > 0) {
            count--;
            countElement.textContent = count;
          }
        }

        // Add click event listeners to the buttons
        plusBtn.addEventListener('click', increment);
        minusBtn.addEventListener('click', decrement);
      </script>




  @endsection

