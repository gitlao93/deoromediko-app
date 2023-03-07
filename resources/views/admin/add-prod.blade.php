@section('title')
    {{ 'Add Product' }}
@endsection
<x-main>
    <div class="content">
        <div class="content-section">
            <div class="add-prod-wrapper">

                <h1>Product Information</h1>

                <form action="/admin/add-prod" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="add-form-wrapper">

                        <div class="form-group">

                            <input value="{{ old('generic_name') }}" placeholder="Generic Name" id="generic_name"
                                type="text" class="form-control @error('generic_name') is-invalid @enderror"
                                name="generic_name" value="{{ old('generic_name') }}" autocomplete="generic_name"
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
                                name="brand_name" value="{{ old('brand_name') }}" autocomplete="brand_name" autofocus>
                            @error('brand_name')
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">

                            <input value="{{ old('product_form') }}" placeholder="Product Form" id="product_form"
                                type="text" class="form-control @error('product_form') is-invalid @enderror"
                                name="product_form" value="{{ old('product_form') }}" autocomplete="product_form"
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
                                name="market_price" value="{{ old('market_price') }}" autocomplete="market_price"
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
                                name="image_path" value="{{ old('image_path') }}" autocomplete="image_path" autofocus
                                placeholder="image">
                            @error('image_path')
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="submit-btn">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </div>

                </form>



            </div>
        </div>
        {{-- <x-navigations.rightnav /> --}}
    </div>
    <x-navigations.sidenav />

</x-main>
