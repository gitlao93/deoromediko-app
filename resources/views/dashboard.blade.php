<x-app>
    <div class="container-fluid">
        <div class="add-form">
            <div style="height: 100vh;" class="d-flex align-items-center justify-content-center">
                <form action="/addProduct" method="POST" enctype="multipart/form-data" class="card"
                    style="width: 350px; margin: 0 auto; padding: 20px; height: 400px; display: flex;">
                    @csrf

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Generic Name:</strong>
                                <input type="text" name="generic_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Brand Name:</strong>
                                <input type="text" name="brand_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Product Form:</strong>
                                <input type="text" name="product_form" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Market Price:</strong>
                                <input type="text" name="market_price" class="form-control">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Image:</strong>
                                <input type="file" name="image_path" class="form-control" placeholder="image">
                            </div>
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
