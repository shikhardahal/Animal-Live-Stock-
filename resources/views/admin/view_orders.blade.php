<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Record</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
</head>
<body>
    <!-- Include your header if needed -->
    @include('admin.layout.header')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <table id="userTable" class="display">
            <!-- Table headers here -->
            <thead>
                <tr>
                    <th>Animal</th>
                    <th>Truck</th>
                    <th>Username</th>
                    <th>Amount</th>
                    <th>Quantity</th>
                    <th>Send Offer</th>
                </tr>
            </thead>
            <tbody>
                @php
                $orders = DB::table('send_an_offer')->get();
                $id = Session('id');
            @endphp
            @foreach ($orders as $order)
            @php
                $pro = $order->product_id;
                $truck = $order->truck_id;
                $user = $order->user_id;

                $pro_query = DB::table('product')->where('id', $pro)->first();
                $truck_query = DB::table('truck')->where('id', $truck)->first();
                $user_query = DB::table('users')->where('id', $user)->first();
            @endphp
            <tr>
                <td>{{ $pro_query->name ?? 'N/A' }}</td>
                <td>{{ $truck_query->truck_name ?? 'N/A' }}</td>
                <td>{{ $user_query->fname ?? 'N/A' }}</td>
                <td>{{ $order->amount }}</td>
                <td>{{ $order->qty }}</td>

                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId{{ $order->id }}">
                      Send
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modelId{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                            <h5 class="modal-title">@required(true)equest Form</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <form action="{{ route('offers') }}" method="post">@csrf

                                            <div class="form-group">
                                                <label for="">Order Id</label>
                                                <input type="text"
                                                  class="form-control" name="das" id="das" disabled value="{{ $order->id }}">
                                              </div>
                                                     @php
                                                         $users = DB::table('users')->where('id' , $order->user_id)->get();
                                                     @endphp

                                            <div class="form-group">
                                                <label for="">Send To</label>
                                                <input type="text"
                                                  class="form-control" name="asd" id="asd" disabled value="{{ $users[0]->fname }}">
                                              </div>
                                                <input type="hidden" value="{{ $order->id }}" id="order" name="order" >
                                                <input type="hidden" value="{{ $users[0]->id }}" id="user" name="user" >
                                            <div class="form-group">
                                              <label for="">Cost per km</label>
                                              <input type="text"
                                                class="form-control" name="cost" id="cost" placeholder="Enter Cost per km">
                                            </div>


                                            <div class="form-group">
                                                <label for="">Duration</label>
                                                <input type="text"
                                                  class="form-control" name="duration" id="duration" placeholder="Duration">
                                              </div>


                                              <input type="submit" class="btn btn-primary" value="Send">


                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        $('#exampleModal').on('show.bs.modal', event => {
                            var button = $(event.relatedTarget);
                            var modal = $(this);
                            // Use above variables to manipulate the DOM

                        });
                    </script>
                </td>
            </tr>

            @endforeach

            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();

            // Add search functionality
            $('#searchInput').on('keyup', function() {
                $('#userTable').DataTable().search(this.value).draw();
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
