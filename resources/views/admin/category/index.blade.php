@extends("layouts.backend.master")

@section("title", 'Category')

@section("css")
    <!-- JQuery DataTable Css -->
    <link href="{{asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endsection

@section("content")
    <div class="container-fluid">
        <div class="block-header">

        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header" style="display: flex; justify-content: space-between">
                        <h2>
                            Category List
                        </h2>
                        <a href="{{route('admin.category.create')}}" class="btn btn-primary btn-sm">
                            <i class="material-icons">add</i>
                            <span>Add Category</span>
                        </a>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                <tr>
                                    <th style="width: 3%">Serial No</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $key=>$category)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{Str::limit($category->description, 30)}}</td>
                                            <td>
                                                <img src="{{asset('uploads/images/category/'.$category->image)}}" alt="{{$category->name}}" width="60" height="60">
                                            </td>
                                            <td>
                                                @if($category->status == true)
                                                   <span class="btn btn-success btn-sm">Published</span>
                                                @else
                                                    <span class="btn btn-danger btn-sm">UnPublished</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('admin.category.edit', $category->id)}}" class="btn btn-primary btn-sm">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <button class="btn btn-danger btn-sm" onclick="deleteCat({{$category->id}})">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                                <form id="delete-category-{{$category->id}}" action="{{route('admin.category.destroy', $category->id)}}" method="post" class="d-none">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                     @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
@endsection

@section("js")
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('backend/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('backend/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

    <script src="{{asset('backend/js/pages/tables/jquery-datatable.js')}}"></script>
    <script>
        function deleteCat(id) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        document.getElementById('delete-category-'+id).submit();
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                    } else {
                        swal("Your file is safe!");
                    }
                });
        }
    </script>
@endsection