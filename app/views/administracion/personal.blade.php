@section('scripts')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<script type="text/javascript">
$(document).on('ready', function(){
  window.setTimeout(function() {
  $("#alerta").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove();
  });
}, 2000);
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
   $( "#datepicker1" ).datepicker({ maxDate: "0"});

 });//fin fuincion datepicker
$(document).on('click','.open_modal_personas',function(){

var id = $(this).val();

$.get('{{ action('ProspectosControlador@getDetalle') }}/' + id, function (data) {
	$('#personas').text(data.empleado);
	$('#puesto').text(data.puesto);
	$('#fecha_nacimiento').text(data.fecha_nacimiento);
	$('#edad').text(data.edad);
	$('#lugar_nacimiento').text(data.lugar_nacimiento);
    $('#estado_civil').text(data.estado_civil);
    $('#domicilio').text(data.domicilio);
    $('#calle').text(data.calle);
    $('#num_interior').text(data.numero_interior);
    $('#num_exterior').text(data.numero_exterior);
    $('#telefono').text(data.telefono);
    $('#tipo_telefono').text(data.tipo_telefono); 
    $('#imss').text(data.imss);
    $('#clinica').text(data.clinica);
    $('#fecha_alta').text(data.fecha_alta);
    $('#fecha_baja').text(data.fecha_baja);
    var ruta = "{{ asset('img/upload')}}/"
    document.getElementById('url').src=ruta+data.foto;

       console.log(data);
            $('#id').val(data.id);
});
$('#informacion').modal('show');




});
      $(document).ready(function (e) {
        $('#alta').on('show.bs.modal', function(e) {    
         var id = $(e.relatedTarget).data().id;
      $(e.currentTarget).find('#alta').val(id);

  });
});
            $(document).ready(function (e) {
        $('#baja').on('show.bs.modal', function(e) {    
         var id = $(e.relatedTarget).data().id;
      $(e.currentTarget).find('#baja').val(id);

  });
});
});
</script>
@stop


@section('module')
   @if($status=='alta')
                  <div class="alert alert-info alert-info " role="alert" align="center" id="alerta">
                 <strong><h4> Alta exitosa</h4></strong>
                </div> 
  @endif 
     @if($status=='baja')
                  <div class="alert alert-danger alert-danger " role="alert" align="center" id="alerta">
                 <strong><h4> Baja exitosa</h4></strong>
                </div> 
  @endif 
<div class="widget">

 <div class="widget-head">    
     <div class="pull-right">      

           </div>           
               <div align="rigth">Relación del personal </div>         
               <div class="clearfix"></div>
                </div>
                <div class="widget-content"> 
                <div class="padd">

                          <div class="page-tables">
                <!-- Table -->

                <div class="table-responsive">
                   <table   cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%">
                      <thead>
                          <tr>
                         	 <th><strong>Nombre</strong></th>
                             <th><strong>Puesto</strong></th>
                             <th><strong>Fecha ingreso</strong></th>
                             <th><strong>CURP</strong></th>
                             <th><strong>RFC</strong></th> 
                             <th><strong>SDI</strong></th>
                             <th><strong>Alta IMSS</strong></th>
                             <th><strong>Opciones</strong></th>                                    
                          </tr>
                       </thead>
                    <tbody>
                             
                         @foreach($personal as $p)              
								<tr>
                                      <td>{{$p->solicitante}}</td>
                                      <td>{{$p->puesto}}</td>
                                      <td>{{{date('d-m-Y h:i:s a', strtotime($p->fecha_contratacion))}}}</td>
                                      <td>{{strtoupper($p->curp)}}</td>
                                      <td>{{strtoupper($p->rfc)}}</td>      
                                      <td>${{{number_format($p->sueldo, 0, '.', ',')}}}</td>
                                      <td> @if ( $p->alta == 1 && $p->baja ==1)                   
                                        <span class="label label-danger">Baja</span>
                                          @elseif($p->alta == 1 )   
                                        <span class="label label-success">Si</span>                                                                                            
                                       @else
                                       <span class="label label-warning">No</span>
                                       @endif
                                       </td>
                                      <td>
                                      @if ( $p->alta == 1 && $p->baja ==1 )   
                                      <a class="btn btn-xs btn-default" disabled data-id="{{$p->solicitante_id}}" data-toggle="modal" data-target="#alta" title="Dar de alta IMSS" href=""><i class="fa fa-check"></i></a>
                                      <a  href="" disabled class="btn btn-xs btn-default"  title="Editar registro"> <i class="fa fa-pencil"></i> </a>
                                      @elseif($p->alta == 1 )  
                                      <a class="btn btn-xs btn-default"  data-id="{{$p->solicitante_id}}" data-toggle="modal" data-target="#baja" title="Dar de baja IMSS"> <i class="fa fa-times"></i></a>
                                      <a   href="{{URL::to('solicitud/recupera/'.$p->solicitud_id )}}"  class="btn btn-xs btn-default"  title="Editar registro"> <i class="fa fa-pencil"></i> </a>
                                     @else
                                     <a class="btn btn-xs btn-default" data-id="{{$p->solicitante_id}}" data-toggle="modal" data-target="#alta" title="Dar de alta IMSS" href=""><i class="fa fa-check"></i></a>
                                     <a   href="{{URL::to('solicitud/recupera/'.$p->solicitud_id )}}"  class="btn btn-xs btn-default"  title="Editar registro"> <i class="fa fa-pencil"></i> </a>
                                     @endif  
                                     <button class="btn btn-xs btn-default open_modal_personas "  title="Perfil de {{{$p->solicitante}}}" value="{{$p->solicitud_id}}"><i class="fa fa-user" aria-hidden="true"></i></button>
                                     <a class="btn btn-xs btn-default" href="{{URL::to('solicitud/informacion/'.$p->solicitud_id )}}"   title="Solicitud PDF"> <i class="fa fa-search"></i></a>

                                      </td>

          
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

