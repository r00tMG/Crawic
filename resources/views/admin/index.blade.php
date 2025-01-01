@extends('layouts/default')

{{-- Page title --}}
@section('title')
Josh Admin Template
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

<link href="{{ asset('vendors/fullcalendar/css/fullcalendar.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/pages/calendar_custom.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" media="all" href="{{ asset('vendors/bower-jvectormap/css/jquery-jvectormap-1.2.2.css') }}" />
<link rel="stylesheet" href="{{ asset('vendors/animate/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/pages/only_dashboard.css') }}" />
<meta name="_token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('vendors/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css') }}">

@stop

{{-- Page content --}}
@section('content')
<style type="text/css">
    #calendar .btn-group {
        display: none !important;
    }
</style>
<section class="content-header">
    <h1>Admin Dashboard</h1>
    <ol class="breadcrumb">
        <li class=" breadcrumb-item active">
            <a href="#">
                <i class="livicon" data-name="home" data-size="16" data-color="#333" data-hovercolor="#333"></i>
                Dashboard
            </a>
        </li>
    </ol>
</section>
<section class="content indexpage pr-3 pl-3">
    <div class="row">
        <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
            <!-- Trans label pie charts strats here-->
            <div class="lightbluebg bg-primary text-white no-radius">
                <div class="card-body squarebox square_boxs cardpaddng">
                    <div class="row">
                        <div class="col-12 float-left nopadmar">
                            <div class="row">
                                <div class="square_box col-6 text-right">
                                    <span>Active Users</span>

                                    <div class="number" id="myTargetElement1"></div>
                                </div>
                                <div class="col-6">
                                    <i class="livicon  float-right" data-name="eye-open" data-l="true" data-c="#fff"
                                        data-hc="#fff" data-s="70"></i>
                                </div>
                                

                            </div>
                            <!-- <div class="row"> -->
                                <!-- <div class="col-6">
                                    <small class="stat-label">Last Week</small>
                                    <h4 id="myTargetElement1.1"></h4>
                                </div>
                                <div class="col-6 text-right">
                                    <small class="stat-label">Last Month</small>
                                    <h4 id="myTargetElement1.2"></h4>
                                </div> -->
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
            <!-- Trans label pie charts strats here-->
            <div class="redbg no-radius">
                <div class="card-body bg-danger text-white squarebox square_boxs cardpaddng">
                    <div class="row">
                        <div class="col-12 float-left nopadmar">
                            <div class="row">
                                <div class="square_box col-6 float-left">
                                    <span>Today's Sales</span>

                                    <div class="number" id="myTargetElement2"></div>
                                </div>
                                <div class="col-6">
                                    <i class="livicon float-right" data-name="piggybank" data-l="true" data-c="#fff"
                                        data-hc="#fff" data-s="70"></i>
                                </div>

                            </div>
                            <!-- <div class="row">
                                <div class="col-6">
                                    <small class="stat-label">Last Week</small>
                                    <h4 id="myTargetElement2.1"></h4>
                                </div>
                                <div class="col-6 text-right">
                                    <small class="stat-label">Last Month</small>
                                    <h4 id="myTargetElement2.2"></h4>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
            <!-- Trans label pie charts strats here-->
            <div class="goldbg bg-warning text-white no-radius">
                <div class="card-body squarebox square_boxs cardpaddng">
                    <div class="row">
                        <div class="col-12 float-left nopadmar">
                            <div class="row">
                                <div class="square_box col-6 float-left">
                                    <span style="text-wrap: nowrap;" >Today Expired Domains</span>

                                    <div class="number" id="myTargetElement3"></div>
                                </div>
                                <div class="col-6">
                                    <i class="livicon float-right" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-6">
                                    <small class="stat-label">Last Week</small>
                                    <h4 id="myTargetElement3.1"></h4>
                                </div>
                                <div class="col-6 text-right">
                                    <small class="stat-label">Last Month</small>
                                    <h4 id="myTargetElement3.2"></h4>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
            <!-- Trans label pie charts strats here-->
            <div class="palebluecolorbg bg-success text-white no-radius">
                <div class="card-body squarebox square_boxs cardpaddng">
                    <div class="row">
                        <div class="col-12 float-left nopadmar">
                            <div class="row">
                                <div class="square_box col-6 float-left">
                                    <span style="text-wrap: nowrap;" >Registered Users</span>

                                    <div class="number" id="myTargetElement4"></div>
                                </div>
                                <div class="col-6">
                                    <i class="livicon float-right" data-name="users" data-l="true" data-c="#fff"
                                        data-hc="#fff" data-s="70"></i>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-6">
                                    <small class="stat-label">Last Week</small>
                                    <h4 id="myTargetElement4.1"></h4>
                                </div>
                                <div class="col-6 text-right">
                                    <small class="stat-label">Last Month</small>
                                    <h4 id="myTargetElement4.2"></h4>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/row-->
    <!-- <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-8 col-12 my-3">
            <div class="card card-border">
                <div class="card-header">
                    <span>
                        <i class="livicon" data-name="dashboard" data-size="20" data-loop="true" data-c="#F89A14"
                            data-hc="#F89A14"></i>
                        Realtime Server Load
                        <small>- Load on the Server</small>
                    </span>
                </div>
                <div class="card-body">
                    <div id="realtimechart" style="height:350px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4 col-12 my-3">
            <div class="card blue_gradiant_bg">
                <div class="card-header">
                    <span class=" card_font">
                        <i class="livicon" data-name="linechart" data-size="16" data-loop="true" data-c="#fff"
                            data-hc="white"></i>
                        Server Stats
                        <small>- Monthly Report</small>
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6 col-12">
                            <div class="sparkline-chart">
                                <div class="number" id="sparkline_bar"></div>
                                <h3 class="title">Network</h3>
                            </div>
                        </div>
                        <div class="margin-bottom-10 visible-sm"></div>
                        <div class="margin-bottom-10 visible-sm"></div>
                        <div class="col-sm-6">
                            <div class="sparkline-chart">
                                <div class="number" id="sparkline_line"></div>
                                <h3 class="title">Load Rate</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card green_gradiante_bg">
                <div class="card-header">
                    <span class=" card_font">
                        <i class="livicon" data-name="spinner-six" data-size="16" data-loop="false" data-c="#fff"
                            data-hc="white"></i>
                        Result vs Target
                    </span>
                </div>
                <div class="card-body nopadmar">
                    <div class="row">
                        <div class="col-sm-6 text-center">
                            <h4 class="small-heading">Sales</h4>
                            <span class="chart cir chart-widget-pie widget-easy-pie-1" data-percent="45"><span
                                    class="percent">45</span>
                            </span>
                        </div>
                        
                        <div class="col-sm-6 text-center">
                            <h4 class="small-heading">Reach</h4>
                            <span class="chart cir chart-widget-pie widget-easy-pie-3" data-percent="25">
                                <span class="percent">25</span>
                            </span>
                        </div>
                        
                    </div>

                    
                </div>
                
            </div>
            
        </div>
    </div> -->
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 my-3">
            <div class="card card-border">
                <div class="card-header bg-success text-white">

                    <i class="livicon" data-name="calendar" data-size="16" data-loop="true" data-c="#fff"
                        data-hc="#fff"></i>API Calendar

                </div>
                <div class="card-body">
                    <!-- <div id='external-events'></div> -->
                    <div id="calendar"></div>
                    <!-- <div id="fullCalModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 id="modalTitle" class="modal-title"></h4>
                                    <button type="button" class="close" data-dismiss="modal"><span
                                            aria-hidden="true">×</span> <span class="sr-only">close</span></button>

                                </div>
                                <div id="modalBody" class="modal-body">
                                    <i class="mdi-action-alarm-on"></i>&nbsp;&nbsp;Start: <span
                                        id="startTime"></span>&nbsp;&nbsp;-
                                    End: <span id="endTime"></span>
                                    <h4 id="eventInfo"></h4>
                                    <br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-raised btn-danger " data-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="box-footer pad-5">
                        <a href="#" class="btn btn-success btn-block createevent_btn clr" data-toggle="modal"
                            data-target="#myModal">Create event
                        </a>
                    </div> -->
                    <!-- Modal -->
                    <!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title mr-auto" id="myModalLabel">
                                        <i class="fa fa-plus"></i> Create Event
                                    </h4>
                                    <button type="button" class="close reset" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="input-group">
                                        <input type="text" id="new-event" class="form-control" placeholder="Event">
                                        <div class="input-group-btn">
                                            <button type="button" id="color-chooser-btn"
                                                class="color-chooser btn btn-info dropdown-toggle"
                                                data-toggle="dropdown">
                                                Type
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu float-right" id="color-chooser">
                                                <li>
                                                    <a class="palette-primary" href="#">Primary</a>
                                                </li>
                                                <li>
                                                    <a class="palette-success" href="#">Success</a>
                                                </li>
                                                <li>
                                                    <a class="palette-info" href="#">Info</a>
                                                </li>
                                                <li>
                                                    <a class="palette-warning" href="#">warning</a>
                                                </li>
                                                <li>
                                                    <a class="palette-danger" href="#">Danger</a>
                                                </li>
                                                <li>
                                                    <a class="palette-default" href="#">Default</a>
                                                </li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success mr-auto" id="add-new-event"
                                        data-dismiss="modal">
                                        <i class="fa fa-plus"></i> Add
                                    </button>
                                    <button type="button" class="btn btn-danger justify-content-end reset"
                                        data-dismiss="modal">
                                        Close
                                        <i class="fa fa-times"></i>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="modal fade" id="evt_modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">
                                        <i class="fa fa-plus"></i>
                                        Edit Event
                                    </h4>
                                    <button type="button" class="close reset" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>


                                </div>
                                <div class="modal-body">
                                    <div class="input-group">
                                        <input type="text" id="event_title" class="form-control" placeholder="Event">
                                        <div class="input-group-btn">
                                            <button type="button" id="color-chooser-btn_edit"
                                                class="color-chooser btn btn-info dropdown-toggle "
                                                data-toggle="dropdown">
                                                Type
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu float-right" id="color-chooser">
                                                <li>
                                                    <a class="palette-primary" href="#">Primary</a>
                                                </li>
                                                <li>
                                                    <a class="palette-success" href="#">Success</a>
                                                </li>
                                                <li>
                                                    <a class="palette-info" href="#">Info</a>
                                                </li>
                                                <li>
                                                    <a class="palette-warning" href="#">warning</a>
                                                </li>
                                                <li>
                                                    <a class="palette-danger" href="#">Danger</a>
                                                </li>
                                                <li>
                                                    <a class="palette-default" href="#">Default</a>
                                                </li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success mr-auto text_save"
                                        data-dismiss="modal">
                                        Update
                                    </button>
                                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal">
                                        Close
                                        <i class="fa fa-times"></i>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- To do list -->
        <div class="col-lg-6 col-md-6 col-sm-6 my-3">
            <div class="card todolist">
                <div class="card-header bg-primary text-white ">
                    <span class=" background_color">
                        <i class="livicon" data-name="medal" data-size="18" data-color="white" data-hc="white"
                            data-l="true"></i>
                        API Status
                    </span>
                </div>
                <div class="card-body nopadmar top_height">
                    <div class="card-body">
                        <div class="scroller_height">
                            <div class="row list_of_items">
                                <div class="todolist_list showactions list1" id="208"> 
                                <?php
                                    $today = \Carbon\Carbon::now()->toDateString();
                                    $eda = \DB::table('expiry_domain_cronjob')->whereDate('created_at', $today)->first();
                                ?>  
                                        <div class="col-md-8 col-sm-8 col-8 nopadmar custom_textbox1"> 
                                    <div class="todotext  todoitemjs">Expired Domain Api
                                        <?php if ($eda): ?>
                                            <span class="badge badge-success">Success</span>
                                        <?php else: ?>
                                            <span class="badge badge-warning">Fetching</span>
                                        <?php endif ?>
                                        
                                    </div> 
                                    <div class="date"><span class="label label-default end_date">Last Fetched: 
                                     <?php if ($eda): ?>
                                        <?php echo $today ?>
                                    <?php else: ?>
                                        Fetching
                                    <?php endif ?>
                                </span></div> </div>

                                </div>


                                <div class="todolist_list showactions list1" id="208"> 
                                
                                        <div class="col-md-8 col-sm-8 col-8 nopadmar custom_textbox1"> 
                                    <div class="todotext  todoitemjs">Domain Status Api
                                        
                                            <span class="badge badge-success">Working</span>
                                        
                                    </div> 
                                    <div class="date"><span class="label label-default end_date">Last Checked: 
                                     
                                        <?php echo $today ?>
                                    
                                </span></div> </div>

                                </div>

                                <div class="todolist_list showactions list1" id="208"> 
                                
                                        <div class="col-md-8 col-sm-8 col-8 nopadmar custom_textbox1"> 
                                    <div class="todotext  todoitemjs">Domain SSL Api
                                        
                                            <span class="badge badge-success">Working</span>
                                        
                                    </div> 
                                    <div class="date"><span class="label label-default end_date">Last Checked: 
                                     
                                        <?php echo $today ?>
                                    
                                </span></div> </div>

                                </div>

                                <div class="todolist_list showactions list1" id="208"> 
                                
                                        <div class="col-md-8 col-sm-8 col-8 nopadmar custom_textbox1"> 
                                    <div class="todotext  todoitemjs">Domain DNS Api
                                        
                                            <span class="badge badge-success">Working</span>
                                        
                                    </div> 
                                    <div class="date"><span class="label label-default end_date">Last Checked: 
                                     
                                        <?php echo $today ?>
                                    
                                </span></div> </div>

                                </div>
                            
                            </div>
                            
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- <div class="row">
        <div class="col-md-4 col-sm-12 col-lg-4 col-12 my-3">
            <div class="card ">
                <div class="card-header bg-danger bdr text-white">
                    <span>
                        <i class="livicon" data-name="mail" data-size="18" data-color="white" data-hc="white"
                            data-l="true"></i>
                        Quick Mail
                    </span>
                </div>
                <div class="card-body">
                    <div class="compose row">
                        <label class="col-sm-1 col-md-3 d-none d-sm-block" style="padding: 0">To:</label>
                        <input type="text" class="col-sm-11 col-md-9 col-12" placeholder="name@email.com "
                            tabindex="1" />

                        <div class="clear"></div>
                        <label class="col-sm-1 col-md-3 hidden-xs" style="padding: 0">Subject:</label>
                        <input type="text" class="col-sm-11 col-md-9 col-12" tabindex="1" placeholder="Subject" />

                        <div class="clear"></div>
                        <div class="box-body">
                            <form>
                                <textarea class="textarea textarea_home form-control"
                                    placeholder="Write mail content here" cols="6" rows="6"></textarea>
                            </form>
                        </div>
                        <div class="ml-auto my-2">
                            <a href="#" class="btn btn-danger clr">Send</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 my-3">
            <div class="card card-border">

                <div class="card-header">
                    <h4 class="card-title float-left margin-top-10">
                        <i class="livicon" data-name="map" data-size="16" data-loop="true" data-c="#515763"
                            data-hc="#515763"></i>
                        Visitors Map
                    </h4>

                    <div class="btn-group float-right">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                            <i class="livicon" data-name="settings" data-size="16" data-loop="true" data-c="#515763"
                                data-hc="#515763"></i>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a class="card-collapse collapses" href="#">
                                    <i class="fa fa-angle-up"></i>
                                    <span>Collapse</span>
                                </a>
                            </li>
                            <li>
                                <a class="card-refresh" href="#">
                                    <i class="fa fa-redo"></i>
                                    <span>Refresh</span>
                                </a>
                            </li>
                            <li>
                                <a class="card-config" href="#card-config" data-toggle="modal">
                                    <i class="fa fa-wrench"></i>
                                    <span>Configurations</span>
                                </a>
                            </li>
                            <li>
                                <a class="card-expand" href="#">
                                    <i class="fa fa-expand"></i>
                                    <span>Fullscreen</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="card-body nopadmar nopad_lr">
                    <div id="world-map-markers" style="width:100%; height:300px;"></div>
                </div>
            </div>
        </div>
    </div> -->
</section>
<div class="modal fade" id="editConfirmModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Alert</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <p>You are already editing a row, you must save or cancel that row before edit/delete a new row</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('vendors/moment/js/moment.min.js') }}"></script>
<script type="text/javascript"
    src="{{ asset('vendors/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- EASY PIE CHART JS -->
<script src="{{ asset('vendors/bower-jquery-easyPieChart/js/easypiechart.min.js') }}"></script>
<script src="{{ asset('vendors/bower-jquery-easyPieChart/js/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('vendors/bower-jquery-easyPieChart/js/jquery.easingpie.js') }}"></script>
<!--for calendar-->
<script src="{{ asset('vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/fullcalendar/js/fullcalendar.min.js') }}" type="text/javascript"></script>
<!--   Realtime Server Load  -->
<script src="{{ asset('vendors/flotchart/js/jquery.flot.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendors/flotchart/js/jquery.flot.resize.js') }}" type="text/javascript"></script>
<!--Sparkline Chart-->
<script src="{{ asset('vendors/sparklinecharts/jquery.sparkline.js') }}"></script>
<!-- Back to Top-->
<script type="text/javascript" src="{{ asset('vendors/countUp.js/js/countUp.js') }}"></script>
<!--   maps -->
<script src="{{ asset('vendors/bower-jvectormap/js/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('vendors/bower-jvectormap/js/jquery-jvectormap-world-mill-en.js') }}"></script>
<!--  todolist-->
<script src="{{ asset('js/pages/todolist.js') }}"></script>
<!-- <script src="{{ asset('js/pages/dashboard.js') }}" type="text/javascript"></script> -->


<!--//jquery-ui-->


<script type="text/javascript">
    //sparkline
$('#sparkline_bar').sparkline([9, 11, 12, 13, 12, 13, 10, 14, 13, 11, 11, 12, 11, 11, 10, 12, 11], {
    type: 'bar',
    width: '100',
    barWidth: 5,
    height: '55',
    barColor: '#fff',
    negBarColor: '#fff',
});

$('#sparkline_line').sparkline(
    [9, 10, 9, 10, 10, 11, 12, 10, 10, 11, 11, 12, 11, 10, 12, 11, 10, 12],
    {
        type: 'line',
        width: '100',
        height: '55',
        fillColor: '#fff',
        lineColor: '#fff',
    }
);

/* Calendar */
function ini_events(ele) {
    ele.each(function() {
        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
            title: $.trim($(this).text()), // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        $(this).draggable({
            zIndex: 1070,
            revert: true, // will cause the event to go back to its
            revertDuration: 0, //  original position after the drag
        });
    });
}
ini_events($('#external-events div.external-event'));

/* initialize the calendar
 -----------------------------------------------------------------*/
//Date for the calendar events (dummy data)
//Date for the calendar events (dummy data)
var date = new Date();
var d = date.getDate(),
    m = date.getMonth(),
    y = date.getFullYear();
$('#calendar').fullCalendar({
    themeSystem: 'bootstrap4',
    displayEventTime: false,
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay',
    },
    buttonText: {
        prev: '',
        next: '',
        today: 'Today',
        month: 'Month',
        week: 'Week',
        day: 'Day',
    },
    //Random events
    events: [
        <?php foreach (\DB::table('expiry_domain_cronjob')->get() as $row): ?>
            {
                title: '<?= $row->total_domain ?> Domains',
                start: new Date(<?= date('Y',strtotime($row->created_at)) ?>, <?= (date('m',strtotime($row->created_at))-1) ?>, <?= date('d',strtotime($row->created_at)) ?>),
                backgroundColor: '#EF6F6C',
            },
        <?php endforeach ?>
        
        // {
        //     title: 'Holiday',
        //     start: new Date(y, m, 10),
        //     backgroundColor: '#01BC8C',
        // },
        // {
        //     title: 'Seminar',
        //     start: new Date(y, m, 12),
        //     backgroundColor: '#67C5DF',
        // },
        // {
        //     title: 'Product Seminar',
        //     start: '2018-01-18',
        //     end: '2018-01-20',
        //     backgroundColor: '#A9B6BC',
        // },
        // {
        //     title: 'Anniversary Celebrations',
        //     start: new Date(y, m, 22),
        //     backgroundColor: '#EF6F6C',
        // },
        // {
        //     title: 'Event Day',
        //     start: new Date(y, m, 31),
        //     backgroundColor: '#EF6F6C',
        // },
        // {
        //     title: 'Product Seminar',
        //     start: '2018-01-22',
        //     end: '2018-01-25',
        //     backgroundColor: '#A9B6BC',
        // },
        // {
        //     title: 'Product Seminar',
        //     start: '2018-02-18',
        //     end: '2018-02-20',
        //     backgroundColor: '#A9B6BC',
        // },
        // {
        //     title: 'Product Seminar',
        //     start: '2018-02-10',
        //     end: '2018-02-15',
        //     backgroundColor: '#A9B6BC',
        // },
        // {
        //     title: 'Product Seminar',
        //     start: '2018-02-14T04:20:15',
        //     end: '2018-02-18T04:20:15',
        //     backgroundColor: '#A9B6BC',
        // },
        // {
        //     title: 'Product Seminar',
        //     start: '2018-02-4T04:20:15 ',
        //     end: '2018-02-5T04:20:15',
        //     backgroundColor: '#A9B6BC',
        // },
    ],
    eventClick: function(calEvent, jsEvent, view) {
        evt_obj = calEvent;
        $('#event_title').val(evt_obj.title);
        currColor = evt_obj.backgroundColor;
        colorChooser
            .css({
                'background-color': evt_obj.backgroundColor,
                'border-color': evt_obj.backgroundColor,
            })
            .html('Type <span class="caret"></span>');
        $('#evt_modal')
            .modal('show')
            .on('shown.bs.modal', function() {
                $('#event_title').focus();
            })
            .on('hidden.bs.modal', function() {
                evt_obj = '';
            });
        $('.text_save').on('click', function() {
            evt_obj.title = $('#event_title').val();
            evt_obj.backgroundColor = currColor;
            $('#calendar').fullCalendar('updateEvent', evt_obj);
            // setTimeout(setpopover,100);
        });
    },
    editable: true,
    eventLimit: true,
    droppable: true,
    drop: function(date, allDay) {
        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject');

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject);
        var $calendar_badge = $('.calendar_badge');
        // assign it the date that was reported
        copiedEventObject.start = date;
        copiedEventObject.allDay = allDay;
        copiedEventObject.backgroundColor = $(this).css('background-color');
        copiedEventObject.borderColor = $(this).css('border-color');

        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
        $calendar_badge.text(parseInt($calendar_badge.text()) + 1);
        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
            $(this).remove();
        }
        // setpopover();
    },
    eventDrop: function() {
        // setTimeout(setpopover,100);
    },
    eventResize: function() {
        // setTimeout(setpopover,100);
    },
});

/* ADDING EVENTS */
var defaultColor = '#A9B6BC';
var lettercolor = '#fff'; //default
$('#color-chooser-btn').css({ 'background-color': defaultColor, color: lettercolor });
//Color chooser button
var colorChooser = $('.color-chooser');
$('.reset').on('click', function() {
    $('#new-event').val('');
});
$('#color-chooser > li > a').click(function(e) {
    e.preventDefault();
    var colorChooser = $(this)
        .closest('.input-group-btn')
        .find('.color-chooser');

    //Save color
    currColor = $(this).css('background-color');
    //Add color effect to button
    colorChooser
        .css({
            'background-color': currColor,
            'border-color': currColor,
        })
        .html($(this).text() + ' <span class="caret"></span>');
});
$('#add-new-event').click(function(e) {
    e.preventDefault();
    //Get value and make sure it is not null
    var val = $('#new-event').val();
    var currColor = $('#color-chooser-btn').css('background-color');
    var r = val.trim(' ');
    if (r.length == 0) {
        return;
    }
    //Create event
    var event = $('<div />');
    event
        .css({
            'background-color': currColor,
            'border-color': currColor,
            color: '#fff',
        })
        .addClass('external-event');
    event
        .html(val)
        .append(
            '<i class="fa fa-times event-clear" aria-hidden="true" style="margin-left: 3px;"></i>'
        );
    $('#external-events').prepend(event);
    $('.event_count').text(eval($('.event_count').text()) + 1);
    //Add draggable funtionality
    ini_events(event);
});
//Remove event from text input
$('.createevent_btn').on('click', function() {
    $('#new-event').val(' ');
});
$(document).on('click', '.event-clear', function() {
    $(this)
        .closest('div')
        .remove();
});

