@extends('layouts.app')

@section('head')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{asset('vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="screen" />
    <link rel="stylesheet" href="{{asset('vendor/charts/chartist-bundle/chartist.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/charts/morris-bundle/morris.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/charts/c3charts/c3.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/fonts/flag-icon-css/flag-icon.min.css')}}">
    <title>Application</title>
    <style>
        .modal-lg {
            max-width: 1080px;
        }
        
        table {
            counter-reset: rowNumber;
        }

        .counter::before {
            display: table-cell;
            counter-increment: rowNumber;
            content: counter(rowNumber) "";
            padding-right: 0.3em;
            text-align: right;
        }
    </style>
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
                        <h5 class="card-header">Submitted Applications</h5>
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
                                        @if(count($applications) > 0)
                                            @foreach($applications as $key=>$application)
                                                <tr>
                                                    <td class="counter"></td>
                                                    <td>{{$application->title}}</td>
                                                    <td>{{$application->justification}}</td>
                                                    <td>{{$application->budgetTypes->type_name ?? 'empty'}}</td>
                                                    <td>{{$application->usageTypes->type_name ?? 'empty'}}</td>
                                                    <td><span class="badge-dot badge-info mr-1"></span>{{$application->status->status_name ?? 'empty'}}</td>
                                                    <td><a href="#edit_application" data-toggle="modal" title="Add or delete items"><i class="fa fa-refresh fa-2x mr-3"></i></a>
                                                        <a href="javascript:;" class="application_view" data-id="{{$application->id}}" title="View details"><i class="fa fa-eye fa-2x mr-3"></i></a>
                                                        <a href="{{Route('application_delete',$application->id)}}" title="Delete application"><i class="fa fa-trash fa-2x"></i></a></td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="9" class="text-center p-5">No Application Made</td>
                                            </tr>
                                        @endif
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
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                    </div>
                    <div class="modal-body">
                    <form action="{{Route('new_application_store')}}" method="post" novalidate>
                    @csrf
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 border-bottom">
                                    <div class="form-group">
                                        <label class="col-form-label">Application Title</label>
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Application Justification</label>
                                        <textarea name="justification" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Budget Type</label>
                                        <select name="budget_type_id" class="form-control budget_types">
                                            <option value="">Please select budget type</option>
                                        </select>
                                    </div>
                                    <div class="form-group pb-3">
                                        <label class="col-form-label">Usage Type</label>
                                        <select name="usage_type_id" class="form-control usage_types">
                                            <option value="">Please select usage type</option>
                                        </select>
                                    </div>
                                </div>  
                            </div>
                        <div class="row pt-3">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                <div class="form-group">
                                    <label class="col-form-label">Item Name</label>
                                    <input type="text" name="name" class="form-control item_name">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                <div class="form-group">
                                    <label class="col-form-label item_type">Type</label>
                                    <select name="application_item_type_id" class="form-control application_item_types">
                                        <option value="">Please select item type</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                <div class="form-group">
                                    <label class="col-form-label">Type Justification</label>
                                    <select name="application_item_justification" class="form-control application_item_justification">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row border-bottom">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                <div class="form-group">
                                    <label class="col-form-label">Price Per Unit</label>
                                    <input type="number" name="price" class="form-control price_per_unit">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                <div class="form-group">
                                    <label class="col-form-label">Quantity</label>
                                    <input type="number" name="quantity" class="form-control quantity">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                <div class="form-group">
                                    <label class="col-form-label">UOM (Unit of measurement)</label>
                                    <input type="text" name="oum" class="form-control uom">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pb-3">
                                <div class="form-group">
                                <label class="col-form-label">Total</label>
                                <input type="text" name="total_price_applied" class="form-control total" disabled>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 pb-3 align-self-end">
                                <div class="form-group">
                                    <label class="col-form-label"></label>
                                    <a href="javascript:;" class="btn btn-primary btn-sm add_item"><i class="fa fa-plus">&nbsp;&nbsp;</i>Add Item</a>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-5">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="table-responsive ">
                                    <table class="table table_items">
                                        <thead>
                                            <tr class="no_item_head">
                                                <th scope="col">No</th>
                                                <th scope="col">Item Name</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Type Justification</th>
                                                <th scope="col">Price Per Unit</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">UOM (Unit of measurement)</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="items">
                                            <tr class="no_item">
                                                <td colspan="9" class="text-center pt-3">No item added</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3 border-top">
                            <div class="col-md-2 offset-8 pull-right text-right align-self-end">
                                <label>Total Items Prices</label>
                            </div>
                            <div class="col-md-2 pull-right text-right align-self-right">
                                <input type="text" class="form-control total_items_prices" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-light" data-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="edit_application" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content modal-lg">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Budget Application</h5>
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                    </div>
                    <div class="modal-body">
                    <form action="" method="get" novalidate>
                    @csrf
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 border-bottom">
                                    @foreach($applications as $key=>$application)
                                    <div class="form-group">
                                        <label class="col-form-label">Application Title</label>
                                        <input type="text" name="title" value="{{$application->title}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Application Justification</label>
                                        <textarea name="justification" class="form-control">{{$application->justification}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Budget Type</label>
                                        <select name="budget_type_id" class="form-control budget_types">
                                            <option value="">Please select budget type</option>
                                        </select>
                                    </div>
                                    <div class="form-group pb-3">
                                        <label class="col-form-label">Usage Type</label>
                                        <select name="usage_type_id" class="form-control usage_types">
                                            <option value="">Please select usage type</option>
                                        </select>
                                    </div>
                                    @endforeach
                                </div>  
                            </div>
                        <div class="row pt-3">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                <div class="form-group">
                                    <label class="col-form-label">Item Name</label>
                                    <input type="text" name="name" class="form-control item_name">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                <div class="form-group">
                                    <label class="col-form-label item_type">Type</label>
                                    <select name="application_item_type_id" class="form-control application_item_types">
                                        <option value="">Please select item type</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                <div class="form-group">
                                    <label class="col-form-label">Type Justification</label>
                                    <select name="application_item_justification" class="form-control application_item_justification">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row border-bottom">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                <div class="form-group">
                                    <label class="col-form-label">Price Per Unit</label>
                                    <input type="number" name="price" class="form-control price_per_unit">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                <div class="form-group">
                                    <label class="col-form-label">Quantity</label>
                                    <input type="number" name="quantity" class="form-control quantity">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                <div class="form-group">
                                    <label class="col-form-label">UOM (Unit of measurement)</label>
                                    <input type="text" name="oum" class="form-control uom">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pb-3">
                                <div class="form-group">
                                <label class="col-form-label">Total</label>
                                <input type="text" name="total_price_applied" class="form-control total" disabled>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 pb-3 align-self-end">
                                <div class="form-group">
                                    <label class="col-form-label"></label>
                                    <a href="javascript:;" class="btn btn-primary btn-sm add_item"><i class="fa fa-plus">&nbsp;&nbsp;</i>Add Item</a>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-5">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="table-responsive ">
                                    <table class="table table_items">
                                        <thead>
                                            <tr class="no_item_head">
                                                <th scope="col">No</th>
                                                <th scope="col">Item Name</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Type Justification</th>
                                                <th scope="col">Price Per Unit</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">UOM (Unit of measurement)</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="items">
                                            <tr class="no_item">
                                                <td colspan="9" class="text-center pt-3">No item added</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3 border-top">
                            <div class="col-md-2 offset-8 pull-right text-right align-self-end">
                                <label>Total Items Prices</label>
                            </div>
                            <div class="col-md-2 pull-right text-right align-self-right">
                                <input type="text" class="form-control total_items_prices" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-light" data-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="view_application" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content modal-lg">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Budget Application</h5>
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                    </div>
                    <div class="modal-body">
                        <form action="" method="get" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 border-bottom">
                                    
                                    <div class="form-group">
                                        <label class="col-form-label">Application Title</label>
                                        <input type="text" name="title" value="" class="form-control title" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Application Justification</label>
                                        <textarea name="justification" class="form-control justification"disabled></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Budget Type</label>
                                        <select name="budget_type_id" class="form-control budget_types"disabled>
                                            <option value="">Please select budget type</option>
                                        </select>
                                    </div>
                                    <div class="form-group pb-3">
                                        <label class="col-form-label">Usage Type</label>
                                        <select name="usage_type_id" class="form-control usage_types"disabled>
                                            <option value="">Please select usage type</option>
                                        </select>
                                    </div>
                                </div>  
                            </div>
                        <div class="row pt-4">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="table-responsive ">
                                    <table class="table table_items">
                                        <thead>
                                            <tr class="no_item_head">
                                                <th scope="col">No</th>
                                                <th scope="col">Item Name</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Type Justification</th>
                                                <th scope="col">Price Per Unit</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">UOM (Unit of measurement)</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody class="items">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-3 border-top">
                            <div class="col-md-2 offset-8 pull-right text-right align-self-end">
                                <label>Total Items Prices</label>
                            </div>
                            <div class="col-md-2 pull-right text-right align-self-right">
                                <input type="text" class="form-control total_items_prices" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-light" data-dismiss="modal">Close</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="status_application" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content modal-lg">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Status</h5>
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="col-form-label dean_status"></label>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label bursary_status"></label>
                                </div>
                            </div>  
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-light" data-dismiss="modal">Close</a>
                    </div>
                    </form>
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
    <script>
        
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

        $(document).ready(function(){

            var empty_table = $("td").filter(function () {
                return this.value === "";
            });

            $('body').on('change paste keyup', function(){
                if($('.price_per_unit').val() != '' && $('.quantity').val() != ''){
                    $('.total').val("RM "+ $('.price_per_unit').val() * $('.quantity').val());
                }
            }); 

            var total_price_applied = new Array();

            $('.add_item').on('click', function(){

                var name = $('.item_name').val();
                var item_type = $('.application_item_types').val();
                var item_type_justification = $('.application_item_justification').val();
                var price_per_unit = $('.price_per_unit').val();
                var quantity = $('.quantity').val();
                var uom = $('.uom').val();
                var total_items_price = price_per_unit * quantity;
                total_price_applied.push(total_items_price);
                var sum = total_price_applied.reduce(function(a, b){
                    return a + b;
                }, 0);

                if($('.items tr').length >= 1){
                    $('.items').append('<tr>'+
                    '<td class="counter"></td>'+
                    '<td>'+name+'</td>'+
                    '<td>'+item_type+'</td>'+
                    '<td>'+item_type_justification+'</td>'+
                    '<td>'+price_per_unit+'</td>'+
                    '<td>'+quantity+'</td>'+
                    '<td>'+uom+'</td>'+
                    '<td>'+total_items_price+'</td>'+
                    '<td><a href="javascript:;" class="btn btn-danger remove_item" title="Delete item"><i class="fa fa-trash"></i></a></td>'+
                    '<td class="d-none"><input name="name[]" value="'+name+'" hidden></td>'+
                    '<td class="d-none"><input name="item_type[]" value="'+item_type+'" hidden></td>'+
                    '<td class="d-none"><input name="item_type_justification[]" value="'+item_type_justification+'" hidden></td>'+
                    '<td class="d-none"><input name="price_per_unit[]" value="'+price_per_unit+'" hidden></td>'+
                    '<td class="d-none"><input name="quantity[]" value="'+quantity+'" hidden></td>'+
                    '<td class="d-none"><input name="uom[]" value="'+uom+'" hidden></td>'+
                    '<td class="d-none"><input name="total_items_price[]" value="'+total_items_price+'" hidden></td>'+
                    '<td class="d-none"><input name="total_price_applied" value="'+sum+'" hidden></td>'+
                    '</tr>');
                    $('.total_items_prices').val(sum);
                    $('.no_item').hide();
                }
                else{
                    $('.no_item').show();
                }
                    
            });

            $('.items').on('click','.remove_item', function(){
                $(this).closest('tr').remove();//remove row view
                if($('.items tr').length <= 1){
                    $('.no_item').show();
                }
            });
            
            $.ajax({
                url: "{{Route('budget_types')}}",
                dataType: "json",
                success: function(data){
                    var toAppend = '';
                    $.each(data,function(i,o){
                        
                        toAppend += '<option value="'+o.id+'">'+o.type_name+'</option>';
                    });

                    $('.budget_types').append(toAppend);
                    
                    $(".budget_types").val(); 
                }
            });
            
            $.ajax({
                url: "{{Route('usage_types')}}",
                dataType: "json",
                success: function(data){
                    var toAppend = '';
                    $.each(data,function(i,o){
                    toAppend += '<option value="'+o.id+'">'+o.type_name+'</option>';
                    });

                    $('.usage_types').append(toAppend);
                }
            });

            $.ajax({
                url: "{{Route('application_item_types')}}",
                dataType: "json",
                success: function(data){
                    var toAppend = '';
                    $.each(data,function(i,o){
                    toAppend += '<option value="'+o.item_type_name+'">'+o.item_type_name+'</option>';
                    });

                    $('.application_item_types').append(toAppend);
                }
            });

            $('.application_item_types').change(function(){
                if($('.application_item_types').val()=='Asset'){
                    $('.application_item_justification').empty();
                    $('.application_item_justification').append('<option value="">Please select justification</option>'
                                                                +'<option value="New Purchase">New Purchase</option>'
                                                                +'<option value="Replacing Old Asset">Replacing Old Asset</option>');
                }
                else if($('.application_item_types').val()=='Service'){
                    $('.application_item_justification').empty();
                    $('.application_item_justification').append('<option value="">Please select justification</option>'
                                                                +'<option value="Maintenance">Maintenance</option>'
                                                                +'<option value="Training">Training</option>'
                                                                +'<option value="Consultation">Consultation</option>'
                                                                +'<option value="Honorarium">Honorarium</option>'
                                                                +'<option value="Reimbursement">Reimbursement</option>');
                }
                else{
                    $('.application_item_justification').empty();
                }
            });
            
            $('.application_view').on('click',function(){
   
                var id=$(this).data('id');
                

                // // AJAX request
                $.ajax({
                    url: '{{Route("application_view")}}',
                    type: 'get',
                    data: {"appid": id},
                    dataType: 'JSON',
                    success: function(response){ 
                        
                        $('.title').val(response.application.title);
                        $('.justification').val(response.application.justification);
                        $('.budget_types').val(response.application.budget_type_id);
                        $('.usage_types').val(response.application.usage_type_id);
                        $('.total_items_prices').val(response.application.total_price_applied);
                        $('.items').empty();

                        $.each(response.items,function(){
                            $('.items').append('<tr>'
                                +'<td class="counter"></td>'
                                +'<td>'+this.name+'</td>'
                                +'<td>'+this.item_type+'</td>'
                                +'<td>'+this.item_type_justification+'</td>'
                                +'<td>'+this.price_per_unit+'</td>'
                                +'<td>'+this.quantity+'</td>'
                                +'<td>'+this.uom+'</td>'
                                +'<td>'+this.total_items_price+'</td>'
                            +'</tr>');
                        });
                        // Display Modal
                        $('#view_application').modal('show'); 
                    }
                });
            });
        
        });
    </script>
@endsection