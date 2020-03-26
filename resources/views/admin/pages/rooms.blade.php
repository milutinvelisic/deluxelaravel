@extends("layouts.adminLayout")
@section("content")
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Simple Table</h4>
              <p class="card-category"> Here is a subtitle for this table</p>
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
                     @foreach ($allRooms as $u)
                     <tr>
                        <td>{{ $u->idRoom }}</td>
                        <td>{{ $u->roomName }}</td>
                        <td>{{ $u->roomPicture }}</td>
                        <td>{{ $u->idRoomType }}</td>
                        <td>${{ $u->roomPrice }}</td>
                        <td>{{ $u->maxPeoplePerRoom }}</td>
                        <td>{{ $u->roomSize }}</td>
                        <td>{{ $u->numberOfBeds }}</td>
                        <td>{{ $u->idRoomStatus }}</td>
                        <td><a href="{{ url("/admin/rooms/$u->idRoom/edit") }}" class="btn btn-warning">Edit</a></td>
                        <td><a href="{{ url("/admin/rooms/$u->idRoom") }}" class="btn btn-danger deleteRoom">Delete</a></td>
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
