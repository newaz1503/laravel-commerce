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
        <h4 class="trending__title mb-4 pt-3">Trending Category</h4>
        <div class="row mb-5">
            <div class="owl-carousel owl-theme trending-category">
                @foreach($categories as $category)
                    <div class="item">
                        <a href="{{route('category.post', $category->slug)}}" class="text-decoration-none cat">
                            <div class="card">
                                <img src="{{asset('uploads/images/category/'.$category->image)}}" class="card-img-top" alt="{{$category->name}}" style="height: 220px; object-fit:cover ">
                                <div class="card-body">
                                    <h6 class="card-title my-3 text-dark">{{$category->name}}</h6>
                                    <p class="card-text text-muted">${{Str::limit($category->description, 20)}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <h3 class="mb-1 category__title">All Categories</h3>
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
    <script>
        $('.trending-category').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots:false,
            autoplay:true,
            autoplayTimeout:2000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        })
    </script>
@endsection