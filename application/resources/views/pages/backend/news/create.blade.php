@extends('components.template')

@section('rawtemp')
@include('components.navbar')
@include('components.asidebar')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Add news</h1>
  </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body py-4">
            <form action="{{route('manage-news.store')}}" method="POST" enctype="multipart/form-data">
                @include('components.loginmessages')
                @csrf
                <div class="form-group mb-4">
                    <label for="category" class="mb-2">category:
                    </label>
                    <select name="category_id" id="category" class="form-control">
                        <option value="">Select Category</option>
                        @foreach ($category as $cat)
                            <option value="{{$cat->id}}"
                                {{old('category_id') == $cat->id ? 'selected' : ''}}
                                >{{$cat->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="title" class="mb-2">title:
                        <span class="text-danger ps-3" style="font-size: 13px">{{$errors->first('title')}}</span>
                    </label>
                    <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
                </div>
                <div class="form-group mb-4">
                    <label for="slug" class="mb-2">slug:
                        <span class="text-danger ps-3" style="font-size: 13px">{{$errors->first('slug')}}</span>
                    </label>
                    <input type="text" class="form-control" readonly disabled name="slug" id="slug" value="{{old('slug')}}">
                </div>
                <div class="form-group mb-4">
                    <label for="image" class="mb-2">image:
                        <span class="text-danger ps-3" style="font-size: 13px">{{$errors->first('image')}}</span>
                    </label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                <div class="form-group mb-4">
                    <label for="summary" class="mb-2">summary:
                        <span class="text-danger ps-3" style="font-size: 13px">{{$errors->first('summary')}}</span>
                    </label>
                    <textarea type="text" class="form-control" name="summary" id="summary" cols="30" rows="5" value="{{old('summary')}}"></textarea>
                </div>
                <div class="form-group mb-4">
                    <label for="description" class="mb-2">description:
                        <span class="text-danger ps-3" style="font-size: 13px">{{$errors->first('description')}}</span>
                    </label>
                    <textarea type="text" class="form-control" name="description" id="description" cols="30" rows="5" value="{{old('description')}}"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Add news</button>
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