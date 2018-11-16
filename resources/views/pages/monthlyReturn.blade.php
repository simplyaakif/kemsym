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
                <div class="col-md-12">
                    <p class="text-center">
                        Congratulations your billing plan has been created.
                    </p>
                </div>
                
            </div>
            <!-- <monthly-return-details
                :paypal_id={{$ag_id}}
            >

            </monthly-return-details> -->

            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="{{ route('profile') }}" class="btn btn-pr">Go to Profile</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection