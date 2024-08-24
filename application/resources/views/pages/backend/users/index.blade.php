@extends('components.template')

@section('rawtemp')
@include('components.navbar')
@include('components.asidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>User List</h1>
    <div class="card-header">
      <form action="{{route('account.index')}}">
        <input type="search" name="search">
        <button class="btn btn-primary">search</button>
      </form>
    </div>
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

                  @include('components.loginmessages')
                  @csrf
                @foreach ($usersData as $key=>$user)
                <tbody>
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->gender}}</td>
                    <td>
                      <form action="{{ route('update-user-status') }}" method="POST">
                        @csrf
                        <input type="hidden" name="userid" value="{{ $user->id }}">
                        <button class="btn {{ $user->role == 'admin' ? 'btn-primary' : 'btn-success' }} btn-sm" 
                                name="{{ $user->role }}">
                            {{ ucfirst($user->role) }}
                        </button>
                    </form>
                    </td>
                    <td>
                      <img src="{{url($user->image)}}" alt="" style="width:50px">
                    </td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    @if(auth()->user()->role=='admin')
                    <td><a href="{{route('delete-users', $user->id)}}" 
                     onclick="return confirm('are you sure ?')" 
                     class="btn btn-danger btn-sm"
                     >delete</a></td>
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
