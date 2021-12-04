@extends('frontend.layouts.app') @section('meta_title'){{ $detailedProduct->meta_title }}@stop @section('meta_description'){{ $detailedProduct->meta_description }}@stop @section('meta_keywords'){{ $detailedProduct->tags }}@stop
@section('meta')
<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="{{ $detailedProduct->meta_title }}" />
<meta itemprop="description" content="{{ $detailedProduct->meta_description }}" />
<meta itemprop="image" content="{{ uploaded_asset($detailedProduct->meta_img) }}" />

<!-- Twitter Card data -->
<meta name="twitter:card" content="product" />
<meta name="twitter:site" content="@publisher_handle" />
<meta name="twitter:title" content="{{ $detailedProduct->meta_title }}" />
<meta name="twitter:description" content="{{ $detailedProduct->meta_description }}" />
<meta name="twitter:creator" content="@author_handle" />
<meta name="twitter:image" content="{{ uploaded_asset($detailedProduct->meta_img) }}" />
<meta name="twitter:data1" content="{{ single_price($detailedProduct->unit_price) }}" />
<meta name="twitter:label1" content="Price" />

<!-- Open Graph data -->
<meta property="og:title" content="{{ $detailedProduct->meta_title }}" />
<meta property="og:type" content="og:product" />
<meta property="og:url" content="{{ route('product', $detailedProduct->slug) }}" />
<meta property="og:image" content="{{ uploaded_asset($detailedProduct->meta_img) }}" />
<meta property="og:description" content="{{ $detailedProduct->meta_description }}" />
<meta property="og:site_name" content="{{ get_setting('meta_title') }}" />
<meta property="og:price:amount" content="{{ single_price($detailedProduct->unit_price) }}" />
<meta property="product:price:currency" content="{{ \App\Currency::findOrFail(get_setting('system_default_currency'))->code }}" />
<meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}" />
@endsection @section('content')
<!--<div class="container">-->
<!--    <div class="row justify-content-center">-->
<!--        <div class="col-xl-8 mx-4" style="border:2px solid red">-->
<!--            <p>test</p>-->
<!--            <div class="container">-->
<!--                <div class="row justify-content-center">-->
<!--                    <div class="col-xl-5" style="border:2px solid red"><p>test</p></div>-->
<!--                    <div class="col-xl-7" style="border:2px solid black"><p>test</p></div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-xl-2" style="border:2px solid black"><p>test</p></div>-->
<!--    </div>-->
<!--</div>-->

<style>
    li a {
        display: block;
        color: #000;
        padding: 8px 8px;
        margin: 0px;
        text-decoration: none;
        font-size: 14px;
    }

    html {
        scroll-behavior: smooth;
    }

    /* Change the link color on hover */
    li a:hover {
        background-color: lightgrey;
        color: white;
    }

    #change:hover {
        fill: red;
    }

    a.anchor {
        display: block;
        position: relative;
        top: -150px;
        visibility: hidden;
    }
