@extends('layout.main')

@section('title', 'Livestock')


@section('main-container')


<div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <div>
          <h2 class="my-5">TRACK ORDER</h2>
          <img src="./Assets/horse1.png" class="hh" />
          <h2 class="my-3">ARABIC HORSE</h2>
          <p>Lorem Ipsum is a font website</p>
          <h4 class="my-5">5000$</h4>
          <div class="row my-5" style="max-width: 400px">
            <div class="col">
              <h4>QUANTITY</h4>
              <p>01</p>
            </div>
            <div class="col">
              <h4>TRUCK</h4>
              <p>Bull Truck</p>
            </div>
          </div>
        </div>
      </div>
      <div
        class="col-md-6 col-sm-12 center1 my-5"
        style="flex-direction: column"
      >
        <div class="order">
          <h3>ORDER SUMMARY</h3>
          <div class="ordermain">
            <div class="ordermain1">Items:</div>
            <div class="ordermain2">$ 1034</div>
          </div>
          <div class="ordermain">
            <div class="ordermain1">Delivery:</div>
            <div class="ordermain2">$ 100</div>
          </div>
          <div class="ordermain">
            <div class="ordermain1">Discount:</div>
            <div class="ordermain2">---</div>
          </div>
          <div class="ordermain">
            <div class="ordermain1">Promotion Applied:</div>
            <div class="ordermain2">---</div>
          </div>
          <div class="ordermain">
            <div class="ordermain1 green">Order Total:</div>
            <div class="ordermain2 border1">$ 1231</div>
          </div>
        </div>

        <div class="dl">
          <h3>#127777489-DL-NY</h3>
          <div class="greygrid my-3">
            <div class="greygrid1">
              <div class="greybtn">In Transit</div>
            </div>
            <div class="greygrid2">
              <div class="greybtn">Documents</div>
            </div>
          </div>
          <div class="dot my-3">
            <div class="dot1">
              <img src="./Assets/dot.png" />
            </div>
            <div class="dot2">
              <h5>Package has left Courier Facility</h5>
              <p>Detroit, Denmark</p>
            </div>
          </div>
        </div>
        <div class="dl">
          <h3>#127777489-DL-NY</h3>
          <div class="greygrid my-3">
            <div class="greygrid1">
              <div class="greybtn">In Transit</div>
            </div>
            <div class="greygrid2">
              <div class="greybtn">Documents</div>
            </div>
          </div>
          <div class="dot my-3">
            <div class="dot1">
              <img src="./Assets/dot.png" />
            </div>
            <div class="dot2">
              <h5>Package has left Courier Facility</h5>
              <p>Detroit, Denmark</p>
            </div>
          </div>
        </div>
        <div class="dl">
          <h3>#127777489-DL-NY</h3>
          <div class="greygrid my-3">
            <div class="greygrid1">
              <div class="greybtn">In Transit</div>
            </div>
            <div class="greygrid2">
              <div class="greybtn">Documents</div>
            </div>
          </div>
          <div class="dot my-3">
            <div class="dot1">
              <img src="./Assets/dot.png" />
            </div>
            <div class="dot2">
              <h5>Package has left Courier Facility</h5>
              <p>Detroit, Denmark</p>
            </div>
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
  @endsection

