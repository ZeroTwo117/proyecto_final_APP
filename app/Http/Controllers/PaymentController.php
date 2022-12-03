<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;
use App\Models\Ventas;

class PaymentController extends Controller
{
    private $apiContext;

    public function __construct(){
        $payPalConfig = Config::get('paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['client_id'],
                $payPalConfig['secret'],
            )

            );
        
        $this->apiContext->setConfig(
            array(
                'mode'=>'LIVE',
                'log.LogEnabled'=>true,
                'log.FileName'=>'../PayPal.log',
                'log.LogLevel'=>'INFO',
            )
            );

    }

    public function payWithPayPal($id, $desc, $id2){
        
        $payer = new Payer(); 
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal($id);
        $amount->setCurrency('MXN');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription($desc);

        $callbackUrl = url('status', $id2);

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callbackUrl)->setCancelUrl($callbackUrl);

        $payment = new Payment();
        $payment->setIntent('sale')
        ->setPayer($payer)
        ->setTransactions(array($transaction))
        ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            //echo $payment;

            return redirect()->away($payment->getApprovalLink());
        }
        catch (\PayPal\Exception\PayPalConnectionException $ex){
            echo $ex->getData();

        }
    }

    public function payPalStatus(Request $request,Ventas $id2){
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            $status2 = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
            return redirect('perfil')->with(compact('status2'));
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);
        
        if ($result->getState() === 'approved') {
            //borra la venta de la seccion mis productos
            //$id2 = Ventas::find($id2);
            //$id2->delete();

            $query = Ventas::find($id2->id);
    
            $query->adquirido = 'si';
           
    
            $query -> save();

            $status3 = 'Su pago se ha realizado de manera exitosa!!';
            return redirect('perfil')->with(compact('status3'));
        }

        $status2 = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
        return redirect('perfil')->with(compact('status2'));
    }
    }

