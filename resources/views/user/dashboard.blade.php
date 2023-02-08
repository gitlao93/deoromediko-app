@section('title') {{'Dashboard'}} @endsection
<x-sidebar>

    <div class="mainInner">
        Sort By: <input class="search-box" placeholder="Division">
       
        <div class="product-container">
            @foreach($products as $list)
            <div class="product-wrap">
            <a href="{{ url('/user/single-prod') }}">
                <img src="{{ $list->image_path != null ? asset('/images/'.$list->image_path) : asset('/images/no-photo-available1350441335.png') }}" alt="Product_image" class="img-in-card ">
                <h3>{{$list->generic_name}}</h3>
                <p>{{number_format($list->market_price,2)}}/Bottle</p>
            </a>
            </div>
       
            @endforeach
        </div>
       
    </div>

  

</x-sidebar>