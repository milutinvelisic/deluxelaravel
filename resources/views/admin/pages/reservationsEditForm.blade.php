@extends("layouts.adminLayout")
@section("content")
    <div class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-around">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Edit Reservation</h4>
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
                            <form action="/admin/reservations/{{ $reservation->idReservedRoom }}" method="POST">
                                @method('patch')
                                @csrf
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Reservation ID</label>
                                        <input type="text" class="form-control" name="idReservedRoom" value="{{ $reservation->idReservedRoom }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Reservation Date From</label>
                                        <input type="date" class="form-control" name="dateFrom" value="{{ date('Y-m-d', $reservation->dateFrom) }}">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Reservation Date To</label>
                                        <input type="date" class="form-control" name="dateTo" value="{{ date('Y-m-d', $reservation->dateTo) }}">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Reservation User Id</label>
                                        <input type="text" class="form-control" name="idUser" value="{{ $reservation->idUser }}">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Reservation Room Id</label>
                                        <input type="text" class="form-control" name="idRoom" value="{{ $reservation->idRoom }}">
                                    </div>
                                </div>
                                <button type="submit" name="btnInsertRoom" class="btn btn-primary pull-right">Update Reservation</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
