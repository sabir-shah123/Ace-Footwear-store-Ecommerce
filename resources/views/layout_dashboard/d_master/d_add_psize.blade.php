@extends("layout_dashboard.main")
@section("title", "Add Size")

@section("content")

    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('d_home')}}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item text-muted" style="color: black">Add Product Size</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow-2">
        <div class="card-header bg-info">
            <h3 class="text-white text-center"><b>Add Product Size</b></h3>
        </div>
        <div class="card-body">

            <form method="post" action="{{url("/store-size")}}" enctype="multipart/form-data">
                @csrf

                    <div class="form-group">
                        <label>Product Title/Name</label><br>
                        <select class="selectpicker form-control" name="title" style="cursor: pointer;">
                            <option selected disabled>-- Select Title --</option>
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
                    <hr>
                    <div class="form-group">
                        <label>Size</label><br>
                        <select class="selectpicker form-control" name="psize" style="cursor: pointer;">
                            <option selected disabled>-- Select Size --</option>
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

                        @if($errors->has("psize"))
                            <div class="text-danger">
                                {{$errors->first("psize")}}
                            </div>
                        @endif
                    </div>
                    <hr>

                    <button type="submit" class="btn btn-primary shadow-2 btn-lg mt-5" style="width: 30%; height: 60px; float: right;">Add Size</button>
            </form>
        </div>
    </div>




@endsection