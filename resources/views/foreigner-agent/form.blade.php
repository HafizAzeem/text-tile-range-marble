
  @extends('layouts.app')
  @section('content')
    <div class="row">

     <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
          <div class="card-title">
             <h4>Foreigner Agent Form</h4></div>
             <p class="card-description">Foreigner Agent</p>
             <form action="{{ isset($foreigner_agents) ? route('foreigner-agent.update',$foreigner_agents->id) :route('foreigner-agent.store')}}  " 
               method="POST" class="forms-sample needs-validation" novalidate>
                @csrf
                @if(isset($foreigner_agents))
                  @method('PUT') 
                @endif
                               
                 <div class="row">
                 <div class="col-md-6">
                   <div class="form-group row">
                         <label for="validationCustomUsername" class="col-sm-3 col-form-label">Name *</label>
                         <div class="col-sm-9">
                            <input id="validationCustomUsername" type="text" name="name" value="{{ isset($foreigner_agents->name )
                             ? $foreigner_agents->name:''}}{{old('name')}}" class="form-control @error('name') is-invalid @enderror" />
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
                            <label for="validationCustomUsername" class="col-sm-3 col-form-label">Email *</label>
                            <div class="col-sm-9">
                              <input id="validationCustomUsername" type="text" name="email" value="{{ isset($foreigner_agents->email ) 
                              ? $foreigner_agents->email:''}}{{old('email')}}" class="form-control @error('email') is-invalid @enderror" />
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
                            <label for="validationCustomUsername" class="col-sm-3 col-form-label">Mobile *</label>
                            <div class="col-sm-9">
                              <input id="validationCustomUsername" value="{{ isset($foreigner_agents->mobile ) 
                              ? $foreigner_agents->mobile:''}}{{old('phone')}}" name="phone" class="form-control @error('phone') is-invalid @enderror"></input>
                              @error('phone')
                              <div class="invalid-feedback">
                                 {{ $message }}.
                              </div>
                              @enderror
                            </div>
                          </div>
                        </div>
                             
                                
                             
                   
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label for="validationCustom01" class="col-sm-3 col-form-label">Commission *</label>
                            <div class="col-sm-9">
                              <input id="validationCustom01" type="text" name="commission" value="{{ isset($foreigner_agents->commission ) 
                              ? $foreigner_agents->commission:''}} {{old('commission')}}" class="form-control @error('commission') is-invalid @enderror"/>
                              @error('commission')
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
                       <a href= "{{route('foreigner-agent.index')}}" type="button" class="btn btn-light"> Cancel</a>
              </form>
                    
            </div>
         </div>
      </div>
  </div>
 @endsection