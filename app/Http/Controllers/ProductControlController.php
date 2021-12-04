<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductControl;
use App\Category;
use App\Brand;


class ProductControlController extends Controller
{
    public function index()
    {
        return view('backend.product.products.control');
    }
    
    public function updateControl(Request $request)
    {
        $row = ProductControl::oldest()->first();
        $product_control = ProductControl::find($row->id);
        
        if (isset($request->payment_method)) {
            if($request->payment_discount !=0){
                $product_control->update([
                    "online_discount"=> $request->payment_discount
                ]);
            }
            if($request->payment_discount == 0){
                $product_control->update([
                    "online_discount"=> null
                ]);
            }
        }
        if ($request->has('amount_of_cod')) {
            $product_control->update([
                "amount_of_cod" => "$request->amount_of_cod"
            ]);
        }
        
        if ($request->has('digital_partial')) {
            $product_control->update([
                "digital_partial" => "$request->digital_partial"
            ]);
        }
        if ($request->has('digital_discount')) {
            $product_control->update([
                "digital_discount" => "$request->digital_discount"
            ]);
        }
        return 'product settings updated successfully';
    } 
    
    public function updateCategoryControl(Request $request){
        // dd($request->all());
        $category = Category::find($request->category_id);
        
        if($request->has('category_cod_amount')){
            if($request->category_cod_amount == '0' || $request->category_cod_amount == null){
                $category->update([
                    "category_cod" => 0
                ]);
                $category->update([
                    "category_cod_amount" => "$request->category_cod_amount"
                ]);
            }
            else{
                $category->update([
                    "category_cod" => '1',
                    "category_cod_amount" => "$request->category_cod_amount"
                ]);
            }
            return "Cash On Delivery Status on Category updated";
        }
        
        if($request->has('category_partial')){
            $category->update([
                "category_partial" => "$request->category_partial"
            ]);
            return "Advance Payment Status on Category updated";
        }
        
        if($request->has('category_discount')){
            $category->update([
                "category_discount" => "$request->category_discount"
            ]);
        }
        return "Discount Status on Category updated";
    }
    
    public function updateBrandControl(Request $request){
        $brand = Brand::find($request->brand_id);
        
        if($request->has('brand_cod_amount')){
            if($request->brand_cod_amount == '0' || $request->brand_cod_amount == null){
                $brand->update([
                    "brand_cod" => "0",
                    "brand_cod_amount" => "$request->brand_cod_amount"
                ]);
            }
            else{
                $brand->update([
                    "brand_cod" => "1",
                    "brand_cod_amount" => "$request->brand_cod_amount"
                ]);
            }
            return "Cash On Delivery Status on Brand updated";
        }
        
        if($request->has('brand_partial')){ 
            $brand->update([
                "brand_partial" => "$request->brand_partial"
            ]);
            return "Advance Payment Status on Brand updated";
        }
        
        if($request->has('brand_discount')){
            $brand->update([
                "brand_discount" => "$request->brand_discount"
            ]);
            return "Discount Status on Brand updated";
        }
    }
}
