@extends('layouts.app')
@section('title', 'Dashboard')
@section('custom-css') 


<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')}}">  
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/charts/apexcharts.css')}}">  


<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}"> 
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-wizard.css')}}">   
 
@endsection

@section('content')
    <!-- Dashboard Ecommerce Starts -->
    <section id="dashboard-ecommerce">
        <div class="row match-height">  
            <!-- Subscribers Chart Card starts -->
            <div class="col-lg-6  col-12"> 
                <div class="card">
                    <div class="card-header"> 
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Income</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Expense</button>
                            </li> 
                          </ul>
                          <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                
                                <div class="expense_income_report">
                                    <div>
                                        <div class="content-header mb-2 mt-2">
                                            <h5 class="mb-0">Income Add</h5> 
                                        </div>
                                        <form>
                                            <div class="row">
                                                <div class="mb-1 col-md-6">
                                                    <label class="form-label" for="income_amount">Income Amount</label>
                                                    <input type="text" name="income_amount" id="income_amount" class="form-control" placeholder="00000" />
                                                </div>
                                                <div class="mb-1 col-md-6"> 
                                                    <label class="form-label" for="select2-basic">Type</label>
                                                    <select class="select2 form-select" name="income_type" id="select2-basic">
                                                        <option value="AK">Alaska</option>
                                                        <option value="HI">Hawaii</option>
                                                        <option value="CA">California</option>
                                                        <option value="NV">Nevada</option> 
                                                    </select> 
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-1 col-md-6">
                                                    <label class="form-label" for="note">Note</label>
                                                    <input type="text" name="note" id="note" class="form-control" placeholder="Note" />
                                                </div> 
                                                <div class="mb-1 col-md-6">
                                                    <label class="form-label" for="date">Date</label>
                                                    <input type="date" name="date" id="date" class="form-control" />
                                                </div> 
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="d-flex justify-content-end"> 
                                                        <button class="btn btn-primary btn-next">Add Income</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form> 
                                    </div> 
                                </div>

                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="expense_income_report">
                                    <div>
                                        <div class="content-header mb-2 mt-2">
                                            <h5 class="mb-0">Expense Amount</h5> 
                                        </div>
                                        <form>
                                            <div class="row">
                                                <div class="mb-1 col-md-6">
                                                    <label class="form-label" for="expense_amount">Expense Amount</label>
                                                    <input type="text" name="expense_amount" id="expense_amount" class="form-control" placeholder="00000" />
                                                </div>
                                                <div class="mb-1 col-md-6"> 
                                                    <label class="form-label" for="select2-basic">Type</label>
                                                    <select class="select2 form-select"  name="expense_type" id="select2-basic">
                                                        <option value="AK">Alaska</option>
                                                        <option value="HI">Hawaii</option>
                                                        <option value="CA">California</option>
                                                        <option value="NV">Nevada</option> 
                                                    </select> 
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-1 col-md-6">
                                                    <label class="form-label" for="expense_note">Note</label>
                                                    <input type="text" name="expense_note" id="expense_note" class="form-control" placeholder="Note" />
                                                </div> 
                                                <div class="mb-1 col-md-6">
                                                    <label class="form-label" for="expense_date">Date</label>
                                                    <input type="date" name="expense_date" id="expense_date" class="form-control" />
                                                </div> 
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="d-flex justify-content-end"> 
                                                        <button class="btn btn-primary btn-next">Add Income</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form> 
                                    </div> 
                                </div>
                            </div> 
                          </div>
                          
                        
                    </div>
                </div>
            </div>
            <!-- Subscribers Chart Card ends -->

            <!-- Subscribers Chart Card starts -->
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sessions By Device</h4>
                    </div>
                    <div class="card-body">
                        <canvas class="doughnut-chart-ex chartjs" data-height="275"></canvas>
                        <div class="d-flex justify-content-between mt-3 mb-1">
                            <div class="d-flex align-items-center">
                                <i data-feather="monitor" class="font-medium-2 text-primary"></i>
                                <span class="fw-bold ms-75 me-25">Desktop</span>
                                <span>- 80%</span>
                            </div>
                            <div>
                                <span>2%</span>
                                <i data-feather="arrow-up" class="text-success"></i>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <div class="d-flex align-items-center">
                                <i data-feather="tablet" class="font-medium-2 text-warning"></i>
                                <span class="fw-bold ms-75 me-25">Mobile</span>
                                <span>- 10%</span>
                            </div>
                            <div>
                                <span>8%</span>
                                <i data-feather="arrow-up" class="text-success"></i>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <i data-feather="tablet" class="font-medium-2 text-success"></i>
                                <span class="fw-bold ms-75 me-25">Tablet</span>
                                <span>- 10%</span>
                            </div>
                            <div>
                                <span>-5%</span>
                                <i data-feather="arrow-down" class="text-danger"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <!-- Subscribers Chart Card ends -->

            <!-- Orders Chart Card starts -->
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header flex-column align-items-start ">
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
                    <div class="card-header">
                        <div>
                            <h4 class="card-title">Statistics</h4>
                            <span class="card-subtitle text-muted">Commercial networks and enterprises</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas class="line-chart-ex chartjs" data-height="450"></canvas>
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

    <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script> 
    <script src="{{asset('app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/charts/chart.min.js')}}"></script> 
    <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script> 
    <script src="{{asset('app-assets/js/scripts/charts/chart-chartjs.js')}}"></script>  

    <script src="{{asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script> 
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script> 
    <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')}}"></script>  
    <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>  
    <script src="{{asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js')}}"></script>   
    <script src="{{asset('app-assets/js/scripts/pages/app-invoice-list.js')}}"></script>   
    <script src="{{asset('app-assets/js/scripts/forms/form-wizard.js')}}"></script>   

    <script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('app-assets/js/core/app.js')}}"></script>

@endsection