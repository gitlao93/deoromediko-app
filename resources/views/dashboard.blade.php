<x-app>
    <div style="height: 100vh;" class="d-flex align-items-center justify-content-center">
    <form action="/addProduct" method="POST" enctype="multipart/form-data" class="card" style="width: 350px; margin: 0 auto; padding: 20px; height: 400px; display: flex;">
        @csrf
         
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Generic Name:</strong>
                    <input type="text" name="generic_name" class="form-control" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Brand Name:</strong>
                    <input type="text" name="brand_name" class="form-control" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Form:</strong>
                    <input type="text" name="product_form" class="form-control" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Market Price:</strong>
                    <input type="text" name="market_price" class="form-control" >
                </div>
            </div>
         
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image_path" class="form-control" placeholder="image">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
          
    </form>
    </div>
</x-app>