@extends("layouts.frontend.master")

@section("title", "My Order")

@section("css")

@endsection

@section("content")
    <div class="container py-3">
       <div class="row">
           <div class="col-md-12">
               <table class="table table-bordered table-hover table-striped">
                   <thead>
                       <tr>
                           <th>Tracking Number</th>
                           <th>Total Price</th>
                           <th>Status</th>
                           <th>Action</th>
                       </tr>
                   </thead>
                   <tbody>
                   @foreach($orders as $order)
                       <tr>
                           <td>{{$order->tracking_no}}</td>
                           <td>{{$order->total_price}}</td>
                           <td>
                               @if($order->status == true)
                                   <span class="btn btn-success btn-sm">Completed</span>
                                @else
                                   <span class="btn btn-danger btn-sm">Pending</span>
                                @endif
                           </td>
                           <td>
                               @if($order->status == false)
                                    <a href="{{route('approve.order',$order->id)}}" class="btn btn-success btn-sm">Approve</a>
                               @endif
                               <a href="{{route('view.order',$order->id)}}" class="btn btn-info btn-sm">Show</a>

                           </td>
                       </tr>
                   @endforeach
                   </tbody>
               </table>
           </div>
       </div>
    </div>
@endsection

@section("js")

@endsection