
@section('title') {{'Update Product'}} @endsection
{{-- <x-sidebar> --}}
  <x-main>
<div class="update-prod-wrapper">
    <label for="products">Sort By:</label>

        <select id="products">
        <option value="generic">Generic</option>
        <option value="brand">Brand</option>
        </select>

        <div class="product-container">
          
            @foreach($products as $list)
            
            <div class="product-wrap">
          
                <img src="{{ $list->image_path != null ? asset('/images/'.$list->image_path) : asset('/images/no-photo-available1350441335.png') }}" alt="Product_image" class="img-in-card ">
                <h3>{{$list->generic_name}}</h3>
                <p>{{number_format($list->market_price,2)}}/Bottle</p>
           
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update{{ $list->product_ID }}">
                Update Product
              </button>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#outofstock{{ $list->product_ID }}">
                Out of Stock
              </button>
             
            </div>
           
            <x-modal :list=$list/>
       
            @endforeach
        </div>
      

</div>

</x-main>



