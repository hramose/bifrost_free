@section('scripts')
<script>
	$(document).on('ready', function(){
		// Function para activar/desactivar la venta directa.
		$('#directa').on('click', function(){
			if($(this).is(':checked')){
				$('#asesor').prop('disabled', true);
				$('#asesor').val('');
			}else{
				$('#asesor').prop('disabled', false);
				$('#asesor').focus();
			}
		});

		// Cargar  la lista de asesores
		$.ajax("{{ action('AsesorControlador@getAll') }}")
		.success(function(data){
			$('#asesor').typeahead({
				source: data,
				display: 'Asesor',
				val: 'id_asesor',
				itemSelected: function(item){
					$('#asesor_id').val(item);
				}
			});
		});

		//Al momento de mostrar el formulario de lotes, cargar la lista de lotes disponibles.

		$('#agregarLote').on('shown.bs.modal', function(){
			$.ajax("{{ action('LoteFunerarioControlador@getAll') }}")
			.success(function(data){
				$('#loteBuscarLote').typeahead({
					source: data,
					display: 'ubicacion',
					val: 'producto_id',
					itemSelected: function(item){
						$('#loteProductoId').val(item);
					}
				});
			});
			$('#loteBuscarLote').focus();
		});

		$('#agregarMantenimiento').on('shown.bs.modal', function(){
			$.ajax("{{ action('PersonaControlador@getTitulares') }}")
			.success(function(data){
				$('#mantenimientoBuscarTitular').typeahead({
					source: data,
					display: 'nombre',
					val: 'id',
					itemSelected: function(item){
						$('#mantenimientoProductoId').val(item);
					}
				});
			});
			$('#mantenimientoBuscarTitular').focus();
		});


		function send(form){
			$.post(form.attr('action'),
				form.serialize()
				).done(function(data){
					if(data.length > 0){
						$('#cart').html('');
						subtotal = 0;
						$.each(data, function(index, object){
							$('#cart').append('<tr>'
								+ '<td class="text-right">' + object.cantidad + '</td>'
								+ '<td >' + object.descripcion + '</td>'
								+ '<td class="text-right">$ ' + (parseInt(object.precio)).formatMoney(2, '.', ',') + '</td>'
								+ '<td class="text-right">$ ' + (object.subtotal).formatMoney(2, '.', ',') + '</td>'
								+ '</tr><tr />');
							subtotal += object.subtotal;
						});
						$('#total').html('$' + (subtotal).formatMoney(2, '.', ','));
					}
				});
			}

		// Enviar el formulario para los productos al hacer click
		$('.modalSubmit').on("click", function(){
			var form = $(this).parent().parent().find('form');
			send(form);
			$(this).parent().parent().parent().parent().modal('hide');
			form.trigger('reset');
		});

		//Enviar el formulario de Lote
		$('#agregarLote').on('submit', function(event){
			event.preventDefault();
			$('.modalSubmit').click();
		});
	});



</script>
@stop

