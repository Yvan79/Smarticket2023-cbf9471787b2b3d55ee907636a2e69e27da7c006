@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __("¡Bienvenido ") }}{{ Auth::user()->name }}</h1>
@stop
@can('dashboard.estadisticas')
@section('content')

<div class="row">
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-info">
    <div class="inner">
    <h3>150</h3>
    <p>Nuevos usuarios</p>
    </div>
    <div class="icon">
    <i class="ion ion-bag"></i>
    </div>
    <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-success">
    <div class="inner">
    <h3>53<sup style="font-size: 20px">%</sup></h3>
    <p>Porcentaje de Acreditados</p>
    </div>
    <div class="icon">
    <i class="ion ion-stats-bars"></i>
    </div>
    <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-warning">
    <div class="inner">
    <h3>44</h3>
    <p>Usuarios Registrados</p>
    </div>
    <div class="icon">
    <i class="ion ion-person-add"></i>
    </div>
    <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    
    <div class="col-lg-3 col-6">
    
    <div class="small-box bg-danger">
    <div class="inner">
    <h3>65</h3>
    <p>Visitantes</p>
    </div>
    <div class="icon">
    <i class="ion ion-pie-graph"></i>
    </div>
    <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    
    </div>



    <div class="row">
        <div class="col-lg-7 connectedSortable ui-sortable">
            <!--<div class="card">
                <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Sales
                </h3>
                <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                </li>
                </ul>
                </div>
                </div>
                <div class="card-body">
                <div class="tab-content p-0">
                
                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="revenue-chart-canvas" height="300" style="height: 300px; display: block; width: 713px;" width="713" class="chartjs-render-monitor"></canvas>
                </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                <canvas id="sales-chart-canvas" height="0" style="height: 0px; display: block; width: 0px;" class="chartjs-render-monitor" width="0"></canvas>
                </div>
                </div>
                </div>
            </div>-->
            <div class="card">
                <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                <h3 class="card-title">Brazaletes Imprimidos</h3>
                <a href="javascript:void(0);">Vista del Reporte</a>
                </div>
                </div>
                <div class="card-body">
                <div class="d-flex">
                <p class="d-flex flex-column">
                <span class="text-bold text-lg">18,230.00</span>
                <span>A lo largo del tiempo</span>
                </p>
                <p class="ml-auto d-flex flex-column text-right">
                <span class="text-success">
                <i class="fas fa-arrow-up"></i> 33.1%
                </span>
                <span class="text-muted">Desde el mes pasado</span>
                </p>
                </div>
                
                <div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="sales-chart" height="200" style="display: block; width: 604px; height: 200px;" width="604" class="chartjs-render-monitor"></canvas>
                </div>
                <div class="d-flex flex-row justify-content-end">
                <span class="mr-2">
                <i class="fas fa-square text-primary"></i> Este Año
                </span>
                <span>
                <i class="fas fa-square text-gray"></i> El Año Pasado
                </span>
                </div>
                </div>
                </div>
        </div>
        <div class="col-lg-5 connectedSortable ui-sortable">
            <div class="card bg-gradient-success">
                <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                <i class="far fa-calendar-alt"></i>
                Calendario
                </h3>
                
                <div class="card-tools">
                
                <div class="btn-group">
                <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                <i class="fas fa-bars"></i>
                </button>
                <div class="dropdown-menu" role="menu">
                <a href="#" class="dropdown-item">Añadir Evento</a>
                <a href="#" class="dropdown-item">Borrar evento</a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">Ver Calendario</a>
                </div>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                <i class="fas fa-times"></i>
                </button>
                </div>
                
                </div>
                
                <div class="card-body pt-0">
                
                <div id="calendar" style="width: 100%"><div class="bootstrap-datetimepicker-widget usetwentyfour"><ul class="list-unstyled"><li class="show"><div class="datepicker"><div class="datepicker-days" style=""><table class="table table-sm"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Month"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Month">Septiembre 2023</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Month"></span></th></tr><tr><th class="dow">Do</th><th class="dow">Lu</th><th class="dow">Ma</th><th class="dow">Mi</th><th class="dow">Ju</th><th class="dow">Vi</th><th class="dow">Sa</th></tr></thead><tbody><tr><td data-action="selectDay" data-day="08/27/2023" class="day old weekend">27</td><td data-action="selectDay" data-day="08/28/2023" class="day old">28</td><td data-action="selectDay" data-day="08/29/2023" class="day old">29</td><td data-action="selectDay" data-day="08/30/2023" class="day old">30</td><td data-action="selectDay" data-day="08/31/2023" class="day old">31</td><td data-action="selectDay" data-day="09/01/2023" class="day">1</td><td data-action="selectDay" data-day="09/02/2023" class="day weekend">2</td></tr><tr><td data-action="selectDay" data-day="09/03/2023" class="day weekend">3</td><td data-action="selectDay" data-day="09/04/2023" class="day">4</td><td data-action="selectDay" data-day="09/05/2023" class="day">5</td><td data-action="selectDay" data-day="09/06/2023" class="day">6</td><td data-action="selectDay" data-day="09/07/2023" class="day">7</td><td data-action="selectDay" data-day="09/08/2023" class="day">8</td><td data-action="selectDay" data-day="09/09/2023" class="day weekend">9</td></tr><tr><td data-action="selectDay" data-day="09/10/2023" class="day weekend">10</td><td data-action="selectDay" data-day="09/11/2023" class="day">11</td><td data-action="selectDay" data-day="09/12/2023" class="day">12</td><td data-action="selectDay" data-day="09/13/2023" class="day">13</td><td data-action="selectDay" data-day="09/14/2023" class="day">14</td><td data-action="selectDay" data-day="09/15/2023" class="day">15</td><td data-action="selectDay" data-day="09/16/2023" class="day weekend">16</td></tr><tr><td data-action="selectDay" data-day="09/17/2023" class="day weekend">17</td><td data-action="selectDay" data-day="09/18/2023" class="day">18</td><td data-action="selectDay" data-day="09/19/2023" class="day">19</td><td data-action="selectDay" data-day="09/20/2023" class="day">20</td><td data-action="selectDay" data-day="09/21/2023" class="day">21</td><td data-action="selectDay" data-day="09/22/2023" class="day active today">22</td><td data-action="selectDay" data-day="09/23/2023" class="day weekend">23</td></tr><tr><td data-action="selectDay" data-day="09/24/2023" class="day weekend">24</td><td data-action="selectDay" data-day="09/25/2023" class="day">25</td><td data-action="selectDay" data-day="09/26/2023" class="day">26</td><td data-action="selectDay" data-day="09/27/2023" class="day">27</td><td data-action="selectDay" data-day="09/28/2023" class="day">28</td><td data-action="selectDay" data-day="09/29/2023" class="day">29</td><td data-action="selectDay" data-day="09/30/2023" class="day weekend">30</td></tr><tr><td data-action="selectDay" data-day="10/01/2023" class="day new weekend">1</td><td data-action="selectDay" data-day="10/02/2023" class="day new">2</td><td data-action="selectDay" data-day="10/03/2023" class="day new">3</td><td data-action="selectDay" data-day="10/04/2023" class="day new">4</td><td data-action="selectDay" data-day="10/05/2023" class="day new">5</td><td data-action="selectDay" data-day="10/06/2023" class="day new">6</td><td data-action="selectDay" data-day="10/07/2023" class="day new weekend">7</td></tr></tbody></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Year"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Year">2023</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Year"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectMonth" class="month">Jan</span><span data-action="selectMonth" class="month">Feb</span><span data-action="selectMonth" class="month">Mar</span><span data-action="selectMonth" class="month">Apr</span><span data-action="selectMonth" class="month">May</span><span data-action="selectMonth" class="month">Jun</span><span data-action="selectMonth" class="month">Jul</span><span data-action="selectMonth" class="month">Aug</span><span data-action="selectMonth" class="month active">Sep</span><span data-action="selectMonth" class="month">Oct</span><span data-action="selectMonth" class="month">Nov</span><span data-action="selectMonth" class="month">Dec</span></td></tr></tbody></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Decade"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Decade">2020-2029</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Decade"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectYear" class="year old">2019</span><span data-action="selectYear" class="year">2020</span><span data-action="selectYear" class="year">2021</span><span data-action="selectYear" class="year">2022</span><span data-action="selectYear" class="year active">2023</span><span data-action="selectYear" class="year">2024</span><span data-action="selectYear" class="year">2025</span><span data-action="selectYear" class="year">2026</span><span data-action="selectYear" class="year">2027</span><span data-action="selectYear" class="year">2028</span><span data-action="selectYear" class="year">2029</span><span data-action="selectYear" class="year old">2030</span></td></tr></tbody></table></div><div class="datepicker-decades" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Century"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5">2000-2090</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Century"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectDecade" class="decade old" data-selection="2006">1990</span><span data-action="selectDecade" class="decade" data-selection="2006">2000</span><span data-action="selectDecade" class="decade" data-selection="2016">2010</span><span data-action="selectDecade" class="decade active" data-selection="2026">2020</span><span data-action="selectDecade" class="decade" data-selection="2036">2030</span><span data-action="selectDecade" class="decade" data-selection="2046">2040</span><span data-action="selectDecade" class="decade" data-selection="2056">2050</span><span data-action="selectDecade" class="decade" data-selection="2066">2060</span><span data-action="selectDecade" class="decade" data-selection="2076">2070</span><span data-action="selectDecade" class="decade" data-selection="2086">2080</span><span data-action="selectDecade" class="decade" data-selection="2096">2090</span><span data-action="selectDecade" class="decade old" data-selection="2106">2100</span></td></tr></tbody></table></div></div></li><li class="picker-switch accordion-toggle"></li></ul></div></div>
                </div>
                
                </div>
        </div>
    </div>


@stop
@endcan

