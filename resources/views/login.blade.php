<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ url('uploads') }}/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--===============================================================================================-->
    <link rel="stylesheet" href="{{ url('resources') }}/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="{{ url('resources') }}/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="{{ url('resources') }}/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="{{ url('resources') }}/css/login/util.css">
    <link rel="stylesheet" href="{{ url('resources') }}/css/login/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--===============================================================================================-->
    <style>
        label.error {
            color: red;
        }

    </style>
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ url('uploads') }}/img-01.png" alt="IMG">
                </div>

                <form action="{{ route('home.logged') }}" method="POST" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-title">
                        <img src="{{ url('uploads') }}/logo.png" alt="">
                    </span>
                    <span class="login100-form-title">
                        Member Login
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Name must be required">
                        <input class="input100" type="text" name="name" placeholder="name">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                    <div class="text-center p-t-12">
                        <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="#">
                            Username / Password?
                        </a>
                    </div>
                    <div class="text-center ">
                        <a class="txt2" href="#" data-toggle="modal" data-target="#RegisterModal">
                            Create your Account
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="RegisterModal" tabindex="-1" role="dialog" aria-labelledby="RegisterModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="{{ url('uploads/logo.png') }}" alt="">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="modal-title text-primary" id="exampleModalLabel">Register</h3>
                        </div>
                        <div class="card-body">
                            <form id="formRegister" action="{{ route('account.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">User Name</label>
                                    <input type="text" class="form-control" id="name_register" name="name"
                                        aria-describedby="emailHelp" placeholder="Name">
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        aria-describedby="email" placeholder="email">
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        aria-describedby="phone" placeholder="phone">
                                    <small id="phoneHelp" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" id="address"
                                        aria-describedby="address" placeholder="address">
                                    <small id="addressHelp" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <input type="text" class="form-control" name="role" id="role"
                                        aria-describedby="role" placeholder="role">
                                    <small id="roleHelp" class="form-text text-muted"></small>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="STATUS" id="inlineRadio1"
                                        value="1" checked>
                                    <label class="form-check-label" for="inlineRadio1">Pushlish</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="STATUS" id="inlineRadio2"
                                        value="0">
                                    <label class="form-check-label" for="inlineRadio2">Private</label>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password_register"
                                        placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <!--===============================================================================================-->
    <script src="{{ url('resources') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ url('resources') }}/vendor/bootstrap/js/popper.js"></script>
    <script src="{{ url('resources') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ url('resources') }}/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ url('resources') }}/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="{{ url('resources') }}/js/login/main.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>      
    <script>
          $('form#formRegister').validate({
                rules: {
                    name: "required",
                    password: "required",
                    phone: {
                        required: true,
                        number: true
                    },
                    address: "required"
                },
                messages: {
                    name: "Name must be required",
                    password: "Password must be required",
                    phone: "Phone must be required",
                    phone: "Phone must be number",
                    address: "Address must be required"
                }
            });
            
           
     
    </script>
   @if ( Session::get('success'))
       <script>
           toastr.success("Account has been created");
       </script>
   @endif
</body>

</html>
