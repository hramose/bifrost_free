 <!--pestaña terreno y nuicho-->
                      <div @if ($tab=='tab1' or $tab == '') class="tab-pane fade in active"@else class="tab-pane fade" @endif id="terreno-nicho">
                        <p><!-- Matter -->
                

            <div class="col-md-7">


              <div class="widget wgreen">
                
                <div class="widget-head">
                @if($status=='terreno_created')
                  <div class="alert alert-info alert-dismissible" role="alert" align="center">
                 
                 <strong><h4> Terreno agregado al inventario</h4></strong>
                </div> 
                @endif 
                 @if($status=='terreno_repetido')
                  <div class="alert alert-warning alert-dismissible" role="alert" align="center">
                 
                 <strong><h4> Terreno ya existe</h4></strong>
                </div> 
                @endif
                  <div class="pull-left">Nuevo Lote Funerario</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">

                    <br/>
                    <!-- Form starts.  -->
                     {{ Form::open(array('action' => 'ProductoControlador@postTerreno', 'class' => 'form-horizontal', 'role' => 'form', 'id' => 'capture')) }}
                             
                                <div class="form-group" id="sector_terreno">
                                  <label class="col-lg-2 control-label">Sector</label>
                                  <div class="col-lg-9">
                                    <input type="text" class="form-control" placeholder="Escribe el nombre del sector" id="sector" name="sector" value="{{Input::old('sector')}}">
                                    
                                  </div>
                                </div>                                                             
  
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Fila/lote</label>                                  
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="Fila" name="fila" id="fila"  required value="{{Input::old('fila')}}">
                                  </div>
                                  
                                  <div class="col-lg-4">
                                    <input type="text" class="form-control" placeholder="Lote" name="lote" id="lote" required value="{{Input::old('lote')}}">
                                  </div>
                                </div>                
                                
                                 <div class="form-group">
                                  <label class="col-lg-2 control-label">Tipo</label>
                                  <div class="col-lg-8">
                                    <label class="radio-inline">
                                            <input type="radio" name="construccion_medidas" id="inlineRadio1" value="Sencilla" checked="true" title="Sencilla">Sencilla
                                          </label>
                                          <label class="radio-inline">
                                            <input type="radio" name="construccion_medidas" id="inlineRadio2" value="Doble" title="Doble">Doble
                                          </label>
                                          <label class="radio-inline">
                                            <input type="radio" name="construccion_medidas" id="inlineRadio3" value="Triple" title="Triple">Triple
                                          </label>
                                          <label class="radio-inline">
                                            <input type="radio" name="construccion_medidas" id="inlineRadio3" value="Sextuple" title="Séxtuple">Sextuple
                                          </label>
                                          <label class="radio-inline">
                                            <input type="radio" name="construccion_medidas" id="inlineRadio3" value="Capilla" title="Especial">Capilla
                                          </label>

                                    </div>
                                </div> 
                                
                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Construcción</label>
                                  <div class="col-lg-8">
                                    <select class="form-control" id="construccion" name="construccion">
                                      <option>Bajo pasto</option>                                      
                                      <option>Tradicional</option>
                                      <option>Jardin privado</option>
                                      <option>Capilla Elevada</option>
                                    </select>
                                  </div>
                                </div> 

                                <div class="form-group">
                                  <label class="col-lg-3 control-label">Capacidad</label>                                  
                                  <div class="col-lg-4">
                                   <input type="text" class="form-control" placeholder="Gavetas" name="gavetas" id="gavetas"  value="{{Input::old('gavetas')}}"> 
                                  </div>
                                  
                                  <div class="col-lg-4">
                                  <input type="text" class="form-control" placeholder="Osarios" name="osarios" id="osarios"  value="{{Input::old('osarios')}}">
                                  </div>
                                </div>      

                                <div class="form-group">
                  <label class="col-md-2 control-label">Costo</label>
                  <div class="col-md-6">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                      <input type="text" class="form-control" name="monto" id="monto" placeholder="00.00" aria-describedby="basic-addon2" value="{{Input::old('monto')}}">
                    </div>
                  </div>
                </div> 
                <div class="form-group">
                  <label class="col-md-2 control-label">Comisión</label>
                  <div class="col-md-6">
                    <div class="input-group">
                      <span class="input-group-addon">%</span>
                      <input type="text" class="form-control" name="porcentaje_comision" id="porcentaje_comision" placeholder="00" aria-describedby="basic-addon2" value="{{Input::old('porcentaje_comision')}}">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">Minimo para comision</label>
                  <div class="col-md-6">
                    <div class="input-group">
                      <span class="input-group-addon">%</span>
                      <input type="text" class="form-control" name="porcentaje_minimo_comisionable" id="porcentaje_minimo_comisionable" placeholder="00" aria-describedby="basic-addon2" value="{{Input::old('porcentaje_minimo_comisionable')}}">
                    </div>
                  </div>
                </div>                               
                             
                              
                  </div>
                </div>
                  <div class="widget-foot">                 
                 <button type="submit" class="btn btn-m btn-default" id="btn_send" ><i class="fa fa-floppy-o"></i> Guardar</button>
                    <input type="hidden" id="sector_id" name="sector_id" value="{{Input::old('sector_id')}}">
                    <input type="hidden" id="tipo_producto" name="tipo_producto" value="terreno">
                    {{ Form::close() }}
                    <!-- Footer goes here -->
                  </div>
              </div> 



            </div>
              <!-- widget nicho-->
               <div class="col-md-5">


              <div class="widget wgreen">
                
                <div class="widget-head">
                @if($status=='nicho_created')
                  <div class="alert alert-info alert-dismissible" role="alert" align="center">
                 
                 <strong><h4> Nicho agregado al inventario</h4></strong>
                </div> 
                @endif
                @if($status=='nicho_repetido')
                  <div class="alert alert-warning alert-dismissible" role="alert" align="center">
                 
                 <strong><h4> Nicho ya existe</h4></strong>
                </div> 
                @endif
                  <div class="pull-left">Nuevo Nicho</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">

                    <br/>
                    <!-- Form starts.  -->
                     {{ Form::open(array('action' => 'ProductoControlador@postNicho', 'class' => 'form-horizontal', 'role' => 'form', 'id' => 'capture')) }}
                                  
                                     
                                  <div class="form-group" >
                                  <label class="col-lg-2 control-label"><strong>Recinto </strong></label>
                                  <div class="col-lg-9">
                                    <input type="text" class="form-control" placeholder="Escribe sector o recinto" id="recinto" name="recinto_nombre" required value="{{Input::old('recinto_nombre')}}">
                                    @if($errors->has('recinto_nombre')) <div align="center" class="alert alert-danger">{{$errors->first('recinto_nombre')}}</div> @endif
                                  </div>
                                </div>
                                      
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Fila/lote</label>                                  
                                  <div class="col-lg-3">
                                    <input type="text" class="form-control" placeholder="Fila" name="fila_n" id="fila_n"  required value="{{Input::old('fila_n')}}">
                                  @if($errors->has('fila_n')) <div align="center" class="alert alert-danger">{{$errors->first('fila_n')}}</div> @endif
                                  </div>
                                  
                                  <div class="col-lg-3">
                                    <input type="text" class="form-control" placeholder="Columna" name="columna" id="columna" required value="{{Input::old('columna')}}">
                                    @if($errors->has('columna')) <div align="center" class="alert alert-danger">{{$errors->first('columna')}}</div> @endif
                                  </div>
                                </div>    

                                <div class="form-group">
                  <label class="col-md-2 control-label">Costo</label>
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                      <input type="text" class="form-control" name="monto" id="monto" placeholder="00.00" aria-describedby="basic-addon2" value="{{Input::old('monto')}}">
                    @if($errors->has('monto')) <div align="center" class="alert alert-danger">{{$errors->first('monto')}}</div> @endif
                    </div>
                  </div>
                </div> 
                <div class="form-group">
                  <label class="col-md-2 control-label">Comisión</label>
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">%</span>
                      <input type="text" class="form-control" name="porcentaje_comision" id="porcentaje_comision" placeholder="00" aria-describedby="basic-addon2" value="{{Input::old('porcentaje_comision')}}">
                      @if($errors->has('porcentaje_comision')) <div align="center" class="alert alert-danger">{{$errors->first('porcentaje_comision')}}</div> @endif
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-2 control-label">Minimo para comision</label>
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">%</span>
                      <input type="text" class="form-control" name="porcentaje_minimo_comisionable" id="porcentaje_minimo_comisionable" placeholder="00" aria-describedby="basic-addon2" value="{{Input::old('porcentaje_minimo_comisionable')}}">
                    </div>
                  </div>
                </div>                               
                             
                  </div>
                </div>
                  <div class="widget-foot">                 
                  <button type="submit" class="btn btn-m btn-default" id="btn_send" ><i class="fa fa-floppy-o"></i> Guardar</button>   
                    <input type="hidden" id="tipo_producto" name="tipo_producto" value="nicho">
                    <input type="hidden" id="construccion" name="construccion" value="Nicho">                    
                    <input type="hidden" id="recinto_id" name="recinto_id" value="{{Input::old('recinto_id')}}">
                    {{ Form::close() }}
                    <!-- Footer goes here -->
                  </div>
              </div> 



            </div>
              <!-- widget nicho-->          
    <!-- Matter ends -->
</p>
                      </div> <!-- fin pestaña terreno y nicho-->