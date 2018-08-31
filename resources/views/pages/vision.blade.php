@extends('partials.template')

@section('page_data')
<section class="page">
    <div class="bdcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center text-uppercase">
                        vision
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-details">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center">
                    <img class="img-fluid" src="{{URL::asset('img/vision.jpg')}}" alt="" srcset="">
                </div>
                <div class="col-md-6">
                    <h2 class="text-uppercase">OUR vision</h2>
                    <p>Our Vision is to offer unique products and services that adds value to Businesses, Public institutions and Governmental agencies in the Global Community.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection