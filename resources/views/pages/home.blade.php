@extends("layouts/template")
@section("content")
@component("partials.slider")
@endcomponent
<section class="ftco-booking">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="#" id="checkRoomForm" class="booking-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 d-flex">
                            <div class="form-group p-4 align-self-stretch d-flex align-items-end">
                                <div class="wrap">
                                    <label for="#">Check-in Date</label>
                                    <input type="text" id="dateFrom" class="form-control checkin_date" placeholder="Check-in date">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex">
                            <div class="form-group p-4 align-self-stretch d-flex align-items-end">
                                <div class="wrap">
                                    <label for="#">Check-out Date</label>
                                    <input type="text" id="dateTo" class="form-control checkout_date" placeholder="Check-out date">
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex">
                            <div class="form-group p-4 align-self-stretch d-flex align-items-end">
                                <div class="wrap">
                                    <label for="#">Room</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="roomType" id="roomType" class="form-control">
                                            @foreach ($categories ?? [] as $cat)
                                                <option value="{{ $cat->idRoom }}">{{ $cat->roomName }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex">
                            <div class="form-group d-flex align-self-stretch">
                                <input type="button" id="btnCheckRoom" value="Check Availability"
                                       class="btn btn-primary py-3 px-4 align-self-stretch">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-12" id="showModal">
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Room Reservation</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body" id="modalBody">

                        </div>
                        <div class="modal-footer" id="modalButtons">

                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section ftc-no-pb ftc-no-pt">
    <div class="container">
        <div class="row">
            <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center"
                 style="background-image: url(images/bg_2.jpg);">
                <a href="https://vimeo.com/45830194"
                   class="icon popup-vimeo d-flex justify-content-center align-items-center">
                    <span class="icon-play"></span>
                </a>
            </div>
            <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
                <div class="heading-section heading-section-wo-line pt-md-5 pl-md-5 mb-5">
                    <div class="ml-md-0">
                        <span class="subheading">Welcome to Deluxe Hotel</span>
                        <h2 class="mb-4">Welcome To Our Hotel</h2>
                    </div>
                </div>
                <div class="pb-md-5">
                    <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it
                        would have been rewritten a thousand times and everything that was left from its origin would be
                        the word "and" and the Little Blind Text should turn around and return to its own, safe country.
                        But nothing the copy said could convince her and so it didn’t take long until a few insidious
                        Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their
                        agency, where they abused her for their.</p>
                    <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline
                        of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own
                        road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.
                    </p>
                    <ul class="ftco-social d-flex">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services py-4 d-block text-center">
                    <div class="d-flex justify-content-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="flaticon-reception-bell"></span>
                        </div>
                    </div>
                    <div class="media-body p-2 mt-2">
                        <h3 class="heading mb-3">25/7 Front Desk</h3>
                        <p>A small river named Duden flows by their place and supplies.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services py-4 d-block text-center">
                    <div class="d-flex justify-content-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="flaticon-serving-dish"></span>
                        </div>
                    </div>
                    <div class="media-body p-2 mt-2">
                        <h3 class="heading mb-3">Restaurant Bar</h3>
                        <p>A small river named Duden flows by their place and supplies.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-sel Searchf-stretch ftco-animate">
                <div class="media block-6 services py-4 d-block text-center">
                    <div class="d-flex justify-content-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="flaticon-car"></span>
                        </div>
                    </div>
                    <div class="media-body p-2 mt-2">
                        <h3 class="heading mb-3">Transfer Services</h3>
                        <p>A small river named Duden flows by their place and supplies.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services py-4 d-block text-center">
                    <div class="d-flex justify-content-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="flaticon-spa"></span>
                        </div>
                    </div>
                    <div class="media-body p-2 mt-2">
                        <h3 class="heading mb-3">Spa Suites</h3>
                        <p>A small river named Duden flows by their place and supplies.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2 class="mb-4">Our Rooms</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                <div class="room">
                    <a href="rooms.html" class="img d-flex justify-content-center align-items-center"
                       style="background-image: url(images/room-1.jpg);">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3 text-center">
                        <h3 class="mb-3"><a href="rooms.html">Suite Room</a></h3>
                        <p><span class="price mr-2">$120.00</span> <span class="per">per night</span></p>
                        <hr>
                        <p class="pt-1"><a href="room-single.html" class="btn-custom">View Room Details <span
                                    class="icon-long-arrow-right"></span></a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                <div class="room">
                    <a href="rooms.html" class="img d-flex justify-content-center align-items-center"
                       style="background-image: url(images/room-2.jpg);">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3 text-center">
                        <h3 class="mb-3"><a href="rooms.html">Family Room</a></h3>
                        <p><span class="price mr-2">$20.00</span> <span class="per">per night</span></p>
                        <hr>
                        <p class="pt-1"><a href="room-single.html" class="btn-custom">View Room Details <span
                                    class="icon-long-arrow-right"></span></a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                <div class="room">
                    <a href="rooms.html" class="img d-flex justify-content-center align-items-center"
                       style="background-image: url(images/room-3.jpg);">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3 text-center">
                        <h3 class="mb-3"><a href="rooms.html">Deluxe Room</a></h3>
                        <p><span class="price mr-2">$150.00</span> <span class="per">per night</span></p>
                        <hr>
                        <p class="pt-1"><a href="room-single.html" class="btn-custom">View Room Details <span
                                    class="icon-long-arrow-right"></span></a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                <div class="room">
                    <a href="rooms.html" class="img d-flex justify-content-center align-items-center"
                       style="background-image: url(images/room-4.jpg);">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3 text-center">
                        <h3 class="mb-3"><a href="rooms.html">Classic Room</a></h3>
                        <p><span class="price mr-2">$130.00</span> <span class="per">per night</span></p>
                        <hr>
                        <p class="pt-1"><a href="room-single.html" class="btn-custom">View Room Details <span
                                    class="icon-long-arrow-right"></span></a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                <div class="room">
                    <a href="rooms.html" class="img d-flex justify-content-center align-items-center"
                       style="background-image: url(images/room-5.jpg);">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3 text-center">
                        <h3 class="mb-3"><a href="rooms.html">Superior Room</a></h3>
                        <p><span class="price mr-2">$300.00</span> <span class="per">per night</span></p>
                        <hr>
                        <p class="pt-1"><a href="room-single.html" class="btn-custom">View Room Details <span
                                    class="icon-long-arrow-right"></span></a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                <div class="room">
                    <a href="rooms.html" class="img d-flex justify-content-center align-items-center"
                       style="background-image: url(images/room-6.jpg);">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-search2"></span>
                        </div>
                    </a>
                    <div class="text p-3 text-center">
                        <h3 class="mb-3"><a href="rooms.html">Luxury Room</a></h3>
                        <p><span class="price mr-2">$500.00</span> <span class="per">per night</span></p>
                        <hr>
                        <p class="pt-1"><a href="room-single.html" class="btn-custom">View Room Details <span
                                    class="icon-long-arrow-right"></span></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_1.jpg);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="50000">0</strong>
                                <span>Happy Guests</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="3000">0</strong>
                                <span>Rooms</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="1000">0</strong>
                                <span>Staffs</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                            <div class="text">
                                <strong class="number" data-number="100">0</strong>
                                <span>Destination</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section testimony-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ftco-animate">
                <div class="row ftco-animate">
                    <div class="col-md-12">
                        <div class="carousel-testimony owl-carousel ftco-owl">
                            <div class="item">
                                <div class="testimony-wrap py-4 pb-5">
                                    <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
										<span class="quote d-flex align-items-center justify-content-center">
											<i class="icon-quote-left"></i>
										</span>
                                    </div>
                                    <div class="text text-center">
                                        <p class="mb-4">A small river named Duden flows by their place and supplies it
                                            with the necessary regelialia. It is a paradisematic country, in which
                                            roasted parts of sentences fly into your mouth.</p>
                                        <p class="name">Nathan Smith</p>
                                        <span class="position">Guests</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-wrap py-4 pb-5">
                                    <div class="user-img mb-4" style="background-image: url(images/person_2.jpg)">
										<span class="quote d-flex align-items-center justify-content-center">
											<i class="icon-quote-left"></i>
										</span>
                                    </div>
                                    <div class="text text-center">
                                        <p class="mb-4">A small river named Duden flows by their place and supplies it
                                            with the necessary regelialia. It is a paradisematic country, in which
                                            roasted parts of sentences fly into your mouth.</p>
                                        <p class="name">Nathan Smith</p>
                                        <span class="position">Guests</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-wrap py-4 pb-5">
                                    <div class="user-img mb-4" style="background-image: url(images/person_3.jpg)">
										<span class="quote d-flex align-items-center justify-content-center">
											<i class="icon-quote-left"></i>
										</span>
                                    </div>
                                    <div class="text text-center">
                                        <p class="mb-4">A small river named Duden flows by their place and supplies it
                                            with the necessary regelialia. It is a paradisematic country, in which
                                            roasted parts of sentences fly into your mouth.</p>
                                        <p class="name">Nathan Smith</p>
                                        <span class="position">Guests</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-wrap py-4 pb-5">
                                    <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
										<span class="quote d-flex align-items-center justify-content-center">
											<i class="icon-quote-left"></i>
										</span>
                                    </div>
                                    <div class="text text-center">
                                        <p class="mb-4">A small river named Duden flows by their place and supplies it
                                            with the necessary regelialia. It is a paradisematic country, in which
                                            roasted parts of sentences fly into your mouth.</p>
                                        <p class="name">Nathan Smith</p>
                                        <span class="position">Guests</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-wrap py-4 pb-5">
                                    <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
										<span class="quote d-flex align-items-center justify-content-center">
											<i class="icon-quote-left"></i>
										</span>
                                    </div>
                                    <div class="text text-center">
                                        <p class="mb-4">A small river named Duden flows by their place and supplies it
                                            with the necessary regelialia. It is a paradisematic country, in which
                                            roasted parts of sentences fly into your mouth.</p>
                                        <p class="name">Nathan Smith</p>
                                        <span class="position">Guests</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2>Recent Blog</h2>
            </div>
        </div>
        <div class="row d-flex">
            <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
                    </a>
                    <div class="text mt-3 d-block">
                        <h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the
                                blind texts</a></h3>
                        <div class="meta mb-3">
                            <div><a href="#">Dec 6, 2018</a></div>
                            <div><a href="#">Admin</a></div>
                            <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
                    </a>
                    <div class="text mt-3">
                        <h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the
                                blind texts</a></h3>
                        <div class="meta mb-3">
                            <div><a href="#">Dec 6, 2018</a></div>
                            <div><a href="#">Admin</a></div>
                            <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
                    </a>
                    <div class="text mt-3">
                        <h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the
                                blind texts</a></h3>
                        <div class="meta mb-3">
                            <div><a href="#">Dec 6, 2018</a></div>
                            <div><a href="#">Admin</a></div>
                            <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="blog-single.html" class="block-20" style="background-image: url('images/image_4.jpg');">
                    </a>
                    <div class="text mt-3">
                        <h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the
                                blind texts</a></h3>
                        <div class="meta mb-3">
                            <div><a href="#">Dec 6, 2018</a></div>
                            <div><a href="#">Admin</a></div>
                            <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@component("partials.instagram")
@endcomponent
@endsection
