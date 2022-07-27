@extends("layout_dashboard.main")
@section("title", "Add Color")

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
                            <li class="breadcrumb-item text-muted">Products</li>
                            <li class="breadcrumb-item text-muted" aria-current="page">Product Color & Size</li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Add Color & Size</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow-2">
        <div class="card-header bg-info">
            <h3 class="text-white text-center" style="margin-top: 4px;"><b>Add Product Color & Size</b>
                <a href="/show/all/colors" style="border: 1px solid white; border-radius: 10px; background-color: #006680;  font-size: 16px;color: white; padding: 5px; float: right">Show Colors</a>
            </h3>
        </div>
        <div class="card-body">

            <form method="post" action="{{url("/store-color")}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4 col-xs-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label>Product Title/Name</label><br>
                                <select class="selectpicker form-control" name="title" style="cursor: pointer;" required>
                                    <option ></option>
                                    @foreach ($products as $product)
                                        <option value="{{$product->id}}">{{$product->title}}</option>
                                    @endforeach
                                </select>

                                @if($errors->has("title"))
                                    <div class="text-danger">
                                        {{$errors->first("title")}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label>Color</label><br>
                                <select class="selectpicker form-control" name="color" style="cursor: pointer;" required>
                                    <option></option>
                                    <option>Black</option>
                                    <option>Brown</option>
                                    <option>Blue</option>
                                    <option>Green</option>
                                    <option>Grey</option>
                                    <option>Orange</option>
                                    <option>Red</option>
                                    <option>White</option>
                                    <option>Yellow</option>
                                    <option>Pink</option>
                                    <option>Golden</option>
                                </select>

                                @if($errors->has("color"))
                                    <div class="text-danger">
                                        {{$errors->first("color")}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label>Size</label><br>
                                <select class="selectpicker form-control" name="size" style="cursor: pointer;" required>
                                    <option></option>
                                    <optgroup label="Men">
                                        <option>39</option>
                                        <option>40</option>
                                        <option>41</option>
                                        <option>42</option>
                                        <option>43</option>
                                        <option>44</option>
                                    </optgroup>
                                    <optgroup label="Women">
                                        <option>36</option>
                                        <option>37</option>
                                        <option>38</option>
                                        <option>39</option>
                                        <option>40</option>
                                        <option>41</option>
                                    </optgroup>
                                    <optgroup label="Kids">
                                        <option>27</option>
                                        <option>28</option>
                                        <option>30</option>
                                        <option>31</option>
                                        <option>33</option>
                                    </optgroup>
                                </select>

                                @if($errors->has("size"))
                                    <div class="text-danger">
                                        {{$errors->first("size")}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div><hr>

                    <div class="form-group">
                        <label>Quantity</label><br>
                        <input class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' min="0" max="1000" type="number" name="qty" title="enter title" placeholder="enter product title here" value="{{old('pqty')}}" required>

                        @if($errors->has("qty"))
                            <div class="text-danger">
                                {{$errors->first("qty")}}
                            </div>
                        @endif
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary shadow-2 btn-lg mt-5" style="width: 30%; height: 60px; float: right;">Add Data</button>
                </div>
            </form>
        </div>
    </div>




@endsection