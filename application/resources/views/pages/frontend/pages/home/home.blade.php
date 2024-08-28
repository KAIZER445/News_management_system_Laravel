 
    @extends('components.template')

    <?php 

    function GetTextLimit($text){
        if (strlen($text) > 50) {
            return substr($text, 0, 50) . '...';
        }
        return $text;
    }
    
    ?>

    @section('rawtemp')


    
    <div class="container">
        <div class="row py-5">
            <div class="d-flex justify-content-center mb-5">

                    <form action="{{route('index')}}" class="d-flex w-50 shadow">
                        <input type="text" class="form-control border-0 bg-transparent" name="search">
                        <button class="btn btn-primary rounded-0" type="submit">Search</button>
                    </form>

            </div>
            @foreach ($newsData as $news)
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    @if($news->image)
                    <img src="{{url($news->image)}}"  class="card-img-top object-fit-cover" style="height: 200px;" alt="">
                @endif
                    <div class="card-body">
                      <h5 class="card-title">{{$news->title}}</h5>
                      <p class="card-text">{{GetTextLimit($news->summary)}}</p>
                      <a href="{{route('news_details', $news->slug)}}" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
    @endsection