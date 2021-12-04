@extends('backend.layouts.app')

@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <h1 class="h3">{{translate('Product Advance Payment')}}</h1>
        </div>
    </div>
</div>
<br>

<div class="card">
    <form class="" id="sort_products" action="" method="GET">
        <div class="card-header row gutters-5">
            <div class="col">
                <h5 class="mb-md-0 h6">{{ translate('Product Advance Table') }}</h5>
            </div>
            <div class="col-md-2 ml-auto">
                <select class="form-control form-control-sm aiz-selectpicker mb-2 mb-md-0" name="type" id="type" onchange="sort_products()">
                    <option value="">{{ translate('Sort By') }}</option>
                    <option value="rating,desc" @isset($col_name , $query) @if($col_name == 'rating' && $query == 'desc') selected @endif @endisset>{{translate('Rating (High > Low)')}}</option>
                    <option value="rating,asc" @isset($col_name , $query) @if($col_name == 'rating' && $query == 'asc') selected @endif @endisset>{{translate('Rating (Low > High)')}}</option>
                    <option value="num_of_sale,desc"@isset($col_name , $query) @if($col_name == 'num_of_sale' && $query == 'desc') selected @endif @endisset>{{translate('Num of Sale (High > Low)')}}</option>
                    <option value="num_of_sale,asc"@isset($col_name , $query) @if($col_name == 'num_of_sale' && $query == 'asc') selected @endif @endisset>{{translate('Num of Sale (Low > High)')}}</option>
                    <option value="unit_price,desc"@isset($col_name , $query) @if($col_name == 'unit_price' && $query == 'desc') selected @endif @endisset>{{translate('Base Price (High > Low)')}}</option>
                    <option value="unit_price,asc"@isset($col_name , $query) @if($col_name == 'unit_price' && $query == 'asc') selected @endif @endisset>{{translate('Base Price (Low > High)')}}</option>
                </select>
            </div>
            <div class="col-md-5">
                <div class="form-group mb-0">
                    <input type="text" class="form-control form-control-sm" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type & Enter') }}">
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                    <tr>
                        <th>
                            <div class="form-group">
                                <div class="aiz-checkbox-inline">
                                    <label class="aiz-checkbox">
                                        <input type="checkbox" class="check-all">
                                        <span class="aiz-square-check"></span>
                                    </label>
                                </div>
                            </div>
                        </th>
                        <th>{{translate('Name')}}</th>
                        <th data-breakpoints="sm">{{translate('Info')}}</th>
                        <th data-breakpoints="md">{{translate('SKU')}}</th>
                        <th data-breakpoints="lg">{{translate('Advance Payment')}}</th>
                        <th data-breakpoints="lg">{{translate('Percentage')}}</th>
                        <th data-breakpoints="sm" class="text-right">{{translate('Options')}}</th>
                    </tr>
                </thead> 
                <tbody>
                    @foreach($products as $key => $product)
                       
                    
                        <tr>
                            <!--<td>{{ ($key+1) + ($products->currentPage() - 1)*$products->perPage() }}</td>-->
                            <td>
                                <div class="form-group d-inline-block">
                                    <label class="aiz-checkbox">
                                        <input type="checkbox" class="check-one" name="id[]" value="{{$product->id}}">
                                        <span class="aiz-square-check"></span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="row gutters-5 w-200px w-md-300px mw-100">
                                    <div class="col-auto">
                                        <img src="{{ uploaded_asset($product->thumbnail_img)}}" alt="Image" class="size-50px img-fit">
                                    </div>
                                    <div class="col">
                                        <span class="text-muted text-truncate-2">{{ $product->getTranslation('name') }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <strong>{{translate('Num of Sale')}}:</strong> {{ $product->num_of_sale }} {{translate('times')}} </br>
                                <strong>{{translate('Base Price')}}:</strong> {{ single_price($product->unit_price) }} </br>
                                <strong>{{translate('Rating')}}:</strong> {{ $product->rating }} </br>
                            </td>
                            <td>
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    @foreach($product->stocks as $stock)
                                    {{$stock->sku}}
                                    @endforeach
                                </label>
                            </td>
                            <div>
                                <td>
                                    <label class="aiz-switch aiz-switch-success mb-0">
                                        <input id="advance_payment_status{{$key}}" class="advance_status_class" onchange="advance_payment_function(@php echo $key @endphp, {{$product->id}})" value="{{ $product->id }}" type="checkbox" @if($product->advance_payment != 0) checked @endif>
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                <td onchange="selectChangeFunction({{$key}}, {{$product->id}})">
                                    <form id="advance_payment_form{{$key}}">
                                        <input id="advance_payment_product_id{{$key}}" name="product_id" value="{{$product->id}}"style="display:none">
                                        <label class="aiz-switch aiz-switch-success mb-0">
                                            <select id="advance_payment_parcentage{{$key}}" name= "advance_payment" class="form-control" 
                                            @if($product->advance_payment != 0) style="visibility: visible" @else style="visibility: hidden" @endif>
                                                <option>--select--</option>
                                                <option {{ $product->advance_payment == 10 ? 'selected' : '' }} value="10">10%</option>
                                                <option {{ $product->advance_payment == 20 ? 'selected' : '' }} value="20">20%</option>
                                                <option {{ $product->advance_payment == 30 ? 'selected' : '' }} value="30">30%</option>
                                                <option {{ $product->advance_payment == 40 ? 'selected' : '' }} value="40">40%</option>
                                                <option {{ $product->advance_payment == 50 ? 'selected' : '' }} value="50">50%</option>
                                            </select>
                                        </label>
                                    </form>
                                </td>
                            </div>
                            
                            <td class="text-right">
                                <a class="btn btn-soft-success btn-icon btn-circle btn-sm"  href="{{ route('product', $product->slug) }}" target="_blank" title="{{ translate('View') }}">
                                    <i class="las la-eye"></i>
                                </a>
                            </td>
                        </tr>
                       
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>
</div>
@endsection
@section('script')
<script>

    function advance_payment_function(key,product_id){
        let advance_payment_product_id = $("#advance_payment_product_id"+key).val();
        if(document.getElementById("advance_payment_status"+key).checked){
            document.getElementById("advance_payment_parcentage"+key).style.visibility='visible';
        }
        else{
            document.getElementById("advance_payment_parcentage"+key).style.visibility='hidden';
            $.ajax({
                url: "{{ route('update-advance-payment') }}",
                type:"POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    "_token": "{{ csrf_token() }}",
                    product_id:advance_payment_product_id,
                    advance_payment:0,
                },
                success: function(data){
				    AIZ.plugins.notify('success', '{{ translate('Advance Payment Status Updated Successfully') }}');
    			}
            });
        }
    }
    function selectChangeFunction(key, product_id){
    
        let advance_payment_product_id = $("#advance_payment_product_id"+key).val();
        let advance_payment_parcentage = $("#advance_payment_parcentage"+key).val();
        let data = { "_token": "{{ csrf_token() }}", product_id: advance_payment_product_id, advance_payment:advance_payment_parcentage }
        $.ajax({
            url: "{{ route('update-advance-payment') }}",
            type:"POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:data,
            success: function(data){
    		    console.log(data);
    		    AIZ.plugins.notify('success', '{{ translate('Advance Payment Status Updated Successfully') }}');
    		}
        });   
    }
</script>
@endsection
