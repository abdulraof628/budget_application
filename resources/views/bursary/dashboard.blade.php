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
    <title>Dashboard</title>
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
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->
        <div class="ecommerce-widget">
<!-- 
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text">Total Applications</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1"></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-success">Total Applications Approved</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1"></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-danger">Total Applications Rejected</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1"></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-info">Total Applications In Progress</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1"></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <!-- ============================================================== -->
            
                <!-- ============================================================== -->

                                <!-- recent orders  -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">All Application Activities</h5>
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
                                                <td>
                                                    <a href="javascript:;" class="application_view" data-id="{{$application->id}}" title="View details"><i class="fa fa-eye fa-2x mr-3"></i></a>
                                                    <a href="javascript:;" class="application_approve" data-method="{{$application->id}}" title="Approve"><i class="fa fa-check fa-2x mr-3"></i></a>
                                                    <a href="#remark" class="application_reject" data-toggle="modal" title="Reject" data-id="{{$application->id}}"><i class="fa fa-close fa-2x mr-3"></i></a>
                                                </td>
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
                <div class="row pt-3 border-top">
                    <div class="col-md-2 offset-8 pull-right text-right align-self-end">
                        <label>Revise Amount</label>
                    </div>
                    <div class="col-md-2 pull-right text-right align-self-right">
                        <input type="text" class="form-control revised_amount">
                        <form action="">
                            
                        </form>
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
<div class="modal fade" id="remark" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Remarks</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
            </div>
            <div class="modal-body">
                <form action="" method="get" novalidate>
                @csrf
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="form-group">
                            <textarea name="remark" class="form-control remark_text"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success remark">Submit</button>
            </div>
                </form>
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
        
        $('.application_view').on('click',function(){
    
            var id=$(this).data('id');
    
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

        $('.application_approve').on('click',function(){
        
            var id=$(this).data('method');
            console.log(id);
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '{{Route("application_approve_dean", 'id')}}',
                type: 'post',
                data: {"_token": "{{ csrf_token() }}","appid": id},
                dataType: 'JSON',
                success: function(response){ 
                },
                error: function(response) {
                    location.reload();
                }
            });
        });

        $('.application_reject').on('click',function(){

            var id=$(this).data('id');

            $('.remark').on('click',function(){
                
                var remark=$('.remark_text').val();
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: '{{Route("application_reject_bursary", 'id')}}',
                    type: 'post',
                    data: {"_token": "{{ csrf_token() }}",
                        "appid": id,
                        "remark": remark},
                    dataType: 'JSON',
                    success: function(response){ 
                    },
                    error: function(response) {
                        location.reload();
                    }
                });
            });
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
    });
</script>
@endsection
