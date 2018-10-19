
@extends('partials.template')

@section('page_data')
<section class="page">
    <div class="bdcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">
                        PRICING STRUCTURE
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="grid-row">
                        <div class="grid-item item1 text-center">
                            <img src="{{asset('img/ico01.png')}}" alt="" class="img-fluid">
                            <h1 class="text-left">CONSULTING</h1>
                            <ul class="list-unstyled text-left">
                                <li><i class="fa fa-caret-right"></i> The Price will depend on the problem to be solved. The charges for Consultancy is per problem to be solved and not for multiple problems</li>
                                <li><i class="fa fa-caret-right"></i> A minor problem to be solved will cost $199.00 per hour. The total hours it will take to solve the problem will be calculated and the client advised so that they can multiply the hours by the price and pay online.</li>
                                <li><i class="fa fa-caret-right"></i> A more complex problem will cost $299.00 per hour. The total hours it will take to solve the problem will be calculated and client advised so that they can multiply the hours by the price and pay online.</li>
                                <li><i class="fa fa-caret-right"></i> A minimum of 10 hours is required for an order for the consulting.</li>
                            </ul>
                        </div>
                        <div class="grid-item item2 text-center">
                            <img src="{{asset('img/ico02.png')}}" alt="" class="img-fluid">
                            <h1 class="text-left">Company Screening</h1>
                            <p>The charge for this service is per one screening for one company and not for multiple companies.</p>
                            <ul class="list-unstyled text-left">
                                <li><i class="fa fa-caret-right"></i> A simple company screening will cost $199.00</li>
                                <li><i class="fa fa-caret-right"></i> A more complex company screening will cost $299.00</li>
                                <li><i class="fa fa-caret-right"></i> A 12 month order is required to get the 5 % monthly discount offered</li>
                            </ul>
                        </div>
                        <div class="grid-item item3 text-center">
                            <img src="{{asset('img/ico03.png')}}" alt="" class="img-fluid">
                            <h1 class="text-left">Applicant And Employee Screening</h1>
                            <p>The charge for this service is per one screening for one person and not for multiple persons.</p>
                            <ul class="list-unstyled text-left">
                                <li><i class="fa fa-caret-right"></i> A simple screening will cost $199.00</li>
                                <li><i class="fa fa-caret-right"></i> A more complex screening will cost $299.00</li>
                                <li><i class="fa fa-caret-right"></i> A 12 month order is required to get the 5 % monthly discount offered</li>
                            </ul>
                        </div>
                        <div class="grid-item item4 text-center">
                            <img src="{{asset('img/ico04.png')}}" alt="" class="img-fluid">
                            <h1 class="text-left">Identity Verification And Validation</h1>
                            <p>The charge for the service is per one identity report and not for multiple reports.</p>
                            <ul class="list-unstyled text-left">
                                <li><i class="fa fa-caret-right"></i> It will cost $99.00 for a minor identity verification and validation report.</li>
                                <li><i class="fa fa-caret-right"></i> A more complex identity verification and validation report will cost $199.00</li>
                                <li><i class="fa fa-caret-right"></i> A 12 month order is required to get the 5 % monthly discount offered</li>
                            </ul>
                        </div>
                        <div class="grid-item item5 text-center">
                            <img src="{{asset('img/ico05.png')}}" alt="" class="img-fluid">
                            <h1 class="text-left">Document And Record Authentication</h1>
                            <p>The charge for this service is per one report and not for multiple reports.</p>
                            <ul class="list-unstyled text-left">
                                <li><i class="fa fa-caret-right"></i> It will cost $199.00 for a minor report</li>
                                <li><i class="fa fa-caret-right"></i> A more complex document and record authentication report will cost $299.00</li>
                                <li><i class="fa fa-caret-right"></i> A 12 month order is required to get the 5 % monthly discount offered</li>
                            </ul>
                        </div>
                        <div class="grid-item item6 text-center">
                            <img src="{{asset('img/ico06.png')}}" alt="" class="img-fluid">
                            <h1 class="text-left">Credit Rating, Scores And Worthiness For The Emerging Economies And Third World Countries.</h1>
                            <p>The charge for this services is per person or company and not for multiple companies.</p>
                            <ul class="list-unstyled text-left">
                                <li><i class="fa fa-caret-right"></i> The pricing will be dependent on the long term contract agreement</li>
                                <li><i class="fa fa-caret-right"></i> A one time report will cost $49.00</li>
                                <li><i class="fa fa-caret-right"></i> A monthly long term reports will cost $29.00 per month. A minimum of 12 months subscription is required.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
