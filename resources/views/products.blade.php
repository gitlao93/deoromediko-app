<x-layout>
    <x-banner_search_page/>
    <div>
        <div class="flex-col wd-80 mg-x-center">
            @foreach($products as $list)
                <x-card class="flex-row mg-y-5 wd-100">
                    <div class="flex-row fl-align-center fl-justify-content-center wd-30">
                        <img src="{{asset('/images/no-photo-available1350441335.png')}}" alt="Product_image" class="img-in-card ">
                    </div>
                    <div class="pd-5 wd-70">
                        <div class="product-info-container flex-row">
                            <p class="wd-10">Generic Name:</p>
                            <h2 class="wd-90">{{$list->generic_name}}</h2>
                        </div>
                        <div class="product-info-container flex-row">
                            <p class="wd-10">Brand Name</p>
                            <h2 class="wd-90">{{$list->brand_name}}</h2>
                        </div>
                        <div class="product-info-container flex-row">
                            <p class="wd-10">Packaging</p>
                            <h2 class="wd-90">{{$list->product_form}}</h2>
                        </div>
                        <div class="product-info-container flex-row">
                            <p class="wd-10">Price</p>
                            <h2 class="wd-90">{{number_format($list->market_price,2)}}</h2>
                        </div>
                    </div>

                </x-card>
            @endforeach
        </div>
    </div>
</x-layout>
