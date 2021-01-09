@extends('layouts.public')

@section('content')

        <div class="auto-form-wrapper">
              
              <div class="card">
              <div class="card-header">{{ __('Reset Password') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
   
                        <div class="form-group">
                        <label class="label">E-Mail Address</label>
                          <div class="input-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="Email">
                       
                          
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                    
                    @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary submit-btn btn-block">Send Password Reset Link</button>
                  </div>

                      
                    </form>
                </div>
            </div>
            </div>
     

@endsection
