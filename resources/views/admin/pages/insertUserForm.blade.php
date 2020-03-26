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
              <h4 class="card-title">Insert User</h4>
              <p class="card-category">Complete your profile</p>
            </div>

            <div class="card-body">
              <form action="/admin/users" method="POST">
                    @csrf
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Username</label>
                      <input type="text" class="form-control"  name="username" value="">
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Password</label>
                      <input type="text" class="form-control" name="password" value="">
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Email address</label>
                      <input type="email" class="form-control" name="email" value="">
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Role</label>
                      <select name="userRole" id="userRole" class="form-control">
                          @foreach ($userRoles as $ur)
                            <option value="{{ $ur->idRole }}">{{ $ur->roleName }}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>
                <button type="submit" name="btnInsertUser" class="btn btn-primary pull-right">Insert User</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
