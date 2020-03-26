@extends("layouts.adminLayout")
@section("content")
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">face</i>
                        </div>
                        <p class="card-category">Active Users</p>
                        <h3 class="card-title">{{ $countActive->countActive }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">face</i>
                        </div>
                        <p class="card-category">All Users</p>
                        <h3 class="card-title">{{ $countAllUsers->countAllUsers }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">face</i>
                        </div>
                        <p class="card-category">Active Admins</p>
                        <h3 class="card-title">{{ $countAdmins->countAdmin }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">face</i>
                        </div>
                        <p class="card-category">All Admins</p>
                        <h3 class="card-title">{{ $countAllAdmins->countAllAdmins }}</h3>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
