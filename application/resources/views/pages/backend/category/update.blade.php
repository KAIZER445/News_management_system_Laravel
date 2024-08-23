@extends('components.template')

@section('rawtemp')
@include('components.navbar')
@include('components.asidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Add category</h1>
  </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body py-4">
            <form action="{{route('manage-category.update',$category->id)}}" method="POST">
                @include('components.loginmessages')
                @csrf
                @method('PUT')
                <div class="form-group mb-4">
                    <label for="name" class="mb-2">Name:
                        <span class="text-danger ps-3" style="font-size: 13px">{{$errors->first('name')}}</span>
                    </label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Update category</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

</main>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
    class="bi bi-arrow-up-short"></i></a>
@endsection