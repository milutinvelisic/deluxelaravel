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
            <div class="row d-flex col-lg-12 text-center mb-5 contact-info">
                <div class="col-md-12 mb-4">
                    <h2 class="h3">Register to our site</h2>
                </div>
            </div>
            @if(session()->has('msg'))
                <div class="row d-flex col-lg-12 text-center mb-5 contact-info">
                    <div class="col-md-12">
                        <h5 class="h5"> {{ session('msg') }}</h5>
                    </div>
                </div>
            @endif
            <div class="row d-flex justify-content-around block-12">
                <div class="col-md-6 order-md-last d-flex">
                    <form action="{{ url("/register") }}" method="POST" onsubmit="return checkRegister();" class="bg-white p-5 contact-form">
                        @csrf
                        <div class="form-group">
                            <label for="regUsername">Username</label>
                            <input type="text" id="regUsername" class="form-control" placeholder="Your Username" name="regUsername" />
                            <small id="regUsernameError"></small>
                        </div>
                        <div class="form-group">
                            <label for="regEmail">Email</label>
                            <input type="email" id="regEmail" class="form-control" placeholder="Your Email" name="regEmail" />
                            <small id="regEmailError"></small>
                        </div>
                        <div class="form-group">
                            <label for="regPassword">Password</label>
                            <input type="text" id="regPassword" class="form-control" placeholder="Your Password" name="regPassword" />
                            <small id="regPasswordError"></small>
                        </div>
                        <div class="form-group d-flex justify-content-around">
                            <input type="submit" value="Register" id="btnReg" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
