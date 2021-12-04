@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col-md-6">
			<h1 class="h3">{{translate('Company Profile')}}</h1>
		</div>
	</div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">{{translate('Company Profile')}}</h5>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th data-breakpoints="lg" width="10%">#</th>
                    <th>{{translate('Company Name')}}</th>
                    <th>{{translate('Person Name')}}</th>
                    <th data-breakpoints="lg">{{translate('Email')}}</th>
                    <th data-breakpoints="lg">{{translate('Phone')}}</th>
                    <th >{{translate('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($company_pro as $pro)
                        <tr>
                            <td>{{$pro->id}}</td>
                            <td>{{$pro->company_name}}</td>
                            <td>{{$pro->name}}</td>
                            <td>{{$pro->email}}</td>
                            <td>{{$pro->phone}}</td>
                            <td >
		                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('company_profile.edit', $pro->id)}}" title="{{ translate('Edit') }}">
		                                <i class="las la-edit"></i>
		                            </a>
		                        </td>
                        </tr>
                 @endforeach
            </tbody>
        </table>
        
    </div>
</div>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection
