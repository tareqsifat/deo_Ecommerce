@extends('frontend.layouts.seller_dashboard')

@section('content')
	<div class="container-fluid">
		<!-- Main row -->
		<div class="row  d-flex justify-content-center" style="border:1px solid red">
		    <div class="col-11" style="border:1px solid blue">
		        <p class="display-4">Product Management</p>
		    </div>
		</div>
		<div class="row  d-flex justify-content-center" style="border:1px solid red">
		    <div class="col-11" style="border:1px solid blue">
		        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="btn btn-primary m-1">Add new Product</button>
                    <button class="btn btn-light m-1">Export</button>
                    <button class="btn btn-light m-1">Import</button>
                    <button class="btn btn-light m-1">View History</button>
                </nav>
		    </div>
		</div>
		<div class="row  d-flex justify-content-center" style="border:1px solid red">
		    <div class="col-11" style="border:1px solid blue">
		        <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-all-tab" data-toggle="tab" href="#nav-all" role="tab" aria-controls="nav-all" aria-selected="true">All</a>
                        <a class="nav-item nav-link" id="nav-online-tab" data-toggle="tab" href="#nav-online" role="tab" aria-controls="nav-online" aria-selected="false">Online</a>
                        <a class="nav-item nav-link" id="nav-draft-tab" data-toggle="tab" href="#nav-draft" role="tab" aria-controls="nav-draft" aria-selected="false">Draft</a>
                        <a class="nav-item nav-link" id="nav-pending-tab" data-toggle="tab" href="#nav-pending" role="tab" aria-controls="nav-pending" aria-selected="false">Pending QC</a>
                        <a class="nav-item nav-link" id="nav-outOfStock-tab" data-toggle="tab" href="#nav-outOfStock" role="tab" aria-controls="nav-outOfStock" aria-selected="false">Out Of Stock</a>
                        <a class="nav-item nav-link" id="nav-inactive-tab" data-toggle="tab" href="#nav-inactive" role="tab" aria-controls="nav-inactive" aria-selected="false">Inactive</a>
                        <a class="nav-item nav-link" id="nav-suspended-tab" data-toggle="tab" href="#nav-suspended" role="tab" aria-controls="nav-suspended" aria-selected="false">Suspended</a>
                        <a class="nav-item nav-link" id="nav-deleted-tab" data-toggle="tab" href="#nav-deleted" role="tab" aria-controls="nav-deleted" aria-selected="false">Deleted</a>
                    </div>
                </nav>
                <div class="tab-content card" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                        <form>
                            <p> hhuh</p>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="nav-online" role="tabpanel" aria-labelledby="nav-online-tab">online tab</div>
                    <div class="tab-pane fade" id="nav-draft" role="tabpanel" aria-labelledby="nav-draft-tab">draft tab</div>
                    <div class="tab-pane fade" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">pending tab</div>
                    <div class="tab-pane fade" id="nav-outOfStock" role="tabpanel" aria-labelledby="nav-outOfStock-tab">outOfStock tab</div>
                    <div class="tab-pane fade" id="nav-inactive" role="tabpanel" aria-labelledby="nav-inactive-tab">inactive tab</div>
                    <div class="tab-pane fade" id="nav-suspended" role="tabpanel" aria-labelledby="nav-suspended-tab">suspended tab</div>
                    <div class="tab-pane fade" id="nav-deleted" role="tabpanel" aria-labelledby="nav-deleted-tab">deleted tab</div>
                </div>
            </div>
		</div>
		<div class="row d-flex justify-content-center" style="border:1px solid red">
		    <p>yes</p>
        </div>
	</div>
@endsection