@extends('layouts.app')

@section('head')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{asset('vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}"><link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="screen" />
    <link rel="stylesheet" href="{{asset('vendor/charts/chartist-bundle/chartist.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/charts/morris-bundle/morris.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/charts/c3charts/c3.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/fonts/flag-icon-css/flag-icon.min.css')}}">
    <title>Dashboard</title>
@endsection

@section('top_navbar')
    @component('components.top_navbar')
    @endcomponent
@endsection

@section('side_navbar')
    @component('components.side_navbar')
    @endcomponent
@endsection

@section('content')
<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header float-right">
                    <a href="#new_application" data-toggle="modal" class="btn btn-primary btn-lg"><i class="fa fa-pencil"></i>&nbsp;&nbsp;New Application</a>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->
        <div class="ecommerce-widget">
            <div class="row">
                <!-- ============================================================== -->
            
                <!-- ============================================================== -->

                                <!-- recent orders  -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Recent Orders</h5>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">No</th>
                                            <th class="border-0">Application Title</th>
                                            <th class="border-0">Justification</th>
                                            <th class="border-0">Budget Type</th>
                                            <th class="border-0">Usage Type</th>
                                            <th class="border-0">Status</th>
                                            <th class="border-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <div class="m-r-10"><img src="assets/images/product-pic.jpg" alt="user" class="rounded" width="45"></div>
                                            </td>
                                            <td>Product #1 </td>
                                            <td>id000001 </td>
                                            <td>20</td>
                                            <td><span class="badge-dot badge-info mr-1"></span>In Process </td>
                                            <td><a href="#add_items" data-toggle="modal" title="Add or delete items"><i class="fa fa-wrench fa-2x"></i></a><span></span>&nbsp;&nbsp;&nbsp;&nbsp;<a href="" title="View details"><i class="fa fa-eye fa-2x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="" title="View summary"><i class="fa fa-list fa-2x"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>
                                                <div class="m-r-10"><img src="assets/images/product-pic.jpg" alt="user" class="rounded" width="45"></div>
                                            </td>
                                            <td>Product #1 </td>
                                            <td>id000001 </td>
                                            <td>20</td>
                                            <td><span class="badge-dot badge-info mr-1"></span>In Process  </td>
                                            <td><a href="#add_items" data-toggle="modal" title="Add or delete items"><i class="fa fa-wrench fa-2x"></i></a><span></span>&nbsp;&nbsp;&nbsp;&nbsp;<a href="" title="View details"><i class="fa fa-eye fa-2x"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="" title="View summary"><i class="fa fa-list fa-2x"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end recent orders  -->
            </div>
        </div>
        
        <div class="modal fade" id="new_application" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content modal-lg">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Budget Application</h5>
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <form>
                                    <div class="form-group">
                                        <label class="col-form-label">Application Title</label>
                                        <input type="text" name="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Application Justification</label>
                                        <textarea name="" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Budget Type</label>
                                        <select name="" class="form-control">
                                            <option value="">Please select budget type</option>
                                            <option value="">OCAR</option>
                                            <option value="">BM</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Usage Type</label>
                                        <select name="" class="form-control">
                                            <option value="">Please select usage type</option>
                                            <option value="">Procurement</option>
                                            <option value="">Payment</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-light" data-dismiss="modal">Cancel</a>
                        <a href="#" class="btn btn-success">Submit</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="add_items" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Items</h5>
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Item Name</label>
                                        <input type="text" name="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Type</label>
                                        <select name="" class="form-control item_type">
                                            <option value="">Please select item type</option>
                                            <option value="1">Asset</option>
                                            <option value="2">Service</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 asset_type" style="display:none">
                                        <select name="" class="form-control asset_type" style="display:none">
                                            <option value="">Please select asset type</option>
                                            <option value="1">New Purchase</option>
                                            <option value="2">Replacement</option>
                                        </select>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 service_type" style="display:none">
                                    <div class="form-group service_type" style="display:none">
                                        <select name="" class="form-control service_type" style="display:none">
                                            <option value="">Please select service type</option>
                                            <option value="1">Maintenance</option>
                                            <option value="2">Training</option>
                                            <option value="3">Consultation</option>
                                            <option value="4">Honorarium</option>
                                            <option value="5">Reimbursement</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Price Per Unit</label>
                                        <input type="number" name="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Quantity</label>
                                        <input type="number" name="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <label class="col-form-label">UOM (Unit of measurement)</label>
                                        <input type="text" name="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                    <label class="col-form-label">Total</label>
                                    <input type="number" name="" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-light" data-dismiss="modal">Cancel</a>
                        <a href="#" class="btn btn-success">Submit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @component('components.footer')
    @endcomponent
@endsection

@section('script')
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="{{asset('vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <!-- bootstap bundle js -->
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <!-- slimscroll js -->
    <script src="{{asset('vendor/slimscroll/jquery.slimscroll.js')}}"></script>
    <!-- main js -->
    <script src="{{asset('js/main-js.js')}}"></script>
    <!-- chart chartist js -->
    <script src="{{asset('vendor/charts/chartist-bundle/chartist.min.js')}}"></script>
    <!-- sparkline js -->
    <script src="{{asset('vendor/charts/sparkline/jquery.sparkline.js')}}"></script>
    <!-- morris js -->
    <script src="{{asset('vendor/charts/morris-bundle/raphael.min.js')}}"></script>
    <script src="{{asset('vendor/charts/morris-bundle/morris.js')}}"></script>
    <!-- chart c3 js -->
    <script src="{{asset('vendor/charts/c3charts/c3.min.js')}}"></script>
    <script src="{{asset('vendor/charts/c3charts/d3-5.4.0.min.js')}}"></script>
    <script src="{{asset('vendor/charts/c3charts/C3chartjs.js')}}"></script>
    <script src="{{asset('js/dashboard-ecommerce.js')}}"></script>
    <script>
        $('.item_type').on('change', function(){
            if($('.item_type').val() == 1){
                $('.asset_type').show();
                $('.service_type').hide();
            }
            else if($('.item_type').val() == 2){
                $('.asset_type').hide();
                $('.service_type').show();
            }
            else{
                $('.asset_type').hide();
                $('.service_type').hide();
            }
        });
    </script>
@endsection