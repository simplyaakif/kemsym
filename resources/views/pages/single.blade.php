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
          
            <fe-product
            :siteurl="'{{@url('/')}}'"
            :product="{{$product}}"
            :productprice="{{$product->productprice}}"
            :productpricemax="{{$product->productprice->max('product_price')}}"
            :productpricemin="{{$product->productprice->min('product_price')}}"
            
            ></fe-product>
            
        </div>
</section>
@endsection


@section('scripts')
    <script>
    </script>    
@endsection