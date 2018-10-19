
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
                    <h2 class="h2  text-uppercase mb1">{{Auth::user()->name}}</h2>
                    <?php $user = Auth::user() ?>
                    <?php $userdetails = $user->userdata ?>

                    <fe-dashboard
                    :userdata="{{ json_encode($user) }}"
                    :userdetails = " {{ json_encode($userdetails) }} "
                    {{--  :userOrders=" {{ }} "  --}}
                    ></fe-dashboard>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
