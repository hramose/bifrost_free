@section('scripts')
<script src="{{ URL::asset('js/chosen.jquery.js') }}"> </script>



<script>
	 $(document).on('ready', function(){
      window.setTimeout(function() {
  $("#alerta").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove();
  });
}, 4000);
      // Cargar  la lista extras
    	  });
	$.ajax("{{ action('ReporteMensualControlador@getExtras') }}")
		.success(function(data){
			$('#extras').typeahead({
				source: data,
				display: 'nombre',
				val: 'id',
				itemSelected: function(item){
					$('.id').val(item);
				}
			});
		});
//chosen grafica vendedor
    $(".vendedores").chosen({   
    no_results_text: "No hay resultados para:",    
    
    width: "100%"    
  });

    // Cargar  la lista
    $.ajax("{{ action('ReporteMensualControlador@getVendedores') }}")
    .success(function(data){
      $('#vendedor').typeahead({
        source: data,
        display: 'asesor',
        val: 'id',
        itemSelected: function(item){
          $('#asesor_id').val(item);
        }
      });
    });
	 //chosen cartera cliente
	     $(".carteras").chosen({   
    no_results_text: "No hay resultados para:",    
    
    width: "100%"    
  });

    // Cargar  la lista 
    $.ajax("{{ action('ReporteMensualControlador@getCarteras') }}")
    .success(function(data){
      $('#cartera').typeahead({
        source: data,
        display: 'nombre',
        val: 'id',
        itemSelected: function(item){
          $('#id').val(item);
        }
      });
    });
     //chosen producto grafica
    	     $(".categorias").chosen({   
    no_results_text: "No hay resultados para:",    
    
    width: "100%"    
  });

    // Cargar  la lista 
    $.ajax("{{ action('ReporteMensualControlador@getProductos') }}")
    .success(function(data){
      $('#producto').typeahead({
        source: data,
        display: 'nombre',
        val: 'id',
        itemSelected: function(item){
          $('#id').val(item);
        }
      });
    });
       
     //chosen producto grafica
           $(".tipo").chosen({   
    no_results_text: "No hay resultados para:",    
    
    width: "100%"    
  });

    // Cargar  la lista 
    $.ajax("{{ action('ReporteMensualControlador@getTiposPropiedad') }}")
    .success(function(data){
      $('#tipo').typeahead({
        source: data,
        display: 'nombre',
        val: 'id',
        itemSelected: function(item){
          $('#id').val(item);
        }
      });
    });

function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;
    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }   
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}


$("#div_vendedores").show();
$("#div_mantenimiento").hide();
$("#div_periodo").hide();
$("#div_categorias").hide();
$("#div_productosmttp").hide();
$("#div_extra").hide();
$("#div_carteras").hide();

//registro vendedores - promotorias
    $("#r1").click(function () {
        $("#div_vendedores").show();
        $("#div_categorias").hide();
        $("#div_mantenimiento").hide();
        $("#div_periodo").hide();
        $("#div_productosmttp").hide();
        $("#div_extra").hide();
        $("#div_carteras").hide();

    });

//registro distribucion captura mtto
    $("#r2").click(function () {
        $("#div_mantenimiento").show();
        $("#div_vendedores").show();
       	$("#div_categorias").hide();
        $("#div_periodo").hide();
        $("#div_productosmttp").hide();
        $("#div_extra").hide();
        $("#div_carteras").hide();

    });
     
//registro periodo mtto
     $("#r3").click(function () {
       $("#div_periodo").show();
       $("#div_productosmttp").show();
       $("#div_mantenimiento").hide();
       $("#div_vendedores").hide();
       $("#div_extra").hide();
       $("#div_carteras").hide();
       $("#div_categorias").hide();

    });
//registro ventas producto
       $("#r2corte").click(function () {
       $("#div_categorias").show();
       $("#div_vendedores").hide();
 	   $("#div_mantenimiento").hide();
       $("#div_periodo").hide();
       $("#div_productosmttp").hide();
       $("#div_extra").hide();
       $("#div_carteras").hide();

    });
