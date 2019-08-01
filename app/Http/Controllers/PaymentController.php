<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Api\Item;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use PayPal\Api\WebProfile;
use PayPal\Api\InputFields;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use Auth;
use App\User;
use App\OldOrder;
use App\OldProduct;

class PaymentController extends Controller
{
    public function createPayment($id){
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AT9v3GqqnPIL3fqly8YOafpk-eO1ZSNWPhpVWJzvDIUU57-KwVORepUnClPldbyWsHa8K7sapgH2e8GX',     // ClientID
                'EMK17GEwSIfX5rqQzlYJrmadQj7sXTk-kkJnK3xSFy49vNSBCO1jhpKtzl4euyHPd5hY0g8nLfWPx2Al'      // ClientSecret
            )
        );
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        $user = User::find($id);
        $total = 0;
        foreach($user->cart as $key=>$product){
            $item[$key] = new Item();
            $item[$key]->setName($product->product->name)
                ->setCurrency('USD')
                ->setQuantity($product->quantity)
                ->setSku("123123")
                ->setPrice($product->product->price / 4);
            $total += $product->product->price * $product->quantity/4;
        }
    
        $itemList = new ItemList();
        $itemList->setItems($item);
    
        $details = new Details();
        $details->setShipping(3.2)
            ->setTax(0.0)
            ->setSubtotal($total);
    
        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal($total + 3.2)
            ->setDetails($details);
    
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());
    
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("https://www.beescanner.ro")
            ->setCancelUrl("https://www.beescanner.ro");
    
        // Add NO SHIPPING OPTION
        $inputFields = new InputFields();
        $inputFields->setNoShipping(1);
    
        $webProfile = new WebProfile();
        $webProfile->setName('test' . uniqid())->setInputFields($inputFields);
    
        $webProfileId = $webProfile->create($apiContext)->getId();
    
        $payment = new Payment();
        $payment->setExperienceProfileId($webProfileId); // no shipping
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
    
        try {
            $payment->create($apiContext);
        } catch (Exception $ex) {
            echo $ex;
            exit(1);
        }
    
        return $payment;
    }

    public function executePayment(Request $request, $id){
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AT9v3GqqnPIL3fqly8YOafpk-eO1ZSNWPhpVWJzvDIUU57-KwVORepUnClPldbyWsHa8K7sapgH2e8GX',     // ClientID
                'EMK17GEwSIfX5rqQzlYJrmadQj7sXTk-kkJnK3xSFy49vNSBCO1jhpKtzl4euyHPd5hY0g8nLfWPx2Al'      // ClientSecret
            )
        );
    
        $paymentId = $request->paymentID;
        $payment = Payment::get($paymentId, $apiContext);
    
        $execution = new PaymentExecution();
        $execution->setPayerId($request->payerID);
    
        try {
            $result = $payment->execute($execution, $apiContext);
        } catch (Exception $ex) {
            echo $ex;
            exit(1);
        }
    
        $user = User::find($id);
        $command = new OldOrder;
        $command->user_id = $user->id;
        $command->save();

        foreach($user->cart as $product){

            $old = new OldProduct;
            $old->product_id = $product->id;
            $old->order_id = $command->id;
            $old->save();
            $product->delete();

        }

        return $result;
    }
}
