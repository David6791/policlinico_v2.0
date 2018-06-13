<div class="content">
    <div class="row">
        <div class="x_panel">
            <div class="x_header">
                <h2 class="x_title">Detalle Medico</h2>
            </div>
            <div class="x_body">
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{ asset('img/med.png') }}" width="150px" alt=""><br>
                        Nro: <label for="" class="">{{ $rows[0]->ci }}</label><br>
                        Genero:<label for="" class="">{{ $rows[0]->genero }}</label>
                    </div>
                    
                    <div class="col-md-5">
                        <h4 class="profile-username">Datos Personales</h4>
                        <table class="table table-user-information">
                            <tbody>
                                <tr>
                                    <td class="col-md-5"><label for="">Nombres:</label> </td>
                                    <td>{{ $rows[0]->name }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-5"><label for="">Apellidos:</label> </td>
                                    <td>{{ $rows[0]->apellidos }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-5"><label for="">Fecha Nacimiento:</label> </td>
                                    <td>{{ $rows[0]->fecha_nacimiento }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-5"><label for="">Telefono - Celular:</label> </td>
                                    <td>{{ $rows[0]->celular }}{{" - "}} {{ $rows[0]->telefono }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-5"><label for="">Estado Civil:</label> </td>
                                    <td>{{ $rows[0]->estado_civil }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-5"><label for="">Ocupacion o Trabajo:</label> </td>
                                    <td>{{ $rows[0]->ocupacion }}</td>
                                </tr>
                                <tr>
                                    <td class="col-md-5"><label for="">Correo Electronico:</label> </td>
                                    <td>{{ $rows[0]->email }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                    <div class="col-md-4">
                    <h4 class="box-title">Informacion Profesional</h4>
                        <table class="table table-user-information">
                            <tbody>
                                <tr>
                                    <td class="col-md-5"><label for="">Profesion:</label> </td>
                                    <td>{{ $rows[0]->tipo_usuario }}</td>                                    
                                </tr>
                                <tr>
                                    <td class="col-md-5"><label for="">Matricula:</label> </td>
                                    <td>{{ $rows[0]->matricula_medico }}</td>
                                </tr>
                            </tbody>
                        </table>
                    <h4 class="box-title">Especialidades</h4>
                        <table class="table table-user-information">
                            @if($rows[0]->id_especialidad===null)
                                <tr>
                                    <td>Usten no Tiene Especialidades</td>
                                </tr>
                            @else
                                @foreach($rows as $lista)
                                    @if($lista->estado === 'activo')
                                    <tr>
                                        <td class="col-md-5"><label for="">Especialidad en:</label> </td>
                                        <td>{{$lista->nombre_especialidad}}</td>
                                    </tr>
                                    @endif
                                @endforeach
                            @endif
                        </table>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-block btn-info btn-xs" data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo"> <span class="glyphicon glyphicon-edit"></span> Actualizar Datos Personales</button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-block btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo"> <span class="glyphicon glyphicon-edit"></span> Actualizar Especialidades</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Actualizar Especialidades de: <label for="">{{ $rows[0]->ci }}</label></h4>
        </div>
        <div class="modal-body">
            <form class="sendform" action="{{url('update1', $rows[0]->id)}}" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-user-information">
                            <thead>
                                <th>Nro.</th>
                                <th>Especialidad</th>
                                <th>Agregar</th>
                            </thead>
                            <tbody>
                                <input type="hidden" name="eliminar_especialidad[]" value="0" checked></td>
                                <?php $a = 1 ?>                                         
                                @foreach($rows as $lista)
                                    @if($lista->estado === 'activo')
                                    <tr>
                                        <td>{{$a++}}</td>                                            
                                        <td>{{$lista->nombre_especialidad}}</td>
                                        <td><input type="checkbox" name="eliminar_especialidad[]" value="{{$lista->id_especialidad}}"></td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-user-information">
                            <thead>
                                <th>Nro.</th>
                                <th>Especialidad</th>
                                <th>Eliminar</th>
                            </thead>
                            <tbody>
                                    <input type="hidden" name="agregar_especialidad[]" value="0" checked>
                                <?php $a = 1 ?>                                         
                                @foreach($espe as $lista)
                                    <tr>
                                        <td>{{$a++}}</td>                                            
                                        <td>{{$lista->nombre_especialidad}}</td>
                                        <td><input type="checkbox" name="agregar_especialidad[]" value="{{$lista->id_especialidad}}"></td>
                                    </tr>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
        <div class="modal-footer">            
        </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-lg in" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Actualizar Datos del Medico: <label for=""> Ci: {{ $rows[0]->ci }}</label></h4>
        </div>
        <div class="modal-body">
            <form class="sendform_update_users" action="{{url('update_users')}}" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="id_user" value="{{ $rows[0]->id }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">CI:</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="ci_patient" placeholder="Default Input" value="{{ $rows[0]->ci }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombres:</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" placeholder="Default Input" name="name_user" value="{{ $rows[0]->name }}">
                            </div>
                        </div>
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">A. Paterno:</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" placeholder="Default Input" name="apellidos" value="{{ $rows[0]->apellidos }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">A. Materno:</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" placeholder="Default Input">
                            </div>
                        </div>
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha Nac.:</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" placeholder="Default Input" name="fecha_nacimiento" value="{{ $rows[0]->fecha_nacimiento }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Profesion:</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" placeholder="Default Input" name="profesion" value="{{ $rows[0]->ocupacion }}">
                            </div>
                        </div>
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado Civil:</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" placeholder="Default Input" name="estado_civil" value="{{ $rows[0]->estado_civil }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email:</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" placeholder="Default Input" name="email" value="{{ $rows[0]->email }}">
                            </div>
                        </div>
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Telefono:</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" placeholder="Default Input" name="telefono" value="{{ $rows[0]->telefono }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Celular:</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" placeholder="Default Input" name="celular" value="{{ $rows[0]->celular }}">
                            </div>
                        </div>
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col-md-12 center">
                        <button type="submit" class="btn btn-success"> <span class="glyphicon glyphicon-floppy-disk"></span> Guardar Datos</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">            
        </div>
        </div>
    </div>
</div>
<style>
.center{
    text-align: center;
}
</style>