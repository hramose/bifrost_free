@section('scripts')

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
 <script src="{{ URL::asset('js/jquery.maskedinput.min.js') }}"> </script>


<script>
	   $(document).on('ready', function(){
      window.setTimeout(function() {
  $("#alerta").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove();
  });
}, 4000);
       });

  $(document).ready(function (e) {
  $('#registro').on('show.bs.modal', function(e) {    
  var id = $(e.relatedTarget).data().id;
      $(e.currentTarget).find('#registro').val(id);

});
});

  $(document).ready(function (e) {
  $('#rescate').on('show.bs.modal', function(e) {    
  var id = $(e.relatedTarget).data().id;
      $(e.currentTarget).find('#rescate').val(id);

});
});
	//funcion Para el datepicker
      $(function() {
   
//Array para dar formato en español
 $.datepicker.regional['es'] = 
 {
 closeText: 'Cerrar', 
 prevText: 'Previo', 
 nextText: 'Próximo',
 
 monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
 'Jul','Ago','Sep','Oct','Nov','Dic'],
 monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
 dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
 dateFormat: 'yy-mm-dd', firstDay: 0, 
 initStatus: 'Selecciona la fecha', isRTL: false};
$.datepicker.setDefaults($.datepicker.regional['es']);

//miDate: fecha de comienzo D=días | M=mes | Y=año
//maxDate: fecha tope D=días | M=mes | Y=año
   $( "#datepicker" ).datepicker({ maxDate: "0"});

 });//fin fuincion datepicker
     //funcion Para el datepicker
      $(function() {
   
//Array para dar formato en español
 $.datepicker.regional['es'] = 
 {
 closeText: 'Cerrar', 
 prevText: 'Previo', 
 nextText: 'Próximo',
 
 monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
 'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
 'Jul','Ago','Sep','Oct','Nov','Dic'],
 monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
 dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
 dateFormat: 'yy-mm-dd', firstDay: 0, 
 initStatus: 'Selecciona la fecha', isRTL: false};
$.datepicker.setDefaults($.datepicker.regional['es']);

//miDate: fecha de comienzo D=días | M=mes | Y=año
//maxDate: fecha tope D=días | M=mes | Y=año
   $( "#datepicker2" ).datepicker({ maxDate: "0"});

 });//fin fuincion datepicker
             jQuery(function($){
            $("#numero1").mask("9,99", {
 
                // Generamos un evento en el momento que se rellena
                completed:function(){
                    $("#numero1").addClass("ok")
                }
            });
 
            $("#telefono").mask("(999) 999 - 9999");

       
        });
             </script>

@stop

@section('module')
 @if($status=='registro_inhumado')
                  <div class="alert alert-info alert-dismissible" role="alert" align="center" id="alerta">
                 <strong><h4> Registro exitoso!... Defina la ruta del rescate</h4></strong>
                </div> 
  @endif 
<div class="clearfix"></div>
	

	<div class="col-md-4">
                        <div  class="alert alert-success  text-center">
                          <h4><i class="fa fa-users"></i> Sala San Miguel </h4>
							<h4><strong>Detalles de velación</strong></h4>
																		 
								 <input type="hidden" value="" name="promotor">
                      			 <br>						
          
                        </div>
                      </div>
                
	<div class="col-md-4">
                        <div  class="alert alert-success  text-center">
                          <h4><i class="fa fa-users"></i> Sala San Gabriel </h4>
							<h4><strong>Detalles de velación</strong></h4> 							 
								 <input type="hidden" value="" name="promotor">
                      			 <br>						

                       </div>
                      </div>
                      	<div class="col-md-4">
                        <div  class="alert alert-success  text-center">
                          <h4><i class="fa fa-users"></i> Sala San Rafael </h4>
							<h4><strong>Detalles de velación</strong></h4> 
										 
								 <input type="hidden" value="" name="promotor">
                      			 <br>

                        </div>
                      </div>
<div class="clearfix"></div>
	<div class="well">
		<p class="lead text-right">
			Servicios realizados en capilla: <strong>120</strong>
		</p>
	</div>
