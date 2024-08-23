@extends('components.template')

@section('rawtemp')
@include('components.navbar')
@include('components.asidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>{{$catData->name}}</h1>
  </div>

  <div class="card">
    <div class="card-body py-5">
        <div class="row">

        @foreach ($catData->news as $news)
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <h4>{{$news->title}}</h4>
                    </div>
                    <div class="card-body">
                        <p>{{$news->summary}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
  </div>



</main>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
    class="bi bi-arrow-up-short"></i></a>
@endsection