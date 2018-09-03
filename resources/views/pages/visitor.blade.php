
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
                    <h2 class="h2  text-uppercase ">{{Auth::user()->name}}</h2>
                    <p class="">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic neque eaque fuga deleniti soluta temporibus, ipsam sapiente animi, culpa ab tempora dolorum fugit corrupti eveniet nisi est, nobis quibusdam mollitia eos ullam. Libero quae consectetur magni voluptatum qui vero saepe ipsum a dicta, voluptates reiciendis velit iste? Praesentium voluptatibus molestias hic illum labore architecto, modi repellat omnis repudiandae reprehenderit quasi suscipit eum doloribus alias quo perferendis, atque accusamus expedita. Voluptatum vitae ipsum quis sit alias molestiae earum corrupti quisquam et.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