<div class="widget">
    <div class="widget-head">    
        <div class="pull-right">
   
       </div>            
              <div align="rigth">Servicios a previsión</div>                  
                    
              <div class="clearfix"></div>
    </div>
      <div class="widget-content">
                
           <div class="padd">
                      <div class="page-tables">
                <!-- Table -->
                <div  class="table-responsive">
                    <table   cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%">
                       <thead>
                 
                          <tr>
                            <th><strong>ID</strong></th>
                            <th><strong>Contrato</strong></th>
                            <th><strong>Cliente</strong></th>
                            <th><strong>Producto</strong></th>
                            <th><strong></strong></th>
                           

                          
                          </tr>
                      </thead>
                    <tbody>      
                        
                        
                      <tr>
                       
                      @foreach($servicios as $servicio)

                        @if($personas->inhumado_persona_id == $servicio->persona_id && $personas->seguimiento_rescate == 1)
               
						            <td>{{$servicio->folio_solicitud}}</td>
						            <td> </td>
                        <td>{{$servicio->pnombre}} {{$servicio->p_paterno}} {{$servicio->p_materno}}</td>
                        <td>{{$servicio->producto}}</td> 
                        <td>                       
                        <a class="btn btn-xs btn-default" data-id='{{$personas->inhumado_id}}' data-toggle="modal" data-target="#rescate" title="Realizar rescate"> <i class="fa fa-ambulance  "></i></a>
                        </td>
                          @else
                        <td>{{$servicio->folio_solicitud}}</td>
                        <td> </td>
                        <td>{{$servicio->pnombre}} {{$servicio->p_paterno}} {{$servicio->p_materno}}</td>
                        <td>{{$servicio->producto}}</td> 
                        <td>                       
                        <a class="btn btn-xs btn-default" data-id='{{$servicio->folio_solicitud}}' data-toggle="modal" data-target="#registro"  title="Registrar servicio"> <i class="fa fa-pencil-square-o"></i></a>       
                        </td>
                          @endif
                      </tr>
       
                 	 @endforeach
               
                         
                    </tbody>
                    
                  </table>
                    
                          <div class="clearfix"></div>             
                
                 </div>
            </div>   
        </div>   
    </div>
</div>
<!-- Modale registro de inhumado -->
<div id="registro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
      <div class="modal-content">
          <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Registro de inhumado</h4>
          </div>
            <div class="modal-body"> <!-- en action mando a llamar el Controlador@function (anteponiendo el post) -->
                  <!-- contenido modal -->
         

 <div class="col-md-12">


  {{ Form::open(array('action' => 'ServicioFuneralControlador@postInhumado', 'class' => 'form-horizontal', 'role' => 'form', 'files' => true)) }}


<input type="text" id="registro">

      <div class="form-group row">
       	   <div class="col-lg-1"></div>
           <div class="col-lg-3">
              <label  class="control-label">Nombre</label> 
                  <input type="text" class="form-control" name="nombres_inhumado" id="nombres" placeholder="Nombre" />
           </div>
           <div class="col-lg-3">
              <label  class="control-label">Apellido paterno</label> 
                  <input type="text" class="form-control" name="apellido_paterno_inhumado" id="apellido_paterno" placeholder="Apellido paterno" />
           </div>
           <div class="col-lg-3">
              <label  class="control-label">Apellido materno</label> 
                  <input type="text" class="form-control" name="apellido_materno_inhumado" id="apellido_materno" placeholder="Apellido materno" />
           </div>

              </div>
       

     <div class="form-group row ">
		<div class="col-lg-2"></div>
        <div class="col-lg-4">
              <label  class="control-label">Fecha de nacimiento</label>                               
                  <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                         <p> <input type="text" id="datepicker" placeholder="Seleccione fecha" name="fecha_nacimiento"></p>
                      </div>
                 </div>
         <div class="col-lg-4">
              <label  class="control-label">Fecha de deceso</label>                               
                  <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                         <p> <input type="text" id="datepicker2" placeholder="Seleccione fecha" name="fecha_deceso"></p>
                      </div>
                 </div>

     </div>
     <div class="form-group row ">
     		 <div class=" col-lg-1"></div>
              <div class=" col-lg-3">
                    <label  class="control-label">Edad</label>
                  <input type="text" class="form-control" name="edad" id="edad" placeholder="" />
              </div>
         <div class=" col-lg-3">
                   <label  class="control-label">Peso</label>
                  <input type="text" class="form-control" name="peso" id="peso" placeholder="Kg" />
              </div>
        <div class="col-lg-3">
                   <label  class="control-label">Estatura</label>
                  <input type="text" class="form-control" name="estatura" id="estatura" placeholder="Mts" />
              </div>

          </div>

     <div class="form-group row">
     		 <div class=" col-lg-2"></div>
              <div class="col-lg-5 ">
              <label  class="control-label">Causas de defunción</label>
                  <textarea type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripción"></textarea>
              </div>
       		 <div class="col-lg-3" >
       		  <label  class="control-label">Infecciosa</label><br>
                          	<label class="radio-inline"><input type="radio" name="infecciosa" id="infecciosa" value="01"  >Si</label>
        					<label class="radio-inline"><input type="radio" name="infecciosa" id="infecciosa" value="02" >No</label>             
                        </div>
          </div>
