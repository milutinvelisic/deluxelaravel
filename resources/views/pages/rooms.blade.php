@extends("layouts/template")
@section("content")
<div class="hero-wrap" style="background-image: url({{ asset("images/bg_1.jpg") }});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                <div class="text">
                    <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home</a></span> <span>About</span></p>
                    <h1 class="mb-4 bread">Rooms</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="row" id="printRooms">
                    @foreach ($avaliableRooms as $room)
                    <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                        <div class="room">
                            <a href="{{ URL('/rooms/'.$room->idRoom )}}" class="img d-flex justify-content-center align-items-center" style="background-image: url(images/{{ $room->roomPicture }});">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3 text-center">
                                <h3 class="mb-3"><a href="{{ URL('/rooms/'.$room->idRoom )}}">{{ $room->roomName }}</a></h3>
                                <p><span class="price mr-2">${{ $room->roomPrice }}.00</span> <span class="per">per night</span></p>
                                <ul class="list">
                                    <li><span>Max:</span> {{ $room->maxPeoplePerRoom }} Persons</li>
                                    <li><span>Size:</span> {{ $room->roomSize }} m2</li>
                                    <li><span>Bed:</span> {{ $room->numberOfBeds }}</li>
                                </ul>
                                <hr>
                                <p class="pt-1"><a href="{{ URL('/rooms/'.$room->idRoom )}}" class="btn-custom">Book Now <span class="icon-long-arrow-right"></span></a></p>
                            </div>
                        </div>
                    </div>
                    @endforeach



                </div>
            </div>
            <div class="col-lg-3 sidebar">
                <div class="sidebar-wrap bg-light ftco-animate">
                    <h3 class="heading mb-4">Advanced Search</h3>
                    <form action="{{ url("/filterRoom") }}" method="GET">
                        <div class="fields">
                            <div class="form-group">
                                <div class="select-wrap one-third">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="roomCategory" id="roomCategory" class="form-control">
                                        <option value="0">Choose room type</option>
                                        @foreach ($roomCategories as $r)
                                        <option value="{{ $r->idRoomType }}">{{ $r->roomTypeName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="range-slider">
                                    <span>People per room: </span><span id="peopleNumberValue">{{ $peoplePerRoom->minPeoplePerRoom }}</span>
                                        <input value="{{ $peoplePerRoom->minPeoplePerRoom }}" id="peopleNumber" min="{{ $peoplePerRoom->minPeoplePerRoom }}" max="{{ $peoplePerRoom->maxPeoplePerRoom }}" step="1" type="range"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="range-slider">
                                    <span>Room Price: </span><span id="priceRangeValue">{{ $minAndMaxRoomPrice[0]->MinRoomPrice }}</span>
                                        <input value="{{ $minAndMaxRoomPrice[0]->MinRoomPrice }}" id="priceRange" min="{{ $minAndMaxRoomPrice[0]->MinRoomPrice }}" max="{{ $minAndMaxRoomPrice[0]->MaxRoomPrice }}" step="1" type="range"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="button" name="btnFilterRoom" id="btnFilterRoom" value="Search" class="btn btn-primary py-3 px-5">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>


@component("partials.instagram")
@endcomponent

@endsection
