@extends('components.template')

@section('rawtemp')
<main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>
                  <form class="row g-3" method="POST" action="{{route('login')}}">
                    @include('components.loginmessages')
                    @csrf
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username
                        <span class="text-danger">{{$errors->first('username')}}</span>
                      </label>
                      <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-circle"></i></span>
                        <input type="text" name="username" class="form-control" id="yourUsername" value="{{ old('username') }}">
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password
                        <span class="text-danger">{{$errors->first('password')}}</span>
                      </label>
                      <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-key"></i></span>
                        <input type="password" name="password" class="form-control" id="yourPassword">
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>

                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main>
@endsection
