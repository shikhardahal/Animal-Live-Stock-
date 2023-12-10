@include('admin.layout.header')
            @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


<form method="POST" action="{{ route('store_truck') }}" enctype="multipart/form-data">
    @csrf
    <h3 class="text-danger">Add Truck</h3>
    <div class="form-group">
        <label for="truckName">Truck Name</label>
        <input type="text" class="form-control" name="truck_name" id="truckName" placeholder="Truck Name" required>
    </div>
    <div class="form-group">
        <label for="manufacture">Manufacture</label>
        <input type="text" class="form-control" name="manufacture" id="manufacture" placeholder="Manufacture" required>
    </div>
    <div class="form-group">
        <label for="capacity">Capacity</label>
        <input type="text" class="form-control" name="capacity" id="capacity" placeholder="Capacity" required>
    </div>
    <div class="form-group">
        <label for="availability">Availability</label>
        <div class="form-group">
          <label for="availability">Availability</label>
          <select class="form-control" name="availability" id="availability">
            <option selected>select availablity</option>

            <option value="yes">yes</option>
            <option value="no">no</option>
          </select>
        </div>
    </div>
    <div class="form-group">
        <label for="comments">Image</label>
        <input type="file" class="form-control" name="image" id="image" placeholder="image" required>
    </div>
        <div class="form-group">
        <label for="comments">Price</label>
        <input type="text" class="form-control" name="price" id="price" placeholder="Price per Km" required>
    </div>
    <div class="form-group">
        <label for="comments">Comments</label>
        <input type="text" class="form-control" name="comments" id="comments" placeholder="Comments" required>
    </div>

    <button type="submit" class="btn btn-danger">Add Truck</button>
</form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<script>
    $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
</script>
