<section class="">
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title with-border">
                    <h3 class="box-title">Registro Pacientes</h3>
                </div>
                <form class="form-horizontal sendform" action="{{url('store_patients')}}" method="post">
                <!--form class="form-horizontal" method="post"-->
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="row">
                        <div class="col-md-1">                            
                        </div>
                        <div class="col-md-10">                            
                            <div class="box-success">
                                <div class="box-header">
                                    <h4 class="box-title">Datos Personales</h4>
                                </div>
                                <div class="box-body">                                
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Ci</label>
                                                <div class="col-sm-8">
                                                    <input name="ci" type="text" class="form-control" id="inputEmail3" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Apellido Paterno</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="apellido_pat" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Apellido Materno</label>
                                                <div class="col-sm-8">
                                                    <input name="apellido_mat" type="text" class="form-control" id="inputEmail3" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Nombre(s)</label>
                                                <div class="col-sm-8">
                                                    <input name="nombres" type="text" class="form-control" id="inputEmail3" placeholder="">
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Sexo</label>
                                                <div class="col-sm-8">
                                                    <select name="sexo" class="form-control">
                                                        <option selected="selected">Masculino</option>
                                                        <option>Femenino</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Direccion</label>
                                                <div class="col-sm-8">
                                                    <input name="direccion" type="text" class="form-control" id="inputEmail3" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Telefono</label>
                                                <div class="col-sm-8">
                                                    <input name="telefono" type="text" class="form-control" id="inputEmail3" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-4 control-label">Celular</label>
                                                    <div class="col-sm-8">
                                                        <input name="celular" type="text" class="form-control" id="inputEmail3" placeholder="">
                                                    </div>
                                                </div>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1">                            
                        </div>
                        <div class="col-md-10">
                            <div class="box-success">
                                <div class="box-header">
                                    <h4 class="box-title">Datos del Nacimiento</h4>
                                </div>
                                <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-4 control-label">Fecha Nacimiento:</label>
                                                    <div class="col-sm-8">
                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input name="fecha_nacimiento" type="text" class="form-control pull-right" id="datepicker">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-4 control-label">Pais</label>
                                                    <div class="col-sm-8">
                                                        <input name="pais" type="text" class="form-control" id="inputEmail3" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-4 control-label">Ciudad</label>
                                                    <div class="col-sm-8">
                                                        <input name="ciudad" type="text" class="form-control" id="inputEmail3" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Provincia</label>
                                                <div class="col-sm-8">
                                                    <input name="provincia" type="text" class="form-control" id="inputEmail3" placeholder="">
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Localidad</label>
                                                <div class="col-sm-8">
                                                    <input name="localidad" type="text" class="form-control" id="inputEmail3" placeholder="">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1">                            
                        </div>
                        <div class="col-md-10">
                            <div class="box-success">
                                <div class="box-header">
                                    <h4 class="box-title">Solo para Pacientes con accidentes laborales</h4>
                                </div>
                                <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-6">                                                
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-4 control-label">Profesion</label>
                                                    <div class="col-sm-8">
                                                        <input name="profesion" type="text" class="form-control" id="inputEmail3" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Lugar de Trabajo</label>
                                                <div class="col-sm-8">
                                                    <input name="luga_trabajo" type="text" class="form-control" id="inputEmail3" placeholder="">
                                                </div>
                                                </div>                                                
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"> </div>
                        <div class="col-md-10">
                            <div class="box-success">
                                <div class="box-header">
                                    <h4 class="box-title col-md-12">Tiene algunas de las siguientes patologias, (Aunque esten controladas con medicacion.)</h4>
                                </div>
                                <!-- 1 aqui -->
                                <div class="box-body">
                                    @foreach(array_chunk($row, 3) as $chunk)
                                        <div class="row">                                            
                                            @foreach($chunk as $add)
                                                <div class="col-md-4">
                                                    <div class="form-group col-md-12">
                                                        <div class="checkbox">
                                                            <label class="control-label">
                                                                <input type="checkbox" name="patologias[]" value="{{$add->id_patologia}}">
                                                                {{$add->nombre_patologia}}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>                                
                            </div>
                        </div>                        
                    </div>  
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="box-success">
                                <div class="box-header">
                                    <h4 class="box-title col-md-12">Datos Medicos</h4>
                                </div>
                                <!-- 2 aqui -->
                                <div class="box-body">
                                    @foreach(array_chunk($rows, 1) as $chunk)
                                    <div class="row">                                            
                                        @foreach($chunk as $add)
                                            <div class="col-md-4">
                                                <div class="form-group col-md-12">                                                     
                                                    {{$add->nombre_dato_medico}}
                                                    <div class="row">
                                                        <div class="radio col-md-6">
                                                            <label for="inputEmail3" class="col-sm-4 control-label">
                                                                <input type="radio" name="{{ $add->tipo_dato_medico }}"  value="{{$add->id_dato_medico}}">
                                                                    Si
                                                            </label>
                                                        </div>
                                                        <div class="radio col-md-6">
                                                            <label for="inputEmail3" class="col-sm-4 control-label">
                                                                <input type="radio" name="{{ $add->tipo_dato_medico }}" value="{{$add->id_dato_medico}}">
                                                                    No
                                                            </label>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group col-md-12">
                                                    <div class="form-group col-md-12">
                                                        <label for="inputEmail3" class="control-label">{{$add->pregunta_dato_medico}}</label>
                                                        <textarea class="form-control" rows="3" placeholder="Escribir aqui ..." name="{{ $add->tipo_dato_medico }}"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>                  
                    <div class="row">
                        <div class="col-md-5">                            
                        </div>
                        <div class="col-md-2">
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Guardar Datos</button>
                            </div>
                        </div>
                        <div class="col-md-5">
                        </div>
                    </div>                   
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    $('#datepicker').datepicker({})
</script>