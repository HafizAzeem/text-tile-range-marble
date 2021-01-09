@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
           <div class="card-body">
            <!-- //for message print -->
            @if (session('update'))
              <div class="alert alert-success alert-dismissable custom-success-box" style="margin: 15px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong> {{ session('update') }} </strong>
              </div>
            @endif
            @if (session('delete'))
              <div class="alert alert-success alert-dismissable custom-success-box" style="margin: 15px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong> {{ session('delete') }} </strong>
              </div>
            @endif
            @if (session('user'))
              <div class="alert alert-success alert-dismissable custom-success-box" style="margin: 15px;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong> {{ session('user') }} </strong>
              </div>
            @endif
            <!-- <---------------------------> 
            <div class="card-title d-flex justify-content-between">
                        <h4>User</h4>
                        <a href="{{route('user.create')}}" class="btn btn-success btn-fw">Add New</a>
             </div>
                    <!-- <p class="card-description">Add class <code></code> </p> -->
            <div class="table-responsive">        
              <table class="table table-striped">
                <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th style="width:110px;">Action</th>
                      </tr>
                 </thead>
                  <tbody>
                      <tr>
                          @foreach ($users as $key=>$user)

                          <td>{{($key+1)+(($users->currentPage()-1)*$users->perPage())}}</td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->contact}}</td>
                          
                          <td>{{$user->address}}</td>
                          
                          <td class=" d-flex justify-content-center align-items-center">
                          <a href = "{{route('user.edit', $user->id)}}" class="m-1 btn btn-icons btn-rounded btn-outline-primary">
                          
                            <i class="mdi mdi-pencil"></i>
                          </a>
                          
                            <form action="{{route('user.destroy', $user->id)}}" method="post">
                            
                            @csrf
                              @method('DELETE')
                            <button onclick="deleteRow(this)" type="button" class="m-1 btn btn-icons btn-rounded btn-outline-danger">
                              <i class="mdi mdi-delete"></i>
                            </button>

                            </form>
                          </td>
                          
                          
                          
                          
                        </tr>
                        @endforeach
                   </tbody>
                 </table>
                </div>
                 {{ $users->links() }}
               </div>
                        
            </div>
          </div>

        </div>
@endsection