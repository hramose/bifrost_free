@section('scripts')
  <script type="text/javascript">
$.ajax("http://localhost:8000/asesor/all")
  .success(function(data){
    $('#asesor').typeahead({
      source: data,
      display: 'asesor',
      val: 'id_asesor',
      itemSelected: function(item){
        alert(item);
      }
    });
  });
</script>
@stop
@section('module')

<div class="row" id="lotes"> <!-- empieza el renglon del elemento lotes, y cierra hasta el segundo bloque donde estan los  nichos, 
	la clase "col-md-6 asigna el tamaño al bloque" -->
        <div class="col-md-12">

         
             <div class="padd">

                    <br />                   
  			<!-- Form starts.  -->
                     <form class="form-horizontal" role="form">
                              
                               <div class="form-group">
      <label class="col-lg-2 control-label" size="1">Vendedor</label>
      	<div class="col-lg-3">
        	
				<input type="text" class="form-control" id="asesor" size="30"  placeholder="Escribe el nombre del Vendedor">
				                                   
         
      </div>
    </div>  
            <div class="form-group">
      <label class="col-lg-2 control-label" size="1">Funeraria</label>
      	<div class="col-lg-3">
        	<select class="form-control" name="puesto_id" id="puesto_id" >                                
            
             	@foreach($funerarias as $funeraria)

				<option value="{{$funeraria->funeraria_id}}"> {{{Str::title($funeraria->nombre)}}}</option>             	

            	 @endforeach 
       
         </select>                                    
         
      </div>
    </div>                      
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Password</label>
                                  <div class="col-lg-5">
                                    <input type="password" class="form-control" placeholder="Password Box">
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Textarea</label>
                                  <div class="col-lg-5">
                                    <textarea class="form-control" rows="5" placeholder="Textarea"></textarea>
                                  </div>
                                </div> 

                                <!-- -->
                                 <div class="form-group">
									<label class="col-lg-2 control-label"> Fecha de Ingreso: </label>
										<div class="col-lg-5">
							    			<div id="datetimepicker1" class="input-append input-group dtpicker" >
							        			<input data-format="yyyy-MM-dd" type="text" class="form-control" id="fecha_ingreso" name="fecha_ingreso">
							          
							       				 <span class="input-group-addon add-on"> <i data-date-icon="fa fa-calendar" ></i></span>                                                                   
							    			</div>

							      				
										</div>
								</div> 
                                <!-- -->   
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Checkbox</label>
                                  <div class="col-lg-5">
                                    <label class="checkbox-inline">
                                      <input type="checkbox" id="inlineCheckbox1" value="option1"> 1
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="checkbox" id="inlineCheckbox2" value="option2"> 2
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="checkbox" id="inlineCheckbox3" value="option3"> 3
                                    </label>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Radio Box</label>
                                  <div class="col-lg-5">
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                        Option one
                                      </label>
                                    </div>
                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                        Option two
                                      </label>
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-lg-2 control-label">Select Box</label>
                                  <div class="col-lg-2">
                                    <select class="form-control">
                                      <option>1</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                                    </select>
                                  </div>
                                </div> 
                              </form>
                  </div>
                </div>


        </div>     
      </div>       
@stop