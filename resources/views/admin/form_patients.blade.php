<section class="">
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title with-border">
                    <h3 class="box-title">Registro Pacientes</h3>
                </div>
                <!--form class="form-horizontal sendform" action="{{url('store_pacientes')}}" method="post"-->
                <form class="form-horizontal" method="post">
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