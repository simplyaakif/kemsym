@extends('partials.template')

@section('page_data')
<section class="page">
    <div class="bdcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center text-uppercase">
                        Checkout
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-details">
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                        <h3 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Billing address</span>
                            </h3>
                            <hr>
                        <form class="needs-validation" novalidate="">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">First name</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="" value="Lorem" required="">
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Last name</label>
                                    <input type="text" class="form-control" id="lastName" placeholder="" value="Ipsum" required="">
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="username">Username</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span style="font-size: 1.6rem;" class="input-group-text">@</span>
                                    </div>
                                    <input type="text" class="form-control" id="username" value="myemailuser" placeholder="Username" required="">
                                    <div class="invalid-feedback" style="width: 100%;">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email">Email
                                    <span class="text-muted">(Optional)</span>
                                </label>
                                <input type="email" class="form-control" id="email" value="myemail@address.com" placeholder="you@example.com">
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="1234 Main St" value="lorem ipsum dolor seit" required="">
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address2">Address 2
                                    <span class="text-muted">(Optional)</span>
                                </label>
                                <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                            </div>

                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <label for="country">Country</label>
                                    <select disabled class="custom-select d-block w-100" id="country" required="">
                                        <option value="">Choose...</option>
                                        <option selected> United States</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid country.
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="state">State</label>
                                    <select disabled class="custom-select d-block w-100" id="state" required="">
                                        <option value="">Choose...</option>
                                        <option selected >California</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="zip">Zip</label>
                                    <input disabled value="90001" type="text" class="form-control" id="zip" placeholder="" required="">
                                    <div class="invalid-feedback">
                                        Zip code required.
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <div class="custom-contro custom-checkbox">
                                <input type="checkbox" class="custom-contro-input" id="same-address">
                                <label class="custom-contro-label" for="same-address">Shipping address is the same as my billing address</label>
                            </div>
                            <div class="custom-contro custom-checkbox">
                                <input type="checkbox" class="custom-contro-input" id="save-info">
                                <label class="custom-contro-label" for="save-info">Save this information for next time</label>
                            </div>
                            
                            
                            
                        </form>
                        

                           
                </div>

                <div class="col-md-4">
                        
                    @if($products)
            <div class="row">
                <div class="col-12">
                        <h3 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Your cart</span>
                                <span class="badge badge-secondary badge-pill"> <?php echo count($products) ?> </span>
                            </h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-mid">
                            <thead>
                                <tr>
                                    <th scope="col"> </th>
                                    <th scope="col">Product</th>
                                    <th scope="col" class="text-right">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach($products as $product)
                                <tr>
                                    <td><img width="60" class="img-fluid" src="{{$product['item']['img_path']}}" /> </td>
                                    <td class="my-auto">
                                        <h4>{{$product['item']['product_name']}} x {{$product['qty']}}</h4>
                                        <h5>{{$product['pricetype']}}</h5>
                                    </td>
                                    <td class="text-right">${{$product['singleprice']}}</td>
                                    
                                </tr>
                                    @endforeach
                                
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td colspan="2" class="text-right"><strong>$ {{$totalPrice}}</strong></td>
                                </tr>
                            </tbody>
                        </table>
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


            <fe-checkout
                                :products="{{ json_encode($products) }}"
                            >
                            </fe-checkout>
                </div>
                
            </div>
        </div>
    </div>

</section>
@endsection