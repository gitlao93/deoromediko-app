@section('title') {{'Single Product'}} @endsection
<x-main>
<div class="single-prod-wrapper">
    <div><a href="{{ url('/user/dashboard') }}"><i class="fa-solid fa-chevron-left"></i> <span>Back</span></a></div>
    
   
    <div class="prod-info">
        <img  src="{{asset('/images/sample-prod.png')}}" alt="product img"/>
        {{-- <img src="{{ $products->image_path != null ? asset('/images/' . $products->image_path) : asset('/images/no-photo-available1350441335.png') }}"
        alt="Product_image" class="img-in-card "> --}}
        <div>
            {{-- <p>Division: NEPRHOLOGY</p> --}}
            <p>Generic Name: </p>
            <p>Brand Name: KETOANALOGUES</p>
            <p>Package Style: BOX OF 100’S</p>
            <p>Market Price: 55.00</p>
            <p>Discount: 19.25</p>
            <p>Market Price: 35.75</p>
        </div>
        

    </div>
    <p>Description</p>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates quae architecto neque odit aut quisquam? Fugit, magnam nesciunt</p>
    <div class="submit-btn">
        <button type="button" data-toggle="modal" data-target="#update" class="btn btn-primary" style="width: 350px;">Update Product</button>
    </div>
</div>

</x-main>