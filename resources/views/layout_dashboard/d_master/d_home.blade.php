@extends("layout_dashboard.main")
@section("title", "Main Page")

@section("content")

    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
<?php  $total  =\App\Order::count(); ?>
    <div class="main-body">
        <div class="page-wrapper">

            <div class="row">

                <div class="col-md-6 col-xl-4">
                    <div class="card Online-Order">
                        <div class="card-block">
                            <h5>Pending Orders</h5>
                            <?php $pending  =\App\Order::where('status' , 'pending')->count();
                           
                            if($total > 0){
                                $p_percent = round(($pending / $total) * 100);
                            }else{
                                $p_percent = 0;
                            }
                            ?>

                            <h6 class="text-muted d-flex align-items-center justify-content-between m-t-30">Pending Orders<span class="float-right f-18 text-c-green">{{$pending}} / {{$total}}</span></h6>
                            <div class="progress mt-3">
                                <div class="progress-bar progress-c-theme" role="progressbar" style="width:{{$p_percent}}%;height:6px;" aria-valuenow="{{$p_percent}}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="text-muted mt-2 d-block">{{$p_percent}}%</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card Online-Order">
                        <div class="card-block">
                            <h5>Processed Orders</h5>
                            <?php $processed  =\App\Order::where('status' , 'processed')->count();
                             if($total > 0){
                                $proc_percent = round(($processed / $total) * 100);
                            }else{
                                $proc_percent = 0;
                            }
                            ?>
                            <h6 class="text-muted d-flex align-items-center justify-content-between m-t-30">Processed Orders<span class="float-right f-18 text-c-purple">{{$processed}} / {{$total}}</span></h6>
                            <div class="progress mt-3">
                                <div class="progress-bar progress-c-theme2" role="progressbar" style="width:{{$processed}}%;height:6px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="text-muted mt-2 d-block">{{$processed}}%</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-4">
                    <div class="card Online-Order">
                        <div class="card-block">
                            <h5>Order Delivered</h5>
                            <?php $delivered  =\App\Order::where('status' , 'delivered')->count();
                             if($total > 0){
                                $d_percent = round(($delivered / $total) * 100);
                            }else{
                                $d_percent = 0;
                            }
                            ?>
                            <h6 class="text-muted d-flex align-items-center justify-content-between m-t-30">Order Delivered<span class="float-right f-18 text-c-blue">{{$delivered}} / {{$total}}</span></h6>
                            <div class="progress mt-3">
                                <div class="progress-bar progress-c-blue" role="progressbar" style="width:{{$delivered}}%;height:6px;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="text-muted mt-2 d-block">{{ $delivered }}%</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4" >
                    <div class="card card-customer" style="height: 160px">
                        <div class="card-block">
                            <div class="row align-items-center justify-content-center">
                                <div class="col">
                                    <?php $users  =\App\User::where('role' , 'user')->count();?>
                                    <h2 class="mb-2 f-w-300 text-center">{{$users}}</h2>
                                    <h5 class="text-muted mb-0 text-center">Register User(s)</h5>

                                </div>
                                <div class="col-auto">
                                    <i class="feather icon-user-plus f-30 text-white theme-bg"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4" >
                    <div class="card card-customer" style="height: 160px">
                        <div class="card-block">
                            <div class="row align-items-center justify-content-center">
                                <div class="col">
                                    <h2 class="mb-2 f-w-300 text-center">{{$delivered}}</h2>
                                    <h5 class="text-muted mb-0">Completed Order(s)</h5>
                                </div>
                                <div class="col-auto">
                                    <i class="feather icon-check-square f-30 text-white theme-bg"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="card theme-bg earning-date" style="height: 160px">
                        <div class="card-header borderless mb-0">
                            <h5 class="text-white">Earnings</h5>
                        </div>
                        <div class="card-block" style="margin-top: -30px">
                            <div class="bd-example bd-example-tabs">
                                <div class="tab-content" id="tabContent-pills">

                                    <div class="tab-pane fade show active" id="earnings-mon" role="tabpanel" aria-labelledby="pills-earnings-mon">
                                        <h2 class="text-white f-w-300" style="font-size: 40px">
                                            <?php $earning = \App\Order::where('status' , 'delivered')->get();
                                             $d = $earning->sum('total');
                                            ?>
                                            @if(count($earning) > 0  && !empty($earning))
                                                    Rs. {{$d}} <i class="feather icon-arrow-up"></i>
                                                @else
                                                        Rs. 0
                                            @endif
                                        </h2>
                                        <span class="text-white mb-4 d-block">TOTAL EARNINGS</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection