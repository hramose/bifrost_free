@section('scripts')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">


@stop()

@section('module')


<div class="widget">
	<div class="widget-head">
		<div class="pull-left">Periodos</div>
		<div class="pull-right">
		<a href="#myModal" class="btn btn-primary" data-toggle="modal"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Sube Archivo </a>
		</div>  
		<div class="clearfix"></div>
	</div>
	<div class="widget-content">
		<div class="padd">			
			<!-- Table Page -->
			<div class="page-tables">
				<!-- Table -->
				<div class="table-responsive">
					<table cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%">
						<thead>
							<tr>
								<th class="text-center">ID</th>
								
								<th class="text-center">Folio</th>
								<th class="text-center"> Total</th>
								<th class="text-center col-md-2">Fecha inicio</th>
								<th class="text-center col-md-2">Fecha fin</th>
								<th class="text-center"> Opciones</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach($periodos as $periodo)

							<tr>
								<td class="text-center"><a href="{{action('ComisionControlador@getAbonos', $periodo->id)}}"> {{{$periodo->id}}} </a></td>
								<td class="text-center">{{{$periodo->folio}}}</td>
								<td class="text-center">$  {{{ number_format($periodo->total, 2, ".", ",") }}}</td>
								<td class="text-center col-md-2"><strong>{{{ date('d/m/y', strtotime($periodo->fecha_inicio)) }}}</strong></td>
								<td class = "text-center">{{{ date('d/m/Y', strtotime($periodo->fecha_fin)) }}}</td>
								<td class="text-center col-md-2">
									<a href="{{action('ComisionControlador@getDownload', $periodo->id)}}" title="Consulta para alta en Sistema PFG" class="btn btn-default btn-xs" data-toggle="modal" id="btnsql"><i class="fa fa-database" aria-hidden="true"></i></a> 
									<a href="{{action('ComisionControlador@getPdftotales', $periodo->id)}}"  title="Descarga los totales a recibir por vendedor en un archivo pdf"class="btn btn-default btn-xs" ><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a> 
									<a href="{{action('ComisionControlador@getAbonos', $periodo->id)}}"  title="Revisa detalles de pagos"class="btn btn-default btn-xs" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
								</td>
							@endforeach
						</tbody>
					</table>
					<div class="clearfix"></div>
				</div>
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


  
</div>


	{{--@foreach($comisiones as $comision)
	<!--Ventanas modales -->
					@include('formularios.pago_comision', 
					array('modalId' => $comision->id,
					'modalTitle' =>  'Historial de pagos de comisión',
					'modalOk' => 'Agregar',					
					'modalIcon' => 'search',
					'cliente' => $comision,
					'modalCancel' => 'Cancelar'))
					<!-- fin ventanas modales -->
	@endforeach--}}

@stop