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
                        <h5 class="card-header">Edit Application</h5>
                        <form action="{{Route('application_update', $applications->id)}}" method="post" novalidate>
                        @csrf
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 border-bottom">
                                        <div class="form-group">
                                            <label class="col-form-label">Application Title</label>
                                            <input type="text" name="title_update" class="form-control title" value="{{$applications->title}}">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Application Justification</label>
                                            <textarea name="justification_update" class="form-control justification">{{$applications->justification}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Budget Type</label>
                                            <select name="budget_type_id_update" class="form-control budget_types">
                                                <option value="">Please select budget type</option>
                                            </select>
                                        </div>
                                        <div class="form-group pb-3">
                                            <label class="col-form-label">Usage Type</label>
                                            <select name="usage_type_id_update" class="form-control usage_types">
                                                <option value="" >Please select usage type</option>
                                            </select>
                                        </div>
                                    </div>  
                                </div>
                                <div class="row pt-3">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Item Name</label>
                                            <input type="text" name="name_update" class="form-control item_name">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                        <div class="form-group">
                                            <label class="col-form-label item_type">Type</label>
                                            <select name="application_item_type_id_update" class="form-control application_item_types">
                                                <option value="">Please select item type</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Type Justification</label>
                                            <select name="application_item_justification_update" class="form-control application_item_justification">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Price Per Unit</label>
                                            <input type="number" name="price_update" class="form-control price_per_unit">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Quantity</label>
                                            <input type="number" name="quantity_update" class="form-control quantity">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                        <div class="form-group">
                                            <label class="col-form-label">UOM (Unit of measurement)</label>
                                            <input type="text" name="oum_update" class="form-control uom">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pb-3">
                                        <div class="form-group">
                                        <label class="col-form-label">Total</label>
                                        <input type="text" name="total_items_price_update" class="form-control total" disabled>
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
                                                    @if(count($items)>0)
                                                        @foreach($items as $key=>$item)
                                                        <tr>
                                                            <td class="counter"></td>
                                                            <td><input type="text" class="form-control" value="{{$item->name}}" disabled></td>
                                                            <td><input type="text" class="form-control" value="{{$item->item_type}}" disabled></td>
                                                            <td><input type="text" class="form-control" value="{{$item->item_type_justification}}" disabled></td>
                                                            <td><input type="text" class="form-control" value="{{$item->price_per_unit}}" disabled></td>
                                                            <td><input type="text" class="form-control" value="{{$item->quantity}}" disabled></td>
                                                            <td><input type="text" class="form-control" value="{{$item->uom}}" disabled></td>
                                                            <td><input type="text" class="form-control" value="{{$item->total_items_price}}" disabled></td>
                                                            <td><a href="javscript:;" class="btn btn-danger remove_item" data-id="{{$item->id}}" title="Delete item"><i class="fa fa-trash"></i></a></td>
                                                        </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="9" class="text-center pt-5">No Item Added</td>
                                                        </tr>
                                                    @endif
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
                                        <input type="text" class="form-control total_items_prices" value="{{$applications->total_price_applied}}" disabled>
                                    </div>
                                </div>
                                <div class="pull-right pt-5 pb-3">
                                    <a href="{{Route('new_application')}}" class="btn btn-light" data-dismiss="modal">Cancel</a>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
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
    <script>
        
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

        $(document).ready(function(){

            var empty_table = $("td").filter(function () {
                return this.value === "";
            });
            $('.total').val($('.price_per_unit').val() * $('.quantity').val());
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
                console.log(sum);
                if($('.items tr').length >= 1){
                    $('.items').append('<tr>'+
                    '<td class="counter"></td>'+
                    '<td><input class="form-control" value="'+name+'" disabled></td>'+
                    '<td><input class="form-control" value="'+item_type+'" disabled></td>'+
                    '<td><input class="form-control" value="'+item_type_justification+'" disabled></td>'+
                    '<td><input class="form-control" value="'+price_per_unit+'" disabled></td>'+
                    '<td><input class="form-control" value="'+quantity+'" disabled></td>'+
                    '<td><input class="form-control" value="'+uom+'" disabled></td>'+
                    '<td><input class="form-control" value="'+total_items_price+'" disabled></td>'+
                    '<td><a href="javascript:;" class="btn btn-danger remove_item" title="Delete item"><i class="fa fa-trash"></i></a></td>'+
                    '<td class="d-none"><input name="total_price_applied" value="'+sum+'" hidden></td>'+
                    '</tr>');
                    $('.total_items_prices').val(sum + {{$applications->total_price_applied}});
                    $('.no_item').hide();
                    $.ajax({
                    url: '{{Route("item_update_new", $applications->id)}}',
                    type: 'post',
                    data: {
                            "_token": "{!! csrf_token() !!}",
                            "name_update": $('.item_name').val(),
                            "item_type_update": $('.application_item_types').val(),
                            "item_type_justification_update": $('.application_item_justification').val(),
                            "price_per_unit_update": $('.price_per_unit').val(),
                            "quantity_update": $('.quantity').val(),
                            "uom_update": $('.uom').val(),
                            "total_items_price_update": total_items_price,
                            "application_id_update": $('.application_id').val(),
                          },
                    dataType: 'JSON',
                        success: function(response){ 
                        }
                    });
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
                var id = $(this).data('id');
                console.log(id);
                $.ajax({
                    url: '{{Route("item_delete")}}',
                    type: 'get',
                    data: { 'id':id, "_token": "{!! csrf_token() !!}"},
                    dataType: 'JSON',
                        success: function(response){ 
                        }
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
                    $(".budget_types option[value='{{$applications->budget_type_id}}']").attr("selected","selected");
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
                    $(".usage_types option[value='{{$applications->usage_type_id}}']").attr("selected","selected");
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


        });
    </script>
@endsection