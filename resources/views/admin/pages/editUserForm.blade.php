@extends("layouts.adminLayout")
@section("content")
<div class="content">
    <div class="container-fluid">
      <div class="row d-flex justify-content-around">
        <div class="col-md-5">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Edit Profile</h4>
              <p class="card-category">Complete your profile</p>
            </div>
            @isset($errors)
                <div class="row d-flex col-lg-12 text-center mb-5 contact-info">
                    <div class="col-md-12">
                        @foreach($errors->all() as $error)
                            <h5 class="h5">{{ $error }}</h5>
                        @endforeach
                    </div>
                </div>
            @endisset
            <div class="card-body">
              <form action="/admin/users/{{ $user->idUser }}" method="POST">
                    @method('patch')
                    @csrf
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">idUser</label>
                      <span>{{ $user->idUser }}</span>
                      <input type="hidden" name="idUser" value="{{ $user->idUser }}">
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Username</label>
                      <input type="text" class="form-control"  name="username" value="{{ $user->username }}">
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Password</label>
                      <input type="text" class="form-control" name="password" value="{{ $user->originalPassword }}">
                    </div>
                  </div>


                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Email address</label>
                      <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                  </div>

                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Active</label>
                      <span>{{ $user->active }}</span>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Role</label>
                      <input type="number" min="1" max="2" name="idRole" class="form-control" value="{{ $user->idRole }}">
                    </div>
                  </div>

                <button type="submit" name="btnUpdateUser" class="btn btn-primary pull-right">Update Profile</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
