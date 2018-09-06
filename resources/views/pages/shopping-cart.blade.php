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
        @if($products)
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"> </th>
                                    <th scope="col">Product</th>
                                    <th scope="col" class="text-center">Quantity</th>
                                    <th scope="col" class="text-right">Single Price</th>
                                    <th scope="col" class="text-right">Total Price</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($products as $product)
                                <tr>
                                    <td><img width="60" class="img-fluid" src="{{$product['item']['img_path']}}" /> </td>
                                    <td>{{$product['item']['product_name']}}</td>
                                    {{-- <td><input class="form-control" type="text" value="{{$product['qty']}}" /></td> --}}
                                    <td class="text-right">{{$product['qty']}}</td>
                                    <td class="text-right">${{$product['item']['price']}}</td>
                                    <td class="text-right">${{$product['price']}}</td>
                                    <td class="text-right"><button class="btn btn-sm btn-danger">
                                        <a style="color:inherit" href="{{route('product.remove',['id'=>$product['item']['id']])}}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                     </button> </td>
                                </tr>
                                    @endforeach
                                
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Total</strong></td>
                                    <td class="text-right"><strong>$ {{$totalPrice}}</strong></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col mb-2">
                    <div class="row">
                        <div class="col-sm-12  col-md-3 offset-md-6">
                            <button class="btn btn-block btn-dark">Continue Shopping</button>
                        </div>
                        <div class="col-sm-12 col-md-3 text-right">
                            <button class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
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