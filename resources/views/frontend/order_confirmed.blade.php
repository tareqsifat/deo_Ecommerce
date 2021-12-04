@extends('frontend.layouts.app')

@section('content')
    <section class="pt-5 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <div class="row aiz-steps arrow-divider">
                        <div class="col done">
                            <div class="text-center text-success">
                                <i class="la-3x mb-2 las la-shopping-cart"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block">{{ translate('1. My Cart')}}</h3>
                            </div>
                        </div>
                        <div class="col done">
                            <div class="text-center text-success">
                                <i class="la-3x mb-2 las la-map"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block">{{ translate('2. Shipping info')}}</h3>
                            </div>
                        </div>
                        <div class="col done">
                            <div class="text-center text-success">
                                <i class="la-3x mb-2 las la-truck"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block">{{ translate('3. Delivery info')}}</h3>
                            </div>
                        </div>
                        <div class="col done">
                            <div class="text-center text-success">
                                <i class="la-3x mb-2 las la-credit-card"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block">{{ translate('4. Payment')}}</h3>
                            </div>
                        </div>
                        <div class="col active">
                            <div class="text-center text-primary">
                                <i class="la-3x mb-2 las la-check-circle"></i>
                                <h3 class="fs-14 fw-600 d-none d-lg-block">{{ translate('5. Confirmation')}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-4">
        <div class="container text-left">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                     @foreach ($combined_order->orders as $order)
                        <div class="card shadow-sm border-0 rounded">
                            <div class="card-body">
                                <div class="text-center py-4">
                                    <!--<h2 class="h5">{{ translate('Order Code:')}} <span class="fw-700 text-primary">{{ $order->code }}</span></h2>-->
                                    <span style="font-size:20px">{{ translate('Order Code:')}} </span><span style="font-size:20px" class="fw-700 text-primary">{{ $order->code }}</span><span class="pull-right float-right">{{ date('d-m-Y', $order->date) }}</span>
                                </div>
                                <section class="mb-4">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xl-8 mx-auto">
                                                <div class="row aiz-steps arrow-divider">
                                                    <div class="col done">
                                                        <div class="text-center text-success">
                                                            <i class="la-3x mb-2 las la-shopping-cart"></i>
                                                            <h3 class="fs-14 fw-600 d-none d-lg-block">{{ translate('1. My Cart')}}</h3>
                                                        </div>
                                                    </div>
                                                    <div class="col done">
                                                        <div class="text-center text-success">
                                                            <i class="la-3x mb-2 las la-map"></i>
                                                            <h3 class="fs-14 fw-600 d-none d-lg-block">{{ translate('2. Shipping info')}}</h3>
                                                        </div>
                                                    </div>
                                                    <div class="col done">
                                                        <div class="text-center text-success">
                                                            <i class="la-3x mb-2 las la-truck"></i>
                                                            <h3 class="fs-14 fw-600 d-none d-lg-block">{{ translate('3. Delivery info')}}</h3>
                                                        </div>
                                                    </div>
                                                    <div class="col done">
                                                        <div class="text-center text-success">
                                                            <i class="la-3x mb-2 las la-credit-card"></i>
                                                            <h3 class="fs-14 fw-600 d-none d-lg-block">{{ translate('4. Payment')}}</h3>
                                                        </div>
                                                    </div>
                                                    <div class="col active">
                                                        <div class="text-center text-primary">
                                                            <i class="la-3x mb-2 las la-check-circle"></i>
                                                            <h3 class="fs-14 fw-600 d-none d-lg-block">{{ translate('5. Confirmation')}}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <div>
                                    <h5 class="fw-600 mb-3 fs-17 pb-2">{{ translate('Order Details')}}</h5>
                                    <div>
                                        <!--@foreach($order->orderDetails as $orderDetail)-->
                                        <!--    <p>{{ $orderDetail->product->name }}</p>-->
                                        <!--@endforeach-->
                                        <!--<p>{{$order->user->name}}</p>-->
                                        <table class="table table-responsive-md">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th width="30%">{{ translate('Product')}}</th>
                                                    <th>{{ translate('Variation')}}</th>
                                                    <th>{{ translate('Quantity')}}</th>
                                                    <th>{{ translate('Delivery Type')}}</th>
                                                    <th class="text-right">{{ translate('Price')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order->orderDetails as $key => $orderDetail)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>
                                                            @if ($orderDetail->product != null)
                                                                <a href="{{ route('product', $orderDetail->product->slug) }}" target="_blank" class="text-reset">
                                                                    {{ $orderDetail->product->getTranslation('name') }}
                                        
                                        
                                                                    @php
                                                                        if($orderDetail->combo_id != null) {
                                                                            $combo = \App\ComboProduct::findOrFail($orderDetail->combo_id);

                                                                            echo '('.$combo->combo_title.')';
                                                                        }
                                                                    @endphp
                                                                </a>
                                                            @else
                                                                <strong>{{  translate('Product Unavailable') }}</strong>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{ $orderDetail->variation }}
                                                        </td>
                                                        <td>
                                                            {{ $orderDetail->quantity }}
                                                        </td>
                                                        <td>
                                                            @if ($orderDetail->shipping_type != null && $orderDetail->shipping_type == 'home_delivery')
                                                                {{  translate('Home Delivery') }}
                                                            @elseif ($orderDetail->shipping_type == 'pickup_point')
                                                                @if ($orderDetail->pickup_point != null)
                                                                    {{ $orderDetail->pickup_point->getTranslation('name') }} ({{ translate('Pickip Point') }})
                                                                @endif
                                                            @endif
                                                        </td>
                                                        <td class="text-right">{{ single_price($orderDetail->price) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--<div class="row">-->
                                    <!--    <div class="col-xl-5 col-md-6 ml-auto mr-0">-->
                                    <!--        <table class="table ">-->
                                    <!--            <tbody>-->
                                    <!--                <tr>-->
                                    <!--                    <th>{{ translate('Subtotal')}}</th>-->
                                    <!--                    <td class="text-right">-->
                                    <!--                        <span class="fw-600">{{ single_price($order->orderDetails->sum('price')) }}</span>-->
                                    <!--                    </td>-->
                                    <!--                </tr>-->
                                    <!--                <tr>-->
                                    <!--                    <th>{{ translate('Shipping')}}</th>-->
                                    <!--                    <td class="text-right">-->
                                    <!--                        <span class="font-italic">{{ single_price($order->orderDetails->sum('shipping_cost')) }}</span>-->
                                    <!--                    </td>-->
                                    <!--                </tr>-->
                                    <!--                <tr>-->
                                    <!--                    <th>{{ translate('Tax')}}</th>-->
                                    <!--                    <td class="text-right">-->
                                    <!--                        <span class="font-italic">{{ single_price($order->orderDetails->sum('tax')) }}</span>-->
                                    <!--                    </td>-->
                                    <!--                </tr>-->
                                    <!--                <tr>-->
                                    <!--                    <th>{{ translate('Coupon Discount')}}</th>-->
                                    <!--                    <td class="text-right">-->
                                    <!--                        <span class="font-italic">{{ single_price($order->coupon_discount) }}</span>-->
                                    <!--                    </td>-->
                                    <!--                </tr>-->
                                    <!--                <tr>-->
                                    <!--                    <th><span class="fw-600">{{ translate('Total')}}</span></th>-->
                                    <!--                    <td class="text-right">-->
                                    <!--                        <strong><span>{{ single_price($order->grand_total) }}</span></strong>-->
                                    <!--                    </td>-->
                                    <!--                </tr>-->
                                    <!--            </tbody>-->
                                    <!--        </table>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                    @php
                        $first_order = $combined_order->orders->first()
                    @endphp
                    <!--<div class="text-center py-4 mb-4">-->
                    <!--    <i class="la la-check-circle la-3x text-success mb-3"></i>-->
                    <!--    <h1 class="h3 mb-3 fw-600">{{ translate('Thank You for Your Order!')}}</h1>-->
                    <!--    <p class="opacity-70 font-italic">{{  translate('A copy or your order summary has been sent to') }} {{ json_decode($first_order->shipping_address)->email }}</p>-->
                    <!--</div>-->
                    <div class="mb-4 bg-white p-4 rounded shadow-sm">
                        <h5 class="fw-600 mb-3 fs-17 pb-2">{{ translate('Order Summary')}}</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <tr>
                                        <th>{{ translate('Subtotal')}}</th>
                                        <td class="text-right">
                                            <span class="fw-600">{{ single_price($order->orderDetails->sum('price')) }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>{{ translate('Shipping')}}</th>
                                        <td class="text-right">
                                            <span class="font-italic">{{ single_price($order->orderDetails->sum('shipping_cost')) }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>{{ translate('Tax')}}</th>
                                        <td class="text-right">
                                            <span class="font-italic">{{ single_price($order->orderDetails->sum('tax')) }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>{{ translate('Coupon Discount')}}</th>
                                        <td class="text-right">
                                            <span class="font-italic">{{ single_price($order->coupon_discount) }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>{{ translate('Total')}}</th>
                                        <td class="text-right">
                                            <strong><span class="font-italic">{{ single_price($order->grand_total) }}</span></strong>
                                        </td>
                                    </tr>
                                    <!--<tr>-->
                                    <!--    <td class="w-50 fw-600">{{ translate('Order status')}}:</td>-->
                                    <!--    <td>{{ translate(ucfirst(str_replace('_', ' ', $first_order->delivery_status))) }}</td>-->
                                    <!--</tr>-->
                                    <!--<tr>-->
                                    <!--    <td class="w-50 fw-600">{{ translate('Total order amount')}}:</td>-->
                                    <!--    <td>{{ single_price($combined_order->grand_total) }}</td>-->
                                    <!--</tr>-->
                                    <!--<tr>-->
                                    <!--    <td class="w-50 fw-600">{{ translate('Shipping')}}:</td>-->
                                    <!--    <td>{{ translate('Flat shipping rate')}}</td>-->
                                    <!--</tr>-->
                                    <!--<tr>-->
                                    <!--    <td class="w-50 fw-600">{{ translate('Payment method')}}:</td>-->
                                    <!--    <td>{{ ucfirst(str_replace('_', ' ', $first_order->payment_type)) }}</td>-->
                                    <!--</tr>-->
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4 bg-white p-4 rounded shadow-sm">
                        <span class="fw-600 mb-3 fs-17 pb-2">{{ translate('Payment Status')}}</span>
                        <span class="badge badge-success p-3 pull-right float-right">Paid</span>
                       
                        <div class="row">
                            <div class="col-md-12">
                                 <table class="table">
                                    <tr>
                                        <td style="color:red;font-style:bold;border-top:0;font-weight:600">{{ ucfirst(str_replace('_', ' ', $first_order->payment_type)) }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                   <!--<div class="mb-4 bg-white p-4 rounded shadow-sm">-->
                   <!--     <div class="row">-->
                   <!--         <div class="col-md-6">-->
                   <!--             <table class="table">-->
                   <!--                 <tr>-->
                   <!--                     <th>{{ translate('Bill Form')}}</th>-->
                                        
                   <!--                 </tr>-->
                   <!--             </table>-->
                   <!--         </div>-->
                   <!--         <div class="col-md-6">-->
                   <!--             <table class="table">-->
                   <!--                 <tr>-->
                   <!--                     <th>{{ translate('Bill To')}}</th>-->
                                        
                   <!--                 </tr>-->
                   <!--             </table>-->
                   <!--         </div>-->
                   <!--     </div>-->
                   <!-- </div>-->
                    
                </div>
            </div>
        </div>
        @php
        $shipping_address=json_decode($combined_order->shipping_address);
        @endphp
        @foreach($combined_order->orders as $order)
        @endforeach
    </section>
   
@section('script')
<!--<script>-->
<!--    $(document).ready(function(e){-->
<!--    var settings = {-->
<!--        "url": "https://sandbox.paperflybd.com/OrderPlacement",-->
<!--        "method": "POST",-->
<!--        "mode": "cors",-->
<!--        "Authorization": "Basic " + btoa('m117413' + ":" + '62270'),-->
<!--        "Connection":"close",-->
<!--        "timeout": 0,-->
<!--        "headers": {-->
<!--        "paperflykey": "Paperfly_~La?Rj73FcLm",-->
<!--        "merOrderRef":"testRef6", -->
<!--        "data":"data",-->
<!--      },-->
<!--      "data": "{ \r\n    \"merOrderRef\":\"testRef6\", \r\n    \"pickMerchantName\":\"null\", \r\n    \"pickMerchantAddress\":\"null\", \r\n    \"pickMerchantThana\":\"null\", \r\n    \"pickMerchantDistrict\":\"null\", \r\n    \"pickupMerchantPhone\":\"null\", \r\n    \"productSizeWeight\":\"null\", \r\n    \"productBrief\":\"null\", \r\n    \"packagePrice\":\"null\", \r\n    \"deliveryOption\":\"null\", \r\n    \"custname\":\"{{$order->user->name}}\",\r\n    \"custaddress\":\"{{$shipping_address->address}}\",\r\n    \"customerThana\":\"{{$shipping_address->address}}\", \r\n    \"customerDistrict\":\"{{$shipping_address->district}}\", \r\n    \"custPhone\":\"{{$shipping_address->phone}}\"\r\n}",-->
<!--    };-->

<!--$.ajax(settings).done(function (response) {-->
<!--  console.log(response);-->
<!--});-->
<!--    });-->
    
<!--</script>-->
@endsection
