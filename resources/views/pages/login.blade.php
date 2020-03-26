@extends("layouts/template")
@section("content")
    <div class="hero-wrap" style="background-image: url({{ asset("images/bg_1.jpg") }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                    <div class="text">
                        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home</a></span> <span>Contact</span></p>
                        <h1 class="mb-4 bread">Contact Us</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section contact-section bg-light">
        <div class="container">
           <div id="loginFormTitle">
                <div class="row d-flex col-lg-12 text-center mb-5 contact-info" >
                    <div class="col-md-12 mb-4">
                        <h2 class="h3">Log in to our site</h2>
                    </div>
                </div>
                @if(session()->has('msg'))
                    <div class="row d-flex col-lg-12 text-center mb-5 contact-info">
                        <div class="col-md-12">
                            <h5 class="h5"> {{ session('msg') }}</h5>
                        </div>
                    </div>
                @endif
                @isset($errors)
                    <div class="row d-flex col-lg-12 text-center mb-5 contact-info">
                        <div class="col-md-12">
                            @foreach($errors->all() as $error)
                                <h5 class="h5">{{ $error }}</h5>
                            @endforeach
                        </div>
                    </div>
                @endisset
           </div>
            <div id="loginForm">
                <div class="row d-flex justify-content-around block-12" >
                    <div class="col-md-6 order-md-last d-flex">
                        <form action="{{ url("/login") }}" method="POST"  onsubmit="return checkLogin();" class="bg-white p-5 contact-form">
                            @csrf
                            <div class="form-group">
                                <label for="logUsername">Username</label>
                                <input type="text" id="logUsername" class="form-control" placeholder="Your Username" name="logUsername" />
                                <small id="logUsernameError"></small>
                            </div>
                            <div class="form-group">
                                <label for="logPassword">Password</label>
                                <input type="text" id="logPassword" class="form-control" placeholder="Your Password" name="logPassword" />
                                <small id="logPasswordError"></small>
                            </div>
                            <div class="form-group d-flex justify-content-around">
                                <input type="submit" value="Login" id="btnLogin" class="btn btn-primary py-3 px-5">
                            </div>
                            <div class="col-md-6"><a href="nesto" id="forgotpassform">Forgot Password?</a></div>
                        </form>

                    </div>
                </div>
            </div>
            <div id="formForgetPasswordTitle">
                <div class="row d-flex col-lg-12 text-center mb-5 contact-info" >
                    <div class="col-md-12 mb-4">
                        <h2 class="h3">Reset your password</h2>
                    </div>
                </div>
                @if(session()->has('msg'))
                    <div class="row d-flex col-lg-12 text-center mb-5 contact-info">
                        <div class="col-md-12">
                            <h5 class="h5"> {{ session('msg') }}</h5>
                        </div>
                    </div>
                @endif
            </div>
            <div id="formForgetPassword">
                <div class="row d-flex justify-content-around block-12"  >
                    <div class="col-md-6 order-md-last d-flex">
                        <form action="{{ url("/resetPassword") }}" method="POST" class="bg-white p-5 contact-form">
                            @csrf
                            <div class="form-group">
                                <label for="fpUsername">Username</label>
                                <input type="text" id="fpUsername" class="form-control" placeholder="Your Username" name="fpUsername" />
                                <small id="fpUsernameErrpr"></small>
                            </div>
                            <div class="form-group">
                                <label for="fpEmail">Email</label>
                                <input type="text" id="fpEmail" class="form-control" placeholder="Your Email" name="fpEmail" />
                                <small id="fpEmailError"></small>
                            </div>
                            <div class="form-group d-flex justify-content-around">
                                <input type="submit" value="Reset password" name="btnForgotPassword" id="btnForgotPassword" class="btn btn-primary py-3 px-5">
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
