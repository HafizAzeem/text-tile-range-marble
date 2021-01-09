@extends('layouts.public')

@section('content')
<div class="auto-form-wrapper">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


                <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label class="label">E-Mail Address</label>
                    <div class="input-group">
                    <input id="email" type="email" placeholder="enter email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>
                    </div>
                    
                  </div>
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  <div class="form-group">
                    <label class="label">Password</label>
                    <div class="input-group">
                    <input id="password" type="password" placeholder="*********"class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="mdi mdi-check-circle-outline"></i>
                        </span>
                      </div>

                    </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary submit-btn btn-block">Login</button>
                  </div>
                  <div class="form-group d-flex justify-content-between">
                    <div class="form-check form-check-flat mt-0">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" checked> Keep me signed in </label>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-small forgot-password text-black">Forgot Password</a>
                  </div>
                  
                 <!--  <div class="text-block text-center my-3">
                    <span class="text-small font-weight-semibold">Not a member ?</span>
                    <a href="{{route('register')}}" class="text-black text-small">Create new account</a>
                  </div> -->
                </form>
              </div>
@endsection
