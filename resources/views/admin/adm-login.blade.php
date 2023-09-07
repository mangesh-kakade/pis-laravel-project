<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PIS - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <style>
        body {
            background: #4e73df;
            font-family: sans-serif;

        }

        .btn-login {
            font-size: 0.9rem;
            letter-spacing: 0.07rem;
            padding: 0.75rem 1rem;
            margin: 1rem;
        }
    </style>

</head>

<body>
    <div class="container">
        <marquee direction='left' onmouseover='this.stop()' onmouseout='this.start()'
            style="width: 100%; color: white;  "><img src="{{ asset('admin_assets/img/new.gif') }}"
                style="width:44px; height:35px; " />
            <strong> Full Court Reference :: Recruitment- Law Clerk, Clerk ::
                Verification/Registration-Advocates/Law Firms :: eSCR,Judgements and Orders :: A4 Size Paper ::
                CIS</strong>
        </marquee>
        <div class="row">
            <div class="heading text-center">
                <img src="{{ asset('admin_assets/img/bh.png') }}" width="60" class="logo"><br><br>
                <span class="text-light">HC PERSONAL INFORMATION SYSTEM</span><br>
                <img src="{{ asset('admin_assets/img/logo.jpg') }}" class="logo mt-0" width="50" alt="Logo">
            </div>

            <div class="col-sm-12 col-md-8 col-lg-6 mx-auto mt-3">
                <div class="card border-0 shadow rounded-3 my-0">
                    <div class="card-header bg-primary text-uppercase text-center fw-bold text-light p-3" style="font-size:15px; letter-spacing: 0.07rem; ">
                        LOGIN HERE
                      </div>
                    <div class="card-body p-sm-5">
                        {{-- {{ Config::get('constant.site_name')}} --}}
                        {{-- <h5 class="card-title text-center mb-4 fw-light fs-5">Sign In</h5> --}}
                        <form method="post" action="{{ route('admin.auth') }}">
                            @csrf
                            <div class="row" id="email_area">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="input-group col-12 mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="email_addon">Mobile No <span class="text-danger">*</span> </span>
                                    </div>
                                    <input type="text" id="username" class="form-control email bg-white" name="email"
                                    placeholder="Enter Your Mobile">
                                </div>
                            </div>

                            <div class="row" id="email_area">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="input-group col-12 mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="email_addon">Password  <span class="text-danger">*</span></span>
                                    </div>
                                    <input type="password" class="form-control" name="password" id="floatingPassword"
                                    placeholder="Enter Your Password">
                                </div>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value=""
                                    id="rememberPasswordCheck">
                                <label class="form-check-label" for="rememberPasswordCheck">
                                    Remember password
                                </label>
                                <a href="#" style="text-decoration: none; float: right;"> Forgot Password?</a>
                            </div>
                            @if (session()->has('error'))
                                    <span class="text-danger">{{ session('error') }}</span>
                                </div>
                            @endif
                            <div class="d-grid">
                                <button class="btn btn-primary btn-login text-uppercase fw-bold" style="padding: 0.6rem 1rem;margin: 1rem;" type="submit">Sign
                                    in</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
