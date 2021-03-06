@section('scripts')

<style type="text/css">
    #legendDiv ul {
    list-style: none;
    font-family: 'Helvetica Neue', 'Helvetica', 'Arial', sans-serif;
    font-size: 12px;
}

#legendDiv ul span {
    display: inline-block;
    height: 1em;
    width: 1em;
    margin-right: 0.5em;
}

 #legendDivbar ul {
    list-style: none;
    font-family: 'Helvetica Neue', 'Helvetica', 'Arial', sans-serif;
    font-size: 12px;
}

#legendDivbar ul span {
    display: inline-block;
    height: 1em;
    width: 1em;
    margin-right: 0.5em;
}

</style>
<!-- Scripts for this page -->
<script type="text/javascript">

$(document).ready(function () {
  $("#cortes").hide();
   

    var barChartData = {
        labels : [@foreach($estadisticos_laminas as $lamina) "{{{$lamina->folio_lamina}}}", @endforeach],
        datasets : [
            
             {
                //barra de ventas                
               
                fillColor : "{{{$color_grafica->grafica_color_ventas}}}",
                strokeColor : "#ffffff",
                highlightFill: "{{{$color_grafica->grafica_sobre_ventas}}}",
                highlightStroke: "#ffffff", 
                label: 'Ventas',            
                data : [@foreach($estadisticos_laminas as $lamina) {{{$lamina->venta}}}, @endforeach]
 

            },
           

            {
                
                //barra de stock                
                 
                fillColor : "{{{$color_grafica->grafica_color_stock}}}",
                strokeColor : "#ffffff",
                highlightFill: "{{{$color_grafica->grafica_sobre_stock}}}",
                highlightStroke: "#ffffff",
                label: 'Stock',            
                data : [@foreach($estadisticos_laminas as $lamina) {{{$lamina->stock}}}, @endforeach]

                

            },
             {
                
                //barra de reposiciones                
               
                fillColor : "{{{$color_grafica->grafica_color_reposiciones}}}",
                strokeColor : "#ffffff",
                highlightFill: "{{{$color_grafica->grafica_sobre_reposiciones}}}",
                highlightStroke: "#ffffff", 
                label: 'Reposicion',
                data : [@foreach($estadisticos_laminas as $lamina) {{{$lamina->reposicion}}}, @endforeach]

                

            },
           
            
            
        ]

    }

    //FUNCION PARA SACAR COLORES RANDOM
function get_random_color() {
                var letters = '0123456789ABCDEF'.split('');
                var color = '#';
                for (var i = 0; i < 6; i++ ) {
                    color += letters[Math.round(Math.random() * 15)];
                }
                return color;
}
    var pieData = [
                @foreach($estadisticos_colores as $color)
                {
                     
                        value: {{{$color->movimientos}}},
                        color:get_random_color(),
                        highlight: "#0c62ab",
                        label: '{{{$color->material_color}}}'
                    },
                     @endforeach       
                    ];



var ctx3 = document.getElementById("chart-area3").getContext("2d");
var ctx = document.getElementById("chart-area").getContext("2d");              
window.myPie = new Chart(ctx).Pie(pieData, {
                                            
                                            //Number - The percentage of the chart that we cut out of the middle
                                            percentageInnerCutout : 0, // This is 0 for Pie charts
                                            animateScale: true,
                                             // String - Template string for single tooltips
                                            tooltipTemplate: "<%if (label){%><%=label %>: <%}%><%= value + ' ' %>",
                                            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
                                            showTooltips: true,
 

                                                    }); 
window.myBar = new Chart(ctx3).Bar(barChartData, {
                                                    responsive:true,
                                                    //Number - Spacing between data sets within X values
                                                    barDatasetSpacing : 0,
                                                    tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %> Trabajos",
                                                    scaleLabel: "<%=value%>",
                                                    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
                                                    showTooltips: true,
                                                 });
 document.getElementById("legendDiv").innerHTML  = window.myPie.generateLegend();
 document.getElementById("legendDivbar").innerHTML  = window.myBar.generateLegend();


});


</script>


    @stop
@section('module')

 <div class="row">

                      <div class="col-md-3">
                        <div class="well">
                          <h2><i class="fa fa-database"></i> Inventario ${{{number_format($costo_inventario, 2, '.', ',')}}}</h2>
                          
                          

                        </div>
                      </div>

                      
                      <div class="col-md-3">
                        <div class="well">
                          <h2> <i class="fa fa-money"></i>  Ventas (Mes): ${{{number_format($costo_venta, 2, '.', ',')}}} </h2>                                                  
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="well">
                          <h2> <i class="fa fa-cubes"></i>  Stock: ${{{number_format($costo_stock, 2, '.', ',')}}} </h2>                                                  
                        </div>
                      </div>


                      <div class="col-md-3">
                        <div class="well">
                          <h2> <i class="fa fa-exchange"></i>  Reposicion: ${{{number_format($costo_reposicion, 2, '.', ',')}}} </h2>                                                  
                        </div>
                      </div>

                      
                   

            <div class="col-md-12">

              <!-- User widget -->
              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Inventario General </div>
                  <div class="widget-icons pull-right"> Costo de Material ${{{number_format($costo_produccion, 2, '.', ',')}}} 
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"> </i></a> 
                  
                    
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content" id="inventario_general">
                  <div class="padd">
                   <!-- tabla de inventario--> 
                   
 <div class="page-tables">
                        <!-- Table -->
                        <div class="table-responsive" id="StudentTableContainer">
                            <table cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%">
                                <thead>
                                    <tr>                                                                        
                                        <th>Lámina</th>
                                        <th>Factura</th>
                                        <th>Descripción</th>
                                        <th>Usado</th>
                                        <th>Lamina</th>
                                        <th>Inventario</th>
                                        <th>Ventas</th>
                                        <th>Stock</th>
                                        <th>Reposicion</th>
                                        <th>Utilidad</th>
                                        <th>Detalles</th>

                                                                                                                                                                                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($inventarios as $crt => $inventario)                                   
                                                                       
                                        {{-- <td>
                                         {{ $crt+1 }}   
                                        </td> --}}
                                        <td>{{{ $inventario->folio_lamina}}} </td>                                        
                                         <td>{{{$inventario->folio_factura}}} </td>
                                         <td>
                                    <!-- Checkbox -->
                                                            

                                                          <p class="p-meta">
                                                            <!-- Due date & % Completed -->
                                                            <span>@if($inventario->lamina_completa == 0)<span class="label label-info">Retazo</span> @endif  {{{ $inventario->material_color}}} @if($inventario->porcentaje_restante == 100) {{{$inventario->porcentaje_restante}}} @else {{{number_format($inventario->porcentaje_restante, 2, '.', ',')}}} @endif %  Disp.: {{{number_format($inventario->area_stock, 2, '.', ',')}}} m<sup>2</sup> </span> 
                                                                                        
                                                          </p>
                                                    <div class="progress progress-striped active">
                                <div class="progress-bar @if($inventario->porcentaje_restante == 100) progress-bar-success @elseif($inventario->porcentaje_restante == 50 or $inventario->porcentaje_restante >= 31 ) progress-bar-warning @elseif($inventario->porcentaje_restante <= 30) progress-bar-danger  @endif"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: {{{$inventario->porcentaje_restante}}}%">
                                <span class="sr-only">100% Complete</span>
                                </div>
                                </div>        
                                        </td>
                                        <td>{{{number_format($inventario->area_usada, 2, '.', ',')}}}m<sup>2</sup></td>                                        
                                        <td>${{{number_format($inventario->precio_inicial, 2, '.', ',')}}}</td>                                        
                                        <td>${{{number_format($inventario->precio_stock, 2, '.', ',')}}}</td>                                        
                                        <td>${{{number_format($inventario->ventas, 2, '.', ',')}}}</td>
                                        <td>${{{number_format($inventario->stock, 2, '.', ',')}}}</td>                                        
                                        <td>${{{number_format($inventario->perdida_reposicion, 2, '.', ',')}}}</td>

                                        <td><span class="label @if($inventario->utilidad < 0) label-danger @elseif($inventario->utilidad > 0) label-success @elseif($inventario->utilidad == 0) label-default   @endif">${{{number_format($inventario->utilidad, 2, '.', ',')}}} </td>
                                        <td>
                                        <a class="btn btn-xs btn-default" href="{{action('InventarioRecubControlador@getLamina', $inventario->inventario_recubrimientos_id)}}" name="inventario_recubrimientos_id" value="{{{$inventario->inventario_recubrimientos_id}}}"  title="Ver detalles de movimientos por lamina"> <i class="fa fa-search"></i> Ver</a>
                                        
                                        
                                        </td>                                
                                    </tr>
                                    @endforeach

                                </tbody>
                                
                            </table> </div>
                            <div class="clearfix"></div>
          <!-- tabla de inventario -->
                    
                  </div> <!-- end pad-->
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>  

            </div>

            <!-- todos los cortes -->

            <div class="col-md-12">

              <!-- User widget -->
              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Historial de cortes </div>
                  <div class="widget-icons pull-right"> Total de cortes {{{$cortes->count()}}} 
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"> </i></a> 
                  
                    
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content" id="cortes">
                  <div class="padd">
                   <!-- tabla de inventario--> 
                   
 <div class="page-tables">
                        <!-- Table -->
                        <div class="table-responsive" >
                            <table cellpadding="0" cellspacing="0" border="0" id="data-table2" width="100%">
                                <thead>
                                    <tr>                                                                        
                                        <th>#</th>
                                        <th>Fecha Corte</th>
                                        <th>Lámina</th>                                        
                                        <th>Pieza</th>
                                        <th>Motivo</th>
                                        <th>Tipo de corte</th>
                                        <th>Área</th>
                                        <th>Costo</th>
                                        {{--<th>Captura</th>--}}
                                                                                                                                                                                                                                          
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cortes as $crt => $corte)                                   
                                                                       
                                        <td>{{ $crt+1 }} </td>
                                        <td title="Captura {{{date("d-m-Y", strtotime ($corte->fecha_captura))}}}"> {{{date("d-m-Y", strtotime($corte->fecha))}}}  </td>
                                        <td><span class="badge">{{{$corte->lamina}}}</span> {{{$corte->material_color}}}</td>                                        
                                        <td>{{{$corte->nombre}}}</td>
                                        
                                        <td><span class="label @if($corte->tipo_baja == 'Venta') label-success @elseif($corte->tipo_baja == 'Stock') label-info @elseif ($corte->tipo_baja == 'Reposicion') label-danger @endif">{{{$corte->tipo_baja}}}</span></td>
                                        <td>{{{$corte->tipo_corte}}}</td>                                       
                                        <td>{{{number_format($corte->area_venta, 2, '.', ',')}}}m<sup>2</sup></td>
                                        <td>${{{number_format($corte->costo, 2, '.', ',')}}}</td>
                                        {{--<td>{{{date("d-m-Y", strtotime ($corte->fecha_captura))}}}</td>--}}
                                    </tr>
                                    @endforeach

                                </tbody>
                                
                            </table> </div>
                            <div class="clearfix"></div>
          <!-- tabla de inventario -->
                    
                  </div> <!-- end pad-->
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>  

            </div>
            <!-- fin todos los cortes -->


            <div class="col-md-4">
              <!-- Quick setting -->
              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Movimientos de material por color</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>                 
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content" id="grafica_pastel">
                  <div class="padd">
                 
                      <canvas id="chart-area" width="300" height="300"></canvas>
                      <div id="legendDiv"></div> 

                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>  


            </div>

            <div class="col-md-8" >
              <!-- Quick setting -->
              <div class="widget">
                <div class="widget-head">
                  <div class="pull-left">Movimientos de material por lámina</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>                    
                  </div>  
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content" id="grafica_barras">
                  <div class="padd">
                 
                    <div align="center"><canvas align = "center" id="chart-area3" width="400" height="250"></canvas><div>
                    <div align="left" id="legendDivbar"></div>
                    

                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>  


            </div>

          </div>            
@stop
