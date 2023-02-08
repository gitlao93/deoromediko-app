@section('title') {{'Dashboard'}} @endsection
<x-sidebar>

    <div class="mainInner">
        Sort By: <input class="search-box" placeholder="Division">
        <div class="product-container">
            <div class="product-wrap">
            <a href="{{ url('/user/single-prod') }}">
                <img  src="{{asset('/images/sample-prod.png')}}" alt="product img"/>
                <h3>Product Name</h3>
                <p>PHP 10.00/Bottle</p>
            </a>
            </div>
            <div class="product-wrap">
            <a href="{{ url('/user/single-prod') }}">
                <img  src="{{asset('/images/sample-prod.png')}}" alt="product img"/>
                <h3>Product Name</h3>
                <p>PHP 10.00/Bottle</p>
            </div>
            </a>
            <div class="product-wrap">
                <img  src="{{asset('/images/sample-prod.png')}}" alt="product img"/>
                <h3>Product Name</h3>
                <p>PHP 10.00/Bottle</p>
            </div>
            <div class="product-wrap">
                <img  src="{{asset('/images/sample-prod.png')}}" alt="product img"/>
                <h3>Product Name</h3>
                <p>PHP 10.00/Bottle</p>
            </div>
            <div class="product-wrap">
                <img  src="{{asset('/images/sample-prod.png')}}" alt="product img"/>
                <h3>Product Name</h3>
                <p>PHP 10.00/Bottle</p>
            </div>
       
    
        </div>
    </div>

  

</x-sidebar>