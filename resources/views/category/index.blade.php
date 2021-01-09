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
               <h4>Product Category</h4>
               <a href="{{route('category.create')}}" class="btn btn-success btn-fw">Add New</a>
            </div>
              <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th style="width:110px;">Action</th>
                        </tr>
                    </thead>
                         <tbody>
                             <tr>
                             @foreach ($categories as $key=>$category)

                                 <td>{{($key+1)+(($categories->currentPage()-1)*$categories->perPage())}}</td>
                                 <td>{{$category->name}}</td>
                                 <td>{{$category->description}}</td>
                                 <td class=" d-flex justify-content-center align-items-center">
                                    <a href = "{{route('category.edit', $category->id)}}" class="btn m-1 btn-icons btn-rounded btn-outline-primary">
                                      <i class="mdi mdi-pencil"></i>
                                    </a>
                                    <form action="{{route('category.destroy', $category->id)}}" method="post">
                                       @csrf
                                       @method('DELETE')
                                      <button type="button" onclick="deleteRow(this)" class="m-1 btn btn-icons btn-rounded btn-outline-danger">
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
                {{ $categories->render() }}
                </div>
            </div>
                        
        </div>
    </div>

 </div>
@endsection