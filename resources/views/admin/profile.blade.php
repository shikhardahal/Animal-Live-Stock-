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
<style>
    body {
    background: rgb(99, 39, 120)
}

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
</style>
<body>
    <!-- Include your header if needed -->
    @include('admin.layout.header')

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @php
    if (session()->has('id')):
        $id = session('id');
        $profile = DB::table('users')->where('id', $id)->first();
    endif;
@endphp
    <div class="container rounded bg-white mt-5 mb-5">
        <form method="POST" action="{{ route('profile_update') }}" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <input type="file" name="img" id="imageUpload" accept="image/*" style="display: none;">
                    <label for="imageUpload">
                        <img class="rounded-circle mt-5" width="150px"
                        @if($profile->img == null)
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"
                        @else
                        src="{{ $profile->img }}"
                        @endif

                         >
                        <p>Select a photo</p>
                    </label>


                    <span class="font-weight-bold">{{ $profile->fname }}</span>
                    <span class="text-black-50">{{ $profile->email }}</span>
                    <span> </span>
                </div>
                            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $profile->fname }}"></div>
                        <div class="col-md-6"><label class="labels">Last Name</label>
                            <input type="text" class="form-control" name="last" value="{{ $profile->lname }}"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ $profile->email }}"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Mobile Number</label>
                            <input type="text" class="form-control" name="num"  value="{{ $profile->num }}"></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </div>
            </div>
        </form>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <form method="POST" action="{{ route('password.change') }}">
                        @csrf
                        <div class="d-flex justify-content-between align-items-center experience">
                            <span>Change password</span>
                        </div><br>
                        <div class="col-md-12">
                            <label class="labels">Old Password</label>
                            <input type="password" name="old_password" class="form-control" placeholder="Enter old password" value="">
                        </div><br>
                        <div class="col-md-12">
                            <label class="labels">New Password</label>
                            <input type="password" name="new_password" class="form-control" placeholder="Enter new password" value="">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm new password" value="">
                        </div>
                        <br>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
