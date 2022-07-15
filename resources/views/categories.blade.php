@extends("layouts.frontend.master")

@section("title",'Categories')

@section("css")
    <style>
        .cat:hover .card-title  {
            text-decoration: underline;
        }
    </style>
@endsection

@section("content")
    {{--Feature product --}}
    <div class="container py-5">
        <h3 class="mb-4 text-center">All Categories</h3>
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-4 mt-3">
                    <a href="{{route('category.post', $category->slug)}}" class="text-decoration-none cat">
                        <div class="card">
                            <img src="{{asset('uploads/images/category/'.$category->image)}}" class="card-img-top" alt="{{$category->name}}" style="height: 220px; object-fit:cover ">
                            <div class="card-body">
                                <h5 class="card-title my-3 text-dark">{{$category->name}}</h5>
                                <p class="card-text float-start text-muted">${{$category->description}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection

@section("js")

@endsection