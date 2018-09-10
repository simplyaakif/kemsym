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
                    <div class="col-md-6 text-center">
                        <img src="{{asset($product->img_path)}}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h2>{{$product->product_name}}</h2>
                        <p>${{$product->price}}</p>
                        
                        <a href="{{route('product.addToCart',['id'=>$product->id])}}" class="btn-pr">Add to Cart</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <br><br>
                        <h3 class="h5 af-l ">Description</h3>
                        {{$product->product_description}}
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection