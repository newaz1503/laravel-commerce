@extends("layouts.backend.master")

@section("title", 'Category')

@section("css")

@endsection

@section("content")
    <div class="container-fluid">
        <div class="block-header">

        </div>

        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 style="font-size: 27px; font-weight: 500">
                            Create New Category
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="email_address">Name</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="name" id="email_address" class="form-control" placeholder="Category Name">
                                </div>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <label for="email_address">Description</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="description" rows="5" class="form-control" placeholder="Category Description"></textarea>
                                </div>
                            </div>
                            <label for="email_address">Meta Title</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="meta_title" id="email_address" class="form-control" placeholder="Meta title">
                                </div>
                            </div>
                            <label for="email_address">Meta Description</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="meta_description" rows="5" class="form-control" placeholder="Meta Description"></textarea>
                                </div>
                            </div>
                            <label for="email_address">Meta Keywords</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="meta_keywords" rows="5" class="form-control" placeholder="Meta Keywords"></textarea>
                                </div>
                            </div>
                            <label for="email_address">Upload Image</label>
                            <div class="form-group">
                                <input type="file" class="form-control" name="image">
                            </div>
                            <input type="checkbox" id="status" name="status" class="filled-in">
                            <label for="status">Status</label>
                            <br>
                            <input type="checkbox" id="popular" name="popular" class="filled-in">
                            <label for="popular">Popular</label>
                            <br>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                            <a href="{{route('admin.category')}}" class="btn btn-danger btn-sm m-t-15">
                               BACK
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Vertical Layout -->
    </div>
@endsection

@section("js")

@endsection