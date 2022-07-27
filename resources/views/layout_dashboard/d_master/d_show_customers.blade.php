@extends("layout_dashboard.main")
@section("title", "All Users")

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
                            <li class="breadcrumb-item  text-muted">Users</li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Show all Users</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- [ vertical-table ] start -->
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card shadow-lg code-table pb-5">
                <div class="card-header bg-info" style="background-color: #3f4d67">
                    <h3 class="text-center text-white" style="font-weight: bold; margin-top: 4px;">All Users</h3>
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
                        <table id="key-act-button4" class="table table-striped table-styling table-columned">
                            <thead>
                            <tr class="table-styling">
                                <th>Sr#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Cell</th>
                                <th>Country</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Postal Code</th>
                            </tr>
                            </thead>

                            <tbody>


                            <?php $i = 1;  ?>

                            @if(count($alluser) > 0  && !empty($alluser))

                                @foreach($alluser as $allusers)

                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$allusers->name}}</td>
                                        <td>{{$allusers->email}}</td>
                                        <td>{{$allusers->cell}}</td>
                                        <td>{{$allusers->country}}</td>
                                        <td>{{$allusers->address}}</td>
                                        <td>{{$allusers->city}}</td>
                                        <td>{{$allusers->postal_code}}</td>
                                        <?php $i++;?>

                                    </tr>

                                @endforeach


                            @else
                                <tr>
                                    <td colspan="13" class="text-danger text-center">No record found</td>
                                </tr>

                            @endif

                            </tbody>
                        </table>
                        {{--{{$alluser->links()}}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>








@endsection

