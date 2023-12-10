@extends('layout.main')

@section('title', 'Livestock')
@section('main-container')
<div class="container my-5">
    <div class="row">
        <div class="col">
            <div class="row">
                @php
                $solo_img = DB::table('product_images')->where('product_id' , $detail->id)->take(1)->first();

              @endphp
                <img id="main-image" src="{{ $solo_img->image }}" class="mainimg" alt="Main Image">
            </div>
            <div class="row">
                @php
                    $images = DB::table('product_images')->where('product_id', $detail->id)->get();
                @endphp
                @foreach ($images as $img )
                <div class="col hover">
                    <img class="thumbnail change" src="{{ asset($img->image) }}" alt="Thumbnail" onclick="changeImage('{{ asset($img->image) }}')">
                </div>
                @endforeach
            </div>

        </div>
        <div class="col">
<h2 class="my-5">{{ $detail->name }}</h2>

<h2 class="my-5">{{ $detail->price }}</h2>
<div class="row">
    <div class="col">
<p>Weight</p>
<h3>{{ $detail->weight }}</h3>
    </div>
    <div class="col">
        <p>Height</p>
        <h3>{{ $detail->height }} </h3>
    </div>
    <div class="col">
        <p>Color</p>
        <h3>{{ $detail->color }}</h3>
    </div>


</div>
<div class="qauntity">
<div class="qauntity1">
    <button id="minusBtn" class="btncount"><i class="fas fa-minus"></i>
</div>
<div class="qauntity2" id="qauntity2">
    <p id="count">1</p>


</div>
<div class="qauntity3">

        <button id="plusBtn" class="btncount">  <i class="fas fa-plus"></i></button>
    </button>
</div>


</div>

<div class="twobtn">
    <div class="buybtn d-none" id="send_offer">
    Send An Offer
    </div>
    <div class="addto">
        Add To Cart
    </div>
  <input type="hidden" value="{{ $detail->id }}" name="pro_id" id="pro_id">
    </div>
    </div>
    </div>
</div>
<div class="accordion w-100 container my-5" id="basicAccordion" >
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
          data-mdb-target="#basicAccordionCollapseOne" aria-expanded="false" aria-controls="collapseOne">
          Discription
        </button>
      </h2>
      <div id="basicAccordionCollapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
        data-mdb-parent="#basicAccordion" style="">
        <div class="accordion-body">
            {{ $detail->description }}

        </div>
      </div>
    </div>
    {{-- <div class="accordion-item">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
          data-mdb-target="#basicAccordionCollapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Reviews
        </button>
      </h2>
      <div id="basicAccordionCollapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
        data-mdb-parent="#basicAccordion" style="">
        <div class="accordion-body">
          <strong>This is the second item's accordion body.</strong> It is hidden by default,
          until the collapse plugin adds the appropriate classes that we use to style each
          element. These classes control the overall appearance, as well as the showing and
          hiding via CSS transitions. You can modify any of this with custom CSS or overriding
          our default variables. It's also worth noting that just about any HTML can go within
          the <code>.accordion-body</code>, though the transition does limit overflow.
        </div>
      </div>
    </div> --}}

  </div>


 <div class="container  my-5">
    <h2>Similar Animals</h2>
<div class="row similarsec  my-3">
    @php
    $sim = DB::table('product')->where('name' , $detail->name)->take(3)->get();
    @endphp
    @foreach ($sim as $sim )
    @php
            $img = DB::table('product_images')->where('product_id' , $sim->id)->take(1)->get();

    @endphp
    <div class="col-md-4">
        <div class="similar">
          <div class="row">
              <img src="{{  $img[0]->image }}"/>

          </div>
          <div class='text1'>
              <h4>{{  $sim->name }}</h4>
              <h4>{{ $sim->price }}</h4>
              <p>
              </p>
          </div>
        </div>
  </div>
    @endforeach

</div>

 </div>



    <div class="contact my-5">
      <div class="contactrow">
        <div class="contactbtn"><a href="{{ route('contact_us') }}">CONTACT US</a></div>
    </div>
    </div>

    <script>
        function changeImage(newImageSrc) {
          const mainImage = document.getElementById('main-image');
          mainImage.src = newImageSrc;
        }
      </script>
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
      <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"
    ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.addto').click(function() {
                var id = $('#pro_id').val();
                var count = $('#qauntity2').text();

                var data = {
                    id: id,
                    count: count,
                    _token: '{{ csrf_token() }}' // Include the CSRF token
                };
                $.ajax({
                    type: 'POST',
                    url: '{{ route('add_to_cart') }}',
                    data: data,
                    dataType: 'json',
                    success: function(response) {

                        if (response === 'login') {
                            alert('Please log in first.');
                        } else {
                            window.location.href="http://127.0.0.1:8000/addtocart";
                        }                    },
                    error: function(xhr, status, error) {
                       alert("something wrong");
                    }
                });
            });
        });
    </script>

<script>
    $(document).ready(function() {
        $('#send_offer').click(function() {
            var id = $('#pro_id').val();
            var count = $('#qauntity2').text();

            var data = {
                id: id,
                count: count,
                _token: '{{ csrf_token() }}' // Include the CSRF token
            };
            $.ajax({
                url: '{{ route('send_an_offer') }}',

                type: 'POST',
                data: data,
                dataType: 'json',
                success: function(response) {

                    if (response === 'login') {
                        alert('Please log in first.');
                    } else {
                        console.log('success');+
                    }                    },
                error: function(xhr, status, error) {
                    console.log('Error');
                }
            });
        });
    });
</script>


    @endsection


