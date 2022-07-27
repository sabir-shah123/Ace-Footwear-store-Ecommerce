@extends("layout_ace.main")
@section("title", "Detail")

@section("content")
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <ul>
                    <li class="home"> <a href="/home" title="Go to Home Page">Home</a><span>&mdash;›</span></li>
                    <li class=""> <a title="Go to Home Page">Product</a><span>&mdash;›</span></li>
                    <li class="category13"><strong> Detail </strong></li>
                </ul>
            </div>
        </div>
    </div>
    {{-- {{ dd($detail) }} --}}
    <section class="main-container col1-layout">
        <div class="main container">
            <div class="col-main">
                <div class="row">
                    <div class="product-view">
                        <div class="product-essential">
                            <form action="/add-to-cart" method="post" >
                                @csrf
                                <input type="hidden" value="{{$detail->id}}" name="id"/>
                                <input type="hidden" value="{{$detail->price}}" name="price"/>
                                <input name="form_key" value="6UbXroakyQlbfQzK" type="hidden">
                                <div class="product-img-box col-lg-6 col-sm-6 col-xs-12">
                                    <ul class="moreview" id="moreview">

                                      <?php $i = 1; ?>
                                      <?php $images = \App\ProductImage::where('product_id' , $pid)->get();   ?>
                                      <?php $colors = \App\ProductColor::where('product_id' , $pid)->distinct()->select('pcolor')->get();   ?>

                                        @foreach($images as $image)
                                            <li class="moreview_thumb thumb_{{$i}}{{$i=1? " moreview_thumb_active" : ""}}">
                                                <img class="moreview_thumb_image" src="{!! url('/images/products/'.$image->pimage) !!}" alt="thumbnail">
                                                <img class="moreview_source_image" src="{!! url('/images/products/'.$image->pimage) !!}" alt=""> <span class="roll-over">Roll over image to zoom in</span>
                                                <img  class="zoomImg" src="{!! url('/images/products/'.$image->pimage) !!}" alt="thumbnail">
                                                <?php $i++ ?>
                                            </li>
                                        @endforeach

                                    </ul>
                                    <div class="moreview-control"> <a href="javascript:void(0)" class="moreview-prev"></a> <a href="javascript:void(0)" class="moreview-next"></a> </div>
                                </div>
                                <div class="product-shop col-lg-6 col-sm-6 col-xs-12">
                                    <div class="product-name">
                                        <h2><b>{{$detail->title}}</b></h2>
                                    </div><br>

                                    <p class="availability in-stock">Availability: <span id="stock"> out of stock</span></p>
                                    <div class="price-block">
                                        <div class="price-box"><span class="price"> Rs.{{$detail->price}} </span>
                                        </div>
                                    </div><br>
                                    <div class="form-group">
                                        <label style="font-size: 15px;">Color</label><br>
                                        <select id="pcolor" class="form-control selectpicker" name="pcolor" style="width: 176px; height: 40px; cursor: pointer;" value="{{old('pcolor')}}" required>
                                            <option  disabled>-- Select Color --</option>
                                            @foreach($colors as $color)
                                            <option>{{$color->pcolor}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has("pcolor"))
                                            <div class="text-danger">
                                                {{$errors->first("pcolor")}}
                                            </div>
                                        @endif
                                    </div><br>

                                    <div class="form-group">
                                        <label style="font-size: 15px;">Size</label><br>
                                        <select id="psize" style="width: 176px; height: 40px; cursor: pointer;" class="form-control selectpicker" name="psize" value="{{old('psize')}}" required>
                                            <option  disabled>-- Select Size --</option>
                                        </select>
                                        @if($errors->has("psize"))
                                            <div class="text-danger">
                                                {{$errors->first("psize")}}
                                            </div>
                                        @endif
                                    </div><br>
                                    @guest

                                        <div id="addcart" class="add-to-box" style="display: none">
                                            <div class="add-to-cart">
                                                <label for="qty" >Quantity:</label>
                                                <div class="pull-left">
                                                    <div class="custom pull-left">
                                                        <p id="qtysize" style="display: none">0</p>
                                                        <input type="number" class="input-text qty" title="Qty" min="1" max="0" value="1" maxlength="12" id="qty" name="qty">
                                                    </div>
                                                </div>
                                                <button class="button btn-cart" title="Add to Cart" type="submit" style="margin-top: 25px"><span><i class="icon-basket"></i> Add to Cart</span></button>
                                            </div>
                                        </div>

                                    @endguest

                                    @auth
                                    @if(Auth::user()->role=="user")

                                        <div id="addcart" class="add-to-box" style="display: none">
                                            <div class="add-to-cart">
                                                <label for="qty" >Quantity:</label>
                                                <div class="pull-left">
                                                    <div class="custom pull-left">
                                                        <p id="qtysize" style="display: none">0</p>
                                                        <input type="number" class="input-text qty" title="Qty" min="1" max="0" value="1" maxlength="12" id="qty" name="qty">
                                                    </div>
                                                </div>
                                                <button  class="button btn-cart" title="Add to Cart" type="submit" style="margin-top: 25px;"><span><i class="icon-basket"></i> Add to Cart</span></button>
                                            </div>
                                        </div>
                                        @else
                                        <label style="font-size: 17px">Note:</label>
                                        <div style="background-color: #d9d9d9; color: #333333;  padding:5px 20px 5px; width: 80%">
                                            <h4 style="line-height: 25px;">You are currently signed in as Admin.
                                            Please Login with User Account to Place an Order</h4>
                                        </div>
                                        @endif

                                        @endauth

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br><br><br><br><br><br><br><br><br><br><br>
    </section>
@endsection

@section('extrascript')
   <script>

       var datareturn;
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });

       $("#psize").on('change',function(e){
          getStock();
       });

       function getStock()
       {
           if(datareturn.legth==0)
               return;
           $.each( datareturn, function( key, value ) {
               if($("#psize").val()==value.id)
               {
                   if(value.pquantity==0)
                   {
                       $("#stock").html("out of stock");
                       $("#addcart").hide();
                   }
                   else
                   {
                       $("#stock").html("In Stock - "+value.pquantity);
                       $("#addcart").show();
                       $("#qty").prop('max',value.pquantity);
                       $("#qty").val("1");
                       $("#qtysize").html(value.pquantity);
                       $("input").trigger("touchspin.updatesettings", {max: value.pquantity});
                       $("input[name='qty']").TouchSpin({
                           min:1,
                           max:value.pquantity,
                           stepinterval:1,
                           maxboostedstep:1,
                       })


                   }
               }
           });
       }
       $("#pcolor").on('change',function(e){
            request();
       });
       $(function(){
           request();
       }) ;
       function request()
       {
           $.ajax({
               type: "get",
               url: "/product_stock/<?php echo $detail->id; ?>/"+$("#pcolor").val(),
               dataType: 'JSON',
               success: function (data) {
                   datareturn = data.psize;
                   console.log(datareturn);
                   var psize="";
                   if(data.psize.length==0)
                   {
                       $("#stock").html("out of stock");

                       $("#addcart").hide();
                   }
                   else
                   {
                       $("#stock").html("Select Size");

                       $("#addcart").show();
                       psize = '<option disabled>Select Size</option>';
                       $.each( data.psize, function( key, value ) {

                           psize += '<option value="'+value.id+'">'+value.psize+'</option>';
                       });
                   }
                   $("#psize").html(psize);
                   getStock();
               }
           })
       }
   </script>
@endsection