//categorias extras
     $("#r4").click(function () {
       $("#div_extra").show();
       $("#div_productosmttp").hide();
       $("#div_mantenimiento").hide();
       $("#div_vendedores").hide();
       $("#div_carteras").hide();
       $("#div_periodo").hide();
       $("#div_categorias").hide();

    });
        $("#r5").click(function () {
       $("#div_extra").hide();
       $("#div_productosmttp").hide();
       $("#div_mantenimiento").hide();
       $("#div_vendedores").hide();
       $("#div_carteras").show();
        $("#div_categorias").hide();
         $("#div_periodo").hide();

    });


</script>
@stop

@section('module')


<div class="row">  
     	
                 @if($status=='created')
                  <div class="alert alert-info alert-dismissible" role="alert" align="center" id="alerta">
                 <strong><h4> Registro exitoso</h4></strong>
                </div> 
                @endif 
 				@if($status=='validar')
                  <div class="alert alert-info alert-danger" role="alert" align="center" id="alerta">
                 <strong><h4> Este registro ya ha sido añadido</h4></strong>
                </div> 
                @endif
                @if($status=='extra')
                  <div class="alert alert-info alert-dismissible" role="alert" align="center" id="alerta">
                 <strong><h4> Este extra ya fue registrado, se añadira automaticamente. Registro exitoso</h4></strong>
                </div> 
                @endif
                @if($status=='vacio')
                  <div class="alert alert-info alert-warning" role="alert" align="center" id="alerta">
                 <strong><h4> Favor de no dejar campos vacios</h4></strong>
                </div> 
                @endif


     <div class="col-md-12">  
    <div class="widget">
                <!-- Widget title -->
                <div class="widget-head">                
               <div align="rigth"> Registro reporte mensual</div>                  
                    
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
          
                
                <div class="padd">
      			
                     {{ Form::open(array('action' => 'ReporteMensualControlador@postInsercion','class' => 'form-horizontal', 'role' => 'form', 'id'=>'empresa','files' => true)) }} 
  
                  	<div class="col-md-4">
                              <div class="form-group">
                                  <label class="col-lg-4 control-label">Año</label> 
                                   <div class="input-group">
                                    <input type="number" class="form-control"  required placeholder="example 2017" min="2014" name="years">
                                    <span class="input-group-addon" ><i class="fa fa-calendar" aria-hidden="true"></i></span> 
   								</div>
                                </div>
               
                  	</div>
                  	<div class="col-md-4">
                                     <div class="form-group">
                                   <label class="col-lg-4 control-label">Mes</label>
                                    <div class="col-lg-8	"> 
                                     <select  class="form-control"  name="month">
                                             <option value="0">Seleccione</option>
                                              <option value="1">Enero</option>
                                              <option value="2">Febrero</option>
                                              <option value="3">Marzo</option>
                                              <option value="4">Abril</option>
                                              <option value="5">Mayo</option>
                                              <option value="6">Junio</option>
                                              <option value="7">Julio</option>
                                              <option value="8">Agosto</option>
                                              <option value="9">Septiembre</option>
                                              <option value="10">Octubre</option>
                                              <option value="11">Noviembre</option>
                                              <option value="12">Diciembre</option>
                                            </select>
									</div>
                           
                                </div>
                                </div>
                     <div class="col-md-4">
                              <div class="form-group">
                                  <label class="col-lg-4 control-label">Monto</label> 
                                   <div class="input-group">
                                       <span class="input-group-addon" >$</span> 
                                    <input type="text" class="form-control" required onkeypress="return valida(event)"  name="Monto">
                                
   								</div>
                                </div>
               
                  	</div>

                          <div class="form-group">
                            <div class="col-lg-12">
                          		<hr>
                           </div>
                        <label class="col-lg-7 control-label">Elije los detalles del registro de la grafica</label>
                       
                        <div class="col-lg-10" align="right">
                          	<label class="radio-inline"><input type="radio" name="seccion" value="01" id="r1" checked="true" >Vendedores</label>
        					<label class="radio-inline"><input type="radio" name="seccion" value="02" id="r2corte">Ventas categorias</label>
        					<label class="radio-inline"><input type="radio" name="seccion" value="03" id="r2" >Distribución captura de mantenimiento</label>
        					<label class="radio-inline"><input type="radio" name="seccion" value="04" id="r3">Periodo mantenimiento</label>
        					<label class="radio-inline"><input type="radio" name="seccion" value="05" id="r5">Cartera cliente</label>
        					<label class="radio-inline"><input type="radio" name="seccion" value="06" id="r4">Extras</label>
        		
        									
                                            
                        </div>
                      </div>
                               <div class="form-group" id="div_vendedores">
                                  <label class="col-lg-4 control-label">Vendedores</label>
                                  <div class="col-lg-4">
                                    <select class="form-control vendedores chosen-select" name="vendedor_id">
                                      <option value="0">Seleccione</option>
                                      @foreach($vendedores as $vendedor)
                                      <option value="{{{$vendedor->asesor_id}}}" >{{{$vendedor->asesor}}}</option>
                                      @endforeach
                                    </select>
                                    
                                  </div>
                                </div> 
                                <div class="form-group" id="div_categorias">
                                <label class="col-lg-4 control-label">Categorias</label>
                                  <div class="col-lg-4">
                                    <select class="form-control categorias chosen-select" name="categoria">
                                      <option value="0">Seleccione</option>
                                      @foreach($productos as $producto)
                                      <option value="{{{$producto->id}}}" >{{{$producto->nombre}}}</option>
                                      @endforeach
                                    </select>
                                    
                                 </div>
                           </div>
                              <div class="form-group" id="div_mantenimiento">
                                  <label class="col-lg-4 control-label">Tipo de mantenimiento</label>
                                  <div class="col-lg-4">
                                    <select class="form-control " name="mantenimiento_id">
                                      <option value="0">Seleccione</option>
                                      @foreach($mantenimientos as $mantenimiento)
                                      <option value="{{{$mantenimiento->id}}}" >{{{$mantenimiento->nombre}}}</option>
                                      @endforeach
                                    </select>
                                    
                                  </div>
                                </div> 
                               <div class="form-group" id="div_productosmttp">
                                  <label class="col-lg-4 control-label">Tipo de propiedad</label>
                                  <div class="col-lg-4">
                                    <select class="form-control tipo chosen-select" name="producto" >
                                     <option value="ind">Seleccione</option>
                                      @foreach($tipos_propiedad as $tipo)
                                      <option value="{{{$tipo->id}}}" >{{{$tipo->nombre}}}</option>
                                      @endforeach
                                    </select>
                                    
                                  </div>
                                </div>
                                     	 <div class="form-group" id="div_periodo">
                                  <label class="col-lg-4 control-label">Periodo mantenimiento</label>
                                  <div class="col-lg-4">
                                    <select class="form-control " name="periodo_id">
                                      <option value="0">Seleccione</option>
                                      @foreach($periodos as $periodo)
                                      <option value="{{{$periodo->id}}}" >{{{$periodo->nombre}}}</option>
                                      @endforeach
                                    </select>
                                    
                                  </div>
                                </div>

    					<div class="form-group" id="div_carteras">
                                  <label class="col-lg-4 control-label">Periodo de cartera</label>
                                  <div class="col-lg-4">
                                    <select class="form-control carteras chosen-select" name="cartera_id">
                                      <option value="0">Seleccione</option>
                                      @foreach($carteras as $cartera)
                                      <option value="{{{$cartera->id}}}" >{{{$cartera->nombre}}}</option>
                                      @endforeach
                                    </select>
                                    
                                 </div>
                           </div>
                           <div class="col-md-9">
                         <div class="form-group" id="div_extra">
                                  <label class="col-lg-5 control-label">Nombre del extra</label>
                                 <div class="col-lg-6">
                                  <div class="input-group">
                                  <span class="input-group-addon" ><i class="fa fa-pencil" aria-hidden="true"></i></span>     
                                    <input type="text" id="extras" class="form-control"  placeholder="Descripción"  name="extra"> 

                        
                				</div>
                  				</div>
                  				</div> 
                  				</div>
              

                           
              <div class="clearfix"></div>             
                
</div>
      </div>
      <div class="widget-foot">
      <button type="submit" class="btn btn-m btn-default" id="btn_send" ><i class="fa fa-floppy-o"></i> Guardar</button>
      </div>
      {{form::close()}}
   
      </div>   
    </div>

@stop