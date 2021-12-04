@if(get_setting('home_categories') != null) 
    @php $home_categories = json_decode(get_setting('home_categories')); @endphp
    @foreach ($home_categories as $key => $value)
        @php $category = \App\Category::find($value); @endphp
        @if(isset($category))
            <section class="mb-4">
                <div class="container">
                    <div class="px-2 py-4 px-md-4 py-md-3 shadow-sm rounded">
                        <div class="d-flex mb-3 align-items-baseline border-bottom">
                            <h3 class="h5 fw-700 mb-0">
                                <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block">{{ $category->name }}</span>
                            </h3>
                            <a href="{{ route('products.category', $category->slug) }}" class="ml-auto mr-0 btn btn-primary btn-sm shadow-md">{{ translate('View More') }}</a>
                        </div>
                        <div class="row justify-content-center">
                            @foreach (get_cached_products($category->id) as $key => $product)
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
    @endforeach
@endif