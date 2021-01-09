@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
           <div class="card-body">
             <!-- for message show -->
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
                <!-- <------------------->
            <div class="card-title d-flex justify-content-between">
                        <h4>Customer</h4>
                        <a href="{{route('customer.create')}}" class="btn btn-success btn-fw">Add New</a>
             </div>
                    <!-- <p class="card-description">Add class <code></code> </p> -->
             <div class="table-responsive">            
              <table class="table table-striped ">
                <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Telephone</th>
                        <!-- <th>Notes</th> -->
                        <th style="width:110px;">Action</th>
                      </tr>
                 </thead>
                  <tbody>
                      <tr>
                          @foreach ($customers as $key=>$customer)

                          <td>{{($key+1)+(($customers->currentPage()-1)*$customers->perPage())}}</td>
                          
                          <td>{{$customer->name}}</td>
                          <td>{{$customer->email}}</td>
                          <td>{{$customer->address}}</td>
                          <td>{{$customer->mobile}}</td>
                          <td>{{$customer->telephone}}</td>
                          <!-- <td>{{$customer->notes}}</td> -->
                          
                          <td class="d-flex justify-content-center align-items-center">
                          <a href = "{{route('customer.edit', $customer->id)}}" class="btn m-1 btn-icons btn-rounded btn-outline-primary">
                            <i class="mdi mdi-pencil"></i>
                          </a>
                          <form action="{{route('customer.destroy', $customer->id)}}" method="post">
                                   @csrf
                                   @method('DELETE')
                                  <button type="button" onclick="deleteRow(this)" class="btn m-1 btn-icons  btn-rounded btn-outline-danger">
                                    <i class="mdi mdi-delete"></i>
                                  </button>
                          </form>
                          </td>                            
                        </tr>
                        @endforeach
                   </tbody>
                 </table>
               </div>
                 {{ $customers->links() }}
               </div>
                        
            </div>
          </div>

        </div>
@endsection