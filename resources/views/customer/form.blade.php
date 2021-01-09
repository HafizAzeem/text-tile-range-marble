
  @extends('layouts.app')
  @section('content')
    <div class="row">

     <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
          <div class="card-title">
             <h4>Customer Form</h4></div>
             <!-- <p class="card-description"> Personal info</p> -->
            

          
             <form action="{{ isset($customer) ? route('customer.update',$customer->id) : route('customer.store')}}" 
               method="POST" class="forms-sample needs-validation" novalidate>
               @csrf
               @if(isset($customer))
                @method('PUT')
               @endif
                   
                    
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label for="validationCustomUsername" class="col-sm-3 col-form-label">Name *</label>
                            <div class="col-sm-9">
                              <input id="validationCustomUsername" type="text" name="name" value="{{ isset($customer->name ) 
                                   ? $customer->name:''}}{{old('name')}}" class="form-control @error('name') is-invalid @enderror"  />
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
                            <label for="validationCustomUsername" class="col-sm-3 col-form-label">E-Mail *</label>
                            <div class="col-sm-9">
                              <input id="validationCustomUsername" type="email" name="email" value="{{ isset($customer->email)
                                  ?$customer->email:''}}{{old('email')}}" class="form-control @error('email') is-invalid @enderror" />
                                 @error('email') 
                                 <div class="invalid-feedback">
                                     {{$message}}
                                 </div>
                                 @enderror
                            </div>
                          </div>
                        </div>
                     </div>
                    <div class="row">
                        
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label for="validationCustomUsername" class="col-sm-3 col-form-label">Address *</label>
                            <div class="col-sm-9">
                              <input id="validationCustomUsername" type="text" name="address" value="{{isset($customer->address)
                                ?$customer->address :'' }}{{old('address')}}"class="form-control  @error('address') is-invalid @enderror" />
                                @error('address') 
                               <div class="invalid-feedback">
                                  {{$message}}
                                </div>
                                @enderror
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">Telephone</label>
                            <div class="col-sm-9">
                              <input type="text" name="telephone" value="{{ isset($customer->telephone)
                               ? $customer->telephone:''}}{{old('telephone')}}" class="form-control " />
                            </div>
                          </div>
                        </div>
                       
                       </div>
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label for="validationCustomUsername" class="col-sm-3 col-form-label">Mobile *</label>
                            <div class="col-sm-9">
                              <input id="validationCustomUsername" type="text" name="mobile" value="{{ isset($customer->mobile)
                                 ? $customer->mobile:''}}{{old('mobile')}}"class="form-control  @error('mobile') is-invalid @enderror"/>
                                 @error('mobile') 
                                 <div class="invalid-feedback">
                                  {{$message}}
                                 </div>
                                @enderror
                            </div>
                          </div>
                        </div>
                       
                    
                       
                    </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label for="validationCustomUsername" class="col-sm-3 col-form-label">Notes</label>
                            <div class="col-sm-9">
                              <textarea id="validationCustomUsername" name="notes" class="form-control" value="" >{{ isset($customer->notes) 
                              ? $customer->notes:''}}{{old('notes')}}</textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                        <br>
                        <br>

                       <button type="submit" class="btn btn-success mr-2">Submit</button>
                       <a href= "{{ route('customer.index') }}" type="button" class="btn btn-light"> Cancel</a>
              </form>
                    
            </div>
         </div>
      </div>
  </div>
 @endsection