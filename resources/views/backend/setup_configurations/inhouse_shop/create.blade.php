@extends('backend.layouts.app')

@section('content')

<div class="container aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<h1>Create Shop</h1>
	</div>
</div>

    {{-- Basic Info --}}
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">{{ translate('Basic Info') }}</h5>
        </div>
        <div class="card-body">
            <form class="" action="{{route('inhouse_shop.store')}}" method="POST" enctype="multipart/form-data">
               
                @csrf
                <div class="row">
                    <label class="col-md-2 col-form-label">{{ translate('Shop Name') }}<span class="text-danger text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control mb-3" placeholder="{{ translate('Shop Name')}}" name="name"  required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-md-2 col-form-label">{{ translate('Shop Logo') }}</label>
                    <div class="col-md-10">
                        <div class="input-group" data-toggle="aizuploader" data-type="image">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                            </div>
                            <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                            <input type="hidden" name="logo"  class="selected-files">
                        </div>
                        <div class="file-preview box sm">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2 col-form-label">
                        {{ translate('Shop Phone') }}
                    </label>
                    <div class="col-md-10">
                        <input type="text" class="form-control mb-3" placeholder="{{ translate('Phone')}}" name="phone"  required>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2 col-form-label">{{ translate('Shop Address') }} <span class="text-danger text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control mb-3" placeholder="{{ translate('Address')}}" name="address" required>
                    </div>
                </div>
                 <div class="row">
                    <label class="col-md-2 col-form-label">{{ translate('Thana') }} <span class="text-danger text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control mb-3" placeholder="{{ translate('Thana')}}" name="thana"  required>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2 col-form-label">{{ translate('District') }} <span class="text-danger text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control mb-3" placeholder="{{ translate('District')}}" name="city"  required>
                    </div>
                </div>
               

                <div class="row">
                    <label class="col-md-2 col-form-label">{{ translate('Meta Title') }}<span class="text-danger text-danger">*</span></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control mb-3" placeholder="{{ translate('Meta Title')}}" name="meta_title"  required>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2 col-form-label">{{ translate('Meta Description') }}<span class="text-danger text-danger">*</span></label>
                    <div class="col-md-10">
                        <textarea name="meta_description" rows="3" class="form-control mb-3" required></textarea>
                    </div>
                </div>
                <div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                </div>
            </form>
        </div>
    </div>

  
    <!--{{-- Banner Settings --}}-->
    <!--<div class="card">-->
    <!--    <div class="card-header">-->
    <!--        <h5 class="mb-0 h6">{{ translate('Banner Settings') }}</h5>-->
    <!--    </div>-->
    <!--    <div class="card-body">-->
    <!--        <form class="" action="{{route('inhouse_shop.store')}}" method="POST" enctype="multipart/form-data">-->
                
    <!--            @csrf-->

    <!--            <div class="row mb-3">-->
    <!--                <label class="col-md-2 col-form-label">{{ translate('Banners') }} (1500x450)</label>-->
    <!--                <div class="col-md-10">-->
    <!--                    <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">-->
    <!--                        <div class="input-group-prepend">-->
    <!--                            <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>-->
    <!--                        </div>-->
    <!--                        <div class="form-control file-amount">{{ translate('Choose File') }}</div>-->
    <!--                        <input type="hidden" name="sliders"  class="selected-files">-->
    <!--                    </div>-->
    <!--                    <div class="file-preview box sm">-->
    <!--                    </div>-->
    <!--                    <small class="text-muted">{{ translate('We had to limit height to maintian consistancy. In some device both side of the banner might be cropped for height limitation.') }}</small>-->
    <!--                </div>-->
    <!--            </div>-->

    <!--            <div class="form-group mb-0 text-right">-->
    <!--                <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>-->
    <!--            </div>-->
    <!--        </form>-->
    <!--    </div>-->
    <!--</div>-->

    <!--{{-- Social Media Link --}}-->
    <!--<div class="card">-->
    <!--    <div class="card-header">-->
    <!--        <h5 class="mb-0 h6">{{ translate('Social Media Link') }}</h5>-->
    <!--    </div>-->
    <!--    <div class="card-body">-->
    <!--        <form class="" action="{{route('inhouse_shop.store')}}" method="POST" enctype="multipart/form-data">-->
                
    <!--            @csrf-->
    <!--            <div class="form-box-content p-3">-->
    <!--                <div class="row mb-3">-->
    <!--                    <label class="col-md-2 col-form-label">{{ translate('Facebook') }}</label>-->
    <!--                    <div class="col-md-10">-->
    <!--                        <input type="text" class="form-control" placeholder="{{ translate('Facebook')}}" name="facebook" >-->
    <!--                        <small class="text-muted">{{ translate('Insert link with https ') }}</small>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="row mb-3">-->
    <!--                    <label class="col-md-2 col-form-label">{{ translate('Twitter') }}</label>-->
    <!--                    <div class="col-md-10">-->
    <!--                        <input type="text" class="form-control" placeholder="{{ translate('Twitter')}}" name="twitter" >-->
    <!--                        <small class="text-muted">{{ translate('Insert link with https ') }}</small>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="row mb-3">-->
    <!--                    <label class="col-md-2 col-form-label">{{ translate('Google') }}</label>-->
    <!--                    <div class="col-md-10">-->
    <!--                        <input type="text" class="form-control" placeholder="{{ translate('Google')}}" name="google" >-->
    <!--                        <small class="text-muted">{{ translate('Insert link with https ') }}</small>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="row mb-3">-->
    <!--                    <label class="col-md-2 col-form-label">{{ translate('Youtube') }}</label>-->
    <!--                    <div class="col-md-10">-->
    <!--                        <input type="text" class="form-control" placeholder="{{ translate('Youtube')}}" name="youtube" >-->
    <!--                        <small class="text-muted">{{ translate('Insert link with https ') }}</small>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="form-group mb-0 text-right">-->
    <!--                <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>-->
    <!--            </div>-->
    <!--        </form>-->
    <!--    </div>-->
    <!--</div>-->
    @endsection