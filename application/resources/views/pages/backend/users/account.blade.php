@extends('components.template')

@section('rawtemp')
@include('components.navbar')
@include('components.asidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Account Settings</h1>
  </div>
  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Update page </h5>
            <form action="" method="POST" enctype="multipart/form-data">
              @include('components.loginmessages')
              @csrf
              <div class="form-group mb-2">
                <label for="username">User Name</label>
                <input type="text" id="username" name="username" value="{{auth()->user()->username}}"  class="form-control">
              </div>
              <div class="form-group mb-2">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="{{auth()->user()->email}}" disabled readonly class="form-control ">
              </div>
              <div class="form-group mb-2">
                <label for="Gender">Gender</label>
                <select name="gender" id="gender" class="form-control">
                  <option value="male" {{auth()->user()->gender=='male' ? 'selected': ''}}>Male</option>
                  <option value="female" {{auth()->user()->gender=='female' ? 'selected': ''}}>Female</option>
                </select>
              </div>
              <div class="form-group mb-2">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control">
              </div>
              <div class="form-group mb-2">
                <button class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
    class="bi bi-arrow-up-short"></i></a>
@endsection