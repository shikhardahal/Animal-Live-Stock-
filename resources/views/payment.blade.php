@extends('layout.main')

@section('title', 'Livestock')

@section('main-container')
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    /* Add your custom styles here */

    /* Center align the text and style it */
    h1 {
        font-family: 'Poppins', sans-serif, 'Arial';
        font-weight: 600;
        font-size: 36px;
        color: #333;
        margin-top: 50px;
    }

    h4 {
        font-family: 'Roboto', sans-serif, 'Arial';
        font-weight: 400;
        font-size: 20px;
        color: #666;
        margin-bottom: 30px;
    }

    /* Styled input fields */
    .styled-input {
        position: relative;
        margin: 1rem 0;
    }

    .styled-input label {
        color: #000;
        position: absolute;
        top: -30px;
        left: 0;
        pointer-events: none;
        transition: all 0.25s ease;
    }

    .styled-input input,
    .styled-input select,
    .styled-input textarea {
        padding: 15px;
        border: 2px solid #ccc; /* Initial border color */
        width: 100%;
        font-size: 16px;
        background-color: #f8f8f8;
        border-radius: 4px;
        transition: all 0.3s ease; /* Add transition for border-color changes */
    }

    /* Style the submit button */
    .submit-btn {
        padding: 10px 20px;
        border-radius: 4px;
        display: inline-block;
        background-color: #000;
        color: white;
        font-size: 18px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #fff;
        color: #000
    }

    /* Add focus styles for input fields */
    .styled-input input:focus,
    .styled-input select:focus,
    .styled-input textarea:focus {
        border-color: #000 !important;
        box-shadow: none;
    }

    /* Add styles for error messages */
    .error-message {
        color: #FF0000;
        font-size: 12px;
        margin-top: 5px;
    }

</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Add focus and blur effects for input fields
        $('.styled-input input, .styled-input select, .styled-input textarea').focus(function() {
            $(this).addClass('focus');
        });

        $('.styled-input input, .styled-input select, .styled-input textarea').blur(function() {
            $(this).removeClass('focus');
        });

        // Live validation for Card Number
        $('#card_number').keyup(function() {
            var cardNumber = $(this).val();
            var cardNumberPattern = /^\d{16}$/; // Assuming a 16-digit card number
            var errorContainer = $('#card_number_error');

            if (cardNumberPattern.test(cardNumber)) {
                errorContainer.text('');
            } else {
                errorContainer.text('Invalid card number. Please enter 16 digits.');
            }
        });

        // Live validation for Expiry Date
        $('#exp_date').keyup(function() {
            var expDate = $(this).val();
            var expDatePattern = /^(0[1-9]|1[0-2])\/\d{2}$/; // Assuming MM/YY format
            var errorContainer = $('#exp_date_error');

            if (expDatePattern.test(expDate)) {
                errorContainer.text('');
            } else {
                errorContainer.text('Invalid expiry date. Please enter in MM/YY format.');
            }
        });

        // Live validation for CVV
        $('#cvv').keyup(function() {
            var cvv = $(this).val();
            var cvvPattern = /^\d{3,4}$/; // Assuming a 3 or 4-digit CVV
            var errorContainer = $('#cvv_error');

            if (cvvPattern.test(cvv)) {
                errorContainer.text('');
            } else {
                errorContainer.text('Invalid CVV. Please enter 3 or 4 digits.');
            }
        });

        // Handle form submission
        $('.submit-btn').click(function() {
            // Get individual form field values
            var cardholderName = $('#cardholder_name').val();
            var cardNumber = $('#card_number').val();
            var cardType = $('#card_type').val();
            var expDate = $('#exp_date').val();
            var cvv = $('#cvv').val();
            var id = $('#id').val();
            var cost = $('#cost').val();


            // Create an object with the form data
            var formData = {
                cardholder_name: cardholderName,
                card_number: cardNumber,
                card_type: cardType,
                exp_date: expDate,
                cvv: cvv,
                id: id,
                cost:cost
            };

            // Check if there are any error messages
            if ($('.error-message').text() === '') {
                // No validation errors, proceed with the AJAX request
                $.ajax({
                    type: 'POST',
                    url: '{{ route('insert_payment_info_in_db') }}',
                    data: formData, // Send the object as data
                    dataType: 'json', // Expect JSON response from the server
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Check if the response contains the success message
                        if (response.msg === 'Request accepted Successfully') {
                            // Redirect to the desired page
                            window.location.href = '{{ route('view_request') }}';
                        } else {
                            // Handle other responses or errors
                            console.log(response);
                        }
                    },
                    error: function(error) {
                        // Handle any errors here (e.g., display an error message)
                        console.error(error);
                    }
                });
            }
        });
    });
</script>
@php
    $username = ''; // Initialize the variable with an empty string

    $userId = session('id');

    $user = DB::table('users')->where('id', $userId)->first();

    if ($user) {
        if (property_exists($user, 'fname')) {
            $username = $user->fname;
        } else {
            $username = 'Please Enter your Name';
        }
    } else {
        // Handle the case where the user is not found
    }
@endphp

<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="images/payment_method_horse.png" alt="Shoes" class="img-fluid w-200 w-md-300 w-lg-400" style="object-fit: cover; border-radius: 100%;">
        </div>
        <div class="col-md-6">
            <div class="row"><br>
                <h2>Payment Method</h2>
                <h4>Seamless Transactions, Secure Payments</h4><br><br>
            </div>
            <form id="payment_form">
                <div class="row input-container">
                    <div class="col-md-12">
                        <div class="styled-input">
                            <label>Cardholder Name</label>
                            <input type="text" class="form-control" name="cardholder_name" id="cardholder_name" value="{{  $username }}" required>
                             <input type="hidden" value="{{ $id }}" name="id" id="id">
                            </div>
                    </div>
                    <div class="col-md-12">
                        <div class="styled-input">
                            <label>Amount</label>
                            <input type="text" readonly value="{{ $cost }}" name="cost" id="cost">
                        </div>
                    </div>                    <div class="col-md-12">
                        <div class="styled-input">
                            <label>Card Number</label>
                            <input type="text" class="form-control" name="card_number" id="card_number" placeholder="Card Number" required>
                            <div class="error-message" id="card_number_error"></div> <!-- Display validation error here -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="styled-input">
                            <label>Card Type</label>
                            <select class="form-control" name="card_type" id="card_type" required>
                                <option value="" disabled selected>Select Card Type</option>
                                <option value="Visa">Visa</option>
                                <option value="MasterCard">MasterCard</option>
                                <option value="Amex">American Express</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="styled-input">
                            <label>Expiry Date</label>
                            <input type="text" class="form-control" id="exp_date" name="exp_date" placeholder="Expiry Date" required>
                            <div class="error-message" id="exp_date_error"></div> <!-- Display validation error here -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="styled-input">
                            <label>CVV</label>
                            <input type="text" class="form-control" name="cvv" id="cvv" placeholder="CVV" required>
                            <div class="error-message" id="cvv_error"></div> <!-- Display validation error here -->
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="styled-input">
                            <button type="button" class="btn-lrg submit-btn">Confirm Payment</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="contact my-5">
  <div class="contactrow">
    <div class="contactbtn"><a href="{{ route('contact_us') }}">CONTACT US</a></div>
  </div>
</div>

@endsection
