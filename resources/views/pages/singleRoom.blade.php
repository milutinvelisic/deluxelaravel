@extends("layouts/template")
@section("content")
    <div class="hero-wrap" style="background-image: url({{ asset("images/bg_1.jpg") }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                    <div class="text">
                        <p class="breadcrumbs mb-2" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="rooms.html">Room</a></span> <span>Room Single</span></p>
                        <h1 class="mb-4 bread">Room Single</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-12 ftco-animate">
                            <h2 class="mb-4">{{ $room->roomName }}</h2>
                            <div class="single-slider owl-carousel">
                                <div class="item">
                                    <div class="room-img" style="background-image: url({{ asset("images/".$room->roomPicture) }});"></div>
                                </div>
                                <div class="item">
                                    <div class="room-img" style="background-image: url({{ asset("images/".$room->roomPicture) }});"></div>
                                </div>
                                <div class="item">
                                    <div class="room-img" style="background-image: url({{ asset("images/".$room->roomPicture) }});"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 room-single mt-4 mb-5 ftco-animate">
                            <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
                            <div class="d-md-flex mt-5 mb-5">
                                <ul class="list">
                                    <li><span>Max:</span> {{ $room->maxPeoplePerRoom }} Persons</li>
                                    <li><span>Size:</span> {{ $room->roomSize }} m2</li>
                                </ul>
                                <ul class="list ml-md-5">
                                    <li><span>Bed:</span> {{ $room->numberOfBeds }}</li>
                                </ul>
                            </div>
                        </div>



                    </div>
                </div> <!-- .col-md-8 -->

            </div>
        </div>
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
                            <input type="hidden" class="form-control" name="roomId" id="roomId" value="{{ $room->idRoom }}"/>
                            <input type="hidden" class="form-control" name="roomName" id="roomName" value="{{ $room->roomName }}"/>
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
    </section> <!-- .section -->
@endsection
