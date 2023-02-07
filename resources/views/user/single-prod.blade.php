@section('title') {{'Single Product'}} @endsection
<x-sidebar>
<div class="single-prod-wrapper">
    <div><a href="{{ url('/user/dashboard') }}"><i class="fa-solid fa-chevron-left"></i> <span>Back</span></a></div>
    
   
    <div class="prod-info">
        <img  src="{{asset('/images/sample-prod.png')}}" alt="product img"/>
        <div>
            <p>Division: NEPRHOLOGY</p>
            <p>Generic Name: NEPRHOMIN</p>
            <p>Brand Name: KETOANALOGUES</p>
            <p>Package Style: BOX OF 100’S</p>
            <p>Market Price: 55.00</p>
            <p>Discount: 19.25</p>
            <p>Price: 35.75</p>
        </div>
        

    </div>
    <p>Description</p>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates quae architecto neque odit aut quisquam? Fugit, magnam nesciunt</p>
    <div class="submit-btn">
        <a href="{{ url('/user/update-prod') }}"><button type="submit" class="btn btn-primary" style="width: 350px;">Update Product</button></a>
    </div>
</div>
</x-sidebar>