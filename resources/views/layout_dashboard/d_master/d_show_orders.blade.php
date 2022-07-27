@extends("layout_dashboard.main")
@section("title", "Orders")

@section("content")
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('d_home')}}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item  text-muted">Orders</li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">All Orders</li>
                        </ol>
                    </nav>
                    {{--<ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('d_home')}}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item text-muted" style="color: black">Products</li>
                        <li class="breadcrumb-item text-muted" style="color: black">Product Details</li>
                        <li class="breadcrumb-item text-muted" style="color: black">Add Product</li>
                    </ul>--}}
                </div>
            </div>
        </div>
    </div>

    <!-- [ vertical-table ] start -->
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card shadow-lg code-table pb-5">
                <div class="card-header bg-info" style="background-color: #3f4d67">
                    <h3 class="text-center text-white" style="font-weight: bold; margin-top: 4px;">All Orders</h3>
                    <div class="card-header-right">
                        <div class="btn-group card-option">

                            <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="card-block pb-0">
                    <div class="table-responsive">
                        <table id="zero-configuration" class="table table-striped table-styling table-columned">
                            <thead class="text-center">
                            <tr class="table-styling">
                                {{--<th>Update</th>--}}
                                <th>View Detail</th>
                                <th>Sr#</th>
                                <th>Order_ID</th>
                                <th>User_ID</th>

                                <th>Total</th>
                                <th>Date of Order</th>
                                <th>Status</th>
                                <th >Shipping Address</th>

                            </tr>
                            </thead>

                            <tbody>


                            <?php $i = 1;  ?>
                            @if(count($order) > 0  && !empty($order))
                                @foreach($order as $orders)
                              <tr class="text-center">
                                  {{--<td>
                                      <a href="#" data-toggle="modal" class="btn btn-icon btn-outline-success" title="Update Product" data-target="#update-product-{{$i}}"> <span class="fas fa-pencil-alt"></span></a>
                                  </td>--}}
                                  <td>
                                      <a  onclick="if($('#show{{$i}}').html()=='0'){$('#detail{{$i}}').show(); $('#show{{$i}}').html('1'); }else {
                                              $('#show{{$i}}').html('0');
                                              $('#detail{{$i}}').hide();
                                              }"  class="btn btn-icon btn-outline-success" > <span class="fas fa-eye"></span></a>
                                      <div id="show{{$i}}" style="display: none">0</div>
                                  </td>
                                  <td>#{{$i}}</td>

                                  <td>{{$orders->id}}</td>
                                  <td>{{$orders->user_id}}</td>

                                  <td>{{$orders->total}}</td>
                                  <td>{{$orders->order_date}}</td>
                                  @if($orders->status == 'pending')
                                      <td style=" text-align: center"><a href="#" data-toggle="modal"  title="Update Product" data-target="#update-product-{{$i}}" class="label f-12 text-white" style="background-color: #ffd54d; padding:4px 15px 6px 15px;">{{$orders->status}}</a></td>
                                  @endif
                                  @if($orders->status == 'processed')
                                      <td style=" text-align: center"><a href="#" data-toggle="modal"  title="Update Product" data-target="#update-product-{{$i}}" class="label theme-bg2 f-12 text-white" style="padding:4px 8px 6px 8px;">{{$orders->status}}</a></td>
                                  @endif
                                  @if($orders->status == 'delivered')
                                      <td style=" text-align: center"><a href="#" data-toggle="modal"  title="Update Product" data-target="#update-product-{{$i}}" class="label f-12 text-white" style="background-color: #79d279; padding-top: 4px; padding-bottom: 6px">{{$orders->status}}</a></td>
                                  @endif
                                      <td><p style="text-align: left; width: 220px; white-space: pre-line;">{{$orders->shipping_address}}</p></td>


                                  {{--Model for Language Proficiency Help Start--}}
                                  <div id="update-product-{{$i}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="update-product-{{$i}}" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                              <div class="card-header bg-dark" style="text-align: center">
                                                  <h5 class="modal-title text-white" id="update-product-{{$i}}">Update No#{{$i}} Record</h5>
                                                  <button type="button" class="close" style="color: white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                              </div>

                                              <form method="post" action="{{url('/update/order/status')}}/{{$orders->id}}">
                                                  {{method_field('put')}}
                                                  {{csrf_field()}}
                                                  <div class="modal-body">
                                                      <div class="form-group">
                                                          <label>Change Order Status</label><br>
                                                          <select class="selectpicker form-control" name="status" style="cursor: pointer;" required>
                                                              <option selected>{{$orders->status}}</option>
                                                              <option>processed</option>
                                                              <option>delivered</option>
                                                              <option>pending</option>
                                                          </select>

                                                          @if($errors->has("status"))
                                                              <div class="text-danger">
                                                                  {{$errors->first("status")}}
                                                              </div>
                                                          @endif
                                                      </div>
                                                      <hr>


                                                  </div>
                                                  <div class="modal-footer">
                                                      <button type="submit" class="btn btn-success shadow-3" >Update</button>
                                                      <button type="button" class="btn btn-secondary shadow-3" data-dismiss="modal">Close</button>
                                                  </div>
                                              </form>

                                          </div>
                                      </div>
                                  </div>
                                  {{--Model for Language Proficiency Help End--}}






                              </tr>
                              <tr id="detail{{$i}}" style="display: none">
                                  <td colspan="7">
                                      <?php  $order_d = \App\OrderDetails::where('order_id' , $orders->id)->get(); ?>

                                      <table class="table table-striped table-styling table-columned">
                                          <thead class="text-center">
                                          <th>Product_ID</th>
                                          <th>Title</th>
                                          <th>Color</th>
                                          <th>Size</th>
                                          <th>Unit Price</th>
                                          <th>Quantity</th>
                                          </thead>
                                          <tbody>

                                          @foreach($order_d as $order_details)
                                              <?php $name = \App\Product::where('id', $order_details->product_id)->first(); ?>

                                              <tr class="text-center">
                                                  <td>{{$order_details->product_id}}</td>

                                                  <td>{{$name->title}}</td>

                                                  <?php $size = \App\ProductColor::where('id', $order_details->psize)->first(); ?>
                                                  <td>{{$size->pcolor}}</td>
                                                  <td> {{$size->psize}} </td>
                                                  <td>{{$name->price}}</td>
                                                  <td>{{$order_details->quantity}}</td>
                                              </tr>

                                          @endforeach

                                          </tbody>
                                      </table>
                                  </td>
                              </tr>






                              <?php $i++;?>
                                @endforeach

                            @else
                                <tr>
                                    <td colspan="9" class="text-danger text-center">No record found</td>
                                </tr>

                            @endif

                            </tbody>
                        </table>
                        {{--{{$order->links()}}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>








@endsection