</style>
<section class="mb-4 pt-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 bg-white shadow-sm rounded">
                <div class="bg-white rounded p-3">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-5 col-lg-6 mb-4">
                                <div class="sticky-top z-3 row gutters-10">
                                    @php $photos = explode(',', $detailedProduct->photos); @endphp
                                    <div class="container">
                                        <div class="row">
                                            <div class="col order-1 order-md-2">
                                                <div class="aiz-carousel product-gallery" data-nav-for=".product-gallery-thumb" data-fade="true" data-auto-height="false">
                                                    @foreach ($photos as $key => $photo)
                                                    <div class="carousel-box img-zoom rounded">
                                                        <img
                                                            class="img-fluid lazyload"
                                                            src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                            data-src="{{ uploaded_asset($photo) }}"
                                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                        />
                                                    </div>
                                                    @endforeach @foreach ($detailedProduct->stocks as $key => $stock) @if ($stock->image != null)
                                                    <div class="carousel-box img-zoom rounded">
                                                        <img
                                                            class="img-fluid lazyload"
                                                            src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                            data-src="{{ uploaded_asset($stock->image) }}"
                                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                        />
                                                    </div>
                                                    @endif @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-12 order-2 order-md-1 mt-3 mt-md-0">
                                                <div class="aiz-carousel gutters-10" id="" data-items="5" data-xl-items="5" data-lg-items="4" data-md-items="3" data-xs-items="2" data-arrows="true">
                                                    @foreach ($photos as $key => $photo)
                                                    <div class="carousel-box c-pointer border p-1 rounded">
                                                        <img
                                                            class="lazyload mw-100 size-50px mx-auto"
                                                            src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                            data-src="{{ uploaded_asset($photo) }}"
                                                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                        />
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row no-gutters mt-4">
                                            <div class="col-sm-2">
                                                <div class="opacity-50 my-2">{{ translate('Share')}}:</div>
                                            </div>
                                            <div class="col-sm-10">
                                                <div class="aiz-share"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-7 col-lg-6" style="margin: 0px; padding: 0px;">
                                <a href="" style="float: right; font-size: 30px; margin-right: -10px;" onclick="addToWishList({{ $detailedProduct->id }})">&#9825;</a>
                                <div class="col-xl-11 text-left" style="margin: 0px; padding: 0px;">
                                    <h3 class="mb-2 fs-20 fw-600">
                                        {{ $detailedProduct->getTranslation('name') }}
                                    </h3>
                                    @if ($detailedProduct->brand != null)
                                    <div class="text-left">
                                        <a href="{{ route('products.brand',$detailedProduct->brand->slug) }}">
                                            <b>Brand : </b>
                                            <b>{{ $detailedProduct->brand->getTranslation('name') }}</b>
                                            <b>&nbsp|&nbsp</b><b><a href="">Similar products from {{ $detailedProduct->brand->getTranslation('name') }}</a></b>
                                        </a>
                                    </div>
                                    @endif

                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            @php $total = 0; $total += $detailedProduct->reviews->count(); @endphp
                                            <span class="rating">
                                                {{ renderStarRating($detailedProduct->rating) }}
                                            </span>
                                            <span class="ml-1 opacity-50">({{ $total }} {{ translate('reviews')}})</span>
                                        </div>
                                        @if ($detailedProduct->est_shipping_days)
                                        <div class="col-auto ml"><small class="mr-2 opacity-50">{{ translate('Estimate Shipping Time')}}: </small>{{ $detailedProduct->est_shipping_days }} {{ translate('Days') }}</div>
                                        @endif
                                    </div>

                                    <!--<hr>-->

                                    <div class="row align-items-center">
                                        <!--<div class="col-auto">-->
                                        <!--    <small class="mr-2 opacity-50">{{ translate('Sold by')}}: </small><br>-->
                                        <!--    @if ($detailedProduct->added_by == 'seller' && get_setting('vendor_system_activation') == 1)-->
                                        <!--        <a href="{{ route('shop.visit', $detailedProduct->user->shop->slug) }}" class="text-reset">{{ $detailedProduct->user->shop->name }}</a>-->
                                        <!--    @else-->
                                        <!--        {{  translate('Inhouse product') }}-->
                                        <!--    @endif-->
                                        <!--</div>-->
                                        <!--@if (get_setting('conversation_system') == 1)-->
                                        <!--    <div class="col-auto">-->
                                        <!--        <button class="btn btn-sm btn-soft-primary" onclick="show_chat_modal()">{{ translate('Message Seller')}}</button>-->
                                        <!--    </div>-->
                                        <!--@endif-->

                                        <!--@if ($detailedProduct->brand != null)-->
                                        <!--    <div class="">-->
                                        <!--        <a href="{{ route('products.brand',$detailedProduct->brand->slug) }}">-->
                                        <!--            <img src="{{ uploaded_asset($detailedProduct->brand->logo) }}" alt="{{ $detailedProduct->brand->getTranslation('name') }}" height="30">-->
                                        <!--        </a>-->
                                        <!--    </div>-->
                                        <!--@endif-->
                                    </div>

                                    <hr />
                                    @if(home_price($detailedProduct) != home_discounted_price($detailedProduct))

                                    <div class="row no-gutters mt-3">
                                        <div class="col-sm-12">
                                            <div class="h4" style="font-weight: 700;">
                                                {{ home_discounted_price($detailedProduct) }} @if($detailedProduct->unit != null)
                                                <span class="opacity-70">/{{ $detailedProduct->getTranslation('unit') }}</span>
                                                @endif
                                            </div>
                                            <div class="fs-15 opacity-60" style="float: left;">
                                                <del>
                                                    {{ home_price($detailedProduct) }} @if($detailedProduct->unit != null)
                                                    <span>{{ $detailedProduct->getTranslation('unit') }}</span>
                                                    @endif
                                                </del>
                                                @php
                                                    if(isset($detailedProduct->category->category_discount)){
                                                        $discount =$detailedProduct->category->category_discount;
                                                    }
                                                    elseif(isset($detailedProduct->brand->brand_discount)){
                                                        $discount = $detailedProduct->brand->brand_discount;
                                                    }
                                                    elseif(isset($detailedProduct->discount) && $detailedProduct->discount>0){
                                                        $discount = $detailedProduct->discount;
                                                    }
                                                    else{
                                                        $discount = 0;
                                                    }
                                                @endphp
                                                <div class="col-md-2" style="background-color: lightpink; width: 40px; height: 20px; float: right;">
                                                    <p style="margin-left: -10px; color: #e62604; margin-top: 2px; font-size: 12px; font-weight: bold;">-{{round($discount)}}%</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @else
                                    <div class="row no-gutters mt-3">
                                        <div class="col-sm-2">
                                            <div class="opacity-50 my-2">{{ translate('Price')}}:</div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="">
                                                <strong style="font-size: 1rem;">
                                                    {{ home_discounted_price($detailedProduct) }}
                                                </strong>
                                                @if($detailedProduct->unit != null)
                                                <span class="opacity-70">/{{ $detailedProduct->getTranslation('unit') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endif @if ($detailedProduct->earn_point > 0)
                                    <div class="row no-gutters mt-4">
                                        <div class="col-sm-2">
                                            <div class="opacity-50 my-2">{{ translate('Club Point') }}:</div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="d-inline-block rounded px-2 bg-soft-primary border-soft-primary border">
                                                <span class="strong-700">{{ $detailedProduct->earn_point }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                    <hr />

                                    <form id="option-choice-form">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $detailedProduct->id }}" />

                                        @if ($detailedProduct->choice_options != null) @foreach (json_decode($detailedProduct->choice_options) as $key => $choice)

                                        <div class="row no-gutters">
                                            <div class="col-sm-2">
                                                <div class="opacity-50 my-2">{{ \App\Attribute::find($choice->attribute_id)->getTranslation('name') }}:</div>
                                            </div>
                                            <div class="col-sm-10">
                                                <div class="aiz-radio-inline">
                                                    @foreach ($choice->values as $key => $value)
                                                    <label class="aiz-megabox pl-0 mr-2">
                                                        <input type="radio" name="attribute_id_{{ $choice->attribute_id }}" value="{{ $value }}" @if($key == 0) checked @endif >
                                                        <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center py-2 px-3 mb-2">
                                                            {{ $value }}
                                                        </span>
                                                    </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach @endif @if (count(json_decode($detailedProduct->colors)) > 0)
                                        <div class="row no-gutters">
                                            <div class="container">
                                                <div class="row mb-2">
                                                    <div style="font-size: .875rem;font-weight: 500; !important">{{ translate('Variation Available')}}:</div>
                                                </div>
                                                <div class="row">
                                                    <div class="aiz-radio-inline">
                                                        @foreach (json_decode($detailedProduct->colors) as $key => $color)
                                                        <label class="aiz-megabox pl-0 mr-2">
                                                            <input type="radio" name="color" value="{{ \App\Color::where('code', $color)->first()->name }}" @if($key == 0) checked @endif >
                                                            <span class="aiz-megabox-elem rounded d-flex align-items-center justify-content-center p-1 mb-2">
                                                                <span class="size-30px d-inline-block rounded" style="background: {{ $color }};"></span>
                                                                <!--<button type="button" class="btn" style="border:1px solid {{ $color }}; display:inline-block; !important;">{{ \App\Color::where('code', $color)->first()->name }}</button>-->
                                                            </span>
                                                        </label>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr />
                                        @endif

                                        <!--Quantity + Add to cart -->
                                        <div class="row no-gutters">
                                            <div class="col-sm-2">
                                                <div class="opacity-50 my-2">{{ translate('Quantity')}}:</div>
                                            </div>
                                            <div class="col-sm-10">
                                                <div class="product-quantity d-flex align-items-center">
                                                    <div class="row no-gutters align-items-center aiz-plus-minus mr-3" style="width: 130px;">
                                                        <button class="btn col-auto btn-icon btn-sm btn-warning" type="button" data-type="minus" data-field="quantity" disabled="" style="">
                                                            <i class="las la-minus"></i>
                                                        </button>
                                                        <input
                                                            type="number"
                                                            name="quantity"
                                                            class="col border-0 text-center flex-grow-1 fs-16 input-number"
                                                            placeholder="1"
                                                            value="{{ $detailedProduct->min_qty }}"
                                                            min="{{ $detailedProduct->min_qty }}"
                                                            max="10"
                                                        />
                                                        <button class="btn col-auto btn-icon btn-sm btn-warning" type="button" data-type="plus" data-field="quantity" style="">
                                                            <i class="las la-plus"></i>
                                                        </button>
                                                    </div>
                                                    @php $qty = 0; foreach ($detailedProduct->stocks as $key => $stock) { $qty += $stock->qty; } @endphp
                                                    <div class="avialable-amount opacity-60">
                                                        @if($detailedProduct->stock_visibility_state == 'quantity') (<span id="available-quantity">{{ $qty }}</span> {{ translate('available')}})
                                                        @elseif($detailedProduct->stock_visibility_state == 'text' && $qty >= 1) (<span id="available-quantity">{{ translate('In Stock') }}</span>) @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <hr>-->

                                        <!--<div class="row no-gutters pb-3 d-none" id="chosen_price_div">-->
                                        <!--    <div class="col-sm-2">-->
                                        <!--        <div class="opacity-50 my-2">{{ translate('YOU CAN ALSO BUY :')}}:</div>-->
                                        <!--    </div>-->
                                        <!--    <div class="col-sm-10">-->
                                        <!--        <a type="button" class="pull-right" href="">Details</a>-->

                                        <!--    </div>-->
                                        <!--</div>-->

                                        <hr />

                                        <div class="row no-gutters pb-3 d-none" id="chosen_price_div">
                                            <div class="col-sm-2">
                                                <div class="opacity-50 my-2">{{ translate('Total Price')}}:</div>
                                            </div>
                                            <div class="col-sm-10">
                                                <div class="product-price h4" style="font-weight: 700;">
                                                    <strong id="chosen_price" class=""> </strong>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <hr style="margin: 5px 0px 15px 0px;" />

                                    <div class="mt-3">
                                        <div class="container">
                                            @if ($detailedProduct->external_link != null)
                                            <div class="row mb-3">
                                                <a type="button" class="btn btn-primary btn-block mr-2 add-to-cart fw-600" href="{{ $detailedProduct->external_link }}">
                                                    <i class="las la-shopping-bag"></i>
                                                    <span class="d-none d-md-inline-block"> {{ translate('Add to cart')}}</span>
                                                </a>
                                            </div>
                                            <div class="row mb-3">
                                                <a type="button" class="btn btn-primary buy-now fw-600" href="{{ $detailedProduct->external_link }}"> <i class="la la-shopping-cart"></i> {{ translate('Buy Now')}} </a>
                                            </div>
                                            @else
                                            <div class="row mb-3">
                                                <button type="button" class="btn btn-soft-primary btn-block mr-2 add-to-cart fw-600" onclick="addToCart()">
                                                    <i class="las la-shopping-bag"></i>
                                                    <span class="d-none d-md-inline-block"> {{ translate('Add to cart')}}</span>
                                                </button>
                                            </div>
                                            <div class="row mb-3">
                                                <button type="button" class="btn btn-primary btn-block buy-now fw-600" onclick="buyNow()"><i class="la la-shopping-cart"></i> {{ translate('Buy Now')}}</button>
                                            </div>

                                            @endif
                                            <button type="button" class="btn btn-secondary out-of-stock fw-600 d-none" disabled><i class="la la-cart-arrow-down"></i> {{ translate('Out of Stock')}}</button>
                                        </div>
                                    </div>

                                    <div class="d-table width-100 mt-3">
                                        <div class="d-table-cell">
                                            <!-- Add to wishlist button -->
                                            <button type="button" class="btn pl-0 btn-link fw-600" onclick="addToWishList({{ $detailedProduct->id }})">
                                                {{ translate('Add to wishlist')}}
                                            </button>
                                            <!-- Add to compare button -->
                                            <button type="button" class="btn btn-link btn-icon-left fw-600" onclick="addToCompare({{ $detailedProduct->id }})">
                                                {{ translate('Add to compare')}}
                                            </button>
                                            @if(Auth::check() && addon_is_activated('affiliate_system') && (\App\AffiliateOption::where('type', 'product_sharing')->first()->status || \App\AffiliateOption::where('type',
                                            'category_wise_affiliate')->first()->status) && Auth::user()->affiliate_user != null && Auth::user()->affiliate_user->status) @php if(Auth::check()){ if(Auth::user()->referral_code == null){
                                            Auth::user()->referral_code = substr(Auth::user()->id.Str::random(10), 0, 10); Auth::user()->save(); } $referral_code = Auth::user()->referral_code; $referral_code_url =
                                            URL::to('/product').'/'.$detailedProduct->slug."?product_referral_code=$referral_code"; } @endphp
                                            <div>
                                                <button type="button" id="ref-cpurl-btn" class="btn btn-sm btn-secondary" data-attrcpy="{{ translate('Copied')}}" onclick="CopyToClipboard(this)" data-url="{{$referral_code_url}}">
                                                    {{ translate('Copy the Promote Link')}}
                                                </button>
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    @php 
                                        $refund_request_addon = \App\Addon::where('unique_identifier', 'refund_request')->first();
                                        $refund_sticker = \App\BusinessSetting::where('type', 'refund_sticker')->first(); 
                                    @endphp 
                                    @if($refund_request_addon != null && $refund_request_addon->activated == 1 && $detailedProduct->refundable)
                                    <div class="row no-gutters mt-4">
                                        <div class="col-sm-2">
                                            <div class="opacity-50 my-2">{{ translate('Refund')}}:</div>
                                        </div>
                                        <div class="col-sm-10">
                                            <a href="{{ route('returnpolicy') }}" target="_blank">
                                                @if ($refund_sticker != null && $refund_sticker->value != null)
                                                <img src="{{ uploaded_asset($refund_sticker->value) }}" height="36" />
                                                @else
                                                <img src="{{ static_asset('assets/img/refund-sticker.jpg') }}" height="36" />
                                                @endif
                                            </a>
                                            <a href="{{ route('returnpolicy') }}" class="ml-2" target="_blank">{{ translate('View Policy') }}</a>
                                        </div>
                                    </div>
                                    @endif
                                    <!--<div class="row no-gutters mt-4">-->
                                    <!--    <div class="col-sm-2">-->
                                    <!--        <div class="opacity-50 my-2">{{ translate('Share')}}:</div>-->
                                    <!--    </div>-->
                                    <!--    <div class="col-sm-10">-->
                                    <!--        <div class="aiz-share"></div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 order-1 order-xl-0">
                <div class="bg-white shadow-sm mb-3 rounded">
                    <div class="bg-white rounded shadow-sm mb-3">
                        <div class="p-2 border-bottom fs-16 fw-600">
                            {{ translate('DELIVERY & RETURNS')}}
                        </div>
                        <div class="p-2 border-bottom fw-600">
                            <h5>
                                <span style="font-size: 13px; font-weight: 600; font-family: sans-serif;">DEORA</span>
                                <span style="font-size: 13px; font-weight: 600; font-family: -webkit-pictograph; color: #e64004d6;"><i class="fas fa-rocket"></i> EXPRESS</span>
                            </h5>
                            <p style="font-size: 12px; color: #000000c4;">Free Shipping on DEORA Express orders above N12,000 in Lagos. <a style="color: #264996; font-size: 14px; font-weight: 400;" href="#">Details</a></p>
                        </div>
                        <div class="p-2 border-bottom fs-16 fw-600">
                            {{ translate('Choose your location')}}
                        </div>
                        <div class="p-2 border-bottom fw-600">
                            <select class="form-control">
                                <option>Select District</option>
                            </select>
                            <br />
                            <select class="form-control">
                                <option>Select Division</option>
                            </select>
                        </div>

                        <div class="container p-2 border-bottom fs-16 fw-600">
                            <div class="row">
                                <div class="col-md-2 shadow-sm bg-light p-3 mb-5 rounded" style="margin-left: 20px; height: 50px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="grey" class="bi bi-truck" viewBox="0 0 16 16">
                                        <path
                                            d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"
                                        />
                                    </svg>
                                </div>
                                <div class="col-md-8" style="float: left;">
                                    <p style="font-size: 14px; font-weight: 5px;">
                                        Door Delivery <span><a href="" style="font-size: 12px; float: right; color: black; margin-right: -20px; height: 20px;">Details</a></span>
                                    </p>
                                    <div style="margin-top: -10px; font-size: 12px;">Shipping <em>₦ 3,032</em></div>
                                    <div style="font-size: 12px;">Ready for delivery between <em>23 November</em> &amp; 01 December when you order within next 8hrs 26mins</div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px; margin-bottom: -20px;">
                                <div class="col-md-2 shadow-sm bg-light p-3 mb-5 rounded" style="margin-left: 20px; height: 50px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="grey" class="bi bi-truck" viewBox="0 0 16 16">
                                        <path
                                            d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"
                                        />
                                    </svg>
                                </div>
                                <div class="col-md-8" style="float: left;">
                                    <p style="font-size: 14px; font-weight: 5px;">
                                        Pickup Station <span><a href="" style="font-size: 12px; float: right; color: black; margin-right: -20px; height: 20px;">Details</a></span>
                                    </p>
                                    <div style="margin-top: -10px; font-size: 12px;">Shipping <em>₦ 3,032</em></div>
                                    <div style="font-size: 12px;">Pickup by</div>
                                </div>
                            </div>
                        </div>
                        <div class="container p-2 border-bottom fs-16 fw-600">
                            <div class="row">
                                <div class="col-md-2 shadow-sm bg-light p-3 mb-5 rounded" style="margin-left: 20px; height: 50px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="grey" class="bi bi-truck" viewBox="0 0 16 16">
                                        <path
                                            d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"
                                        />
                                    </svg>
                                </div>
                                <div class="col-md-8" style="float: left;">
                                    <p style="font-size: 14px; font-weight: 5px;">Return Policy</p>
                                    <div style="margin-top: -10px; font-size: 12px;">Free return within 15 days for Official Store items and 7 days for other eligible items.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container shadow-sm bg-white p-2 border-bottom fs-16 fw-600 rounded">
                    <div class="p-2 border-bottom fs-14 fw-600">
                        <a href="#" style="color: black;">
                            {{ translate('SELLER INFORMATION')}}
                            <svg xmlns="http://www.w3.org/2000/svg" style="float: right;" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671z" />
                            </svg>
                        </a>
                    </div>
                    <div style="margin: 10px;">
                        <div style="font-size: 14px; font-weight: 5px;">Return Policy</div>
                        <div style="font-size: 12px;">80%Seller Score 374 Followers <a href="#" class="btn btn-sm mb-5" style="float: right; background-color: #e62e04; color: white; margin-top: -15px; height: 32px;">Follow</a></div>
                    </div>
                </div>
                <div class="container shadow-sm bg-white p-2 border-bottom fs-16 fw-600 rounded">
                    <div style="margin: 10px;">
                        <div style="font-size: 14px; font-weight: 5px;">
                            Seller Performance
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="change" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                                </svg>
                            </a>
                        </div>
                        <div style="font-size: 12px;">Order Fulfillment Rate: <span style="font-weight: bold;">Excellent</span></div>
                        <div style="font-size: 12px;">Quality Score: <span style="font-weight: bold;">Good</span></div>
                        <div style="font-size: 12px;">Customer Rating: <span style="font-weight: bold;">Average</span></div>
                    </div>
                </div>
                <div class="container bg-white shadow-sm p-2 border-bottom fs-16 fw-600 rounded" style="margin-top: 10px;">
                    <div style="margin: 10px;">
                        <div style="font-size: 14px; font-weight: bold;">Have one to sell?</div>
                        <a href="#" style="color: black; font-size: 13px;">
                            {{ translate('Click here to list your product')}}
                            <svg xmlns="http://www.w3.org/2000/svg" style="float: right;" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 shadow-sm rounded" style="margin: 0px; padding: 0px;">
                <div class="col-xl-12 bg-white rounded">
                    <a class="anchor" id="product_details"></a>
                    <div class="container bg-white" style="margin: 0px; padding: 0px;">
                        <div class="row justify-content-center">
                            <div class="col-md-12 mb-4 border-bottom">
                                <h5 style="font-weight: bold; padding: 5px; margin-top: 10px;">Product Details</h5>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="tab-pane fade active show" id="tab_default_1">
                                    <div class="p-4">
                                        <div class="mw-100 overflow-hidden text-left aiz-editor-data">
                                            {!!$detailedProduct->description!!}
                                        </div>
                                        <div class="mw-100 text-center aiz-editor-data">
                                            @if ($detailedProduct->video_provider == 'youtube' && isset(explode('=', $detailedProduct->video_link)[1]))
                                            <iframe
                                                width="auto"
                                                height="250px"
                                                class="responsive-iframe embed-responsive-item"
                                                src="https://www.youtube.com/embed/{{ explode('=', $detailedProduct->video_link)[1] }}"
                                                allowfullscreen
                                            ></iframe>
                                            @elseif ($detailedProduct->video_provider == 'dailymotion' && isset(explode('video/', $detailedProduct->video_link)[1]))
                                            <iframe width="auto" height="auto" class="embed-responsive-item" src="https://www.dailymotion.com/embed/video/{{ explode('video/', $detailedProduct->video_link)[1] }}" allowfullscreen></iframe>
                                            @elseif ($detailedProduct->video_provider == 'vimeo' && isset(explode('vimeo.com/', $detailedProduct->video_link)[1]))
                                            <iframe
                                                width="auto"
                                                height="auto"
                                                src="https://player.vimeo.com/video/{{ explode('vimeo.com/', $detailedProduct->video_link)[1] }}"
                                                frameborder="0"
                                                webkitallowfullscreen
                                                mozallowfullscreen
                                                allowfullscreen
                                            ></iframe>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br />

                <div class="col-xl-12 bg-white rounded p-3">
                    <a class="anchor" id="specification"></a>
                    <div class="container" style="margin: 0px; padding: 0px;">
                        <div class="row justify-content-center">
                            <div class="col-md-12 mb-4 border-bottom">
                                <h5 style="font-weight: bold;">Specifications</h5>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="col-md-5 border shadow-sm rounded" style="float: left; margin-left: 40px; padding: 0px;">
                                    <div class="border-bottom">
                                        <h5 style="font-size: 14px; padding: 10px; margin: 10px 0 0 15px; font-weight: bold;">KEY FEATURES</h5>
                                    </div>
                                    <ul style="list-style-type: disc; margin-top: 10px; height: 150px;">
                                        <li style="font-size: 16px;">Style: Mobile</li>
                                        <li style="font-size: 16px;">Function: Degital</li>
                                        <li style="font-size: 16px;">Function: Degital</li>
                                        <li style="font-size: 16px;">Function: Degital</li>
                                        <li style="font-size: 16px;">Function: Degital</li>
                                    </ul>
                                </div>
                                <div class="col-md-5 border shadow-sm rounded" style="float: right; margin-right: 40px; padding: 0px;">
                                    <div class="border-bottom">
                                        <h5 style="font-size: 14px; padding: 10px; margin: 10px 0 0 15px; font-weight: bold;">KEY FEATURES</h5>
                                    </div>
                                    <ul style="list-style-type: disc; margin-top: 10px; height: 150px;">
                                        <li style="font-size: 16px;">Style: Mobile</li>
                                    </ul>
                                </div>

                                <div class="col-md-5 border shadow-sm rounded" style="float: left; margin: 15px 0 0 40px; padding: 0px;">
                                    <div class="border-bottom">
                                        <h5 style="font-size: 14px; padding: 10px; margin: 10px 0 0 15px; font-weight: bold;">SPECIFICATIONS</h5>
                                    </div>
                                    <ul style="list-style-type: disc; margin-top: 10px; height: 150px;">
                                        <li style="font-size: 16px;"><b>SKU:</b>FA203FS0H7VRPNAFAMZ</li>
                                        <li style="font-size: 16px;"><b>SKU:</b>FA203FS0H7VRPNAFAMZ</li>
                                        <li style="font-size: 16px;"><b>SKU:</b>FA203FS0H7VRPNAFAMZ</li>
                                        <li style="font-size: 16px;"><b>SKU:</b>FA203FS0H7VRPNAFAMZ</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br />

                <div class="col-xl-12 bg-white rounded p-3">
                    <a class="anchor" id="c_feedback"></a>
                    <div class="container bg-white" style="margin: 0px; padding: 0px;">
                        <div class="row justify-content-center">
                            <div class="col-md-12 mb-4 border-bottom">
                                <h5 style="font-weight: bold;">Product details</h5>
                            </div>
                            <div class="col-md-12 mb-4">
                                <p>Hello there! Welcome to our store 【Forbidden City-CODx】! Quality is our number one priority!</p>
                                <p>Hello there! Welcome to our store 【Forbidden City-CODx】! Quality is our number one priority!</p>
                                <p>Hello there! Welcome to our store 【Forbidden City-CODx】! Quality is our number one priority!</p>
                                <p>Hello there! Welcome to our store 【Forbidden City-CODx】! Quality is our number one priority!</p>
                                <p>Hello there! Welcome to our store 【Forbidden City-CODx】! Quality is our number one priority!</p>
                                <p>Hello there! Welcome to our store 【Forbidden City-CODx】! Quality is our number one priority!</p>
                                <img
                                    class="img-fluid lazyload"
                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                    data-src="{{ uploaded_asset($photo) }}"
                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                    widht="800px"
                                    height="800px"
                                />

                                <img
                                    class="img-fluid lazyload"
                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                    data-src="{{ uploaded_asset($photo) }}"
                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                    widht="800px"
                                    height="800px"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 flash_deal_pc">
                <div class="col-xl-12 z-1 sticky-top" style="top: 135px; margin: 0px; padding: 0px;">
                    <div class="col-xl-12 shadow-sm bg-white rounded">
                        <div class="container p-2 fs-16 fw-600" style="margin: 0px; padding: 0px;">
                            <div class="row">
                                <div class="col-md-12" style="margin: 0px; padding: 0px;">
                                    <ul style="list-style-type: none; margin-left: -10; padding: 0; margin-top: 5px;">
                                        <li>
                                            <a href="#product_details" style="height: 50;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                                    <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                                                    <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                                                </svg>
                                                &nbsp;&nbsp; Product details
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#specification" style="height: 50;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"
                                                    />
                                                </svg>
                                                &nbsp;&nbsp; Specification
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#c_feedback" style="height: 50;">
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 32 32" fill="currentColor">
                                                    <path
                                                        d="M 2 6 L 2 26 L 7 26 L 7 31.09375 L 8.625 29.78125 L 13.34375 26 L 30 26 L 30 6 Z M 4 8 L 28 8 L 28 24 L 12.65625 24 L 12.375 24.21875 L 9 26.90625 L 9 24 L 4 24 Z M 15 10 L 15 12 L 17 12 L 17 10 Z M 15 14 L 15 22 L 17 22 L 17 14 Z"
                                                    ></path>
                                                </svg>
                                                &nbsp;&nbsp; Customer Feedback
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 shadow-sm bg-white rounded" style="margin-top: 10px;">
                        <div class="container p-2 fs-16 fw-600" style="margin: 0px; padding: 0px;">
                            <div class="row">
                                <div class="col-md-12" style="margin: 0px; padding: 0px;">
                                    <div class="col-md-4 order-1 order-md-2" style="float: left;">
                                        <div class="aiz-carousel product-gallery" data-nav-for=".product-gallery-thumb" data-fade="true" data-auto-height="false">
                                            @foreach ($photos as $key => $photo)
                                            <div class="carousel-box rounded">
                                                <img
                                                    class="img-fluid lazyload"
                                                    src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                    data-src="{{ uploaded_asset($photo) }}"
                                                    onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                />
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-8 order-1 order-md-2" style="float: left; margin: 0px; padding: 0px;">
                                        @if(home_price($detailedProduct) != home_discounted_price($detailedProduct))
                                        <div class="row no-gutters mt-3">
                                            <div class="col-md-12" style="">
                                                {{ home_discounted_price($detailedProduct) }}
                                            </div>
                                            <div class="col-md-12 fs-12 opacity-60" style="float: left;">
                                                <del>
                                                    {{ home_price($detailedProduct) }}
                                                </del>
                                                <div class="col-md-2" style="background-color: lightpink; width: 50x; height: 20px; float: right;">
                                                    <p style="margin-left: -7px; color: #e62604; font-weight: bold;">-{{round($detailedProduct->discount)}}%</p>
                                                </div>
                                            </div>
                                        </div>

                                        @else
                                        <div class="row no-gutters mt-3">
                                            <div class="col-sm-2">
                                                <div class="opacity-50 my-2">{{ translate('Price')}}:</div>
                                            </div>
                                            <div class="col-sm-10">
                                                <div class="">
                                                    {{ home_discounted_price($detailedProduct) }}
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-top: -3px;">
                                    <a type="button" class="btn btn-primary btn-block mr-2 add-to-cart fw-600" href="{{ $detailedProduct->external_link }}">
                                        <i class="las la-shopping-bag"></i>
                                        <span class="d-none d-md-inline-block"> {{ translate('Add to cart')}}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="bg-white shadow-sm rounded" style="margin-left: -10px; padding: 0px; width: 1268px;">
                <div class="col-xl-12 bg-white rounded p-3">
                    <div class="container" style="margin: 0px; padding: 0px;">
                        <div class="row justify-content-center">
                            <div class="col-md-12 mb-4">
                                <h5 style="font-weight: bold;">Customers who viewed this also viewed</h5>
                            </div>
                        </div>
                        @php $flash_deal = \App\FlashDeal::where('status', 1)->where('featured', 1)->first(); @endphp @if($flash_deal != null && strtotime(date('Y-m-d H:i:s')) >= $flash_deal->start_date && strtotime(date('Y-m-d H:i:s')) <=
                        $flash_deal->end_date)
                        <section class="mb-4">
                            <div class="container">
                                <div class="px-2 py-4 px-md-4 py-md-3 shadow-sm rounded">
                                    <div class="flash_deal_pc">
                                        <div class="aiz-carousel gutters-10" id="flash_deal_carousel" data-items="5" data-xl-items="5" data-lg-items="4" data-md-items="3" data-xs-items="2" data-arrows="true">
                                            @foreach ($flash_deal->flash_deal_products->take(20) as $key => $flash_deal_product) @php $product = \App\Product::find($flash_deal_product->product_id); @endphp @if ($product != null &&
                                            $product->published != 0)
                                            <div class="carousel-box">
                                                @php if($product->category->category_discount != 0){ $discount =$product->category->category_discount; } elseif($product->brand->brand_discount != 0){ $discount =
                                                $product->brand->brand_discount; } elseif(isset($product->discount) && $product->discount>0){ $discount = $product->discount; } else{ $discount = 0; } @endphp
                                                @include('frontend.partials.product_box_1',['product' => $product,'discount'=> $discount])
                                            </div>
                                            @endif @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        @endif
                    </div>
                </div>
                <br />
            </div>
        </div>
    </div>
</section>
<section class="mb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="bg-white shadow-sm rounded" style="margin-left: -10px; padding: 0px; width: 1268px;">
                <div class="col-xl-12 bg-white rounded p-3">
                    <div class="container" style="margin: 0px; padding: 0px;">
                        <div class="row justify-content-center">
                            <div class="col-md-12 mb-4">
                                <h5 style="font-weight: bold;">Customers who viewed this also viewed</h5>
                            </div>
                        </div>
                        @php $flash_deal = \App\FlashDeal::where('status', 1)->where('featured', 1)->first(); @endphp @if($flash_deal != null && strtotime(date('Y-m-d H:i:s')) >= $flash_deal->start_date && strtotime(date('Y-m-d H:i:s')) <=
                        $flash_deal->end_date)
                        <section class="mb-4">
                            <div class="container">
                                <div class="px-2 py-4 px-md-4 py-md-3 shadow-sm rounded">
                                    <div class="flash_deal_pc">
                                        <div class="aiz-carousel gutters-10" id="flash_deal_carousel" data-items="5" data-xl-items="5" data-lg-items="4" data-md-items="3" data-xs-items="2" data-arrows="true">
                                            @foreach ($flash_deal->flash_deal_products->take(20) as $key => $flash_deal_product) @php $product = \App\Product::find($flash_deal_product->product_id); @endphp @if ($product != null &&
                                            $product->published != 0)
                                            <div class="carousel-box">
                                                @php if($product->category->category_discount != 0){ $discount =$product->category->category_discount; } elseif($product->brand->brand_discount != 0){ $discount =
                                                $product->brand->brand_discount; } elseif(isset($product->discount) && $product->discount>0){ $discount = $product->discount; } else{ $discount = 0; } @endphp
                                                @include('frontend.partials.product_box_1',['product' => $product,'discount'=> $discount])
                                            </div>
                                            @endif @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        @endif
                    </div>
                </div>
                <br />
            </div>
        </div>
    </div>
</section>

@endsection @section('modal')
<div class="modal fade" id="chat_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
        <div class="modal-content position-relative">
            <div class="modal-header">
                <h5 class="modal-title fw-600 h5">{{ translate('Any query about this product')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="" action="{{ route('conversations.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" value="{{ $detailedProduct->id }}" />
                <div class="modal-body gry-bg px-3 pt-3">
                    <div class="form-group">
                        <input type="text" class="form-control mb-3" name="title" value="{{ $detailedProduct->name }}" placeholder="{{ translate('Product Name') }}" required />
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="8" name="message" required placeholder="{{ translate('Your Question') }}">{{ route('product', $detailedProduct->slug) }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary fw-600" data-dismiss="modal">{{ translate('Cancel')}}</button>
                    <button type="submit" class="btn btn-primary fw-600">{{ translate('Send')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title fw-600">{{ translate('Login')}}</h6>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="p-3">
                    <form class="form-default" role="form" action="{{ route('cart.login.submit') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            @if (addon_is_activated('otp_system'))
                            <input type="text" class="form-control h-auto form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{ translate('Email Or Phone')}}" name="email" id="email" />
                            @else
                            <input type="email" class="form-control h-auto form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="{{  translate('Email') }}" name="email" />
                            @endif @if (addon_is_activated('otp_system'))
                            <span class="opacity-60">{{ translate('Use country code before number') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <input type="password" name="password" class="form-control h-auto form-control-lg" placeholder="{{ translate('Password')}}" />
                        </div>

                        <div class="row mb-2">
                            <div class="col-6">
                                <label class="aiz-checkbox">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="opacity-60">{{ translate('Remember Me') }}</span>
                                    <span class="aiz-square-check"></span>
                                </label>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('password.request') }}" class="text-reset opacity-60 fs-14">{{ translate('Forgot password?')}}</a>
                            </div>
                        </div>

                        <div class="mb-5">
                            <button type="submit" class="btn btn-primary btn-block fw-600">{{ translate('Login') }}</button>
                        </div>
                    </form>

                    <div class="text-center mb-3">
                        <p class="text-muted mb-0">{{ translate('Dont have an account?')}}</p>
                        <a href="{{ route('user.registration') }}">{{ translate('Register Now')}}</a>
                    </div>
                    @if(get_setting('google_login') == 1 || get_setting('facebook_login') == 1 || get_setting('twitter_login') == 1)
                    <div class="separator mb-3">
                        <span class="bg-white px-3 opacity-60">{{ translate('Or Login With')}}</span>
                    </div>
                    <ul class="list-inline social colored text-center mb-5">
                        @if (get_setting('facebook_login') == 1)
                        <li class="list-inline-item">
                            <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="facebook">
                                <i class="lab la-facebook-f"></i>
                            </a>
                        </li>
                        @endif @if(get_setting('google_login') == 1)
                        <li class="list-inline-item">
                            <a href="{{ route('social.login', ['provider' => 'google']) }}" class="google">
                                <i class="lab la-google"></i>
                            </a>
                        </li>
                        @endif @if (get_setting('twitter_login') == 1)
                        <li class="list-inline-item">
                            <a href="{{ route('social.login', ['provider' => 'twitter']) }}" class="twitter">
                                <i class="lab la-twitter"></i>
                            </a>
                        </li>
                        @endif
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('script')
<script type="text/javascript">
       $(document).ready(function() {
           getVariantPrice();

           if($(window).width() < 576){
               $('.absolute-top-right').hide();
               $('.flash_deal_pc').hide();
           }
           else if($(window).width() > 576){
               $('.absolute-top-right').show();
               $('.flash_deal_mobile').hide();
           }
    });

       function CopyToClipboard(e) {
           var url = $(e).data('url');
           var $temp = $("<input>");
           $("body").append($temp);
           $temp.val(url).select();
           try {
               document.execCommand("copy");
               AIZ.plugins.notify('success', '{{ translate('Link copied to clipboard') }}');
           } catch (err) {
               AIZ.plugins.notify('danger', '{{ translate('Oops, unable to copy') }}');
           }
           $temp.remove();
           // if (document.selection) {
           //     var range = document.body.createTextRange();
           //     range.moveToElementText(document.getElementById(containerid));
           //     range.select().createTextRange();
           //     document.execCommand("Copy");

           // } else if (window.getSelection) {
           //     var range = document.createRange();
           //     document.getElementById(containerid).style.display = "block";
           //     range.selectNode(document.getElementById(containerid));
           //     window.getSelection().addRange(range);
           //     document.execCommand("Copy");
           //     document.getElementById(containerid).style.display = "none";

           // }
           // AIZ.plugins.notify('success', 'Copied');
       }
       function show_chat_modal(){
           @if (Auth::check())
               $('#chat_modal').modal('show');
           @else
               $('#login_modal').modal('show');
           @endif
       }


       .create( document.querySelector( '#editor' ) )
       .then( editor => {
               console.log( editor );
       } )
       .catch( error => {
               console.error( error );
       } );
</script>
@endsection
