@extends('partials.template')

@section('page_data')
<section class="page">
    <div class="bdcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center text-uppercase">
                        Billing Plan Details
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="af-c">{{ $product->product_name }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-2"></div>
                <div class="col-md-8">
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title"><strong>Problem Type</strong></h4>
                            <p class="card-text">{{ $price->product_pricetype }}</p>
                            <hr>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title"><strong>Price per Month</strong></h4>
                            <p class="card-text">${{ $price->product_price }}</p>
                            <hr>
                        </div>
                        <div class="col-md-6">
                                <h4 class="card-title"><strong>Product/Service Recurring payment for</strong></h4>
                                <p class="card-text">12 Months</p>
                                <hr>
                        </div>
                    </div>
                    
                    <bill-plan
                    :paymentid={{$price->id}}
                    ></bill-plan>
                    {{-- <a href="#" class="btn btn-pr">CREATE PLAN</a> --}}
                </div>
                
            </div>
        </div>
    </div>
</section>
@endsection