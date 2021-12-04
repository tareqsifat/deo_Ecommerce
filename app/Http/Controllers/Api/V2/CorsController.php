<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CombinedOrder;

class CorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CombinedOrder $c_order)
    {
        $order=Order::all();
        $shipping_address=json_decode($c_order->shipping_adderss);
        
        
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://sandbox.paperflybd.com/OrderPlacement',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{ 
            "merOrderRef":"testRef6", 
            "pickMerchantName":"test", 
            "pickMerchantAddress":"test", 
            "pickMerchantThana":"Dhanmondi", 
            "pickMerchantDistrict":"Dhaka", 
            "pickupMerchantPhone":"017xxxxx", 
            "productSizeWeight":"standard", 
            "productBrief":"USB Fan", 
            "packagePrice":"0", 
            "deliveryOption":"regular", 
            "custname":"$c_order->order->user->name",
            "custaddress":"$shipping_address->address",
            "customerThana":"$shipping_address->address", 
            "customerDistrict":"$shipping_address->city", 
            "custPhone":"$shipping_address->phone"
        }',
          CURLOPT_HTTPHEADER => array(
            'paperflykey: Paperfly_~La?Rj73FcLm'
          ),
        ));
        
        $response = curl_exec($curl);

curl_close($curl);
echo $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
