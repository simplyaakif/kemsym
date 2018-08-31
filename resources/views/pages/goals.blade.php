
@extends('partials.template')

@section('page_data')
<section class="page">
    <div class="bdcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">
                        GOALS
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-details">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center">
                    <img class="img-fluid" src="{{URL::asset('img/goal-1.png')}}" alt="" srcset="">
                </div>
                <div class="col-md-6">
                    <h2>OUR GOALS</h2>
                    <p>To offer an Online Web Solution services to diverse Clients and stakeholders who will need these services and make it easier for Governmental agencies, financial institutions and other institutions to verify, validate and authenticate their clients identities and documents in order to offer services to them.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
