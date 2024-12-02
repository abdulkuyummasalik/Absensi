@extends('layouts.app', ['activePage' => 'user-management'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Users</h4>
              <p class="card-category"> Here you can manage users</p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-12 text-right">
                  <a href="#" class="btn btn-sm btn-primary">Add user</a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <tr>
                      <th> Name </th>
                      <th> Email </th>
                      <th> Username </th>
                      <th> Role </th>
                      <th> Creation date </th>
                      <th> Updated date </th>
                      <th colspan="2" class="text-center"> Actions </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                      <tr>
                        <td class="text-capitalize"> 
                          @foreach ($user->admin as $detail)
                              {{ $detail->nama }}
                          @endforeach  
                          @foreach ($user->student as $detail)
                              {{ $detail->nama }}
                          @endforeach  
                        </td>
                        <td> {{ $user->email }} </td>
                        <td> {{ $user->username }} </td>
                        <td class="text-capitalize"> {{ $user->role }} </td>
                        <td> {{ $user->created_at }} </td>
                        <td> {{ $user->updated_at }} </td>
                        <td class="td-actions text-left">
                          <a rel="tooltip" title="Edit" class="btn btn-success btn-link" href="#" data-original-title="" title="">
                            <i class="material-icons">edit</i>
                            <div class="ripple-container"></div>
                          </a>
                        </td>
                        <td class="td-actions text-right">
                          <a rel="tooltip" title="Delete" class="btn btn-success btn-link" href="#" data-original-title="" title="">
                            <i class="material-icons">delete</i>
                            <div class="ripple-container"></div>
                          </a>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $users->links() !!}
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection