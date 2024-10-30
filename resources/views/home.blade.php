@extends('layouts.app')
@section('title', 'Dashboard')
@section('custom-css') 


<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')}}"> 

<style> 
    .avatar.avatar-xl .avatar-content {
        height: 40px;
        width: 40px; 
    }
    svg.font-large-1 {
        height: 1rem !important;
        width: 1rem !important;
    }
</style>

@endsection

@section('content')
    <!-- Dashboard Ecommerce Starts -->
    <section id="dashboard-ecommerce">
        <div class="row match-height">
            <!-- Greetings Card starts -->
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card card-congratulations">
                    <div class="card-body text-center">
                        <img src="../../../app-assets/images/elements/decore-left.png" class="congratulations-img-left" alt="card-img-left" />
                        <img src="../../../app-assets/images/elements/decore-right.png" class="congratulations-img-right" alt="card-img-right" />
                        <div class="avatar avatar-xl bg-primary shadow">
                            <div class="avatar-content">
                                <i data-feather="award" class="font-large-1"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="mb-1 text-white">Congratulations {{ Auth::user()->name}} ,</h1>
                            <p class="card-text m-auto w-75">
                                You have savings <strong>57.6%</strong> more today. Check your finance.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Greetings Card ends -->

            <!-- Subscribers Chart Card starts -->
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header flex-column align-items-start pb-0">
                        <div class="avatar bg-light-primary p-50 m-0">
                            <div class="avatar-content">
                                <i data-feather="users" class="font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="fw-bolder mt-1">45.5k</h2>
                        <p class="card-text">Income</p>
                    </div>
                    <div id="gained-chart"></div>
                </div>
            </div>
            <!-- Subscribers Chart Card ends -->

            <!-- Orders Chart Card starts -->
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header flex-column align-items-start pb-0">
                        <div class="avatar bg-light-warning p-50 m-0">
                            <div class="avatar-content">
                                <i data-feather="package" class="font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="fw-bolder mt-1">38.4K</h2>
                        <p class="card-text">Expense</p>
                    </div>
                    <div id="order-chart"></div>
                </div>
            </div>
            <!-- Orders Chart Card ends -->
        </div>

        
        <div class="row">
            <div class="col-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <h4 class="card-title">Statistics</h4>
                        <div class="d-flex align-items-center">
                            <p class="card-text font-small-2 me-25 mb-0">Updated 1 month ago</p>
                        </div>
                    </div>
                    <div class="card-body statistics-body">
                        <div class="row">
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-primary me-2">
                                        <div class="avatar-content">
                                            <i data-feather="trending-up" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">230k</h4>
                                        <p class="card-text font-small-3 mb-0">Sales</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-info me-2">
                                        <div class="avatar-content">
                                            <i data-feather="user" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">8.549k</h4>
                                        <p class="card-text font-small-3 mb-0">Customers</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-danger me-2">
                                        <div class="avatar-content">
                                            <i data-feather="box" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">1.423k</h4>
                                        <p class="card-text font-small-3 mb-0">Products</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12">
                                <div class="d-flex flex-row">
                                    <div class="avatar bg-light-success me-2">
                                        <div class="avatar-content">
                                            <i data-feather="dollar-sign" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="my-auto">
                                        <h4 class="fw-bolder mb-0">$9745</h4>
                                        <p class="card-text font-small-3 mb-0">Revenue</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row match-height">

            <!-- Medal Card -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-baseline flex-sm-row flex-column">
                        <h4 class="card-title">Data Science</h4>
                        <div class="header-right d-flex align-items-center mt-sm-0 mt-1">
                            <i data-feather="calendar"></i>
                            <input type="text" class="form-control flat-picker border-0 shadow-none bg-transparent pe-0" placeholder="YYYY-MM-DD" />
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas class="line-area-chart-ex chartjs" data-height="450"></canvas>
                    </div>
                </div>
            </div>
            <!-- Medal Card --> 
        </div>


        <div class="row">
            <div class="row">
                <div class="col-12">
                    <div class="card invoice-list-wrapper">
                        <div class="card-datatable table-responsive">
                            <table class="invoice-list-table table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>#</th>
                                        <th><i data-feather="trending-up"></i></th>
                                        <th>Client</th>
                                        <th>Total</th>
                                        <th class="text-truncate">Issued Date</th>
                                        <th>Balance</th>
                                        <th>Invoice Status</th>
                                        <th class="cell-fit">Actions</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </section>
    <!-- Dashboard Ecommerce ends -->
@endsection

@section('script')
{{-- 
<script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script> 
<script src="{{asset('app-assets/js/core/app-menu.js')}}"></script> 
<script src="{{asset('app-assets/js/core/app.js')}}"></script>  --}}


<script src="{{asset('app-assets/vendors/js/charts/chart.min.js')}}"></script> 
<script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script> 
<script src="{{asset('app-assets/js/scripts/charts/chart-chartjs.js')}}"></script>  

<script src="{{asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script> 
<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script> 
<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')}}"></script>  
<script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>  
<script src="{{asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js')}}"></script>   
<script src="{{asset('app-assets/js/scripts/pages/app-invoice-list.js')}}"></script>   

 

@endsection