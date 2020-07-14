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
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text">Total Applications</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">{{count($total_application)??0}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-success">Total Applications Approved</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">{{count($approved_applications)??0}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-danger">Total Applications Rejected</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">{{count($rejected_applications)??0}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-info">Total Applications In Progress</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">{{count($inprogress_applications)??0}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                            <th class="border-0">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($total_application) > 0)
                                        @foreach($total_application as $key=>$application)
                                            <tr>
                                                <td class="counter"></td>
                                                <td>{{$application->title}}</td>
                                                <td>{{$application->justification}}</td>
                                                <td>{{$application->budgetTypes->type_name ?? 'empty'}}</td>
                                                <td>{{$application->usageTypes->type_name ?? 'empty'}}</td>
                                                @if($application->dean_status_id == '1' and $application->bursary_status_id == '1')
                                                    <td><span class="badge-dot badge-success mr-1"></span>{{$application->status->status_name ?? 'empty'}}</td>
                                                @elseif($application->dean_status_id == '2' or $application->bursary_status_id == '2')
                                                    <td><span class="badge-dot badge-danger mr-1"></span>{{$application->status->status_name ?? 'empty'}}</td>
                                                @elseif($application->dean_status_id == '3' and $application->bursary_status_id == '3')
                                                    <td><span class="badge-dot badge-info mr-1"></span>{{$application->status->status_name ?? 'empty'}} (Dean)</td>
                                                @elseif($application->dean_status_id == '1' and $application->bursary_status_id == '3')
                                                    <td><span class="badge-dot badge-info mr-1"></span>In-Progress (Bursary Officer)</td>
                                                @endif
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
@endsection