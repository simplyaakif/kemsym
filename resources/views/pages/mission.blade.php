@extends('partials.template')

@section('page_data')
<section class="page">
    <div class="bdcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center text-uppercase">
                        MISSION
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-details">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center">
                    <img class="img-fluid" src="{{URL::asset('img/mission.png')}}" alt="" srcset="">
                </div>
                <div class="col-md-6">
                    <h2>OUR MISSION</h2>
                    <p>Our Mission is to offer Superb verification and validation services to our clients in the global Business Community.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection