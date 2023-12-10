@extends('layout.main')

@section('title', 'Livestock')

<style>
    a {
    text-decoration: none;
    color: #000
}
</style>
@section('main-container')
<div class="container">
    <div class="livehead my-5">
       <div class="livehead1">
        Transport LiveStock
       </div>
       <div  class="livehead2">
        <img src="./Assets/shop.png"/>
       </div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <button class="accordion">SHIPING ADDRESS</button>
            <div class="panel">

            </div>

            <button class="accordion">PAYMENT METHOD</button>
            <div class="panel">
                <div class="input">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Credit Card</option>
                        <option value="1">Credit Card</option>
                        <option value="2">Debit Card</option>
                        <option value="3">Visa Card</option>
                      </select>
                </div>
                <div class="input1 my-5">
                  <h5>    CARDHOLDER'S NAME</h5>
                  <input type="text" placeholder="Type cardholder’s name"/>
                </div>
                <div class="input1 my-5">
                    <h5>    CARD NUMBER</h5>
                    <input type="number" placeholder="Type card number"/>
                  </div>
                  <div class="row">
                    <div class="col BLD">
EXPIRATION DATE
                    </div>
                    <div class="col">

                    </div>
                    <div class="col BLD">
CCV CODE
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                        <div class="input">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>29</option>
                                <option value="1">28</option>
                                <option value="2">27</option>
                                <option value="3">26</option>
                              </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>29</option>
                                <option value="1">28</option>
                                <option value="2">27</option>
                                <option value="3">26</option>
                              </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>133</option>
                                <option value="1">134</option>
                                <option value="2">135</option>
                                <option value="3">136</option>
                              </select>
                        </div>
                    </div>
                  </div>
           </div>

            <button class="accordion">TRUCKS</button>
            <div class="panel">
                <div class="slit">
                    <div class="slit1">
                <img src="./Assets/truckk.png"/>
                <p>2x2</p>
                    </div>
                    <div class="slit2">
                        <img src="./Assets/truckk.png"/>
                        <p>2x2</p>
                    </div>
                </div>             </div>


                <div class="newcard">
                    <div class="newcard1">
                         <h3 class="my-1">ARABIC HORSE</h3>
                         <p class="my-3">Lorem Ipsum is a font website</p>
                         <div class="griid">
                            <h3>5000$</h3><div class="qauntity">
                                <div class="qauntity1">
                                    <button id="minusBtn" class="btncount"><i class="fas fa-minus"></i>
                                </div>
                                <div class="qauntity2">
                                    <p id="count">1</p>


                                </div>
                                <div class="qauntity3">

                                        <button id="plusBtn" class="btncount">  <i class="fas fa-plus"></i></button>
                                    </button>
                                </div>


                                </div>

                         </div>

                    </div>
                    <div class="newcard2">
     <img src="./Assets/horse1.png" class="newcard1img"/>
                    </div>
                </div>
        </div>
        <div class="col-md-5 center" style="flex-direction: column;">
<div class="order">
<h3>
    ORDER SUMMARY
</h3>
<div class="ordermain">
    <div class="ordermain1">
        Items:
    </div>
    <div class="ordermain2">
        $ 1034
    </div>
</div>
<div class="ordermain">
    <div class="ordermain1">
        Delivery:
    </div>
    <div class="ordermain2">
        $ 100
    </div>
</div>
<div class="ordermain">
    <div class="ordermain1">
        Discount:
    </div>
    <div class="ordermain2">
        ---
    </div>
</div>
<div class="ordermain">
    <div class="ordermain1">
        Promotion Applied:
    </div>
    <div class="ordermain2">
        ---
    </div>
</div>
<div class="ordermain">
    <div class="ordermain1 green">
        Order Total:
    </div>
    <div class="ordermain2 border1">
        $ 1231
    </div>
</div>
</div>
<div class="new">
     <div class="yellowbtn">
        Use this Payment Method
     </div>
</div>
        </div>
    </div>

</div>





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


