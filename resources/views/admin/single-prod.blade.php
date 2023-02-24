@section('title')
    {{ 'Single Product' }}
@endsection
<x-main>
    <div class="content">
        <div class="content-section">
            <div class="single-prod-wrapper">
                <div><a href="{{ url('/admin/dashboard') }}"><i class="fa-solid fa-chevron-left"></i>
                        <span>Back</span></a>
                </div>


                <div class="prod-info ">


                    <img src="{{ $products->image_path != null ? asset('/images/productImages/' . $products->image_path) : asset('/images/logo.png') }}"
                        alt="Product_image" class="img-in-card {{ $products->status == 1 ? 'overlay' : '' }}">
                    <div>
                        <p>Generic Name: <b>{{ $products->generic_name }}</b></p>
                        <p>Brand Name: <b>{{ $products->brand_name }}</b></p>
                        <p>Package Style: <b>{{ $products->product_form }}</b></p>
                        <p>Market Price: <b>&#8369;{{ $products->market_price }}</b></p>
                        @if ($products->status == 1)
                            <h5 style="color: red;">OUT OF STOCK!</h5>
                        @endif

                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#delete{{ $products->product_ID }}">
                            Delete Product

                        </button>

                        <!-- Delete Modal HTML -->
                        <div class="modal fade" id="delete{{ $products->product_ID }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-confirm">
                                <div class="modal-content">
                                    <div class="modal-header flex-column">
                                        <div class="icon-box">
                                            <i class="material-icons">&#xE5CD;</i>
                                        </div>
                                        <h4 class="modal-title w-100">Are you sure?</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Do you really want to delete these records? This process cannot be undone.
                                        </p>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                        <form action="{{ route('products.destroy', $products->product_ID) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>



            </div>
        </div>
        {{-- <x-layouts.rightnav /> --}}
    </div>
    <x-navigations.sidenav />
</x-main>
