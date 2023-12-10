@include('admin.layout.header')
            @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container">
    <form action="{{ route('store_product') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required placeholder="Product Name">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Product Description">
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Product Price">
        </div>

        <div class="form-group">
            <label for="weight">Weight</label>
            <input type="text" class="form-control" id="weight" name="weight" placeholder="Product Weight">
        </div>

        <div class="form-group">
            <label for="height">Height</label>
            <input type="text" class="form-control" id="height" name="height" placeholder="Product Height">
        </div>

        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" class="form-control" id="color" name="color" placeholder="Product Color">
        </div>

        <div class="form-group">
            <label for="qty">Quantity</label>
            <input type="text" class="form-control" id="qty" name="qty" placeholder="Product Quantity">
        </div>
        <div class="form-group">
            <label for="images">Images</label>
            <input type="file" class="form-control" id="images" name="images[]" multiple>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <div class="form-group">
              <label for="status">status</label>
              <select class="form-control" name="status" id="status">
                <option value="in stock">in stock</option>
                <option value="out of stock">out of stock</option>
              </select>
            </div>
        </div>

        <button type="submit" class="btn btn-danger">Add Product</button>
    </form>

</div>


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
