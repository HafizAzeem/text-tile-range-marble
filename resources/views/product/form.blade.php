
  @extends('layouts.app')
  @section('content')
    <div class="row">

     <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
          <div class="card-title">
             <h4>Product Form</h4></div>
             <!-- <p class="card-description"> Product info</p> -->
            

          
             <form action="{{ isset($product) ? route('product.update',$product->id) : route('product.store')}}" 
               method="POST" class="forms-sample needs-validation" novalidate>
               @csrf
               @if(isset($product))
                @method('PUT')
               @endif
                   
                               
                 <div class="row">
                   <div class="col-md-6">
                       @if($categories != null)
                    <div class="form-group row">
                      <label  for="validationCustomUsername" class="col-sm-3 col-form-label">SelectCategory*</label>

                    <div class="col-sm-9">
                       <select  name="product_category_id" class="form-control @error('product_category_id')   is-invalid @enderror">
                      
                          @foreach($categories as $key=>$category)
                          
                          <option value="{{$key}}",
                              {{isset($product->category_id) && $product->category_id == $key ? 'selected="selected"' : ''}}>
                              
                              {{$category}}
                          </option>
                           @endforeach
                       </select>
                           @error('product_category_id')
                            <div class="invalid-feedback">
                               {{ $message }}
                             </div>
                           @enderror

                       @endif
                      </div>
                      </div>
                    </div>
                

                    
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label for="validationCustomUsername" class="col-sm-3 col-form-label">Name *</label>
                            <div class="col-sm-9">
                              <input id="validationCustomUsername" type="text" name="name" value="{{ isset($product->name ) 
                                 ? $product->name:''}}{{old('name')}}" class="form-control @error('name') is-invalid @enderror" />
                                 @error('name')
                                  <div class="invalid-feedback">
                                   {{ $message }}
                                  </div>
                                @enderror
                            </div>
                          </div>
                        </div>
                 </div>
                     <div class="row">
                       <div class="col-md-6">
                          <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                              <textarea  name="description" class="form-control ">{{ isset($product->description) 
                                ? $product->description:''}}{{old('description')}}</textarea>
                            </div>
                          </div>
                        </div>
                     
                        </div>
                        
                        <br>
                        <br>

                       <button type="submit" class="btn btn-success mr-2">Submit</button>
                       <a href= "{{ route('product.index') }}" type="button" class="btn btn-light"> Cancel</a>
              </form>
                    
            </div>
         </div>
      </div>
  </div>
 @endsection