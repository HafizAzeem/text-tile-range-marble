@extends('layouts.public')

@section('content')
<div class="auto-form-wrapper">
              <div class="card">
              <div class="card-header">{{ __('Reset Password') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label class="label">E-Mail Address</label>
                            <div class="input-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                                    placeholder="Email" />
                          
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                    <i class="mdi mdi-check-circle-outline"></i>
                                    </span>
                                </div>
                                @error('email')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                            </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"
                          placeholder="Password">
                              @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                       
                  <div class="form-group">
                    <div class="input-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <button class="btn btn-primary submit-btn btn-block">Reset Password</button>
                  </div>
                        
                        
                    
                    </form>
                </div>
            </div>
            </div>
        
    

@endsection
