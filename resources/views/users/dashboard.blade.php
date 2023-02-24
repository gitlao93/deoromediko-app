@section('title')
    {{ 'Dashboard' }}
@endsection
<x-main>

    <div class="content">
        <div class="content-section">
            <div class="product-container">
                @foreach ($products as $list)
                    <div class="product-wrap {{ $list->status == 1 ? 'overlay' : '' }}">
                        <a href="{{ url('/admin/single-prod' . '/' . $list->product_ID) }}">

                            <img src="{{ $list->image_path != null ? asset('/images/productImages/' . $list->image_path) : asset('/images/logo.png') }}"
                        alt="Product_image" class="img-in-card ">


                            <h5 style="color: #000;">{{ $list->generic_name }}</h5>
                            @if ($list->status == 1)
                                <h5 class="out-of-stock">Out of stock</h5>
                            @endif

                            <p>&#8369;{{ number_format($list->market_price, 2) }}/Bottle</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- <x-layouts.rightnav /> --}}
    </div>
    <x-navigations.sidenav />

</x-main>
