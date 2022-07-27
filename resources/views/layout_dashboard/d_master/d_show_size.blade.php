@extends("layout_dashboard.main")
@section("title", "Show All Product")

@section("content")


    <!-- [ vertical-table ] start -->
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card shadow-lg code-table pb-5">
                <div class="card-header" style="background-color: #3f4d67">
                    <h4 class="text-center text-white" style="font-weight: bold">All Product Records</h4>
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
                        <table id="key-act-button" class="table table-striped table-styling table-columned">
                            <thead>
                            <tr class="table-styling">
                                <th>Sr#</th>
                                <th>Title</th>
                                <th>Size</th>
                                <th>Update | Delete</th>
                            </tr>
                            </thead>

                            <tbody>


                            <?php $i = 1;  ?>

                            @if(count($allsizes) > 0  && !empty($allsizes))

                                @foreach($allsizes as $allsize)
                                    <?php $ti = \App\Product::where("id", $allsize->product_id )->first()?>
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$ti->title}}</td>
                                        <td>{{$allsize->psize}}</td>
                                        {{--<td> {{$col->pcolor}}</td>--}}
                                        {{--<td> @foreach($siz as $si)<li>{{$si->psize}}</li>@endforeach</td>--}}
                                        <td>
                                            <a href="#" data-toggle="modal" class="btn btn-icon btn-outline-success" title="Update Product" data-target="#update-product-{{$i}}"> <span class="fas fa-pencil-alt"></span></a>
                                            <a href="#" data-toggle="modal" class="btn btn-icon btn-outline-danger" title="Delete Product" data-target="#delete-product-{{$i}}"> <span class="fas fa-trash-alt"></span></a>





                                            {{--Model for Language Proficiency Help Start--}}
                                            <div id="delete-product-{{$i}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delete-product-{{$i}}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-dark" >
                                                            <h5 class="modal-title" style="margin-left: 160px; color: white;" id="delete-product-{{$i}}">Delete {{--{{$i}}:--}}  {{$ti->title}}</h5>
                                                            <button type="button"style="color: white" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        </div>

                                                        <form method="post" action="{{url('delete/product')}}/{{$ti->id}}">
                                                            {{method_field('delete')}}
                                                            {{csrf_field()}}
                                                            <div class="modal-body">
                                                                <p>Do you really want to remove this product from our system?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success shadow-3" >Yes, Delete it</button>
                                                                <button type="button" class="btn btn-danger shadow-3" data-dismiss="modal">No, Close</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                            {{--Model for Language Proficiency Help End--}}


                                        </td>
                                        <?php $i++;?>

                                    </tr>
                                    {{--@endforeach--}}

                                @endforeach


                            @else
                                <tr>
                                    <td colspan="13" class="text-danger text-center">No record found</td>
                                </tr>

                            @endif

                            </tbody>
                        </table>
                        {{$allsizes->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

