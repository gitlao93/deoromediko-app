@section('title')
    {{ 'Single Product' }}
@endsection
<x-main>
    <div class="content">
        <div class="content-section">
            <div class="single-prod-wrapper">
                <div><a href="{{ url('/admin/dashboard') }}"><i class="fa-solid fa-chevron-left"></i> <span>Back</span></a>
                </div>


                <div class="prod-info ">
               

                    <img src="{{ $products->image_path != null ? asset('/images/productImages/' . $products->image_path) : asset('/images/logo.png') }}"
                    alt="Product_image" class="img-in-card {{ $products->status == 1 ? 'overlay' : '' }}">
                    <div>
                        <p>Generic Name: <b>{{ $products->generic_name }}</b></p>
                        <p>Brand Name: <b>{{ $products->brand_name }}</b></p>
                        <p>Package Style: <b>{{ $products->product_form }}</b></p>
                        <p>Market Price: <b>&#8369;{{ $products->market_price }}</b></p>
                        @if ($products->status == 1)
                            <h5 style="color: red;">OUT OF STOCK!</h5>
                        @endif

                    </div>


                </div>

              
            </div>
        </div>
        {{-- <x-layouts.rightnav /> --}}
    </div>
    <x-navigations.sidenav />
</x-main>
