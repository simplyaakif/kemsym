<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Used to process plans
use PayPal\Api\ChargeModel;
use PayPal\Api\Currency;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\Plan;
use PayPal\Api\Patch;
use PayPal\Api\PatchRequest;
use PayPal\Common\PayPalModel;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\ShippingAddress;
use App\ProductsPrice;
use App\Products;
use App\Subscriptions;
use Auth;

class BillPlanController extends Controller
{
    private $apiContext;
    private $mode;
    private $client_id;
    private $secret;
    
    // Create a new instance with our paypal credentials
    public function __construct()
    {
        // Detect if we are running in live mode or sandbox
        if(config('paypal.settings.mode') == 'live'){
            $this->client_id = config('paypal.live_client_id');
            $this->secret = config('paypal.live_secret');
            $this->plan_id = env('PAYPAL_LIVE_PLAN_ID', '');
        } else {
            $this->client_id = config('paypal.sandbox_client_id');
            $this->secret = config('paypal.sandbox_secret');
            $this->plan_id = env('PAYPAL_SANDBOX_PLAN_ID', '');
        }
        
        // Set the Paypal API Context/Credentials
        $this->apiContext = new ApiContext(new OAuthTokenCredential($this->client_id, $this->secret));
        $this->apiContext->setConfig(config('paypal.settings'));
    }

    public function create_plan(Request $request){

        // Create a new billing plan

        $plans_id = $request->plans_id;

        $price = ProductsPrice::find($plans_id);
        $product = Products::find($price->product_id);

        $desc = $product->product_name . '-'. $price->product_pricetype;

        $plan = new Plan();
        $plan->setName($product->product_name)
        ->setDescription($price->product_pricetype)
        ->setType('fixed');

        // Set billing plan definitions
        $paymentDefinition = new PaymentDefinition();
        $paymentDefinition->setName('Regular Payments')
        ->setType('REGULAR')
        ->setFrequency('Month')
        ->setFrequencyInterval('1')
        ->setCycles('12') //ChangeableAttribute CYCLES, VALUE, CURRENCY
        ->setAmount(new Currency(array('value' => $price->product_price, 'currency' => 'USD')));
        
        // Set charge models
        $chargeModel = new ChargeModel();
        $chargeModel->setType('SHIPPING')
        ->setAmount(new Currency(array('value' => 0, 'currency' => 'USD')));
        $paymentDefinition->setChargeModels(array($chargeModel));
        
        // Set merchant preferences
        $merchantPreferences = new MerchantPreferences();
        $merchantPreferences->setReturnUrl(url("/subscribe/paypal/return"))
        ->setCancelUrl(url("/cancel"))
        ->setAutoBillAmount('yes')
        ->setInitialFailAmountAction('CONTINUE')
        ->setMaxFailAttempts('0')
        ->setSetupFee(new Currency(array('value' => 0, 'currency' => 'USD')));
        
        $plan->setPaymentDefinitions(array($paymentDefinition));
        $plan->setMerchantPreferences($merchantPreferences);
        
        //create plan
        try {

            $createdPlan = $plan->create($this->apiContext);
            // dd($createdPlan);
        
            try {
            $patch = new Patch();
            $value = new PayPalModel('{"state":"ACTIVE"}');
            $patch->setOp('replace')
                ->setPath('/')
                ->setValue($value);
            $patchRequest = new PatchRequest();
            $patchRequest->addPatch($patch);
            $createdPlan->update($patchRequest, $this->apiContext);
            $plan = Plan::get($createdPlan->getId(), $this->apiContext);
        
            // Output plan id
            echo $plan->getId();

            } catch (PayPal\Exception\PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
            } catch (Exception $ex) {
            die($ex);
            }
        } catch (PayPal\Exception\PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
        } catch (Exception $ex) {
            die($ex);
        }

    }

    public function paypalRedirect(Request $request){

        
        // var_dump($payment_id);
        // die();
        // Create new agreement

        $payment_id = $request->payment_id;

        $plans_id = $request->plans_id;
        $price = ProductsPrice::find($plans_id);
        
        $product = Products::find($price->product_id);


        $agreement = new Agreement();
        $agreement->setName($product->product_name)
          ->setDescription($price->product_pricetype)
          ->setStartDate(\Carbon\Carbon::now()->addMinutes(1)->toIso8601String());

        // Set plan id
        $plan = new Plan();

        // Changeable Plan ID 
        // $plan->setId($this->plan_id);
        $plan->setId($payment_id);
        $agreement->setPlan($plan);

        // Add payer type
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $agreement->setPayer($payer);


        // // Adding shipping details
        // $shippingAddress = new ShippingAddress();
        // $shippingAddress->setLine1('111 First Street')
        // ->setCity('Saratoga')
        // ->setState('CA')
        // ->setPostalCode('95070')
        // ->setCountryCode('US');
        // $agreement->setShippingAddress($shippingAddress);

        try {
          // Create agreement

          
          $agreement = $agreement->create($this->apiContext);

          // Extract approval URL to redirect user
          $approvalUrl = $agreement->getApprovalLink();

          return redirect($approvalUrl);

        } catch (PayPal\Exception\PayPalConnectionException $ex) {
          echo $ex->getCode();
          echo $ex->getData();
          die($ex);
        } catch (Exception $ex) {
          die($ex);
        }
    }

    public function paypalReturn(Request $request){

        $token = $request->token;

        // var_dump($token);
        // die();


        $agreement = new \PayPal\Api\Agreement();

        try {
            // Execute agreement
            $result = $agreement->execute($token, $this->apiContext);
            $user = Auth::user();

            $sub = new Subscriptions;
            $sub->user_id = $user->id;
            if(isset($result->id)){
                $sub->paypal_billing_plan_id = $result->id;
            }
            $sub->save();
            
            return view('pages.monthlyReturn')->with('ag_id',$result->id)->with('title','Billing Plan Completed');

        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            echo 'You have either cancelled the request or your session has expired';
        }
    }

    public function agreementDetails (Request $request){

        $createdAgreement = $request->ag_id;


        try {
            $agreement = Agreement::get($createdAgreement, $this->apiContext);
        } catch (Exception $ex) {
            // ResultPrinter::printError("Retrieved an Agreement", "Agreement", $agreement->getId(), $createdAgreement->getId(), $ex);
            // exit(1);
            echo 'You have either cancelled the request or your session has expired';
        }
        // ResultPrinter::printResult("Retrieved an Agreement", "Agreement", $agreement->getId(), $createdAgreement->getId(), $agreement);

        return $agreement;

    }


    public function agDetails (Request $request){

        $agreementAr = $request->json();
        
        $agData = array();
        
        foreach($agreementAr as $ag){
            try {
                $agreement = Agreement::get($ag['paypal_billing_plan_id'], $this->apiContext);
            } catch (Exception $ex) {
                // ResultPrinter::printError("Retrieved an Agreement", "Agreement", $agreement->getId(), $createdAgreement->getId(), $ex);
                // exit(1);
                echo 'You have either cancelled the request or your session has expired';
            }
            $details = json_encode($agreement);
            array_push($agData,$details);
        }

        // dd($agData);

        return $agData;
    }
    
}
