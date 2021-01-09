
  @extends('layouts.app')
  @section('content')
    <div class="row">

     <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
          <div class="card-title">
             <h4>Product Category Form</h4></div>
             <p class="card-description"> Product Category info</p>
            

          
             <form action="{{ isset($category) ? route('category.update',$category->id) : route('category.store')}}" 
               method="POST" class="forms-sample needs-validation" novalidate >
               @csrf
               @if(isset($category))
                @method('PUT')
               @endif
                   
                    
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label for="validationCustomUsername" class="col-sm-3 col-form-label">Name *</label>
                            <div class="col-sm-9">
                              <input id="validationCustomUsername" type="text" name="name" value="{{ isset($category->name ) 
                              ? $category->name:''}}{{old('name')}}" class="form-control @error('name') is-invalid @enderror" />
                              @error('name')
                              <div class="invalid-feedback">
                                 {{$message}}
                               </div>
                              @enderror 
                            </div>
                          </div>
                        </div>
                        
                       <div class="col-md-6">
                          <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                              <textarea  type="text" name="description" class="form-control ">{{ isset($category->description) ?$category->description:''}}{{old('description')}} </textarea>
                            
                            </div>
                          </div>
                        </div>
                     </div>
                    
                        <br>
                        <br>

                       <button type="submit" class="btn btn-success mr-2">Submit</button>
                       <a href= "{{ route('category.index') }}" type="button" class="btn btn-light"> Cancel</a>
              </form>
                    
            </div>
         </div>
      </div>
  </div>
 @endsection