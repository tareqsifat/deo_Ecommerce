@extends('frontend.layouts.app')

@section('content')

<section class="pt-4 mb-4">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left">
                <h1 class="fw-600 h4">{{ translate('Track Order') }}</h1>
            </div>
            <div class="col-lg-6">
                <ul class="breadcrumb bg-transparent p-0 justify-content-center justify-content-lg-end">
                    <li class="breadcrumb-item opacity-50">
                        <a class="text-reset" href="{{ route('home') }}">{{ translate('Home') }}</a>
                    </li>
                    <li class="text-dark fw-600 breadcrumb-item">
                        <a class="text-reset" href="{{ route('orders.track') }}">"{{ translate('Track Order') }}"</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="mb-5">
    <div class="container text-left">
        <div class="row">
            <div class="col-xxl-5 col-xl-6 col-lg-8 mx-auto">
                <form class="" action="{{ route('orders.track') }}" method="GET" enctype="multipart/form-data">
                    <div class="bg-white rounded shadow-sm">
                        <div class="fs-15 fw-600 p-3 border-bottom text-center">
                            {{ translate('Check Your Order Status')}}
                        </div>
                        <div class="form-box-content p-3">
                            <div class="form-group">
                                <input type="text" class="form-control mb-3" placeholder="{{ translate('Order Code')}}" name="order_code" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">{{ translate('Track Order')}}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @isset($order)
        @php
        if(isset($response)){
        if(isset(json_decode($response)->success)){
        $res=json_decode($response)->success->trackingStatus[0];
        {{dd($res);}}
        }
        else{
        dd('no order found');
        }
        }
        @endphp

            <div class="bg-white rounded shadow-sm mt-5">
                <div class="fs-15 fw-600 p-3 border-bottom">
                    {{ translate('Order Summary')}}
                </div>
                <div class="p-3">
                    <div class="row">                                                                                    
                        <div class="col-lg-6">
                            <table class="table table-borderless">
                                <tr>
                                    <td class="w-50 fw-600">{{ translate('Order Code')}}:</td>
                                    <td>{{ $order->code }}</td>
                                </tr>
                                <tr>
                                    <td class="w-50 fw-600">{{ translate('Customer')}}:</td>
                                    <td>{{ json_decode($order->shipping_address)->name }}</td>
                                </tr>
                                <tr>
                                    <td class="w-50 fw-600">{{ translate('Email')}}:</td>
                                    @if ($order->user_id != null)
                                        <td>{{ $order->user->email }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td class="w-50 fw-600">{{ translate('Shipping address')}}:</td>
                                    <td>{{ json_decode($order->shipping_address)->address }}, {{ json_decode($order->shipping_address)->city }}, {{ json_decode($order->shipping_address)->country }}</td>
                                </tr>
                                
                            </table>
                        </div>
                        <div class="col-lg-6">
                            <table class="table table-borderless">
                                <tr>
                                    <td class="w-50 fw-600">{{ translate('Order date')}}:</td>
                                    <td>{{ date('d-m-Y H:i A', $order->date) }}</td>
                                </tr>
                                <tr>
                                    <td class="w-50 fw-600">{{ translate('Total order amount')}}:</td>
                                    <td>{{ single_price($order->orderDetails->sum('price') + $order->orderDetails->sum('tax')) }}</td>
                                </tr>
                                <tr>
                                    <td class="w-50 fw-600">{{ translate('Shipping method')}}:</td>
                                    <td>{{ translate('Flat shipping rate')}}</td>
                                </tr>
                                <tr>
                                    <td class="w-50 fw-600">{{ translate('Payment method')}}:</td>
                                    <td>{{ ucfirst(str_replace('_', ' ', $order->payment_type)) }}</td>
                                </tr>
                                <tr>
                                    <td class="w-50 fw-600">{{ translate('Delivery Status')}}:</td>
                                    @if(isset($res->Pick))
                                    <td>{{ $res->Pick}}</td>
                                    @elseif(isset($res->inTransit))
                                    <td>{{$res->inTransit}}</td>
                                    @elseif(isset($res->PickedForDelivery))
                                    <td>{{ $res->PickedForDelivery }}</td>
                                    @elseif(isset($res->Delivered))
                                    <td>{{ $res->Delivered }}</td>
                                    @elseif(isset($res->Returned))
                                    <td>{{ $res->Returned }}</td>
                                    @else
                                    <td>{{ ucfirst(str_replace('_', ' ', $order->delivery_status)) }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td class="w-50 fw-600">{{ translate('Delivery Status')}}:</td>
                                    @if(isset($res->Pick))
                                    <td>{{ $res->PickTime->format('d-m-Y H:i A')}}</td>
                                    @elseif(isset($res->inTransit))
                                    <td>{{$res->inTransitTime->format('d-m-Y H:i A')}}</td>
                                    @elseif(isset($res->PickedForDelivery))
                                    <td>{{ $res->PickedForDeliveryTime->format('d-m-Y H:i A') }}</td>
                                    @elseif(isset($res->Delivered))
                                    <td>{{ $res->DeliveredTime->format('d-m-Y H:i A') }}</td>
                                    @elseif(isset($res->ReturnedTime))
                                    <td>{{ $res->ReturnedTime->format('d-m-Y H:i A') }}</td>
                                    @else
                                    <td>{{ $order->updated_at->format('d-m-Y H:i A') }}</td>
                                    @endif
                                    
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            @foreach ($order->orderDetails as $key => $orderDetail)
                @php
                    $status = $order->delivery_status;
                @endphp
                <div class="bg-white rounded shadow-sm mt-4">
                    
                    @if($orderDetail->product != null)
                    <div class="p-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ translate('Product Name')}}</th>
                                    <th>{{ translate('Quantity')}}</th>
                                    <th>{{ translate('Shipped By')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>{{ $orderDetail->product->getTranslation('name') }} ({{ $orderDetail->variation }})</td>
                                    <td>{{ $orderDetail->quantity }}</td>
                                    <td>{{ $orderDetail->product->user->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            @endforeach

        @endisset
    </div>
</section>

@endsection
