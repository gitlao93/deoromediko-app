@section('title')
    {{ 'Update Product' }}
@endsection
{{-- <x-sidebar> --}}
<x-main>
    <div class="content">
        <div class="content-section">
            <div class="update-prod-wrapper">
                {{-- <label for="products">Sort By:</label>

                <select id="products">
                    <option value="generic">Generic</option>
                    <option value="brand">Brand</option>
                </select> --}}

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
                            <h5>{{ $list->generic_name }}</h5>
                            <p>{{ number_format($list->market_price, 2) }}/Bottle</p>

                            <div class="stock-btn">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#update{{ $list->product_ID }}">
                                    Update Product
                                </button>

                                @if ($list->status == 0)
                                    <form method="POST" action="{{ route('updatestock', $list->product_ID) }}">
                                        @csrf
                                        <input type="hidden" name="status" id="status" value="1">
                                        <button type="submit" class="btn btn-danger" data-toggle="modal"
                                            data-target="#outofstock{{ $list->product_ID }}">
                                            Out Of Stock
                                        </button>
                                    </form>
                                @elseif ($list->status == 1)
                                    <form method="POST" action="{{ route('updatestock', $list->product_ID) }}">
                                        @csrf
                                        <input type="hidden" name="status" id="status" value="0">
                                        <button type="submit" class="btn btn-success" data-toggle="modal"
                                            data-target="#outofstock{{ $list->product_ID }}">
                                            In Stock
                                        </button>
                                    </form>
                                @endif

                            </div>


                        </div>

                        <x-update-modal :list=$list />
                        {{-- <x-out-of-stock :list=$list /> --}}
                    @endforeach
                </div>


            </div>
        </div>
        <x-navigations.rightnav />
    </div>
    <x-navigations.sidenav />
</x-main>