<div class="widget-foot" align="right">
      <a  href= "{{URL::to('prospectos/')}}" class="btn btn-default" >Regresar</a>  
      </div>
    <div id="informacion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Relación de personal</h4>
          </div>
            <div class="modal-body"> <!-- en action mando a llamar el Controlador@function (anteponiendo el post) -->
                  <!-- contenido modal -->

					<div class="container-fluid" align="center">
					<div class="well">
          <div class="panel panel-default">
					 <div class="panel-body">
					  <h4><strong><i class="fa fa-user" aria-hidden="true"></i> <span id = "personas"></span></strong></strong></h4>
					  <h4><i class="fa fa-briefcase" aria-hidden="true"></i> <span id="puesto"></span></h4>
					  </div>
            </div>
					  <div class="col-sm-7" align="left" >
					    <h4><strong><i class="fa fa-calendar" aria-hidden="true"></i> Fecha nacimiento:</strong> <span id="fecha_nacimiento"></span> </h4>
					    <h4><strong><i class="fa fa-heart" aria-hidden="true"></i> Edad:</strong> <span id="edad"></span></h4>
					    <h4><strong><i class="fa fa-globe" aria-hidden="true"></i> Lugar nacimiento:</strong> <span id="lugar_nacimiento"></span></h4>
					    <h4><strong><i class="fa fa-university" aria-hidden="true"></i> Estado civil:</strong> <span id="estado_civil"></span></h4>
					    <h4><strong><i class="fa fa-phone" aria-hidden="true"></i> Telefono:</strong> <span id="telefono"></span></h4>
					    <h4><strong><i class="fa fa-phone" aria-hidden="true"></i> Tipo:</strong> <span id="tipo_telefono"></span></h4>
            	</div>
              <div class="col-sm 5" align="right" >
                 <img id="url" src="" width="150" class="img-responsive" alt="Error al cargar la imagen">
              </div>				    
             <div class="clearfix"></div> 
				    <div class="well">
					    <h4><strong><i class="fa fa-home" aria-hidden="true"></i> Domicilio:</strong> <span id="domicilio"></span></h4>
					    <h4><strong><i class="fa fa-road" aria-hidden="true"></i> Calle:</strong> <span id="calle"></span></h4>
					    <div class="col-sm-6" ><h4><strong><i class="fa fa-home" aria-hidden="true"></i> Numero interior:</strong> <span id="num_interior"></span></h4></div>
					    <div class="col-sm-6" ><h4><strong><i class="fa fa-home" aria-hidden="true"></i> Numero exterior:</strong> <span id="num_exterior"></span></h4></div>
          <div class="clearfix"></div> 
          </div>
          <div class="panel panel-default">
           <div class="panel-body">
              <h4><strong><i class="fa fa-medkit" aria-hidden="true"></i> IMSS:</strong> <span id="imss"></span></h4>
              <h4><strong><i class="fa fa-hospital-o" aria-hidden="true"></i> Clinica:</strong> <span id="clinica"></span></h4>
              <div class="col-sm-6" ><h4><strong><i class="fa fa-calendar" aria-hidden="true"></i>  Fecha alta:</strong> <span id="fecha_alta"></span></h4></div>
              <div class="col-sm-6" ><h4><strong><i class="fa fa-calendar" aria-hidden="true"></i>  Fecha baja:</strong> <span id="fecha_baja"></span></h4></div>
          </div>
          </div>
           </div>
			      </div>
			      </div>
                <div class="modal-footer">           
                  <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cerrar</button>                 
               </div>       
            </div>
        </div>

        </div>

<div id="alta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Alta IMSS</h4>
                </div>
                <div class="modal-body"> <!-- en action mando a llamar el Controlador@function (anteponiendo el post) -->
                  <!-- contenido modal -->

     {{ Form::open(array('action' => 'ProspectosControlador@postAlta', 'class' => 'form-horizontal', 'role' => 'form', 'id' => 'registro')) }}  
  
                   <input  type="hidden" id="alta" name="dato_solicitante_id">
                <div class="form-group">
                    <label class="col-md-3 control-label">Clinica</label>
                        <div class="col-md-7">
                             <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-hospital-o" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="clinica" id="clinica"  required>                  
                          </div>
                      </div>
                  </div>
                   <div class="form-group">
                            <label class="col-lg-3 control-label">Fecha alta</label>
                               <div class="col-lg-8">                                 
                                 <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                  <p> <input type="text" id="datepicker" placeholder="Seleccione fecha" name="fecha_alta"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                    <button type="submit"  class="btn btn-primary">Guardar</button>
                </div>
            </div>
    </div>
  </div>
   {{form::close()}}   

   <div id="baja" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title">Baja IMSS</h4>
                </div>
                <div class="modal-body"> <!-- en action mando a llamar el Controlador@function (anteponiendo el post) -->
                  <!-- contenido modal -->

     {{ Form::open(array('action' => 'ProspectosControlador@postBaja', 'class' => 'form-horizontal', 'role' => 'form', 'id' => 'registro')) }}  
  
                   <input  type="hidden" id="baja" name="dato_solicitante_id">

                   <div class="form-group">
                            <label class="col-lg-3 control-label">Fecha baja</label>
                               <div class="col-lg-8">                                 
                                 <div class="input-group">
                                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                  <p> <input type="text" id="datepicker1" placeholder="Seleccione fecha" name="fecha_baja"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                    <button type="submit"  class="btn btn-primary">Guardar</button>
                </div>
            </div>
    </div>
  </div>
   {{form::close()}}  
@stop