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
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-12 mb-4">
                <h2 class="h3">Contact Information</h2>
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
            <div class="w-100"></div>
            <div class="col-md-3 d-flex">
                <div class="info bg-white p-4">
                    <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="info bg-white p-4">
                    <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="info bg-white p-4">
                    <p><span>Email:</span> <a href="mailto:milutin.velisic.195.17@ict.edu.rs">milutin.velisic.195.17@ict.edu.rs</a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="info bg-white p-4">
                    <p><span>Website</span> <a href="#">yoursite.com</a></p>
                </div>
            </div>
        </div>
        <div class="row block-9">
            <div class="col-md-6 order-md-last d-flex">
                <form action="{{ url("/contactAdmin") }}" class="bg-white p-5 contact-form">
                    @csrf
                    <div class="form-group">
                        @if(session()->has('user'))
                        <input type="text" name="email" class="form-control" value="{{ session("user")->email }}">
                        @else
                        <input type="text" name="email" class="form-control" placeholder="Your Email">
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea name="msg" id="msg" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btnSendMail" value="Send Message" class="btn btn-primary py-3 px-5">
                    </div>
                </form>

            </div>

            <div class="col-md-6 d-flex">
                <div id="map" class="bg-white"></div>
            </div>
        </div>
    </div>
</section>
@endsection
