
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Registro <small>Medicos</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Settings 1</a></li>
                            <li><a href="#">Settings 2</a></li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div id="wizard" class="form_wizard wizard_horizontal">
                    <ul class="wizard_steps anchor">
                        <li>
                            <a href="#step-1">
                                <span class="step_no">1</span>
                                <span class="step_descr">
                                    Informacion General<br/>
                                    <small></small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-2">
                                <span class="step_no">2</span>
                                <span class="step_descr">
                                    Informacion Complementaria<br/>
                                    <small></small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-3">
                                <span class="step_no">3</span>
                                <span class="step_descr">
                                    Datos de Acceso<br/>
                                    <small></small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-4">
                                <span class="step_no">4</span>
                                <span class="step_descr">
                                    Datos Profesionales<br/>
                                    <small></small>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#step-5">
                                <span class="step_no">5</span>
                                <span class="step_descr">
                                    Terminar<br/>
                                    <small></small>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <form class="form-horizontal form-label-left sendform" novalidate action="{{url('crear_medico')}}" method="get">
                        
                        <div id="step-1">
                            <div class="row">
                                <div class="control-label col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Nro. Documento <span class="required"></span></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input type="text" name="n_documento" required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Genero</label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div id="gender" class="btn-group" data-toggle="buttons">
                                                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                        <input type="radio" name="genero" value="male" data-parsley-multiple="gender"> Masculino &nbsp;
                                                    </label>
                                                    <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                        <input type="radio" name="genero" value="female" data-parsley-multiple="gender"> Femenino
                                                    </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Tipo Documento <span class="required"></span></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <select class="select2_group form-control">
                                                        <option value="1">Cedula de Identidad</option>
                                                        <option value="2">Pasaporte</option>
                                                        <option value="3">Libreta de Servicio Militar</option>
                                                        <option value="4">DNI</option>
                                                    </select>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Fecha Nacimiento <span class="required"></span></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input type="text" name="fecha_nacimiento" required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Nombres <span class="required"></span></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input type="text" nombre="nombres" required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Estado Civil <span class="required"></span></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input type="text" name="estado_civil" required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Apellidos <span class="required"></span></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input type="text" name="apellidos" required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-4 col-sm-4 col-xs-12">Ocupacion <span class="required"></span></label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <input type="text" name="ocupacion" required="required" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>                           
                        </div>
                        <div id="step-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Nacionalidad <span class="required"></span></label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <select class="select2_group form-control">
                                                <option value="1">Boliviano</option>
                                                <option value="2">Argentino</option>
                                                <option value="3">Chileno</option>
                                                <option value="4">Peruano</option>
                                            </select>
                                        </div>
                                    </div>                                            
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Telefono <span class="required"></span></label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" name="telefono" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Localidad <span class="required"></span></label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" name="localidad" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>                                            
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Celular <span class="required"></span></label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" name="celular" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Domicilio <span class="required"></span></label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" name="domicilio" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>                                            
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Email <span class="required"></span></label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" name="email" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                </div>
                            </div>                         
                        </div>
                        <div id="step-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Nombre Usuario <span class="required"></span></label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" name="usuario" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>                                            
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Contraseña <span class="required"></span></label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="password" name="pass" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="step-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Matricula <span class="required"></span></label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" name="matricula" required="required" class="form-control col-md-7 col-xs-12">
                                        </div>
                                    </div>                                            
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="box-title">Especialidades</h5>
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>   
                                                <th>Nro.</th>
                                                <th>Nombre Especialidad</th>
                                                <th>Descripcion</th>
                                                <th>Seleccionar</th>
                                            </tr>
                                        </thead>
                                        <?php $a = 1 ?>
                                        <tbody>
                                            @foreach($rows1 as $lista)
                                                <tr>
                                                    <td>{{$a++}}</td>
                                                    <td>{{$lista->nombre_especialidad}}</td>
                                                    <td>{{$lista->descripcion_especialidad}}</td>
                                                    <td><input type="checkbox" name="especialidad[]" value="{{$lista->id_especialidad}}"></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>            
                        <div id="step-5">
                            <div class="row">
                                <div class="col-md-5"></div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Guardar Datos</button>                                         
                                </div>
                            </div>                            
                        </div>       
                    </form>
                </div>   
            </div>
        </div>
    </div>
</div> 
<script>
    $('#wizard').smartWizard({        
        labelPrevious:'Anterior', // label for Previous button
        labelNext:'Siguiente', // label for Next button
        buttonOrder: ['prev', 'next'],
        enableAllSteps: false
    });
</script>
<style>
    .stepContainer{
        display: none;
    }
</style>
