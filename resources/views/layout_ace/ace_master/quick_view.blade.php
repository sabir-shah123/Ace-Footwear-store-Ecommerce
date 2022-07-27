@extends("layout_ace.main")
@section("title", "Quick view")

@section("content")


<div id="fancybox-overlay" style="background-color: red">
    <div id="fancybox-wrap">
        <div id="fancybox-outer">
            <div id="fancybox-content"> <a href="index.html"></a>
                <div>
                    <div class="product-view">
                        <div class="product-essential">

                            <form action="#" method="post" id="product_addtocart_form">
                                @csrf
                                <input name="form_key" value="6UbXroakyQlbfQzK" type="hidden">
                                <div class="product-img-box col-lg-6 col-sm-6 col-xs-12">
                                    <ul class="moreview" id="moreview">

                                        <?php $i = 0; ?>

                                        <?php $images = \App\ProductImage::where('product_id' , $pid)->get();   ?>
                                        <?php $colors = \App\ProductColor::where('product_id' , $pid)->get();   ?>

                                        @foreach($images as $image)
                                            <li class="moreview_thumb thumb_1{{$i=0? " moreview_thumb_active" : ""}}">
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
                                    <p class="availability in-stock">Availability: <span>In stock</span></p>
                                    <div class="price-block">
                                        <div class="price-box"><span class="price"> Rs.{{$detail->price}} </span>
                                        </div>
                                    </div><br>

                                    <div class="form-group">
                                        <label style="font-size: 15px;">Color</label><br>
                                        <select class="form-control selectpicker" name="pcolor" style="width: 176px; height: 40px; cursor: pointer;" value="{{old('pcolor')}}">
                                            <option selected disabled>-- Select Color --</option>
                                            <option>Black</option>
                                            <option>Brown</option>
                                            <option>Blue</option>
                                            <option>Green</option>
                                            <option>Grey</option>
                                            <option>Orange</option>
                                            <option>Red</option>
                                            <option>White</option>
                                            <option>Yellow</option>
                                        </select>

                                        @if($errors->has("pcolor"))
                                            <div class="text-danger">
                                                {{$errors->first("pcolor")}}
                                            </div>
                                        @endif

                                    </div><br>

                                    <div class="form-group">
                                        <label style="font-size: 15px;">Size</label><br>
                                        <select style="width: 176px; height: 40px; cursor: pointer;" class="form-control selectpicker" name="psize" value="{{old('psize')}}">
                                            <option selected disabled>-- Select Size --</option>
                                            @if($detail->catalog == 'Men')
                                                <option>39</option>
                                                <option>40</option>
                                                <option>41</option>
                                                <option>42</option>
                                                <option>43</option>
                                                <option>44</option>

                                            @elseif($detail->catalog == 'Woman')
                                                <option>36</option>
                                                <option>37</option>
                                                <option>38</option>
                                                <option>39</option>
                                                <option>40</option>
                                                <option>41</option>

                                            @elseif($detail->catalog == 'Kids')
                                                <option>27</option>
                                                <option>28</option>
                                                <option>30</option>
                                                <option>31</option>
                                                <option>33</option>


                                            @endif
                                        </select>

                                        @if($errors->has("psize"))
                                            <div class="text-danger">
                                                {{$errors->first("psize")}}
                                            </div>
                                        @endif
                                    </div><br>

                                    <div class="add-to-box">
                                        <div class="add-to-cart">
                                            <label for="qty" >Quantity:</label>
                                            <div class="pull-left">
                                                <div class="custom pull-left">
                                                    <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon-minus">&nbsp;</i></button>
                                                    <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                                                    <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="icon-plus">&nbsp;</i></button>
                                                </div>
                                            </div>
                                            <button onClick="productAddToCartForm.submit(this)" class="button btn-cart" title="Add to Cart" type="button"><span><i class="icon-basket"></i> Add to Cart</span></button>
                                            <div class="email-addto-box">
                                                <ul class="add-to-links">
                                                    <li> <a class="link-wishlist" href="wishlist.html"><span>Add to Wishlist</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="social">
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
            <a id="fancybox-close" href="index.html"></a> </div>
    </div>
</div>

@endsection