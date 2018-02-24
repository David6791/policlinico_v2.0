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
                                <button type="button" class="btn btn-block btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Actualizar Datos Personales</button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-block btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo">Actualizar Especialidades</button>
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