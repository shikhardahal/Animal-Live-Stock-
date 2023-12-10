@include('admin.layout.header')
            @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


            <form method="POST" action="{{ route('register_user') }}">
                @csrf
                <h3 class="text-danger">Add Users</h3>
                <div class="form-group">
                    <label for="inputAddress">First Name</label>
                    <input type="text" class="form-control" name="first_name" placeholder="User Name" required>
                  </div>
                  <div class="form-group">
                    <label for="inputAddress2">Last Name</label>
                    <input type="text" class="form-control" name="last_name" placeholder="Last name" required>
                  </div>
                <div class="form-group">
                  <label for="inputAddress">Email</label>
                  <input type="text" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Number</label>
                    <input type="text" class="form-control" name="phone_number" placeholder="number" required>
                  </div>
                  <div class="form-group">
                    <label for="user type">User Type</label>
                    <select class="form-control" name="user_type" id="user_type">
                      <option value="user">User</option>
                      <option value="driver">Driver</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="inputAddress2">Password</label>
                  <input type="text" class="form-control" name="password" placeholder="password" required>
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Confirm Password</label>
                    <input type="text" class="form-control" name="confirm_password" placeholder="Confirm Password" required>
                  </div>
                 <input type="hidden" name="accept" value="on">


                <button type="submit" class="btn btn-danger">Add User</button>
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
