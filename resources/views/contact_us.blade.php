@extends('layout.main')

@section('title', 'Contact Us')

@section('main-container')
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
        color: #999;
        position: absolute;
        top: 10px;
        left: 0;
        pointer-events: none;
        transition: all 0.25s ease;
    }

    .styled-input input,
    .styled-input textarea {
        padding: 15px;
        border: 0;
        width: 100%;
        font-size: 16px;
        background-color: #f8f8f8;
        border-radius: 4px;
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

</style>

<div class="container" style="height: 100%;margin-bottom: 80px;
margin-top: 70px;">
@if(session('success'))
<div class="alert alert-dark">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

    <h1>Contact Us</h1>

    <div class="row">
    </div>
    <div class="row">
        <h4>We'd love to hear from you!</h4>
    </div>
    <form method="POST" action="{{ route('Contact_store') }}">
        @csrf <!-- Add this to protect against CSRF attacks -->

        <div class="row input-container">
            <div class="col-md-6 col-sm-12">
                <div class="styled-input">
                    <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="styled-input">
                    <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="styled-input">
                    <input type="number" class="form-control" name="phone_no" placeholder="Enter your phone no" required>
                </div>
            </div>

            <div class="col-md-12 col-sm-12">
                <div class="styled-input">
                    <textarea required class="form-control" name="message"  placeholder="Enter your Message" rows="6"></textarea>
                </div>
            </div>
            <div class="col-xs-12">
                <button type="submit" class="btn-lrg submit-btn">Send Message</button>
            </div>
        </div>
    </form>

</div>
@endsection
