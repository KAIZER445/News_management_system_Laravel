@extends('components.template')

@section('rawtemp')
@include('components.navbar')
@include('components.asidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>User List</h1>
  </div>
  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>SN</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Role</th>
                    <th>Image</th>
                    <th>Created at</th>
                    <th>Action</th>
                  </tr>
                </thead>
                @foreach ($usersData as $key=>$user)
                    
                
                <tbody>
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->gender}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->image}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    @if(auth()->user()->role=='admin')
                    <td><a href="">delete</a></td>
                    @endif
                  </tr>
                </tbody>
                @endforeach
              </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
    class="bi bi-arrow-up-short"></i></a>
@endsection