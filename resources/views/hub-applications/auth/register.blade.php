<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Application HUB - Real Enquiries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card o-hidden my-5 border-0 shadow-lg">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image"
                                    style="background-image: url(/assets/img/Photo_by_Naomi_Hebert_on_Unsplash.jpg);">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome to Application HUB</h4>
                                        <p class="text-dark mb-4">To submit and manage your applications, please
                                            register.</p>
                                    </div>
                                    <form method="POST" action="users" class="user">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-sm-6 mb-sm-0 mb-3">
                                                <input class="form-control form-control-user" type="text"
                                                    id="exampleFirstName" placeholder="First Name" name="name"
                                                    value="{{ old('name') }}">
                                            </div>
                                            @error('name')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="col-sm-6">
                                                <input class="form-control form-control-user" type="text"
                                                    id="exampleFirstName" placeholder="Last Name" name="surname"
                                                    value="{{ old('surname') }}">
                                            </div>
                                            @error('surname')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control form-control-user" type="email"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Email Address" name="email" value="{{ old('email') }}">
                                        </div>
                                        @error('email')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div class="row mb-3">
                                            <div class="col-sm-6 mb-sm-0 mb-3">
                                                <input class="form-control form-control-user" type="password"
                                                    id="examplePasswordInput" placeholder="Password" name="password">
                                            </div>
                                            @error('password')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="col-sm-6">
                                                <input class="form-control form-control-user" type="password"
                                                    id="exampleRepeatPasswordInput" placeholder="Repeat Password"
                                                    name="password_confirmation">
                                            </div>
                                            @error('password_confirmation')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <button class="btn btn-primary d-block btn-user w-100" type="submit">Register
                                            Account</button>
                                        <hr>
                                    </form>
                                    <div class="mb-2 text-center">
                                        <a class="small" href="login">Already have an account? Login!</a>
                                    </div>
                                    <div class="mb-2 text-center">
                                        <a class="small" href="forgot-password">Forgot
                                            Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
