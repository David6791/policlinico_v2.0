<section class="">
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title with-border">
                    <h3 class="box-title">Registro Pacientes</h3>
                </div>
                <form class="form-horizontal sendform" action="{{url('store_patients')}}" method="post" autocomplete="off">
                <!--form class="form-horizontal" method="post"-->
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="x_panel coldiv" id="coldiv">
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
                                                    <label for="inputEmail3" class="control-label col-md-3 col-sm-3 col-xs-12">Ci</label>
                                                    <div class="col-sm-6">
                                                        <input name="ci" type="text" class="form-control" id="inputEmail3" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Paterno</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="apellido_pat" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Materno</label>
                                                    <div class="col-sm-6">
                                                        <input name="apellido_mat" type="text" class="form-control" id="inputEmail3" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre(s)</label>
                                                    <div class="col-sm-6">
                                                        <input name="nombres" type="text" class="form-control" id="inputEmail3" placeholder="">
                                                    </div>
                                                </div>                                            
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="control-label col-md-3 col-sm-3 col-xs-12">Sexo</label>
                                                    <div class="col-sm-6">
                                                        <select name="sexo" class="form-control">
                                                            <option selected="selected">Masculino</option>
                                                            <option>Femenino</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="control-label col-md-3 col-sm-3 col-xs-12">Direccion</label>
                                                    <div class="col-sm-6">
                                                        <input name="direccion" type="text" class="form-control" id="inputEmail3" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="control-label col-md-3 col-sm-3 col-xs-12">Telefono</label>
                                                    <div class="col-sm-6">
                                                        <input name="telefono" type="text" class="form-control" id="inputEmail3" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="inputEmail3" class="control-label col-md-3 col-sm-3 col-xs-12">Celular</label>
                                                        <div class="col-sm-6">
                                                            <input name="celular" type="text" class="form-control" id="inputEmail3" placeholder="">
                                                        </div>
                                                    </div>   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="x_panel coldiv" id="coldiv">
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
                                                    <label for="inputEmail3" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Nacimiento:</label>
                                                    <div class="col-sm-6">
                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input name="fecha_nacimiento" type="text" class="form-control pull-right" id="datepicker">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="control-label col-md-3 col-sm-3 col-xs-12">Pais</label>
                                                    <div class="col-sm-6">
                                                        <input name="pais" type="text" class="form-control" id="inputEmail3" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="control-label col-md-3 col-sm-3 col-xs-12">Ciudad</label>
                                                    <div class="col-sm-6">
                                                        <input name="ciudad" type="text" class="form-control" id="inputEmail3" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="inputEmail3" class="control-label col-md-3 col-sm-3 col-xs-12">Provincia</label>
                                                <div class="col-sm-6">
                                                    <input name="provincia" type="text" class="form-control" id="inputEmail3" placeholder="">
                                                </div>
                                                </div>
                                                <div class="form-group">
                                                <label for="inputEmail3" class="control-label col-md-3 col-sm-3 col-xs-12">Localidad</label>
                                                <div class="col-sm-6">
                                                    <input name="localidad" type="text" class="form-control" id="inputEmail3" placeholder="">
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--div class="x_panel coldiv" id="coldiv">
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
                    </div>
                    <div class="x_panel coldiv" id="coldiv">
                        <div class="row">
                            <div class="col-md-1"> </div>
                            <div class="col-md-10">
                                <div class="box-success">
                                    <div class="box-header">
                                        <h4 class="box-title col-md-12">Tiene algunas de las siguientes patologias, (Aunque esten controladas con medicacion.)</h4>
                                    </div>
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
                    </div>                    
                    <div class="x_panel coldiv" id="coldiv">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="box-success">
                                    <div class="box-header">
                                        <h4 class="box-title col-md-12">Datos Medicos</h4>
                                    </div>
                                    <div class="box-body">
                                        @foreach(array_chunk($rows, 1) as $chunk)
                                        <div class="row">                                            
                                            @foreach($chunk as $add)
                                                <div class="col-md-4">
                                                    <div class="form-group col-md-12">                                                     
                                                        {{$add->nombre_dato_medico}}
                                                        <div class="row"> <br>
                                                            <div class="col-md-6">
                                                                <button type="button" class="btn btn-info click_exec"  value="{{ $add->id_dato_medico }}">SI   </button>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <button type="button" class="btn btn-danger click_cancel"  value="{{ $add->id_dato_medico }}">NO   </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group col-md-12">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputEmail3" class="control-label">{{$add->pregunta_dato_medico}}</label>
                                                            <textarea class="form-control" rows="3" disabled placeholder="Escribir aqui ..." id="{{$add->id_dato_medico}}" name="{{ $add->id_dato_medico }}"></textarea>
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
                    </div-->
                               
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
<style>
    .coldiv {
      background-color: #EFF1EE;
    }
  </style>
<script>
    $('#datepicker').datepicker({});  
</script>