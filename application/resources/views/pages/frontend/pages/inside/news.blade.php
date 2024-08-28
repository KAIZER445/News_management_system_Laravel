 
    @extends('components.template')


    @section('rawtemp')
    
    <div class="container">
        <div class="row py-5">
           <div class="col-8">
                <div class="card p-4">
                    <h4>News Details</h4>
                        @if($News->image)
                        <img src="{{url($News->image)}}" alt="" class="img-fluid">
                        @endif
                    <span class="text-secondary"><em>Posted on: {{$News->created_at->format('d M Y')}} / Posted by: {{$News->user->username}} / Page Visit: {{$News->pagevisit}}</em></span>
                    <div>
                        <h1>{{$News->title}}</h1>
                    </div>
                    <div>
                        <p>{{$News->description}}</p>
                    </div>
                </div>
           </div>
           <div class="col-4">
                <div class="card p-4">
                    <h2>Related News</h2>
                    <ul>
                        @foreach($relatednews as $related)
                        <li>
                            <a href="{{route('news_details', $related->slug)}}">{{$related->title}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
           </div>
        </div>
    </div>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
    @endsection