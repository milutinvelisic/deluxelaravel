@extends("layouts/template")
@section("content")
    <div class="hero-wrap" style="background-image: url({{ asset("images/bg_1.jpg") }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                    <div class="text">
                        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ url('/') }}">Home</a></span> <span>Success</span></p>
                        <h1 class="mb-4 bread">Success</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center flex align-content-center align-items-center p-5">
        <h1 class="text-center">Your has been paid successfully! Have a nice day</h1>
    </div>
    <script>
        localStorage.clear();
    </script>
@endsection
