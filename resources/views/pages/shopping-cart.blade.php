@extends('partials.template')

@section('page_data')
<section class="page">
    <div class="bdcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center text-uppercase">
                        CART
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-details">
    </div>


    <div class="container mb-4">

    @if($vProducts)


    <v-cart
    :siteurl="'{{@url('/')}}'"
    :products = "{{ json_encode($vProducts) }}"
    :totals = "{{ json_encode($totalPrice) }}"
    ></v-cart>

    @else
    <div class="row text-center">
        <div class="col-md-12">
            <h1 class="text-center text-uppercase">
                Cart is Empty
            </h1>
        </div>
    </div>
    @endif

</div>

    
</section>


@endsection