/* realtime chart */
var data = [],
    totalPoints = 300;
function getRandomData() {
    if (data.length > 0) data = data.slice(1);

    // do a random walk
    while (data.length < totalPoints) {
        var prev = data.length > 0 ? data[data.length - 1] : 50;
        var y = prev + Math.random() * 10 - 5;
        if (y < 0) y = 0;
        if (y > 100) y = 100;
        data.push(y);
    }

    // zip the generated y values with the x values
    var res = [];
    for (var i = 0; i < data.length; ++i) res.push([i, data[i]]);
    return res;
}

// setup control widget
var updateInterval = 30;
$('#updateInterval')
    .val(updateInterval)
    .change(function() {
        var v = $(this).val();
        if (v && !isNaN(+v)) {
            updateInterval = +v;
            if (updateInterval < 1) updateInterval = 1;
            if (updateInterval > 2000) updateInterval = 2000;
            $(this).val('' + updateInterval);
        }
    });

if ($('#realtimechart').length) {
    var options = {
        series: { shadowSize: 1 },
        lines: { fill: true, fillColor: { colors: [{ opacity: 1 }, { opacity: 0.1 }] } },
        yaxis: { min: 0, max: 100 },
        xaxis: { show: false },
        colors: ['rgba(65,139,202,0.5)'],
        grid: {
            tickColor: '#dddddd',
            borderWidth: 0,
        },
    };
    var plot = $.plot($('#realtimechart'), [getRandomData()], options);

    function update() {
        plot.setData([getRandomData()]);
        // since the axes don't change, we don't need to call plot.setupGrid()
        plot.draw();

        setTimeout(update, updateInterval);
    }

    update();
}
// top menu

var useOnComplete = false,
    useEasing = false,
    useGrouping = false,
    options = {
        useEasing: useEasing, // toggle easing
        useGrouping: useGrouping, // 1,000,000 vs 1000000
        separator: ',', // character to use as a separator
        decimal: '.', // character to use as a decimal
    };

var demo = new CountUp('myTargetElement1', 12.52, <?php
                                        echo \DB::table('users')->where('updated_at','LIKE','%'.date('Y-m-d').'%')->count();
                                         ?>, 0, 6, options);
demo.start();
var demo = new CountUp('myTargetElement2', 1, 0, 0, 6, options);
demo.start();
var demo = new CountUp('myTargetElement3', 24.02, <?php
                                        // file_get_contents(url('/api/expired-domains'));
                                        echo (\DB::table('expiry_domain_cronjob')->whereDate('created_at', $today)->first()->total_domain ?? 0);
                                         ?>, 0, 6, options);
demo.start();
var demo = new CountUp('myTargetElement4', 1254, <?php
                                        echo \DB::table('users')->count();
                                         ?>, 0, 6, options);
demo.start();
var demo = new CountUp('myTargetElement1.1', 1254, 98000, 0, 6, options);
demo.start();
var demo = new CountUp('myTargetElement1.2', 1254, 396000, 0, 6, options);
demo.start();
var demo = new CountUp('myTargetElement2.1', 154, 920, 0, 6, options);
demo.start();
var demo = new CountUp('myTargetElement2.2', 2582, 3929, 0, 6, options);
demo.start();
var demo = new CountUp('myTargetElement3.1', 2582, 42000, 0, 6, options);
demo.start();
var demo = new CountUp('myTargetElement3.2', 25858, 173929, 0, 6, options);
demo.start();
var demo = new CountUp('myTargetElement4.1', 2544, 56000, 0, 6, options);
demo.start();
var demo = new CountUp('myTargetElement4.2', 1584, 219864, 0, 6, options);
demo.start();
var my_posts = $('[rel=tooltip]');

var size = $(window).width();
for (i = 0; i < my_posts.length; i++) {
    the_post = $(my_posts[i]);

    if (the_post.hasClass('invert') && size >= 767) {
        the_post.tooltip({
            placement: 'left',
        });
        the_post.css('cursor', 'pointer');
    } else {
        the_post.tooltip({
            placement: 'right',
        });
        the_post.css('cursor', 'pointer');
    }
}
//Percentage Monitor
$(document).ready(function() {
    /** BEGIN WIDGET PIE FUNCTION **/
    if ($('.widget-easy-pie-1').length > 0) {
        $('.widget-easy-pie-1').easyPieChart({
            easing: 'easeOutBounce',
            barColor: '#F9AE43',
            lineWidth: 5,
        });
    }
    if ($('.widget-easy-pie-2').length > 0) {
        $('.widget-easy-pie-2').easyPieChart({
            easing: 'easeOutBounce',
            barColor: '#F9AE43',
            lineWidth: 5,
            onStep: function(from, to, percent) {
                $(this.el)
                    .find('.percent')
                    .text(Math.round(percent));
            },
        });
    }

    if ($('.widget-easy-pie-3').length > 0) {
        $('.widget-easy-pie-3').easyPieChart({
            easing: 'easeOutBounce',
            barColor: '#EF6F6C',
            lineWidth: 5,
        });
    }
    /** END WIDGET PIE FUNCTION **/
});

//world map
$(function() {
    $('#world-map-markers').vectorMap({
        map: 'world_mill_en',
        scaleColors: ['#C8EEFF', '#0071A4'],
        normalizeFunction: 'polynomial',
        hoverOpacity: 0.7,
        hoverColor: false,
        markerStyle: {
            initial: {
                fill: '#EF6F6C',
                stroke: '#383f47',
            },
        },
        backgroundColor: '#515763',
        markers: [
            { latLng: [60, -100], name: 'canada - 1222 views' },
            { latLng: [43.93, 12.46], name: 'San Marino- 300 views' },
            { latLng: [47.14, 9.52], name: 'Liechtenstein- 52 views' },
            { latLng: [12.05, -61.75], name: 'Grenada- 5 views' },
            { latLng: [41.9, 12.45], name: 'Vatican City- 1254 views' },
            { latLng: [50, 0], name: 'France - 5254 views' },
            { latLng: [0, 120], name: 'Indonesia - 525 views' },
            { latLng: [-25, 130], name: 'Australia - 4586 views' },
            { latLng: [0, 20], name: 'Africa - 1 views' },
            { latLng: [35, 100], name: 'China -29 views' },
            { latLng: [46, 105], name: 'Mongolia - 2123 views' },
            { latLng: [40, 70], name: 'Kyrgiztan - 24446 views' },
            { latLng: [58, 50], name: 'Russia - 3405 views' },
            { latLng: [35, 135], name: 'Japan - 47566 views' },
        ],
    });
});
$(document).ready(function() {
    var composeHeight = $('#calendar').height() + 21 - $('.adds').height();
    $('.scroller_height').slimScroll({
        color: '#A9B6BC',
        height: '270px',
        size: '5px',
    });
});
</script>

{{--<script src="{{ asset('js/pages/jquery-ui.min.js') }}" type="text/javascript"></script>--}}

@stop
