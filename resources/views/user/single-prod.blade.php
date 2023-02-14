@section('title')
    {{ 'Single Product' }}
@endsection
<x-main>
    <div class="content">
        <div class="content-section">
            <div class="single-prod-wrapper">
                <div><a href="{{ url('/user/dashboard') }}"><i class="fa-solid fa-chevron-left"></i> <span>Back</span></a>
                </div>


                <div class="prod-info">

                    <img src="{{ $products->image_path != null ? asset('/images/' . $products->image_path) : asset('/images/no-photo-available1350441335.png') }}"
                        alt="Product_image" class="img-in-card ">
                    <div>
                        <p>Generic Name: <b>{{ $products->generic_name }}</b></p>
                        <p>Brand Name: <b>{{ $products->brand_name }}</b></p>
                        <p>Package Style: <b>{{ $products->product_form }}</b></p>
                        <p>Market Price: <b>&#8369;{{ $products->market_price }}</b></p>

                    </div>


                </div>

              
            </div>
        </div>
        <div class="right-section">
            <i id="resize-btn" class="fa-solid fa-arrow-right"></i>
        </div>
    </div>
    <x-layouts.sidenav />
</x-main>
