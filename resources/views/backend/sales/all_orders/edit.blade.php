@extends('backend.layouts.app')

@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">{{translate('Order Code')}} <span> {{$order->code}}</span></h5>
</div>

<div class="">
    <form class="form form-horizontal mar-top" action="{{route('products.store')}}" method="POST" enctype="multipart/form-data" id="choice_form">
        <div class="row gutters-5">
            <div class="col-lg-6">
                @csrf
                <div class="card">
                    <div class="card-body pb-0">
                    <table class="table table-borderless table-responsive">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th width="40%">{{ translate('Product')}}</th>
                                <th width="40%">{{ translate('Action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderDetails->where('seller_id', Auth::user()->id) as $key => $orderDetail)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        @if ($orderDetail->product != null)
                                            <a href="{{ route('product', $orderDetail->product->slug) }}" target="_blank">{{ $orderDetail->product->getTranslation('name') }}</a>
                                        @else
                                            <strong>{{  translate('Product Unavailable') }}</strong>
                                        @endif
                                    </td>
                                    <td><a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('all_orders.edit',$order->id)}}" title="{{ translate('Edit') }}">
                                <i class="las la-edit"></i>
                            </a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
                

                <!--<div class="card">-->
                <!--    <div class="card-header">-->
                <!--        <h5 class="mb-0 h6">{{translate('Product Shipping Cost')}}</h5>-->
                <!--    </div>-->
                <!--    <div class="card-body">-->

                <!--    </div>-->
                <!--</div>-->

                
               

            </div>

            
            <!--<div class="col-12">-->
            <!--    <div class="btn-toolbar float-left mb-3" role="toolbar" aria-label="Toolbar with button groups">-->
            <!--        <div class="btn-group mr-2" role="group" aria-label="First group">-->
            <!--            <button type="submit" name="button" value="draft" class="btn btn-warning">{{ translate('Save As Draft') }}</button>-->
            <!--        </div>-->
            <!--        <div class="btn-group mr-2" role="group" aria-label="Third group">-->
            <!--            <button type="submit" name="button" value="unpublish" class="btn btn-primary">{{ translate('Save & Unpublish') }}</button>-->
            <!--        </div>-->
            <!--        <div class="btn-group" role="group" aria-label="Second group">-->
            <!--            <button type="submit" name="button" value="publish" class="btn btn-success">{{ translate('Save & Publish') }}</button>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
        </div>
    </form>
</div>

@endsection

@section('script')

<script type="text/javascript">
    $('form').bind('submit', function (e) {
        // Disable the submit button while evaluating if the form should be submitted
        $("button[type='submit']").prop('disabled', true);
        
        var valid = true;

        if (!valid) {
            e.preventDefault();
            
            // Reactivate the button if the form was not submitted
            $("button[type='submit']").button.prop('disabled', false);
        }
    });
    
    $("[name=shipping_type]").on("change", function (){
        $(".flat_rate_shipping_div").hide();

        if($(this).val() == 'flat_rate'){
            $(".flat_rate_shipping_div").show();
        }

    });

    function add_more_customer_choice_option(i, name){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"POST",
            url:'{{ route('products.add-more-choice-option') }}',
            data:{
               attribute_id: i
            },
            success: function(data) {
                var obj = JSON.parse(data);
                $('#customer_choice_options').append('\
                <div class="form-group row">\
                    <div class="col-md-3">\
                        <input type="hidden" name="choice_no[]" value="'+i+'">\
                        <input type="text" class="form-control" name="choice[]" value="'+name+'" placeholder="{{ translate('Choice Title') }}" readonly>\
                    </div>\
                    <div class="col-md-8">\
                        <select class="form-control aiz-selectpicker attribute_choice" data-live-search="true" name="choice_options_'+ i +'[]" multiple>\
                            '+obj+'\
                        </select>\
                    </div>\
                </div>');
                AIZ.plugins.bootstrapSelect('refresh');
           }
       });


    }

    $('input[name="colors_active"]').on('change', function() {
        if(!$('input[name="colors_active"]').is(':checked')) {
            $('#colors').prop('disabled', true);
            AIZ.plugins.bootstrapSelect('refresh');
        }
        else {
            $('#colors').prop('disabled', false);
            AIZ.plugins.bootstrapSelect('refresh');
        }
        update_sku();
    });

    $(document).on("change", ".attribute_choice",function() {
        update_sku();
    });

    $('#colors').on('change', function() {
        update_sku();
    });

    $('input[name="unit_price"]').on('keyup', function() {
        update_sku();
    });

    $('input[name="name"]').on('keyup', function() {
        update_sku();
    });

    function delete_row(em){
        $(em).closest('.form-group row').remove();
        update_sku();
    }

    function delete_variant(em){
        $(em).closest('.variant').remove();
    }

    function update_sku(){
        $.ajax({
           type:"POST",
           url:'{{ route('products.sku_combination') }}',
           data:$('#choice_form').serialize(),
           success: function(data) {
                $('#sku_combination').html(data);
                AIZ.uploader.previewGenerate();
                AIZ.plugins.fooTable();
                if (data.length > 1) {
                   $('#show-hide-div').hide();
                }
                else {
                    $('#show-hide-div').show();
                }
           }
       });
    }

    $('#choice_attributes').on('change', function() {
        $('#customer_choice_options').html(null);
        $.each($("#choice_attributes option:selected"), function(){
            add_more_customer_choice_option($(this).val(), $(this).text());
        });

        update_sku();
    });

</script>

@endsection

