@php
    $best_selling_products = Cache::remember('best_selling_products', 86400, function () {
        return filter_products(\App\Product::where('published', 1)->orderBy('num_of_sale', 'desc'))->limit(20)->get();
    });   
@endphp

@if (get_setting('best_selling') == 1)
    <section class="mb-4">
        <div class="container">
            <div class="px-2 py-4 px-md-4 py-md-3 shadow-sm rounded">
                <div class="d-flex mb-3 align-items-baseline border-bottom">
                    <h3 class="h5 fw-700 mb-0">
                        <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ translate('Best Selling') }}</span>
                    </h3>
                    <a href="javascript:void(0)" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">{{ translate('Top 20') }}</a>
                </div>
                <div class="responsive_bestSelling_mobile row justify-content-center">
                    @foreach ($best_selling_products as $key => $product)
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
                        <div class="col-6 px-1">
                            @include('frontend.partials.product_box_1',['product' => $product])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif