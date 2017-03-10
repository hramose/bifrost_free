<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>{{{ $module }}} - BifrostPFG</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">


  <!-- Stylesheets -->
  <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Font awesome icon -->
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
  <!-- Calendar -->
  <link rel="stylesheet" href="{{ URL::asset('css/fullcalendar.css') }}">
  <!-- prettyPhoto -->
  <link rel="stylesheet" href="{{ URL::asset('css/prettyPhoto.css') }}">  
  <!-- Star rating -->
  <link rel="stylesheet" href="{{ URL::asset('css/rateit.css') }}">
  <!-- Date picker --> 
  <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datetimepicker.min.css') }}">
  <!-- CLEditor -->
  <link rel="stylesheet" href="{{ URL::asset('css/jquery.cleditor.css') }}">  
  <!-- Data tables -->
  <link rel="stylesheet" href="{{ URL::asset('css/jquery.dataTables.css') }}"> 
  <!-- Bootstrap toggle -->
  <link rel="stylesheet" href="{{ URL::asset('css/jquery.onoff.css') }}">
  <!-- Main stylesheet -->
  <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
  <!-- Widgets stylesheet -->

  <link href="{{ URL::asset('css/widgets.css') }}" rel="stylesheet">
  <!--*naza-->
  <link href="{{ URL::asset('css/prism.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('css/chosen.css') }}" rel="stylesheet"> 
  
 
  
  <!--*naza-->

  <link href="{{ URL::asset('css/widgets.css') }}" rel="stylesheet">   

  
  <script src="{{ URL::asset('js/respond.min.js') }}"></script>
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ URL::asset('img/favicon/favicon.png') }}">
</head>

<body>


  <div class="navbar navbar-fixed-top bs-docs-nav" role="banner">

    <div class="conjtainer">
      <!-- Menu button for smallar screens -->
      <div class="navbar-header">
        <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
          <span>Menu</span>
        </button>
        <!-- Site name for smallar screens -->
        <a href="/" class="navbar-brand hidden-lg">BifrostPFG</a>
      </div>
      
      
      <!-- Navigation starts -->
      <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">         

        <ul class="nav navbar-nav">  

          <!-- Upload to server link. Class "dropdown-big" creates big dropdown -->
          <li class="dropdown dropdown-big">

            <a href="#" class="dropdown-toggle" id="progreso_cobranza" data-toggle="dropdown">
              <span class="label label-success"><i class="fa fa-line-chart"></i></span>  Cobranza
            </a>
            <!-- Dropdown -->
            <ul class="dropdown-menu">
              <li id="cobranza-mes">
                <p></p>
                <div class="progress progress-striped active">
                  <div class="progress-bar progress-bar-default" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                  </div>
                </div>
                <hr />
              </li>
              <li id="cobranza-dia">
                <p></p>
                <div class="progress progress-striped active">
                  <div class="progress-bar progress-bar-default" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                  </div>
                </div>
                <hr />
              </li>
              <li>
                <div class="drop-foot">
                  <a href="{{ action('CobranzaControlador@getIndex') }}">Ver detalle de cobranza</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>

        <!-- Search form -->
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" id="buscador" size="30"  placeholder="Buscar personas">
          </div>
        </form>
        <!-- Links -->
        <ul class="nav navbar-nav pull-right">
          <li class="dropdown pull-right">            
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <i class="fa fa-user"></i> {{ Auth::user()->persona->nombres }} <b class="caret"></b>              
            </a>
            
            <!-- Dropdown menu -->
            <ul class="dropdown-menu">
              <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
              <li><a href="#"><i class="fa fa-cogs"></i> Settings</a></li>
              <li><a href="{{ action('LoginControlador@getSalir') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>
          </li>
          
        </ul>
      </nav>
    </div>
  </div>
  <!-- Header starts -->
  <header>
    <div class="container">
      <div class="row">

        <!-- Logo section -->
        <div class="col-md-4">
          <!-- Logo. -->
          <div class="logo">
            <h1><a href="/">Bifrost<span class="bold">PFG</span></a></h1>
            <p class="meta">Sistema Integral para Capillas y Panteones</p>
          </div>
          <!-- Logo ends -->
        </div>

        <!-- Button section -->
        <div class="col-md-3">

          <!-- Buttons -->
          <ul class="nav nav-pills">

            <!-- Comment button with number of latest comments count -->
            <li class="dropdown dropdown-big">
              <a id="notificacion_cotizacion" class="dropdown-toggle" disabled href="#" data-toggle="dropdown">
                <i class="fa fa-shopping-cart"></i> Cotizaciones <span class="label label-default">0</span> 
              </a>

              <ul class="dropdown-menu">
                <li>
                  <h5><i class="fa fa-shopping-cart"></i> Cotizaciones</h5>
                  <hr />
                </li>
                <li>
                  <div class="drop-foot">
                    <a href="{{ action('CotizacionControlador@getIndex') }}">Ver todas</a>
                  </div>
                </li>                                    
              </ul>
            </li>


            <!-- Message button with number of latest messages count-->
            <li class="dropdown dropdown-big">
              <a id="notificacion_queja" class="dropdown-toggle" href="#"  data-toggle="dropdown">
                <i class="fa fa-bullhorn"></i> Quejas <span class="label label-default">0</span> 
              </a>

              <ul class="dropdown-menu">
                <li>
                  <!-- Heading - h5 -->
                  <h5><i class="fa fa-bullhorn"></i> Por atender </h5>
                  <!-- Use hr tag to add border -->
                  <hr />
                </li>
                <li>
                  <div class="drop-foot">
                    <a href="{{ action('QuejaControlador@getIndex') }}">Ver todas</a>
                  </div>
                </li>
              </ul>
            </li> 
          </ul>
        </div>

        <!-- Data section -->

        <div class="col-md-5">
          <div class="header-data">

            <!-- Traffic data -->
            <div class="hdata">
              <div class="mcol-left">
                <!-- Icon with red background -->
                <i class="fa fa-bar-chart bred"></i> 
              </div>
              <div class="mcol-right">
                <!-- Number of visitors -->
                <p id="estadisticos-ventas"><a href="#"></a> <em></em></p>
              </div>
              <div class="clearfix"></div>
            </div>

            <!-- Members data -->
            <div class="hdata">
              <div class="mcol-left">
                <!-- Icon with blue background -->
                <i class="fa fa-money bgreen"></i> 
              </div>
              <div class="mcol-right">
                <!-- Number of visitors -->
                <p id="estadisticos-ingresos"><a href="#"></a> <em></em></p>
              </div>
              <div class="clearfix"></div>
            </div>

            <!-- revenue data 
            <div class="hdata">
              <div class="mcol-left">
                <!-- Icon with green background 
                <i class="fa fa-gavel borange"></i> 
              </div>
              <div class="mcol-right">
                <!-- Number of visitors 
                <p><a href="#">Vencido</a><em>$2,457,623</em></p>
              </div>
              <div class="clearfix"></div>
            </div>     -->                   

          </div>
        </div>

      </div>
    </div>
  </header>

  <!-- Header ends -->

  <!-- Main content starts -->

  <div class="content">

   <!-- Sidebar -->
   <div class="sidebar">
    <div class="sidebar-dropdown"><a href="#">Navigation</a></div>

    <!--- Sidebar navigation -->
    <!-- If the main navigation has sub navigation, then add the class "has_sub" to "li" of main navigation. -->
    <ul id="nav">
      <!-- Main menu with font awesome icon -->
      @section('nav')
      <li>
        <a href="/"><i class="fa fa-home"></i> Panel de Control</a>
      </li>
      @show
    </ul>
  </div>

  <!-- Sidebar ends -->

  <!-- Main bar -->
  <div class="mainbar">

    <!-- Page heading -->
    <div class="page-head">
      <h2 class="pull-left"><i class="fa fa-{{{ $icon or 'home'}}}"></i> {{{ $module }}}</h2>

      <!-- Breadcrumb -->
      <div class="bread-crumb pull-right">
        <a href="#"><i class="fa fa-home"></i> Inicio</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="#" class="bread-current">{{{ $module }}}</a>
      </div>

      <div class="clearfix"></div>

    </div>
    <!-- Page heading ends -->


    <!-- Matter -->
    <div class="matter">
      <div class="container">
        @section('module')
        <div class="row">
          <div class="col-md-12">

            <div class="widget">
              <div class="widget-head">
                <div class="pull-left">Title</div>
                <div class="widget-icons pull-right">
                  <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                  <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>  
                <div class="clearfix"></div>
              </div>
              <div class="widget-content">
                <div class="padd">
                 
                 <!-- Content goes here -->
                

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                 <!-- Content goes here -->
                </div>
                <div class="widget-foot">
                  <!-- Footer goes here -->
                </div>
              </div>
            </div>  

          </div>
        </div> 
         <div class="row">
          <div class="col-md-12">

            <div class="widget">
              <div class="widget-head">
                <div class="pull-left">Title</div>
                <div class="widget-icons pull-right">
                  <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                  <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>  
                <div class="clearfix"></div>
              </div>
              <div class="widget-content">
                <div class="padd">
                 
                 
<div id="acumulados" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

                 <!-- Content goes here -->
                </div>
                <div class="widget-foot">
                  <!-- Footer goes here -->
                </div>
              </div>
            </div>  

          </div>
        </div>
         <div class="row">
          <div class="col-md-12">

            <div class="widget">
              <div class="widget-head">
                <div class="pull-left">Title</div>
                <div class="widget-icons pull-right">
                  <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                  <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>  
                <div class="clearfix"></div>
              </div>
              <div class="widget-content">
                <div class="padd">
                 
             
             
                

<div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                 <!-- Content goes here -->
                </div>
                <div class="widget-foot">
                  <!-- Footer goes here -->
                </div>
              </div>
            </div>  

          </div>
        </div>
        @show
      </div>
    </div>

    <!-- Matter ends -->

  </div>

  <div class="clearfix"></div>

</div>
<!-- Content ends -->

<!-- Footer starts -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- Copyright info -->
        <p class="copy">Copyright &copy; 2017 | BifrostPFG <a href="#">www.grupoim.mx</a> </p>
      </div>
    </div>
  </div>
</footer>   

<!-- Footer ends -->

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span> 

<!-- JS -->
<script src="{{ URL::asset('js/jquery.js') }}"></script> <!-- jQuery -->
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script> <!-- Bootstrap -->
<script src="{{ URL::asset('js/jquery-ui.min.js') }}"></script> <!-- jQuery UI -->
<script src="{{ URL::asset('js/fullcalendar.min.js') }}"></script> <!-- Full Google Calendar - Calendar -->
<script src="{{ URL::asset('js/jquery.rateit.min.js') }}"></script> <!-- RateIt - Star rating -->
<script src="{{ URL::asset('js/jquery.prettyPhoto.js') }}"></script> <!-- prettyPhoto -->
<script src="{{ URL::asset('js/jquery.slimscroll.min.js') }}"></script> <!-- jQuery Slim Scroll -->
<!--<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>-->
<script src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script> 

<!-- jQuery Flot -->
<script src="{{ URL::asset('js/excanvas.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.flot.js') }}"></script>
<script src="{{ URL::asset('js/jquery.flot.resize.js') }}"></script>
<script src="{{ URL::asset('js/jquery.flot.pie.js') }}"></script>
<script src="{{ URL::asset('js/jquery.flot.stack.js') }}"></script>

<!-- jQuery Notification - Noty -->
<script src="{{ URL::asset('js/jquery.noty.js') }}"></script> <!-- jQuery Notify -->
<script src="{{ URL::asset('js/themes/default.js') }}"></script> <!-- jQuery Notify -->
<script src="{{ URL::asset('js/layouts/bottom.js') }}"></script> <!-- jQuery Notify -->
<script src="{{ URL::asset('js/layouts/topRight.js') }}"></script> <!-- jQuery Notify -->
<script src="{{ URL::asset('js/layouts/top.js') }}"></script> <!-- jQuery Notify -->
<!-- jQuery Notification ends -->

