@extends('frontend.layouts.seller_dashboard')

@section('content')
	<div class="container-fluid">
		<!-- Main row -->
		<div class="row  d-flex justify-content-center">
		    <div class="col-md-8 mt-3">
		        <div class="row d-flex justify-content-center">
		           <div class="col-md-6 ">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <p class="h4">Performance</p>
                                            </tr>
                                            <tr>
                                                <td><h5>Order</h5>shipping on time</td>
                                                <td><h5>Rating</h5>positive seller ratting</td>
                                            </tr>
                                            <tr>
                                                <td>cancellation rate</td>
                                                <td>Product Rating</td>
                                            </tr>
                                            <tr>
                                                <td>return rate</td>
                                                <td>Responce Rate</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Response Rate(min)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <p class="h4">Operation</p>
                                            </tr>
                                            <tr>
                                                <td><h5>Order</h5>shipping on time</td>
                                                <td><h5>Rating</h5>positive seller ratting</td>
                                            </tr>
                                            <tr>
                                                <td>cancellation rate</td>
                                                <td>Product Rating</td>
                                            </tr>
                                            <tr>
                                                <td>return rate</td>
                                                <td>Responce Rate</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Response Rate(min)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		    <div class="col-2">
            </div>
		</div>
		<div class="row  d-flex justify-content-center">
		    <div class="col-md-8 mt-3">
		        <div class="card p-2">
		            <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title">Brands</h5>
                    </div>
		            <div class="card-deck">
                    <div class="card">
                        <img src="..." class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="..." class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="..." class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-2"></div>
		</div>
		<div class="row d-flex justify-content-center">
            <div class="col-sm-8">
                <div class="row d-flex justify-content-start">
                    <div class="col-4">
                        <div class="card mb-3" style="max-width: 18rem;">
                            <div class="card-header">Header</div>
                            <div class="card-body">
                                <h5 class="card-title">Primary card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card mb-3" style="max-width: 18rem;">
                            <div class="card-header">Header</div>
                            <div class="card-body">
                                <h5 class="card-title">Primary card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-sm-2"></div>
        </div>

		<!-- /.row (main row) -->
	</div>
@endsection

