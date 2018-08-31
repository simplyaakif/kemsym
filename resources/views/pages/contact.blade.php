
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
                <div class="col-md-6 text-center">
                    <h2 class="text-left ">GET IN TOUCH</h2>
                    <img class="img-fluid" src="{{URL::asset('img/ci.png')}}" alt="" srcset=""> 

                    <contact-form></contact-form>
                </div>
                <div class="col-md-6">
                    <h2>OUR OFFICE</h2>
                    <p>Our business accounting packages are tailored to suit your individual financial requirements and unique business needs.
                    </p>
                    <h3><strong>Contact us today to discuss how we can help you.</strong></h3>
                    <ul class="list-inline">
                        <li>25 Glenn Hawthorne Blvd Mississauga, On tario Canada L5R 3E6</li>
                        <li>Email : <a href="mailto:bismarckansong@kemmetsystems.com">Bismarckansong@kemmetsystems.com</a></li>
                        <li>Phone : <a href="tel:+1-647-716-5476">1-647-716-5476</a></li>
                        <li>Web : <a href="http://www.kemmetsystems.com">www.kemmetsystems.com</a></li>
                    </ul>
                    <br>
                    
                    
                    <iframe style="border: 1px solid #ccc; padding: 5px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2888.7010261429223!2d-79.66411708483551!3d43.612766279122745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882b40b9e80e12e7%3A0x12f64fa5d8bcaf30!2s25+Glenn+Hawthorne+Blvd%2C+Mississauga%2C+ON+L5R+3E6%2C+Canada!5e0!3m2!1sen!2sin!4v1529576084030" width="100%" height="445" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
