@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		
	</div>
</div>

<div class="card">
    
    <div class="card-header">
        <h5 class="mb-0 h6">{{translate('Inhouse Shop')}}</h5>
        @if(!isset(Auth::user()->shop->name))
        <span style="float:left;"><a href="{{route('inhouse_shop.create')}}" class="btn btn-info">Create Shop</a></span>
        @endif
    </div>
    
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th data-breakpoints="lg" width="10%">#</th>
                    <th>{{translate('Shop Name')}}</th>
                    <th>{{translate('Address')}}</th>
                    <th data-breakpoints="lg">{{translate('Thana')}}</th>
                    <th data-breakpoints="lg">{{translate('District')}}</th>
                    <th >{{translate('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @if(isset(Auth::user()->shop->name))
               @php
               $i=1;
               @endphp
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{Auth::user()->shop->name}}</td>
                            <td>{{Auth::user()->shop->address}}</td>
                            <td>{{Auth::user()->shop->thana}}</td>
                            <td>{{Auth::user()->shop->city}}</td>
                            
                            <td >
		                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('inhouse_shop.edit',Auth::user()->shop->id)}}" title="{{ translate('Edit') }}">
		                                <i class="las la-edit"></i>
		                            </a>
		                        </td>
                        </tr>
                        @endif
                 
            </tbody>
        </table>
        
    </div>
</div>

@endsection


