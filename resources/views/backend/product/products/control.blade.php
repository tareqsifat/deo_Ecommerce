@extends('backend.layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6 ">{{ translate("Lowest Price For Enabling 'Cash On Delivery' on Product")}}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal control_form" id="category_cod_form" action="{{ route('products.update_control') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label class="col-from-label" style="font-size: 16px"><strong>{{translate('Lowest Price')}}</strong></label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="amount_of_cod" required>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                        </div>
                    </form>  
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6 ">{{translate("please be patient")}}</h5>
                </div>
                <div class="card-body h4">
                    <small>
                        This app has the same field at a Different level. 
                        so this app will follow a priority chart to avoid conflict.
                        this Priority chart will be Category -> Brand -> Product.
                    </small>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6 ">{{translate("Payment Method Based 'Discount' Setting")}}</h5>
                </div>
                <div class="card-body">
                     <form class="form-horizontal control_form" action="{{ route('products.update_control') }}" method="POST">
                        @csrf
                        <div class="form-group row" id="select">
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0 h5">{{ translate("Select Payment Method") }}</label>
                            </div>
                            <div class="col-md-6">
                                <select id="payment_method" name="payment_method" class="form-control" required>
                                    <option value="">--select--</option>
                                    <option value="1">Online Payment</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0 h6">Provide Discount?</label>
                            </div>
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                     <input id="payment_discount_status" onchange="showHide('payment_discount_status','payment_discount_parcentage')" name= "payment_discount_status" value="1" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row data_field" id="payment_discount_parcentage">
                            <div class="col-md-6">
                                <label class="col-from-label h5">{{translate('Discount Parcentage')}}</label>
                            </div>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="payment_discount">
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @php
            $categories = App\Category::get();
        @endphp
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6 ">{{translate("Category wise 'Cash on Delivary' Setting")}}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal control_form" action="{{ route('products.update_category_control') }}" method="POST">
                        @csrf
                        <div class="form-group row" id="select">
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0 h5">Select Cateogry</label>
                            </div>
                            <div class="col-md-6">
                                <select id="control_categroy_id" name= "category_id" class="form-control" required>
                                    <option value="">--select--</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0 h6" >Accept Cash On Delivary?</label>
                            </div>
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                     <input id="category_cod_status" onchange="showHide('category_cod_status','category_cod_amount')" name= "category_cod" class="advance_status_class" value="1" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row data_field" id="category_cod_amount">
                            <div class="col-md-6">
                                <label class="col-from-label h5">{{translate('Lowest Price')}}</label>
                            </div>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="category_cod_amount">
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6 ">{{translate("Category wise Advance Payment Setting")}}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal control_form" action="{{ route('products.update_category_control') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0 h5">Select Cateogry</label>
                            </div>
                            <div class="col-md-6">
                                <select id="advance_payment_parcentage" name="category_id" class="form-control" required>
                                    <option value="">--select--</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0 h6" >Require Advance Payment</label>
                            </div>
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                     <input id="category_partial_status" onchange="showHide('category_partial_status','category_partial_parcentage')" class="advance_status_class" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row data_field" id="category_partial_parcentage">
                            <div class="col-md-6">
                                <label class="col-from-label h5">{{translate('Parcentage')}}</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="category_partial" required>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6"> 
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6 ">{{translate("Category wise Discount Setting")}}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal control_form" action="{{ route('products.update_category_control') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0 h5">Select Cateogry</label>
                            </div>
                            <div class="col-md-6">
                                <select name= "category_id"  class="form-control" required>
                                    <option value="">--select--</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row" >
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0 h6" >Provide Discount?</label>
                            </div>
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                     <input id="category_discount_status" onchange="showHide('category_discount_status','category_discount_parcentage')" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row data_field" id="category_discount_parcentage">
                            <div class="col-md-6">
                                <label class="col-from-label h5">{{translate('Parcentage')}}</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="category_discount" required>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @php
            $brands = App\Brand::get();
        @endphp
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6 ">{{translate("Brand wise 'Cash on Delivary' Setting")}}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal control_form" action="{{ route('products.update_brand_control') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0 h5">Select Brand</label>
                            </div>
                            <div class="col-md-6">
                                <select id="advance_payment_parcentage" name= "brand_id" class="form-control" required>
                                    <option value="">--select--</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0 h6" >Accept Cash On Delivary?</label>
                            </div>
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                     <input id="brand_cod_status" name= "brand_cod" onchange="showHide('brand_cod_status','brand_cod_amount')" class="advance_status_class" value="1" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row data_field" id="brand_cod_amount" >
                            <div class="col-md-6">
                                <label class="col-from-label h5">{{translate('Lowest Price')}}</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="brand_cod_amount" required>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6 ">{{translate("Brand wise Advance Payment Setting")}}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal control_form" action="{{ route('products.update_brand_control') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0 h5">Select Brand</label>
                            </div>
                            <div class="col-md-6">
                                <select id="advance_payment_parcentage" name= "brand_id" class="form-control" required>
                                    <option value="">--select--</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0 h6" >Require Advance Payment</label>
                            </div>
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                     <input id="brand_partial_status" class="advance_status_class" onchange="showHide('brand_partial_status','brand_partial_parcentage')" value="1" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row data_field" id="brand_partial_parcentage">
                            <div class="col-md-6">
                                <label class="col-from-label h5">{{translate('Parcentage')}}</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="brand_partial" required>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6 ">{{translate("Brand wise Discount Setting")}}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal control_form" action="{{ route('products.update_brand_control') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0 h5">Select Brand</label>
                            </div>
                            <div class="col-md-6">
                                <select id="advance_payment_parcentage" name= "brand_id" class="form-control" required>
                                    <option value="">--select--</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0 h6" >Provide Discount?</label>
                            </div>
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                     <input id="brand_discount_status" class="advance_status_class" onchange="showHide('brand_discount_status','brand_discount_parcentage')" value="1" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row data_field" id="brand_discount_parcentage">
                            <div class="col-md-6">
                                <label class="col-from-label h5">{{translate('Parcentage')}}</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="brand_discount" required>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--<b>Digital Product Setting</b>-->
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6 ">{{translate("Digital Product Advance Payment Setting")}}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal control_form" action="{{ route('products.update_control') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0 h6" >Require Advance Payment</label>
                            </div>
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                     <input id="digital_partial_status" class="advance_status_class" onchange="showHide('digital_partial_status','digital_partial_parcentage')" value="1" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row data_field" id="digital_partial_parcentage">
                            <div class="col-md-6">
                                <label class="col-from-label h5">{{translate('Parcentage')}}</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="digital_partial" required>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6 ">{{translate("Digital Product Discount Setting")}}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal control_form" action="{{ route('products.update_control') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0 h6" >Provide Discount?</label>
                            </div>
                            <div class="col-md-6">
                                <label class="aiz-switch aiz-switch-success mb-0">
                                     <input id="digital_discount_status" class="advance_status_class" onchange="showHide('digital_discount_status','digital_discount_parcentage')" value="1" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row data_field" id="digital_discount_parcentage">
                            <div class="col-md-6">
                                <label class="col-from-label h5">{{translate('parcentage')}}</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="digital_discount" required>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection


@section('script')
<script>
    $(document).ready(function(){
        $('.data_field').hide();
        $('.data_field').val("0").children('div').children('input').val("0");
    });
    function showHide(find_by, catching){
        if($("#"+find_by).is(":checked")){
            $("#"+catching).show();
            $("#"+catching).children('div').children('input').val("");
        }
        else{
            $("#"+catching).hide(); 
            $("#"+catching).children('div').children('input').val("0");
            $("#"+find_by).val("0");
        }
    }
    $(".control_form").on('submit', function(e){
        e.preventDefault();
        let form_data = new FormData($(this)[0]);
        if($(this).children('div').children('div').children('select').val() == ""){
            AIZ.plugins.notify('danger','Please select an option from dropdown');
            console.log('no')
        }else{
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: $(this).attr('action'),
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data, textStatus, jqXHR) {
                    AIZ.plugins.notify('success',data);
                }
            });
        }``  
    });
</script>
@endsection