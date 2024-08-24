@extends('components.template')

@section('rawtemp')
@include('components.navbar')
@include('components.asidebar')

<main id="main" class="main">

  <div class="pagetitle d-flex align-items-center justify-content-between">
    <h1>News List</h1>
    <a href="{{route('manage-news.create')}}">Add News</a>
  </div>

  <div class="card">
    <div class="card-body py-5">
      @include('components.loginmessages')
      <table class="table table-hover">
        <thead>
          <tr>
            <th>SN</th>
            <th>News Title</th>
            <th>Category</th>
            <th>Image</th>
            <th>Time</th>
            <th>Action</th>
          </tr>
        </thead>
        @csrf
        @foreach ($newsData as $key=>$news)
        <tbody>
          <tr>
            <td>{{++$key}}</td>
            <td>{{$news->title}}</td>
            <td>{{$news->category->name}}</td>
            <td>
                @if($news->image)
                    <img src="{{url($news->image)}}" alt="" style="width:50px">
                @endif
            </td>
            <td>{{$news->created_at->diffForHumans()}}</td>
            @if(auth()->user()->role=='admin')
            <td class="w-25">
              <form action="{{route('manage-news.destroy', $news->id)}}" method="POST">
                @csrf
                <a href="{{route('manage-news.show',$news->id)}}" class="btn btn-success btn-sm">view news</a>
                <a href="{{route('manage-news.edit',$news->id)}}" class="btn btn-primary btn-sm">edit</a>
                @method('DELETE')
                <button onclick="return confirm('are you sure ?')" class="btn btn-danger btn-sm">delete</button>
              </form>
            </td>
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