<!-- Modal for update -->
@props(['list'])

<div class="modal fade" id="update{{ $list->product_ID }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Update {{ $list->generic_name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
   
                
                <form action="{{ route('userupdate', $list->product_ID) }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{ $list->product_ID }}">
                    @csrf
                    @method('put')
                    <div class="add-form-wrapper">

                        <div class="form-group">

                            <input value="{{ $list->generic_name }}" placeholder="Generic Name" id="generic_name"
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
                            <input value="{{ $list->brand_name }}" placeholder="Brand Name" id="brand_name"
                                type="text" class="form-control @error('brand_name') is-invalid @enderror"
                                name="brand_name" value="{{ old('brand_name') }}"" autocomplete="brand_name" autofocus>
                            @error('brand_name')
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">

                            <input value="{{ $list->product_form }}" placeholder="Product Form" id="product_form"
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
                            <input value="{{ $list->market_price }}" placeholder="Market Price" id="market_price"
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

                            <input value="{{ $list->image_path }}" placeholder="Market Price" id="image_path"
                                type="file" class="form-control @error('image_path') is-invalid @enderror"
                                name="image_path" value="{{ old('image_path') }}"" autocomplete="image_path" autofocus
                                placeholder="image">
                            @error('image_path')
                                <span class="invalid-feedback" role="alert" style="color: red;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="submit-btn">
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>