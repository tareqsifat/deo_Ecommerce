@php
    $featured_products = Cache::remember('featured_products', 3600, function () {
        return filter_products(\App\Product::where('published', 1)->where('featured', '1'))->limit(12)->get();
    });
@endphp

@if (count($featured_products) > 0)
    <section class="mb-4">
        <div class="container">
            <div class="px-2 py-4 px-md-4 py-md-3 shadow-sm rounded">
                <div class="d-flex mb-3 align-items-baseline border-bottom">
                    <h3 class="h5 fw-700 mb-0">
                        <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ translate('Featured Products') }}</span>
                    </h3>
                </div>
                <div class="responsive_pc_featured_products aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'>
                    @foreach ($featured_products as $key => $product) 
                    @php
                        if(isset($product->category->category_discount)){
                            $discount =$product->category->category_discount;
                        }
                        elseif(isset($product->brand->brand_discount)){
                            $discount = $product->brand->brand_discount;
                        }
                        elseif(isset($product->discount) && $product->discount>0){
                            $discount = $product->discount;
                        }
                        else{
                            $discount = 0;
                        }
                    @endphp
                    <div class="carousel-box">
                        @include('frontend.partials.product_box_1',['product' => $product, 'discount'=> $discount])
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>   
@endif