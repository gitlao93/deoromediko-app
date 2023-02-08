@section('title') {{'Add Product'}} @endsection
<x-sidebar>
<div class="add-prod-wrapper">
    <h1>Product Information</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
         
         <div class="add-form-wrapper">
       
                <div class="form-group">
                    {{-- <strong>Generic Name:</strong> --}}
                    <input type="text" name="generic_name" class="form-control" placeholder="Generic Name">
                </div>
       
      
                <div class="form-group">
                    {{-- <strong>Brand Name:</strong> --}}
                    <input type="text" name="brand_name" class="form-control" placeholder="Brand Name">
                </div>
       
    
    
                <div class="form-group">
                    {{-- <strong>Market Price:</strong> --}}
                    <input type="text" name="market_price" class="form-control" placeholder="Price">
                </div>
    
         
       
                <div class="form-group">
                    {{-- <strong>Image:</strong> --}}
                    <input type="file" name="image_path" class="form-control" placeholder="image">
                </div>
         
            <div class="submit-btn">
                    <button type="submit" class="btn btn-primary">Add Product</button>
            </div>
        </div>
          
    </form>
</div>
</x-sidebar>