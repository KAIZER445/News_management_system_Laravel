@extends('components.template')

@section('rawtemp')
@include('components.navbar')
@include('components.asidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>User List</h1>
  </div>

        <div class="card">
          <div class="card-body py-5">
            @include('components.loginmessages')
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>SN</th>
                    <th>Category name</th>
                    <th>Time</th>
                    <th>Action</th>
                  </tr>
                </thead>
                  @csrf
                @foreach ($category as $key=>$cat)
                <tbody>
                  <tr>
                    <td>{{++$key}}</td>
                    <td>{{$cat->name}}</td>
                    <td>{{$cat->created_at->diffForHumans()}}</td>
                    @if(auth()->user()->role=='admin')
                    <td>
                        <form action="{{route('manage-category.destroy', $cat->id)}}" method="POST">
                            @csrf
                        @method('DELETE')
                    <button
                     onclick="return confirm('are you sure ?')" 
                     class="btn btn-danger btn-sm"
                     >delete</button>
                    </td>
                        </form>
                        
                        
                    @endif
                  </tr>
                </tbody>
                @endforeach
              </table>
          </div>
        </div>



</main>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
    class="bi bi-arrow-up-short"></i></a>
@endsection
