<x-app>
    <div class="container-fluid">
        <div class="add-form">
            <div style="height: 100vh;" class="d-flex align-items-center justify-content-center">
                <form action="/addProduct" method="POST" enctype="multipart/form-data" class="card"
                    style="width: 350px; margin: 0 auto; padding: 20px; height: 400px; display: flex;">
                    @csrf

                    <div class="form-group">

                        <input value="{{ old('generic_name') }}" placeholder="Generic Name" id="generic_name"
                            type="text" class="form-control @error('generic_name') is-invalid @enderror"
                            name="generic_name" value="{{ old('generic_name') }}"" autocomplete="generic_name"
                            autofocus>
                        @error('generic_name')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">

                        <input value="{{ old('brand_name') }}" placeholder="Brand Name" id="brand_name"
                            type="text" class="form-control @error('brand_name') is-invalid @enderror"
                            name="brand_name" value="{{ old('brand_name') }}"" autocomplete="brand_name" autofocus>
                        @error('brand_name')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">

                        <input value="{{ old('product_form') }}" placeholder="Product Form" id="product_form"
                            type="text" class="form-control @error('product_form') is-invalid @enderror"
                            name="product_form" value="{{ old('product_form') }}"" autocomplete="product_form"
                            autofocus>
                        @error('product_form')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="form-group">


                        <input value="{{ old('market_price') }}" placeholder="Market Price" id="market_price"
                            type="text" class="form-control @error('market_price') is-invalid @enderror"
                            name="market_price" value="{{ old('market_price') }}"" autocomplete="market_price"
                            autofocus>
                        @error('market_price')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>



                    <div class="form-group">

                        <input value="{{ old('image_path') }}" placeholder="Market Price" id="image_path"
                            type="file" class="form-control @error('image_path') is-invalid @enderror"
                            name="image_path" value="{{ old('image_path') }}"" autocomplete="image_path" autofocus
                            placeholder="image">
                        @error('image_path')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="product-container">
            @foreach ($products as $list)
            <div class="product-wrap {{ $list->status == 1 ? 'overlay' : '' }}">
                <div>
                    <img src="{{ $list->image_path != null ? asset('/images/productImages/' . $list->image_path) : asset('/images/logo.png') }}"
                        alt="Product_image" class="img-in-card ">
                </div>
                @if ($list->status == 1)
                    <h5 class="out-of-stock">Out of stock</h5>
                @endif
                <h5>Generic Name: {{ $list->generic_name }}</h5>
                <h5>Brand Name: {{ $list->brand_name }}</h5>
                <p>Price: {{ number_format($list->market_price, 2) }}/Bottle</p>

                <div class="stock-btn">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#update{{ $list->product_ID }}">
                        Update Product
                    </button>
                    {{-- {{ route('updatestock', $list->product_ID) }} --}}
                    {{-- @if ($list->status == 0)
                        <form method="POST" action="">
                            @csrf
                            <input type="hidden" name="status" id="status" value="1">
                            <button type="submit" class="btn btn-danger" data-toggle="modal"
                                data-target="#outofstock{{ $list->product_ID }}">
                                Out Of Stock
                            </button>
                        </form>
                    @elseif ($list->status == 1)
                        <form method="POST" action="">
                            @csrf
                            <input type="hidden" name="status" id="status" value="0">
                            <button type="submit" class="btn btn-success" data-toggle="modal"
                                data-target="#outofstock{{ $list->product_ID }}">
                                In Stock
                            </button>
                        </form>
                    @endif --}}

                </div>


            </div>

            <x-update-modal :list=$list />
            {{-- <x-out-of-stock :list=$list /> --}}
        @endforeach
        </div>
    </div>
</x-app>
