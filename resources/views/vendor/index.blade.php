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
                <h4>Vendor</h4>
                 <a href="{{route('vendor.create')}}" class="btn btn-success btn-fw">Add New</a>
             </div>
             <div class="table-responsive">     
              <table class="table table-striped">
                <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Balance</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Telephone</th>
                        <th style="width:110px;">Action</th>
                      </tr>
                 </thead>
                  <tbody>
                      <tr>
                          @foreach ($vendors as $key=>$vendor)

                          <td>{{($key+1)+(($vendors->currentPage()-1)*$vendors->perPage())}}</td>
                          <td>{{$vendor->name}}</td>
                          <td>{{$vendor->email}}</td>
                          <td>{{$vendor->balance}}</td>
                          <td>{{$vendor->address}}</td>
                          <td>{{$vendor->mobile}}</td>
                          <td>{{$vendor->telephone}}</td>
                          <!-- <td>{{$vendor->notes}}</td> -->
                          
                          <td class=" d-flex justify-content-center align-items-center">
                          <a href = "{{route('vendor.edit', $vendor->id)}}" class=" m-1 btn btn-icons btn-rounded btn-outline-primary">
                            <i class="mdi mdi-pencil"></i>
                          </a>
                          <form action="{{route('vendor.destroy', $vendor->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="deleteRow(this)" class=" m-1 btn btn-icons btn-rounded btn-outline-danger">
                              <i class="mdi mdi-delete"></i>
                            </button>
                            </form>
                          </td>
                    
                        </tr>
                        @endforeach
                   </tbody>
                 </table>
                </div>
                  <div class="p-4">
                    {{ $vendors->links() }}
                  </div>
               </div>        
            </div>
          </div>
        </div>
@endsection