<script src="{{ URL::asset('js/sparklines.js') }}"></script> <!-- Sparklines -->
<script src="{{ URL::asset('js/jquery.cleditor.min.js') }}"></script> <!-- CLEditor -->
<script src="{{ URL::asset('js/bootstrap-datetimepicker.min.js') }}"></script> <!-- Date picker -->
<script src="{{ URL::asset('js/jquery.onoff.min.js') }}"></script> <!-- Bootstrap Toggle -->
<script src="{{ URL::asset('js/filter.js') }}"></script> <!-- Filter for support page -->
<script src="{{ URL::asset('js/custom.js') }}"></script> <!-- Custom codes -->
<script src="{{ URL::asset('js/bootstrap-typeahead.js') }}"></script>  <!-- Typahead plugin-->
<script src="{{ URL::asset('js/charts.js') }}"></script> <!-- Charts & Graphs -->
<script src="{{ URL::asset('js/app.js') }}"></script>

<script > 


 
    
  Highcharts.chart('container', {
    
       
    chart: {
        type: 'column'
    },
    title: {
        text: 'Ventas comparativas'
    },
    subtitle: {
        text: '{{{$mes}}} {{{$serie3['name']}}}, {{{$serie2['name']}}}, {{{$serie1['name']}}} y {{{$serie['name']}}}'
    },
    xAxis: {
        categories: [
            @foreach($categories as $cat)
            '{{{$cat->nombre}}}',
            @endforeach
            
            
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Ventas'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>${point.y:,.0f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
        
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
   series: [    
   

   {
        name: '{{{$serie3['name']}}}',
        data: [@foreach($serie3['data'] as $d) {{{round($d->monto,0)}}}, @endforeach]
        

    },

   {
        name: '{{{$serie2['name']}}}',
        data: [@foreach($serie2['data'] as $d) {{{round($d->monto,0)}}}, @endforeach]
        

    },

    {
        name: '{{{$serie1['name']}}}',
        data: [@foreach($serie1['data'] as $d) {{{round($d->monto,0)}}}, @endforeach]
        

    },

     

    {
        name: '{{{$serie['name']}}}',
        data: [@foreach($serie['data'] as $d) {{{round($d->monto,0)}}}, @endforeach]
        

    },
   
    ]
});

//grafica de acumulados
Highcharts.chart('acumulados', {
   
    title: {
        text: 'Monthly Average Temperature'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
    },
    yAxis: {
        title: {
            text: 'Temperature (°C)'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: false
            },
            enableMouseTracking: true
        }
    },
       tooltip: {
        formatter: function () {
            var s = '<b>' + this.x + '</b>';

            $.each(this.points, function () {
                s += '<br/>' + this.series.name + ': ' +
                    '$'+ this.y;
            });

            return s;
        },
        shared: true
    },
    series: [{
        name:'{{{$serie_acumulado3['name']}}}', <?php $sum3 = 0;?>
        data:[@foreach($serie_acumulado3['data'] as $ac) <?php $sum3 = $ac->total + $sum3; ?> {{{ round($sum3,0)}}},@endforeach]
       },
       {
        name:'{{{$serie_acumulado2['name']}}}', <?php $sum2 = 0; ?> 
        data:[@foreach($serie_acumulado2['data'] as $ac) <?php $sum2 = $ac->total + $sum2; ?> {{{round($sum2,0)}}},@endforeach]
       },
       {
        name:'{{{$serie_acumulado1['name']}}}', <?php $sum1 = 0; ?> 
        data:[@foreach($serie_acumulado1['data'] as $ac) <?php $sum1 = $ac->total + $sum1; ?> {{{round($sum1,0)}}},@endforeach]
       },
      {
        name:'{{{$serie_acumulado['name']}}}', <?php $sumx = 0; ?>
        data: [@foreach($serie_acumulado['data'] as $ac) <?php $sumx = $ac->total + $sumx; ?> {{{round($sumx,0)}}},@endforeach ]
      }

     ]
});

//fin grafica acumulados



</script> 
@yield('scripts', '')
</body>
</html>