@section('module')
<div class="row">
	<div class="col-md-12">
		{{ Form::open(array('action' => 'CotizacionControlador@postStore', 'class' => 'form-horizontal', 'role' => 'form', 'id' => 'capture')) }}
		<div class="col-md-8 col-md-offset-2">
			<input type="hidden" name="cliente_id" value="{{{ $persona->cliente->id }}}">
			<h3>{{{ $persona->nombres }}} {{{ $persona->apellido_paterno }}} {{{ $persona->apellido_materno }}} <a href="{{ action('ClienteControlador@getEdit', [$persona->id]) }}" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a> </h3>
			<p><strong>Email: </strong>{{{ $persona->cliente->email }}}</p>
			<p>{{{ $persona->cliente->calle }}} {{{ $persona->cliente->numero_exterior }}},  {{{ $persona->cliente->colonia->nombre }}} C.P. {{{ $persona->cliente->colonia->codigo_postal }}}, {{{ $persona->cliente->colonia->municipio->nombre }}}</p>
			
		</div>
		<div class="clearfix"></div>
		<br>
		<div class="form-group">
			<label for="numero_exterior" class="col-md-2 control-label">Folio de venta</label>
			<div class="col-md-2">
				<input type="text" name="folio" class="form-control" placeholder="Folio" aria-describedby="basic-addon2">
			</div>
		</div>
		<div class="form-group">
			<label for="asesor" class="col-md-2 control-label">Asesor</label>
			<div class="col-md-6">
				<div class="input-group">
					<input type="text" id="asesor" class="form-control" autocomplete="off" placeholder="Buscar por nombre">
					<input type="hidden" name="asesor_id" id="asesor_id">
					<span class="input-group-addon">
						<input name="directa" id="directa" type="checkbox" aria-label="Venta directa"> Venta directa
					</span>
				</div>
			</div>
		</div>
		<div class="widget">
			<div class="widget-head">
				<div class="pull-left">Productos </div>
				<div class="pull-right">
					<div class="btn-group">
						<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Agregar un producto <span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li><a href="#agregarLote" data-toggle="modal" rel="#modal-form" ><i class="fa fa-map-marker fa-fw"></i> Lote Funerario</a></li>
							<li><a href="{{ action('CotizacionControlador@postLote', 'lote') }}" data-toggle="modal" rel="#modal-form"><i class="fa fa-building-o fa-fw"></i> Construcción</a></li>
							<li><a href="{{ action('CotizacionControlador@postLote', 'lote') }}" data-toggle="modal" rel="#modal-form"><i class="fa fa-hospital-o fa-fw"></i> Servicio Funeral</a></li>
							<li><a href="{{ action('CotizacionControlador@postLote', 'lote') }}" data-toggle="modal" rel="#modal-form"><i class="fa fa-briefcase fa-fw"></i> Trámite</a></li>
							<li><a href="#agregarMantenimiento" data-toggle="modal" rel="#modal-form"><i class="fa fa-leaf fa-fw"></i> Mantenimiento</a></li>
							<li><a href="{{ action('CotizacionControlador@postLote', 'lote') }}" data-toggle="modal" rel="#modal-form"><i class="fa fa-arrow-circle-down fa-fw"></i> Inhumación</a></li>
							<li><a href="{{ action('CotizacionControlador@postLote', 'lote') }}" data-toggle="modal" rel="#modal-form"><i class="fa fa-arrow-circle-up fa-fw"></i> Exhumación</a></li>
							<li><a href="{{ action('CotizacionControlador@postLote', 'lote') }}" data-toggle="modal" rel="#modal-form"><i class="fa fa-cart-plus fa-fw"></i> Extra</a></li>
						</ul>
					</div>
				</div>  
				<div class="clearfix"></div>
			</div>
			<div class="widget-body">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Cantidad</th>
							<th>Producto</th>
							<th width="200">Precio</th>
							<th width="200">Subtotal</th>
						</tr>	
					</thead>
					<tbody id="cart">
						@forelse($productos as $producto)
						<tr>
							<td class="text-right">{{{ $producto["cantidad"] }}}</td>
							<td>{{{ $producto["descripcion"] or '' }}}</td>
							<td class="text-right">$ {{{ number_format($producto["precio"], 2, '.', ',') }}}</td>
							<td class="text-right">$ {{{ number_format($producto["subtotal"], 2, '.', ',') }}} </td>
						</tr>
						@empty
						<tr>
							<td colspan="4">
								<div class="text-center">Aún no hay productos en ésta cotización.</div>
							</td>
						</tr>
						<tr />
						@endforelse
						<tr />
					</tbody>
					<tfoot>
						<tr>
							<td colspan="3" class="lead text-right"><strong>Total</strong></td>
							<td class="alert-info">
								<p class="lead precio" id="total">$ {{{ number_format($total, 2, '.', ',') }}}</p>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div class="widget-foot">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Plan de pago</label>
			<div class="col-md-6">
				<select name="plan_pago" class="form-control">
					@forelse($plans as $plan)
					<option value="{{{ $plan->id }}}">{{{ $plan->descripcion }}}</option>
					@endforeach
				</select>
				<br>
			</div>
		</div>
		@if(count($coupons) > 0)
		<div class="form-group">
			<label for="nota_credito"  class="col-md-2 control-label" >Nota de crédito</label>
			<div class="col-md-6">
				<ul class="list-group">
					@foreach($coupons as $coupon)
					<li class="list-group-item"><input type="checkbox" value="{{{ $coupon->id }}}" name="cupon{{{ $coupon->id }}}"> {{{ number_format($coupon->descuento, 0, ".", ",") }}} · {{{ $coupon->descripcion }}}</li>
					@endforeach
				</ul>
			</div>
		</div>
		@endif
		<div class="form-group">
			<label for="numero_exterior" class="col-md-2 control-label">Descuento especial</label>
			<div class="col-md-2">
				<input type="number" name="descuento" class="form-control" placeholder="0.00" aria-describedby="basic-addon2">
			</div>
		</div>
		<div class="form-group">
			<label for="referencias" class="col-md-2 control-label">Comentarios</label>
			<div class="col-md-6">
				<textarea name="comentarios" class="form-control" rows="2" placeholder="Textarea"> </textarea>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4 col-md-offset-2">
				<a href="{{ action('CotizacionControlador@getIndex') }}" class="btn btn-danger">Cancelar</a>
				<input type="submit" value="Generar Cotización" class="btn btn-primary">
			</div>
		</div>
		{{ Form::close() }}
	</div>
</div>
@include('formularios.lote', array('modalId' => 'agregarLote',
'modalTitle' => 'Agregar Lote Funerario',
'modalOk' => 'Agregar',
'modalIcon' => 'map-marker',
'modalCancel' => 'Cancelar'))

@include('formularios.mantenimiento', array('modalId' => 'agregarMantenimiento',
'modalTitle' => 'Agregar Mantenimiento',
'modalOk' => 'Agregar',
'modalIcon' => 'leaf',
'modalCancel' => 'Cancelar'))
@stop