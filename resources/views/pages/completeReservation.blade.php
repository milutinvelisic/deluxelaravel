@extends("layouts/template")
@section("content")
    <div class="hero-wrap" style="background-image: url({{ asset("images/bg_1.jpg") }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                    <div class="text">
                        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ url("/home") }}">Home</a></span> <span>Complete reservation</span></p>
                        <h1 class="mb-4 bread">Complete reservation</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section contact-section bg-light">
        <div class="container">
            <div class="row d-flex col-lg-12 text-center mb-5 contact-info">
                <div class="col-md-12 mb-4">
                    <h2 class="h3">Complete reservation Form</h2>
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
                <div class="col-md-9 order-md-last d-flex">
                    <form method="POST"  class="bg-white p-5 contact-form">
                        @csrf
                        <div class="form-group">
                            <label for="crDateFrom">Date From</label>
                            <input type="text" id="crDateFrom" class="form-control" placeholder="Date From" name="crDateFrom" readonly />
                            <input type="hidden" name="crDateFromHidden" id="crDateFromHidden">
                            <small id="crDateFromError"></small>
                        </div>
                        <div class="form-group">
                            <label for="crDateTo">Date To</label>
                            <input type="text" id="crDateTo" class="form-control" placeholder="Date To" name="crDateTo" readonly />
                            <input type="hidden" name="crDateToHidden" id="crDateToHidden">
                            <small id="crDateToError"></small>
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="crRoomType" class="form-control" placeholder="Date To" name="crRoomType" readonly />
                            <input type="hidden" name="crRoomTypeHidden" id="crRoomTypeHidden">
                            <small id="crRoomTypeError"></small>
                        </div>
                        <div class="form-group">
                            <label for="crRoomType">Room type</label>
                            <input type="text" id="crRoomTypeName" class="form-control" placeholder="Room type" name="crRoomTypeName" readonly />
                            <input type="hidden" name="crRoomTypeNameHidden" id="crRoomTypeNameHidden">
                            <small id="crRoomTypeError"></small>
                        </div>
                        @if(session()->has("user"))
                            <div class="form-group">
                                <label for="crEmail">Email</label>
                                <input type="email" id="crEmail" class="form-control" value="{{ session("user")->email }}" placeholder="Your Email" name="crEmail" />
                                <small id="crEmailError"></small>
                            </div>
                        @else
                            <div class="form-group">
                                <label for="crUsername">Username</label>
                                <input type="text" id="crUsername" class="form-control" placeholder="Your Username" name="crUsername" />
                                <small id="crUsernameError"></small>
                            </div>
                            <div class="form-group">
                                <label for="crEmail">Email</label>
                                <input type="email" id="crEmail" class="form-control" placeholder="Your Email" name="crEmail" />
                                <small id="crEmailError"></small>
                            </div>
                            <div class="form-group">
                                <label for="crPassword">Password</label>
                                <input type="text" id="crPassword" class="form-control" placeholder="Your Password" name="crPassword" />
                                <small id="crPasswordError"></small>
                            </div>

                        @endif
                        @if(!session()->has('success'))
                        <div class="form-group d-flex justify-content-around hideButtons">
                            <button type="submit" formaction="{{ url("/insertReservation") }}" id="btnReserve" class="btn btn-primary py-3 px-5">Reserve!</button>
                            <button type="submit" formaction="/stripe_checkout" id="btnReserve" class="btn btn-primary py-3 px-5">Pay now with Stripe!</button>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        @if(session()->has('success'))
            <script>
                localStorage.clear();
            </script>
        @endif
    </section>

@endsection
