@include('admin.layout.header')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<h1>Dashboard</h1>

<style>
    body {
        font-size: 18px;
        font-weight: 400;
    }

    .p-y-2 {
        padding-top: 28px;
        padding-bottom: 28px;
    }

    .p-y-3 {
        padding-top: 45px;
        padding-bottom: 45px;
    }

    .m-b-1 {
        margin-bottom: 18px;
    }


    .main_counter_area {
        background-size: cover;
        overflow: hidden;
    }

    .main_counter_area .main_counter_content .single_counter {
        background: #000000;
        color: #fff;
    }

    .main_counter_area .main_counter_content .single_counter i {
        font-size: 36px;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>

<section id="counter" class="counter">
    <div class="main_counter_area">
        <div class="overlay p-y-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="main_counter_content text-center white-text wow fadeInUp">
                            <div class="single_counter p-y-2 m-t-1">
                                <i class="fas fa-horse m-b-1"></i>
                                @php
                                    $animal = DB::table('product')->count();
                                    $car = DB::table('truck')->count();

                                @endphp
                                <h2 class="statistic-counter">{{  $animal }}</h2>
                                <p>Checked</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="main_counter_content text-center white-text wow fadeInUp">
                            <div class="single_counter p-y-2 m-t-1">
                                <i class="fas fa-car m-b-1"></i>
                                <h2 class="statistic-counter">{{  $car }}</h2>
                                <p>Checked</p>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-3">
                        <div class="main_counter_content text-center white-text wow fadeInUp">
                            <div class="single_counter p-y-2 m-t-1">
                                <i class="fa fa-coffee m-b-1"></i>
                                <h2 class="statistic-counter">500</h2>
                                <p>Coffee</p>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="col-md-3">
                        <div class="main_counter_content text-center white-text wow fadeInUp">
                            <div class="single_counter p-y-2 m-t-1">
                                <i class="fa fa-beer m-b-1"></i>
                                <h2 class="statistic-counter">400</h2>
                                <p>Pizzas</p>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        $('.statistic-counter').counterUp({
            delay: 10,
            time: 2000
        });

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
