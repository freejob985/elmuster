<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class ZainCashController extends Controller
{
    public function index()
    {
        if(Session::get('payment_data')['payment_type'] == 'package_payment'){
            $type = 'package_payment';
            $amount = Session::get('payment_data')['amount'];
            $description = 'Payment for package';
        }
        elseif (Session::get('payment_data')['payment_type']  == 'milestone_payment') {
            $type = 'milestone_payment';
            $amount = Session::get('payment_data')['amount'];
            $description = 'Payment for milestone';
        }
        elseif (Session::get('payment_data')['payment_type'] == 'service_payment') {
            $type = 'service_payment';
            $amount = Session::get('payment_data')['amount'];
            $description = 'Payment for purchasing Freelancer Package';
        }
        $amount = round(($amount * 1470),2);
        try {
            $zc = new \ZainCashIQ\ZainCash([
                'msisdn' => env('ZC_MSISDN'),
                'secret' => env('ZC_SECRET'),
                'merchantid'=> env('ZC_MERCHANTID'),
                'production_cred'=> env('ZC_ENV_PRODUCTION'),
                'language'=>'ar', // 'en' or 'ar'
                'redirection_url'=> route('zaincash.check')

            ]);
            $zc->charge(
                $amount,
                $description,
                json_encode(session()->get('payment_data'))

            );

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function CheckPayment(Request $request)
    {

        if ($request->has('token')) {
            $token = $request->token;
            $zc = new \ZainCashIQ\ZainCash([
                'msisdn' => env('ZC_MSISDN'),
                'secret' => env('ZC_SECRET'),
                'merchantid'=> env('ZC_MERCHANTID'),
                'production_cred'=> env('ZC_ENV_PRODUCTION'),
                'language'=>'ar', // 'en' or 'ar'
                'redirection_url'=> route('zaincash.check')

            ]);
            $rus = $zc->decode($token);
            if ($rus['status'] == 'success') {
            $data = json_decode($rus['orderid'],true);

                $payment = json_encode(['id' => $rus['id']]);
                if($data['payment_type'] == 'package_payment'){

                    $package_payment = new PackagePaymentController;
                    return $package_payment->package_payment_done($data, $payment);
                }
                elseif ($data['payment_type'] == 'milestone_payment') {
                    $milestone_payment = new MilestonePaymentController;
                    return $milestone_payment->milestone_payment_done($data, $payment);
                }
                elseif ($data['payment_type'] == 'service_payment') {
                    $package_payment = new ServicePaymentController;
                    return $package_payment->service_package_payment_done($data, json_encode($payment));
                }
            }
        }
        flash(__('Payment cancelled'))->success();
        return redirect()->route('dashboard');
    }
}
