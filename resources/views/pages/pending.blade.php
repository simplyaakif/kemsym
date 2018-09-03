
@extends('partials.template')

@section('page_data')
<section id="" class="page">
    <div class="bdcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center text-uppercase">
                        {{$title}}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="h5 text-center text-uppercase af-c">Application in Review</h5>
                    <p class="text-center">Your registration is currently being processed by our staff. It usually takes between 24-48 hours before you will be able to use our services.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
