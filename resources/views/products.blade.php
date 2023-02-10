<x-layout>
    <section class="product-search-container">
        <div class="product-search-wrapper">
            <h1>De Oro Mediko Drug<br>Distribution services</h1>
            <form class="search-box" action="/products/">
                <div class="input-box">
                    <i class="fa fa-search search-icon" aria-hidden="true"></i>
                    <input type="text" placeholder="Mag search ng gamot..." name="search" />
                    <button class="button"><i class="fa fa-search icon-btn" aria-hidden="true"></i><span>Search</span></button>
                </div>
            </form>
        </div>
    </section>

    <section class="product-result-container">
        <div class="product-result-wrapper">
            @foreach ($products as $list)
                <div class="product-card">

                    <div class="product-card-image-wrapper"> 
                        <img src="{{ $list->image_path != null ? asset('/images/'.$list->image_path) : asset('/images/no-photo-available1350441335.png') }}" alt="Product_image" class="img-in-card ">
                    </div>
                    <div class="product-card-info-wrapper">
                        <div class="info">
                            <p>Generic Name:</p>
                            <h2>{{$list->generic_name}}</h2>
                        </div>
                        <div class="info">
                            <p>Brand Name</p>
                            <h2>{{$list->brand_name}}</h2>
                        </div>
                        <div class="info">
                            <p>Packaging</p>
                            <h2>{{$list->product_form}}</h2>
                        </div>
                        <div class="info">
                            <p>Price</p>
                            <h2>&#8369;{{number_format($list->market_price,2)}}</h2>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </section>
</x-layout>


{{-- <div class="flex-col wd-80 mg-x-center">
    @foreach ($products as $list)
        <x-card class="flex-row mg-y-5 wd-100">
            <div class="flex-row fl-align-center fl-justify-content-center wd-30"> 
                <img src="{{ $list->image_path != null ? asset('/images/'.$list->image_path) : asset('/images/no-photo-available1350441335.png') }}" alt="Product_image" class="img-in-card ">
            </div>
            <div class="pd-5 wd-70">
                <div class="product-info-container flex-row">
                    <p class="wd-20">Generic Name:</p>
                    <h2 class="wd-80">{{$list->generic_name}}</h2>
                </div>
                <div class="product-info-container flex-row">
                    <p class="wd-20">Brand Name</p>
                    <h2 class="wd-80">{{$list->brand_name}}</h2>
                </div>
                <div class="product-info-container flex-row">
                    <p class="wd-20">Packaging</p>
                    <h2 class="wd-80">{{$list->product_form}}</h2>
                </div>
                <div class="product-info-container flex-row">
                    <p class="wd-20">Price</p>
                    <h2 class="wd-80">&#8369;{{number_format($list->market_price,2)}}</h2>
                </div>
            </div>

        </x-card>
    @endforeach
</div> --}}
