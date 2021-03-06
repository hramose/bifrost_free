@section('scripts')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">


//comienza tema

Highcharts.theme = {
    colors: [  '#55BF3B','#7798BF', '#DF5353','#DDDF0D', '#aaeeee', '#ff0066', '#eeaaee',
        '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'],
    chart: {
        backgroundColor: {
            linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
            stops: [
                [0, 'rgb(96, 96, 96)'],
                [1, 'rgb(16, 16, 16)']
            ]
        },
        borderWidth: 0,
        borderRadius: 0,
        plotBackgroundColor: null,
        plotShadow: false,
        plotBorderWidth: 0
    },
    title: {
        style: {
            color: '#FFF',
            font: '16px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif'
        }
    },
    subtitle: {
        style: {
            color: '#DDD',
            font: '12px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif'
        }
    },
    xAxis: {
        gridLineWidth: 0,
        lineColor: '#999',
        tickColor: '#999',
        labels: {
            style: {
                color: '#999',
                fontWeight: 'bold'
            }
        },
        title: {
            style: {
                color: '#AAA',
                font: 'bold 12px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif'
            }
        }
    },
    yAxis: {
        alternateGridColor: null,
        minorTickInterval: null,
        gridLineColor: 'rgba(255, 255, 255, .1)',
        minorGridLineColor: 'rgba(255,255,255,0.07)',
        lineWidth: 0,
        tickWidth: 0,
        labels: {
            style: {
                color: '#999',
                fontWeight: 'bold'
            }
        },
        title: {
            style: {
                color: '#AAA',
                font: 'bold 12px Lucida Grande, Lucida Sans Unicode, Verdana, Arial, Helvetica, sans-serif'
            }
        }
    },
    legend: {
        itemStyle: {
            color: '#CCC'
        },
        itemHoverStyle: {
            color: '#FFF'
        },
        itemHiddenStyle: {
            color: '#333'
        }
    },
    labels: {
        style: {
            color: '#CCC'
        }
    },
    tooltip: {
        backgroundColor: {
            linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
            stops: [
                [0, 'rgba(96, 96, 96, .8)'],
                [1, 'rgba(16, 16, 16, .8)']
            ]
        },
        borderWidth: 0,
        style: {
            color: '#FFF'
        }
    },


    plotOptions: {
        series: {
            nullColor: '#444444'
        },
        line: {
            dataLabels: {
                color: '#CCC'
            },
            marker: {
                lineColor: '#333'
            }
        },
        spline: {
            marker: {
                lineColor: '#333'
            }
        },
        scatter: {
            marker: {
                lineColor: '#333'
            }
        },
        candlestick: {
            lineColor: 'white'
        }
    },

    toolbar: {
        itemStyle: {
            color: '#CCC'
        }
    },

    navigation: {
        buttonOptions: {
            symbolStroke: '#DDDDDD',
            hoverSymbolStroke: '#FFFFFF',
            theme: {
                fill: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0.4, '#606060'],
                        [0.6, '#333333']
                    ]
                },
                stroke: '#000000'
            }
        }
    },

    // scroll charts
    rangeSelector: {
        buttonTheme: {
            fill: {
                linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                stops: [
                    [0.4, '#888'],
                    [0.6, '#555']
                ]
            },
            stroke: '#000000',
            style: {
                color: '#CCC',
                fontWeight: 'bold'
            },
            states: {
                hover: {
                    fill: {
                        linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                        stops: [
                            [0.4, '#BBB'],
                            [0.6, '#888']
                        ]
                    },
                    stroke: '#000000',
                    style: {
                        color: 'white'
                    }
                },
                select: {
                    fill: {
                        linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                        stops: [
                            [0.1, '#000'],
                            [0.3, '#333']
                        ]
                    },
                    stroke: '#000000',
                    style: {
                        color: 'yellow'
                    }
                }
            }
        },
        inputStyle: {
            backgroundColor: '#333',
            color: 'silver'
        },
        labelStyle: {
            color: 'silver'
        }
    },

    navigator: {
        handles: {
            backgroundColor: '#666',
            borderColor: '#AAA'
        },
        outlineColor: '#CCC',
        maskFill: 'rgba(16, 16, 16, 0.5)',
        series: {
            color: '#7798BF',
            lineColor: '#A6C7ED'
        }
    },

    scrollbar: {
        barBackgroundColor: {
            linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
            stops: [
                [0.4, '#888'],
                [0.6, '#555']
            ]
        },
        barBorderColor: '#CCC',
        buttonArrowColor: '#CCC',
        buttonBackgroundColor: {
            linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
            stops: [
                [0.4, '#888'],
                [0.6, '#555']
            ]
        },
        buttonBorderColor: '#CCC',
        rifleColor: '#FFF',
        trackBackgroundColor: {
            linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
            stops: [
                [0, '#000'],
                [1, '#333']
            ]
        },
        trackBorderColor: '#666'
    },

    // special colors for some of the demo examples
    legendBackgroundColor: 'rgba(48, 48, 48, 0.8)',
    background2: 'rgb(70, 70, 70)',
    dataLabelsColor: '#444',
    textColor: '#E0E0E0',
    maskColor: 'rgba(255,255,255,0.3)'
};

// Apply the theme
Highcharts.setOptions(Highcharts.theme);
//termina tema


//grafica de acumulados
Highcharts.chart('acumulados', {
   
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
    },
    yAxis: {
        title: {
            text: '',
            
        }
    },
    legend: {
       
        align: 'center',
        verticalAlign: 'top'
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
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>${point.y:,.0f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
      
    },
    series: [{
        name:'{{{$fechas['year3']}}}', <?php $sum3 = 0; ?> 
        data: [@foreach($acumulado as $ac) @if($ac->year == $fechas['year3']) <?php $sum3 = $ac->total + $sum3; ?>   {{{round($sum3,0)}}}, @endif @endforeach ]
       },
       {
        name:'{{{$fechas['year2']}}}', <?php $sum2 = 0; ?> 
        data: [@foreach($acumulado as $ac) @if($ac->year == $fechas['year2']) <?php $sum2 = $ac->total + $sum2; ?>   {{{round($sum2,0)}}}, @endif @endforeach ]
       },
       {
        name:'{{{$fechas['year1']}}}', <?php $sum1 = 0; ?> 
        data: [@foreach($acumulado as $ac) @if($ac->year == $fechas['year1']) <?php $sum1 = $ac->total + $sum1; ?>   {{{round($sum1,0)}}}, @endif @endforeach ]
       },
      {
        name:'{{{$fechas['year']}}}', <?php $sumx = 0; ?> 
        data: [@foreach($acumulado as $ac) @if($ac->year == $fechas['year']) <?php $sumx = $ac->total + $sumx; ?>   {{{round($sumx,0)}}}, @endif @endforeach ]
      }

     ]
});

//fin grafica acumulados

//grafica por productos
Highcharts.chart('container', {
   
   
    chart: {
        type: 'column',
         
    },


    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: [
            @foreach($categories as $cat)
            '{{{$cat->nombre}}}',
            @endforeach
            
            
        ],
        crosshair: true
    },
     legend: {
       
        align: 'center',
        verticalAlign: 'top'
    },
    yAxis: {
      
        title: {
            text: '',

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
        name: '{{{$fechas['year3']}}}',
        data: [@foreach($serie as $d) @if($d->month == $fechas['month'] and $d->year == $fechas['year3']) {{{round($d->monto,0)}}}, @endif @endforeach]
        

    },

   {
        name: '{{{$fechas['year2']}}}',
        data: [@foreach($serie as $d) @if($d->month == $fechas['month'] and $d->year == $fechas['year2']) {{{round($d->monto,0)}}}, @endif @endforeach]
        

    },

    {
        name: '{{{$fechas['year1']}}}',
        data: [@foreach($serie as $d) @if($d->month == $fechas['month'] and $d->year == $fechas['year1']) {{{round($d->monto,0)}}}, @endif @endforeach]
        

    },

     

    {
        name: '{{{$fechas['year']}}}',
        data: [@foreach($serie as $d) @if($d->month == $fechas['month'] and $d->year == $fechas['year']) {{{round($d->monto,0)}}}, @endif @endforeach]
        

    },
   
    ]
});



//ventas totales apiladas
Highcharts.chart('apiladas', {
    chart: {
       
       
        type: 'column'
    },
    title: {
        text: ''
    },
    xAxis: {
        categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
    },
    yAxis: {
        
        title: {
            text: ''
        },
        stackLabels: {
            enabled: true,
            style: {
                fontWeight: 'bold',
                color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
            },
            formatter: function() {   
                        return 'Total mensual: $'+  Highcharts.numberFormat(this.total, 0, ',')  ;                                
                    }
        }
    },
    legend: {
        itemDistance: -1,
        align: 'right',
        x: -30,
        verticalAlign: 'top',
        y: -3,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
        borderColor: '#CCC',
        borderWidth: 1,
        shadow: false
    },
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: ${point.y:,.0f}<br/>Total: ${point.stackTotal:,.0f}'
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: false,
                color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
            }
        }
    },
    

    series: [
            @foreach($categories as $cat)
            {name:'{{{$cat->nombre}}}', 
            data:[@foreach($serie as $ac) @if($ac->id == $cat->id  and $ac->year == $fechas['year'] ){{{$ac->monto}}},@endif
                 @endforeach 
                 ]
            },
            @endforeach
            ]


});
//fin ventas totales apiladas

//grafica totales por mes
Highcharts.chart('totales_mes', {
   
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
    },
    yAxis: {
        title: {
            text: '',
            
        }
    },
    legend: {
       
        align: 'center',
        verticalAlign: 'top'
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
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>${point.y:,.0f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
      
    },
    series: [{
        name:'{{{$fechas['year3']}}}', 
        data: [@foreach($acumulado as $ac) @if($ac->year == $fechas['year3']) {{{round($ac->total,0)}}}, @endif @endforeach ]
       },
       {
        name:'{{{$fechas['year2']}}}', 
        data: [@foreach($acumulado as $ac) @if($ac->year == $fechas['year2']) {{{round($ac->total,0)}}}, @endif @endforeach ]
       },
       {
        name:'{{{$fechas['year1']}}}',
        data: [@foreach($acumulado as $ac) @if($ac->year == $fechas['year1']) {{{round($ac->total,0)}}}, @endif @endforeach ]
       },
      {
        name:'{{{$fechas['year']}}}',  
        data: [@foreach($acumulado as $ac) @if($ac->year == $fechas['year']) {{{round($ac->total,0)}}}, @endif @endforeach ]
      }

     ]
});

//fin grafica totales por mes

//ventas totales mantenimiento apiladas
Highcharts.chart('apiladas_mtto', {
    chart: {
       
       
        type: 'column'
    },
    title: {
        text: ''
    },
    xAxis: {
        categories: [@foreach($categories_mtto as $cat)'{{$cat->nombre}}', @endforeach]
    },
    yAxis: {
        
        title: {
            text: ''
        },
        stackLabels: {
            enabled: true,
            style: {
                fontWeight: 'bold',
                color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
            },
            formatter: function() {   
                        return 'Total:'+  Highcharts.numberFormat(this.total, 0, ',')  ;                                
                    }
        }
    },
    legend: {
        itemDistance: 2,
        align: 'center',
        x: -30,
        verticalAlign: 'top',
      
        y: 3,
        floating: true, //dentro de la grafica
        backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
        borderColor: '#CCC',
        borderWidth: 1,
        shadow: true
    },
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: {point.y:,.0f}<br/>Total: {point.stackTotal:,.0f}'
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: false,
                color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
            }
        }
    },
    

    series: [@foreach($periodo_mtto as $cat){name:'{{{$cat->nombre}}}',data:[@foreach($mtto_totales as $ac) @if($ac->periodo_id == $cat->id and ($ac->year == $year and $ac->month == $month)){{{$ac->monto}}},@endif @endforeach]},@endforeach
            ]


});
//fin ventas totales mantenimiento apiladas



//grafica vendedores mes, 2017
Highcharts.chart('vendedores', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
     
    subtitle: {
        text: ''
    },
          xAxis: {
        categories: [
            @foreach($vendedores as $ven)
            '{{{$ven->asesor}}}',
            @endforeach
        ],
         labels: {
            staggerLines: 1
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: ''
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: false
    },

    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: true,
                color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'gray'
            }
        }
    },

    series: [{
       
        data: [@foreach($serie_vendedores['data'] as $d) {{{round($d->monto,0)}}}, @endforeach ],
  
    }],
    
});
//fin de grafica de vendedores 

// grafica de promotorias

Highcharts.chart('promotorias', {
    chart: {
       
       
        type: 'column'
    },
    title: {
        text: ''
    },
    xAxis: {
        categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
    },
    yAxis: {
        
        title: {
            text: ''
        },
        stackLabels: {
            enabled: true,
            style: {
                fontWeight: 'bold',
                color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
            },
            formatter: function() {   
                        return 'Total mensual: $'+  Highcharts.numberFormat(this.total, 0, ',')  ;                                
                    }
        }
    },
    legend: {
        itemDistance: 2,
        align: 'right',
        x: -30,
        verticalAlign: 'top',
        y: -3,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
        borderColor: '#CCC',
        borderWidth: 1,
        shadow: false
    },
    tooltip: {
        headerFormat: '<b>{point.x}</b><br/>',
        pointFormat: '{series.name}: ${point.y:,.0f}<br/>Total: ${point.stackTotal:,.0f}'
    },
    plotOptions: {
        column: {
            stacking: 'normal',
            dataLabels: {
                enabled: false,
                color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
            }
        }
    },
    

    series: [
            @foreach($promotor as $pro)
            {name:'{{{$pro->promotor}}}', 
            data:[@foreach($serie_promotoria as $sep) @if($sep->promotor == $pro->promotor){{{$sep->total}}},@endif
                 @endforeach 
                 ]
            },
            @endforeach
            ],
           


});
// fin  de graficas promotorias
// ventas totales febrero 

Highcharts.chart('VentasTotal', {

    title: {
        text: ''
    },

    subtitle: {
        text: ''
    },
   xAxis: {
        categories: ['{{{$fechas['year3']}}}','{{{$fechas['year2']}}}','{{{$fechas['year1']}}}','{{{$fechas['year']}}}']
    },
    yAxis: {
        title: {
            text: ''
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
   tooltip: {
       pointFormat: '<b>${point.y:,.2f}</b> USD'
    },

  plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },

    series: [{
        name: '{{{$mes}}}',
        data: [@foreach($serie_total['data'] as $d) {{{round($d->total,0)}}}, @endforeach]
    }]

});
//fin ventas totales  febrero

</script> 
@stop()

@section('module')


<div class="widget">
	<div class="widget-head">
		<div class="pull-left">Acumulados anual (Escala M = Millón)</div>
		<div class="pull-right">
		<a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>         
        </div>  
		<div class="clearfix"></div>
	</div>
	
	<div class="widget-content">
		<div class="padd">
		<div id="acumulados" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    
<table class="table table-condensed">
    <thead>
        <tr> 
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
           
        <tr>
            <th>{{{$fechas['year3']}}}</th>
            <?php $sum3 = 0;?> 
            @foreach($acumulado as $d) 
                @if($d->year == $fechas['year3'])
                <?php $sum3 = $d->total + $sum3; ?>
                <td>${{{number_format($sum3, 0, '.', ',')}}}</td> 
                @endif
            @endforeach
        </tr>
       <tr>
            <th>{{{$fechas['year2']}}}</th>
            <?php $sum2 = 0;?> 
            @foreach($acumulado as $d) 
                @if($d->year == $fechas['year2'])
                <?php $sum2 = $d->total + $sum2; ?>
                <td>${{{number_format($sum2, 0, '.', ',')}}}</td> 
                @endif
            @endforeach
        </tr>
        <tr>
            <th>{{{$fechas['year1']}}}</th>
            <?php $sum1 = 0;?> 
            @foreach($acumulado as $d) 
                @if($d->year == $fechas['year1'])
                <?php $sum1 = $d->total + $sum1; ?>
                <td>${{{number_format($sum1, 0, '.', ',')}}}</td> 
                @endif
            @endforeach
        </tr>
        <tr>
            <th>{{{$fechas['year']}}}</th>
            <?php $sumx = 0;?> 
            @foreach($acumulado as $d) 
                @if($d->year == $fechas['year'])
                <?php $sumx = $d->total + $sumx; ?>
                <td>${{{number_format($sumx, 0, '.', ',')}}}</td> 
                @endif
            @endforeach


        </tr>
       
    </tbody>
    <tfoot>
         
</table>
		
		</div>
	</div>


	<div class="widget-foot">
		<div class="pull-right">
			<div class="btn-group">
				
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>


<div class="widget">
    <div class="widget-head">
        <div class="pull-left">Comparativas por producto {{{$fechas['mes']}}}  {{{$fechas['year3']}}}, {{{$fechas['year2']}}}, {{{$fechas['year1']}}} y {{{$fechas['year']}}}</div>
        <div class="pull-right">
        <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>  
        </div>  
        <div class="clearfix"></div>
    </div>
    
    <div class="widget-content">
        <div class="padd">
        

        <div id="container" style="min-width: 320px; height: 500px; margin: 0 auto"></div> 
            
<div >
            <table class="table table-condensed">
    <thead>
        <tr> 
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
           
                       
            
        </tr>
    </thead>
    <tbody>
        <tr>
            
        
            <th>{{{$fechas['year3']}}}</th>
            
           @foreach($serie as $d) @if($d->month == $fechas['month'] and $d->year == $fechas['year3'])<td class="text-center">  ${{{number_format($d->monto, 0, '.', ',')}}}</td> @endif @endforeach
        </tr>
        <tr>
            <th>{{{$fechas['year2']}}}</th>
             
           @foreach($serie as $d) @if($d->month == $fechas['month'] and $d->year == $fechas['year2'])<td class="text-center">  ${{{number_format($d->monto, 0, '.', ',')}}}</td> @endif @endforeach
        </tr>
        <tr>
            <th>{{{$fechas['year1']}}}</th>
             @foreach($serie as $d) @if($d->month == $fechas['month'] and $d->year == $fechas['year1'])<td class="text-center">  ${{{number_format($d->monto, 0, '.', ',')}}}</td> @endif @endforeach
        </tr>
        <tr>
            <th>{{{$fechas['year']}}}</th>
             @foreach($serie as $d) @if($d->month == $fechas['month'] and $d->year == $fechas['year'])<td class="text-center">  ${{{number_format($d->monto, 0, '.', ',')}}}</td> @endif @endforeach
        </tr> 
       
    </tbody>
    <tfoot>
         
</table>
</div>
        
       
        </div>
    </div>


    <div class="widget-foot">
        <div class="pull-right">
            <div class="btn-group">
               
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>


<div class="widget">
    <div class="widget-head">
        <div class="pull-left">Ventas totales {{{$mes}}} de {{{$year}}}</div>
        <div class="pull-right">
       <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>  
       </div>  
        <div class="clearfix"></div>
    </div>
    
    <div class="widget-content">
        <div class="padd">
      

        <div id="apiladas" style="min-width: 310px; height: 480px; margin: 0 auto"></div>

<table class="table table-condensed">
    <thead>
        <tr> 
            <th></th>
           
        </tr>
    </thead>
    <tbody>


@foreach($categories as $cat)
         <tr>
            
            <th class="text-left col-md-3">{{{$cat->nombre}}}</th>
          @foreach($serie as $ac) @if($ac->id == $cat->id  and $ac->year == $fechas['year'] )
                 
                
                <td class="text-left col-md-5">${{{number_format($ac->monto, 0, '.', ',')}}} </td>@endif 
            @endforeach


        </tr>@endforeach
      
        
       
    </tbody>
    <tfoot>
         
</table>
        </div>
    </div>


    <div class="widget-foot">
        <div class="pull-right">
            <div class="btn-group">                
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div> 

<div class="widget">
    <div class="widget-head">
        <div class="pull-left">Totales por mes</div>
        <div class="pull-right">
        <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>         
        </div>  
        <div class="clearfix"></div>
    </div>
    
    <div class="widget-content">
        <div class="padd">
        <div id="totales_mes" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    
<table class="table table-condensed">
    <thead>
        <tr> 
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
           
         <tr>
            <th>{{{$fechas['year3']}}}</th>
             
            @foreach($acumulado as $d) 
                @if($d->year == $fechas['year3'])
                
                <td>${{{number_format($d->total, 0, '.', ',')}}}</td> 
                @endif
            @endforeach


        </tr>
        <tr>
            <th>{{{$fechas['year2']}}}</th>
             
            @foreach($acumulado as $d) 
                @if($d->year == $fechas['year2'])
                
                <td>${{{number_format($d->total, 0, '.', ',')}}}</td> 
                @endif
            @endforeach


        </tr>
         <tr>
            <th>{{{$fechas['year1']}}}</th>
             
            @foreach($acumulado as $d) 
                @if($d->year == $fechas['year1'])
                
                <td>${{{number_format($d->total, 0, '.', ',')}}}</td> 
                @endif
            @endforeach


        </tr>
        <tr>
            <th>{{{$fechas['year']}}}</th>
             
            @foreach($acumulado as $d) 
                @if($d->year == $fechas['year'])
                
                <td>${{{number_format($d->total, 0, '.', ',')}}}</td> 
                @endif
            @endforeach


        </tr>
       
    </tbody>
    <tfoot>
         
</table>
        
        </div>
    </div>


    <div class="widget-foot">
        <div class="pull-right">
            <div class="btn-group">
                
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="widget">
    <div class="widget-head">{{{$mtto}}}
        <div class="pull-left"> <strong>{{{$mtto_totales->sum('monto')}}} </strong>Propiedades con mantenimientos activos (unidades) {{{$mes}}} de {{{$year}}}</div>
        <div class="pull-right">
       <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>  
       </div>  
        <div class="clearfix"></div>
    </div>
    
    <div class="widget-content">
        <div class="padd">
      

        <div id="apiladas_mtto" style="min-width: 310px; height: 480px; margin: 0 auto"></div>

<table class="table table-condensed">
    <thead>
        <tr> 
            <th></th>
           @foreach($categories_mtto as $cat)<th> {{{$cat->nombre}}} </th>@endforeach
        </tr>
    </thead>
    <tbody>


@foreach($periodo_mtto as $cat)
         <tr>
            
            <th class="text-left col-md-1">{{{$cat->nombre}}}</th>
           @foreach($mtto_totales as $ac) 
                 
                
                @if($ac->periodo_id == $cat->id  and ($ac->year == $year and $ac->month == $month))<td class="text-center col-md-1">{{{number_format($ac->monto, 0, '.', ',')}}} </td>@endif 
            @endforeach

        </tr>@endforeach
      
        
       
    </tbody>
    <tfoot>
         
</table>
        </div>
    </div>


    <div class="widget-foot">
        <div class="pull-right">
            <div class="btn-group">                
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div> 


<!-- Empieza ventas totales mes febrero  -->
            
              <!-- Empieza Vendedores  -->
            <div class="widget">
              <div class="widget-head">
                <div class="pull-left">Vendedores {{{$mes}}} {{{$year}}}</div>
                <div class="widget-icons pull-right">
                  <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                  <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>  
                <div class="clearfix"></div>
              </div>
              <div class="widget-content">
                <div class="padd">
                 
      
                
            <div id="vendedores" style="min-width: 300px; height: 400px; margin: 0 auto"></div>

                 <!-- Content goes here -->
                </div>
                <div class="widget-foot">
                  <!-- Footer goes here -->
                </div>
              </div>
            </div>  
              <!-- Empieza Promotorias  -->
                     <div class="widget">
    <div class="widget-head">
        <div class="pull-left">Promotorias {{{$year}}}</div>
        <div class="pull-right">
       <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>  
       </div>  
        <div class="clearfix"></div>
    </div>
    
    <div class="widget-content">
        <div class="padd">
      

        <div id="promotorias" style="min-width: 310px; height: 480px; margin: 0 auto"></div>

  <table class="table table-condensed">
    <thead>
        <tr> 
            <th></th>
           
        </tr>
    </thead>
    <tbody>


@foreach($promotor as $pro)
        <tr>
            
            <th class="text-right" class="col-md-3">{{{$pro->promotor}}}</th>
           @foreach($serie_promotoria as $sep) 
                 
                
                @if($sep->promotor == $pro->promotor)<td class="text-left">${{{number_format($sep->total, 0, '.', ',')}}} </td>@endif 
            @endforeach

        </tr>@endforeach
       
        
       
    </tbody>
    <tfoot>
         
</table>
        </div>
    </div>
  


    <div class="widget-foot">
        <div class="pull-right">
            <div class="btn-group">                
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div> 

<!-- Empieza ventas totales mes febrero  -->
            <div class="widget">
              <div class="widget-head">
                <div class="pull-left">Venta total </div>
                <div class="widget-icons pull-right">
                  <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                  <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>  
                <div class="clearfix"></div>
              </div>
              <div class="widget-content">
                <div class="padd">
                 
      
                <div id="VentasTotal"></div>

                 <!-- Content goes here -->
                </div>
                <div class="widget-foot">
                  <!-- Footer goes here -->
                </div>
              </div>
            </div> 
@stop