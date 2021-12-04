<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use smasif\ShurjopayLaravelPackage\ShurjopayService;

use Illuminate\Support\Facades\Session;
use App\Models\CompanyProfile;
class SpaymentController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    


    // public function paymentsuccess()
    // {

    //     return view('shurjopayment.pages.paymentsuccess');
    // }



    public function post(Request $request)
    {
        $shurjopay_service = new ShurjopayService(); //Initiate the object
        $company = CompanyProfile::orderBy('created_at','DESC')->first();
        $tx_id = $shurjopay_service->generateTxId(); // Get transaction id. You can use custom id like: $shurjopay_service->generateTxId('123456');
        $amount = $request->pamount;
        $success_route = route('order_confirmed'); // optional.
        $data=array(
	    'custom1'=>$company->company_name,
	    'custom2'=>$company->email,
	    'custom3'=>$company->name,
	    'custom4'=>$company->phone,
	    'is_emi'=>0 //0 No EMI 1 EMI active
);
        //success
        //$shurjopay_service->sendPayment(2, $success_route); // You can call simply $shurjopay_service->sendPayment(2) without success route
        $shurjopay_service->sendPayment($amount); // You can call simply $shurjopay_service->sendPayment(2) without success route
    }
}
