@extends("layouts.adminLayout")
@section("content")
<div class="content">
    <div class="container-fluid">
      <div class="row d-flex justify-content-around">
        <div class="col-md-5">
          <div class="card">
              @if(session()->has("msg"))
                {{ session("msg") }}
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
            <div class="card-header card-header-primary">
              <h4 class="card-title">Insert Room</h4>
              <p class="card-category">Complete your room</p>
            </div>

            <div class="card-body">
              <form action="/admin/rooms" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Room Name</label>
                      <input type="text" class="form-control"  name="roomName" value="">
                    </div>
                  </div>
                  <div class="col-md-12 mb-5">
                    <div class="form-control">
                      <label class="bmd-label-floating">Room Picture</label>
                      <input type="file" class="form-control" name="roomPicture" />
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Room Price</label>
                      <input type="text" class="form-control"  name="roomPrice" >
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Max People Per Room</label>
                      <input type="text" class="form-control"  name="maxPeoplePerRoom" value="">
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Room Size</label>
                      <input type="text" class="form-control"  name="roomSize" value="">
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Number of beds</label>
                      <input type="text" class="form-control"  name="numberOfBeds" value="">
                    </div>
                  </div>
                <button type="submit" name="btnInsertRoom" class="btn btn-primary pull-right">Insert Room</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
