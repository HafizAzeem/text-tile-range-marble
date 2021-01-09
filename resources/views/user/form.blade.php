
  @extends('layouts.app')
  @section('content')
  <div class="row">

     <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
          <div class="card-title">
            <h4>User Form</h4></div>
                    
                        
                    <p class="card-description"> Personal info</p>
                    <form action="{{isset($user) ? route('user.update',$user->id)  
                        :route('user.store')}}" method="Post" class="forms-sample needs-validation" novalidate>
                            
                                @csrf

                            @if(isset($user))
                             @method('put')
                            @endif
                    
               
                   
                    
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label for="validationCustomUsername" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                              <input id="validationCustomUsername" type="text" value="{{ isset($user->name )
                              ? $user->name:''}}{{old('name')}}" name="name" class="form-control @error('name') is-invalid @enderror" />
                              @error('name')
                               <div class="invalid-feedback">
                                  {{ $message }}
                               </div>
                               @enderror
                            </div>
                          </div>
                        </div>
                        
                              
                                  
                               
                      
                    
                     
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label  for="validationCustomUsername" class="col-sm-3 col-form-label">E-Mail</label>
                            <div class="col-sm-9">
                              <input id="validationCustomUsername" type="email" value="{{ isset($user->email ) 
                                ? $user->email:''}}{{old('email')}}" name="email" class="form-control @error('email') is-invalid @enderror" />
                                @error('email')
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
                            <label  for="validationCustomUsername" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                              <input id="validationCustomUsername" type="text" value="{{ isset($user->address ) 
                                  ? $user->address:''}} {{old('address')}}" name="address" class="form-control @error('address') is-invalid @enderror"/>
                                  @error('address')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                  @enderror
                            </div>
                          </div>
                        </div>
                             
                                     
                              
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label  for="validationCustomUsername" class="col-sm-3 col-form-label">Contact</label>
                            <div class="col-sm-9">
                              <input id="validationCustomUsername" type="text" value="{{ isset($user->contact ) 
                                 ? $user->contact:''}} {{old('contact')}}" name="contact" class="form-control @error('contact') is-invalid @enderror" />
                                 @error('contact')
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
                            <label  for="validationCustomUsername" class="col-sm-3 col-form-label">password</label>
                            <div class="col-sm-9">
                              <input id="validationCustomUsername" type="password" value="{{ isset($user->password )
                                  ? $user->password:''}}" name="password" class="form-control @error('password') is-invalid @enderror" />
                                  @error('password')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                   </div>
                                  @enderror  
                            </div>
                          </div>
                        </div>
                      </div>
                     
                             
                          
                        <br>
                        <br>

                      <button type="submit" class="btn btn-success mr-2">Submit</button>
                      <a href= "{{ route('user.index') }}" type="button" class="btn btn-light"> Cancel</a>
                    </form>
                  </div>
                </div>
              </div>
          </div>
          
      @endsection