@extends("layouts.frontend.master")

@section("title", 'Review')

@section("css")

@endsection

@section("content")
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if($verified_purchase->count() > 0)
                            <h5>Write a Review for {{$product->name}}</h5>
                            <form action="{{route('add.review')}}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}" >
                                <textarea name="user_review" class="form-control" cols="30" rows="5" placeholder="Write a Review"></textarea>
                                <button type="submit" class="btn btn-primary btn-sm mt-3">Submit</button>
                            </form>
                         @else
                            <div class="alert alert-danger">
                                <h5>You can not review this product</h5>
                                <p>For review, You need to purchase this product first.</p>
                                <a href="{{route('front.home')}}" class="btn btn-info">Go to home</a>
                            </div>
                        @endif
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection

@section("js")

@endsection