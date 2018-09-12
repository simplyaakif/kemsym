@extends('partials.template')

@section('page_data')
<section class="page">
    <div class="bdcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center text-uppercase">
                        COST
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-details">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h5 class="h5 af-c text-uppercase">Services</h5>
                        @foreach ($products->chunk(3) as $productChunk)
                        <div class="row">
                            @foreach ($productChunk as $product)
                            <div class="col-md-4">
                                <div class="text-center product">
                                    <img src="{{asset($product->img_path)}}" alt="" class="img-fluid">
                                    <h3 class="h3-product">{{$product->product_name}}</h3>
                                    <p class="h3-price">${{$product->productprice->min('product_price')}} - ${{$product->productprice->max('product_price')}}</p>
                                    <p class="product_description">{{$product->product_subHeading}}</p>
                                    <a class="btn-price" href="{{route('product.singleProduct',['id'=>$product->id])}}">Select Options</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection