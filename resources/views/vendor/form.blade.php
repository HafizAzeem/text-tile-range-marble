
  @extends('layouts.app')
  @section('content')
  <div class="row">

     <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
          <div class="card-title">
             <h4>Vendor Form</h4></div>
             <!-- <p class="card-description"> Personal info</p> -->
          
             <form action="{{ isset($vendor) ? route('vendor.update',$vendor->id) 
                 : route('vendor.store2')}}" method="POST" class="forms-sample needs-validation " novalidate>
                    @csrf
                    @if(isset($vendor))
                    @method('PUT') 
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label for="validationCustomUsername" class="col-sm-3 col-form-label">Name *</label>
                            <div class="col-sm-9">
                              <input id="validationCustomUsername" type="text" name="name" value="{{ isset($vendor->name )
                                  ? $vendor->name:''}}{{old('name')}}" class="form-control @error('name') is-invalid @enderror" />
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
                              <input id="validationCustomUsername" type="email" name="email" value="{{ isset($vendor->email) 
                                 ?$vendor->email:''}}{{old('email')}}" class="form-control @error('email') is-invalid @enderror" />
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
                            <label for="validationCustomUsername" class="col-sm-3 col-form-label">Balance *</label>
                            <div class="col-sm-9">
                              <input id="validationCustomUsername" type="text" name="balance" value="{{ isset($vendor->balance) 
                              ? $vendor->balance:''}}{{old('balance')}}" class="form-control @error('balance') is-invalid @enderror "/>
                                 @error('balance')
                                  <div class="invalid-feedback">
                                    {{$message}}
                                  </div>
                                  @enderror
                            </div>
                          </div>
                         </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label for="validationCustomUsername" class="col-sm-3 col-form-label">Address *</label>
                            <div class="col-sm-9">
                              <input id="validationCustomUsername" type="text" name="address" value="{{isset($vendor->address) 
                               ? $vendor->address:'' }}{{old('address')}}"class="form-control @error('address') is-invalid @enderror" />
                                 @error('address')
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
                            <label for="validationCustomUsername" class="col-sm-3 col-form-label">Mobile *</label>
                            <div class="col-sm-9">
                              <input id="validationCustomUsername" type="text" name="mobile" value="{{ isset($vendor->mobile)
                                 ? $vendor->mobile:''}}{{old('mobile')}}"class="form-control @error('mobile') is-invalid @enderror"/>
                                 @error('mobile')
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
                              <input  type="text" name="telephone" value="{{ isset($vendor->telephone)
                               ? $vendor->telephone:''}}{{old('telephone')}}" class="form-control " />
                            </div>
                          </div>
                        </div>
                       
                    </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">Notes</label>
                            <div class="col-sm-9">
                              <textarea  name="notes" class="form-control ">{{ isset($vendor->notes) 
                              ? $vendor->notes:''}}{{old('notes')}}</textarea>
                               
                            </div>
                          </div>
                        </div>
                      </div>
                        <br>
                        <br>

                      <button type="submit" class="btn btn-success mr-2">Submit</button>
                      <a href= "{{ route('vendor.index') }}" type="button" class="btn btn-light"> Cancel</a>
                    </form>
                    
                  </div>
                </div>
              </div>
          </div>
          
      @endsection