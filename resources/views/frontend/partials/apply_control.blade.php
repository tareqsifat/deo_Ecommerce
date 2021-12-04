@php
if($product->category->category_discount > 0){
{{dd('yes');}}
    $discount =$product->category->category_discount;
}
elseif($product->brand->brand_discount > 0){
    $discount = $product->brand->brand_discount;
}
elseif(isset($product->discount) && $product->discount>0){
    $discount = $product->discount;
}
else{
}
    $discount = 999;

@endphp