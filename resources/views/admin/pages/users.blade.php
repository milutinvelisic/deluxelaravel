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
                  <tbody id="showUsers">
                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                     @foreach ($allUsers as $u)
                     <tr>

                        <td>{{ $u->idUser }}</td>
                        <td>{{ $u->username }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->password }}</td>
                        <td>{{ $u->originalPassword }}</td>
                        <td>{{ $u->active }}</td>
                        <td>{{ $u->idRole }}</td>
                        <td><a href="{{ url("/admin/users/$u->idUser/edit") }}" class="btn btn-warning">Edit</a></td>
                        <td><a href="{{ url("/admin/users/$u->idUser") }}" class="btn btn-danger deleteRoom">Delete</a></td>
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
