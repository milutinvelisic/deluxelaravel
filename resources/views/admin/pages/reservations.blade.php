@extends("layouts.adminLayout")
@section("content")
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Reservations Table</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    @foreach ($columnNames as $c)
                                        <th>{{ $c->Field }}</th>
                                    @endforeach
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    </thead>
                                    <tbody id="showRooms">
                                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                                    @foreach ($allReservations as $u)
                                        <tr>
                                            <td>{{ $u->idReservedRoom }}</td>
                                            <td>{{ date('d-m-Y', $u->dateFrom) }}</td>
                                            <td>{{ date('d-m-Y', $u->dateTo) }}</td>
                                            <td>{{ $u->roomName }}</td>
                                            <td><a title="Go to user" href="{{ url("/admin/users/$u->idUser/edit") }}">{{ $u->idUser }}</a></td>
                                            <td>{{ $u->paid === 1 ? 'paid' : 'not paid' }}</td>
                                            <td><a href="{{ url("/admin/reservations/$u->idReservedRoom/edit") }}" class="btn btn-warning">Edit</a></td>
                                            <td><a href="{{ url("/admin/reservations/$u->idReservedRoom") }}" class="btn btn-danger deleteReservation">Delete</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <thead class=" text-primary">
                                    @foreach ($columnNames as $c)
                                        <th>{{ $c->Field }}</th>
                                    @endforeach
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
