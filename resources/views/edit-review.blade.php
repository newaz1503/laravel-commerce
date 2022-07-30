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
                        <h5>Write a Review for {{$review->product->name}}</h5>
                        <form action="{{route('update.review')}}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="review_id" value="{{$review->id}}" >
                            <textarea name="user_review" class="form-control" cols="30" rows="5" placeholder="Write a Review">{{$review->review}}</textarea>
                            <button type="submit" class="btn btn-primary btn-sm mt-3">Submit</button>
                        </form>
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection

@section("js")

@endsection