<div class="clearfix"></div>
<div class="well"><h5>Testigo del inhumado</h5></div>
            <div class="clearfix"></div> 
                  <div class="form-group row">
           <div class="col-lg-1"></div>
           <div class="col-lg-3">
              <label  class="control-label">Nombre</label> 
                  <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombre" />
           </div>
           <div class="col-lg-3">
              <label  class="control-label">Apellido paterno</label> 
                  <input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno" placeholder="Apellido paterno" />
           </div>
           <div class="col-lg-3">
              <label  class="control-label">Apellido materno</label> 
                  <input type="text" class="form-control" name="apellido_materno" id="apellido_materno" placeholder="Apellido materno" />
           </div>
              </div>
		      <div class="form-group row">
      		<div class="col-lg-2"></div>
        <div class="col-lg-3">
         <label for="sel2">Parentesco con inhumado</label>
      		<select  class="form-control" id="parentezco_id" name="parentezco_id">
      				<option value="0">Seleccione una opción</option>
      				@foreach($parentezcos as $parentezco)
						<option value="{{$parentezco->id}}"> {{{$parentezco->descripcion}}}</option>   
      				@endforeach
      			</select>
            </div>
        <div class="col-lg-3">
         <label for="sel2">Tipo de telefono</label>
      		<select  class="form-control" name="tipo_telefono_id" id="tipo_telefono_id">
      				<option value="0">Seleccione una opción</option>
					@foreach($tipo_telefonos as $tipo_telefono)
						<option value="{{$tipo_telefono->id}}"> {{{$tipo_telefono->descripcion}}}</option>   
      				@endforeach
      			</select>
            </div>
              </div>

  <div class="form-group row ">
      <div class=" col-lg-3"></div>
              <div class=" col-lg-2">
                    <label  class="control-label">Codigo pais</label>
                  <input type="text" class="form-control" name="codigo_pais" id="codigo_pais"  placeholder="52" />
              </div>
         <div class=" col-lg-3">
                   <label  class="control-label">Numero telefonico</label>
                  <input type="text" class="form-control" name="telefono" id="telefono" placeholder="" />
              </div>

          </div>

     
                   </div>
           

          </div> <div class="clearfix"></div>

                <div class="modal-footer">           
                  <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                    <button type="submit"  class="btn btn-success">Dar seguimiento</button>
                   
              </div>       
          </div>
      </div>

        </div>
   {{ Form::close() }}

        <!-- Modale registro de rescatista -->
<div id="rescate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
      <div class="modal-content">
          <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Datos para el rescate de <strong>Pedro Yepiz Garcia</strong></h4>
          </div>
            <div class="modal-body"> <!-- en action mando a llamar el Controlador@function (anteponiendo el post) -->
                  <!-- contenido modal -->
   <div class="col-md-12">

     <input type="hidden" id="rescate" name="inhumado_id">
      <div class="form-group row">
          <div class="col-lg-1"></div>
         <div class="col-lg-3">
         <label for="sel2">Colonia</label>
          <select  class="form-control" id="parentesco_id" name="parentesco_id">
              <option value="">Seleccione una opción</option>
              <option>3 de Febrero</option>
              <option>25 de Marzo (Sierra Ventana)</option>
              <option>23 de Marzo</option>
              <option>19 de Abril</option>
              <option>Prima</option>
              <option>5 de Mayo</option>
              <option>5 de Mayo (F-93)</option>
              <option>10 de Junio</option>
            </select>
            </div>  

        <div class="col-lg-2">
                 <label  class="control-label">Municipio</label> 
                  <input type="text" class="form-control" disabled name="persona_id" id="persona_id" placeholder="--" />
           </div>
        <div class="col-lg-2">
                 <label  class="control-label">Estado</label> 
                  <input type="text" class="form-control" disabled name="persona_id" id="persona_id" placeholder="--" />
           </div>
            <div class="col-lg-2">
              <label  class="control-label">Pais</label> 
                  <input type="text" class="form-control" disabled name="persona_id" id="persona_id" placeholder="--" />
           </div>
              </div>
     
      <div class="form-group row ">
     		 <div class=" col-lg-2"></div>
              <div class=" col-lg-4">
                    <label  class="control-label">Edificio de defuncion</label>
                  <input type="text" class="form-control" name="edad" id="edad" placeholder="Nombre" />
              </div>
         <div class=" col-lg-3">
                   <label  class="control-label">Planta</label>
                  <input type="text" class="form-control" name="peso" id="peso" placeholder="Numero de piso" />
              </div>


          </div>
               <div class="form-group row ">
         <div class=" col-lg-2"></div>
              <div class=" col-lg-3">
                    <label  class="control-label">Calle</label>
                  <input type="text" class="form-control" name="edad" id="edad" placeholder="Direccion" />
              </div>
         <div class=" col-lg-2">
                   <label  class="control-label">Numero exterior</label>
                   <div class="input-group">
                    <span class="input-group-addon">#</span>
                  <input type="text" class="form-control" name="peso" id="peso" placeholder="" />
                  </div>
              </div>
        <div class="col-lg-2">
                   <label  class="control-label">Numero interior</label>   
                      <div class="input-group">
                    <span class="input-group-addon">#</span>
                  <input type="text" class="form-control" name="peso" id="peso" placeholder="" />
                  </div>
                  </div>
              </div>

          </div>

     <div class="form-group row">
     		 <div class=" col-lg-2"></div>
              <div class="col-lg-7 ">
              <label  class="control-label">Referencias</label>
                  <textarea type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripción"></textarea>
              </div>

          </div>

   <div class="well"><h4>Asignar rescatista</h4></div>

    <div class="form-group row">
           <div class="col-lg-1"></div>
           <div class="col-lg-3">
              <label  class="control-label">Nombre</label> 
                  <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombre" />
           </div>
           <div class="col-lg-3">
              <label  class="control-label">Apellido paterno</label> 
                  <input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno" placeholder="Apellido paterno" />
           </div>
           <div class="col-lg-3">
              <label  class="control-label">Apellido materno</label> 
                  <input type="text" class="form-control" name="apellido_materno" id="apellido_materno" placeholder="Apellido materno" />
           </div>
      </div>
		      <div class="form-group row">
       <div class=" col-lg-2"></div>
           <div class="col-lg-4">
              <label  class="control-label">Nombre completo</label> 
                  <input type="text" class="form-control" name="persona_id" id="persona_id" placeholder="Pedro Yepiz Garcia" />
           </div>

        <div class="col-lg-3">
         <label for="sel2">Tipo de telefono</label>
      		<select  class="form-control" name="tipo_telefono_id" id="tipo_telefono_id">
      				<option value="">Seleccione una opción</option>
			        <option>Personal</option>
			        <option>Empresa</option>
			        <option>Casa</option>
      			</select>
            </div>
              </div>
  <div class="form-group row ">
      <div class=" col-lg-3"></div>
              <div class=" col-lg-2">
                    <label  class="control-label">Codigo pais</label>
                  <input type="text" class="form-control" name="codigo_pais"  placeholder="52" />
              </div>
         <div class=" col-lg-3">
                   <label  class="control-label">Numero telefonico</label>
                  <input type="text" class="form-control" name="telefono" id="movil" placeholder="" />
              </div>

          </div>

                   </div>   

       <div class="clearfix"></div>

                <div class="modal-footer">           
                  <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                    <button type="submit"  class="btn btn-success">Realizar rescate</button>
                   
              </div>       
          </div>
      </div>

        </div>
@stop