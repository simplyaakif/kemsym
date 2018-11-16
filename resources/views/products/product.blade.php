@extends('partials.template')

@section('page_data')
<section class="page">
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

                <div class="offset-md-2"></div>
                <div class="col-md-8">
                    <p class="text-center">
                        {{$content}}
                    </p>
                </div>

            </div>
        </div>
    </div>

</section>
@endsection