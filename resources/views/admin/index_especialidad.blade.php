<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
        <h2>Lista <small>Especialidades</small></h2><br>
    </div>
    <div class="x_content">
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nro.</th>
                    <th>Nombre Especialidad</th>
                    <th>Descripcion Especialidad</th>
                    <th>Estado Especialidad</th>
                    <th>Usuario</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php $a = 1 ?>
                @foreach($row as $lista)
                <tr>
                    <td>{{ $a++ }}</td>
                    <td>{{ $lista->nombre_especialidad }}</td>                
                    <td>{{ $lista->descripcion_especialidad }}</td>
                    @if($lista->estado_especialidad==='Activo')
                        <td><button class="btn btn-success btn-xs get_BajaSpecialty" name="id_especialidad" value="{{$lista->id_especialidad}}">{{ $lista->estado_especialidad }}</button></td>
                    @else
                        <td><button class="btn btn-danger btn-xs get_BajaSpecialty" name="id_especialidad" value="{{$lista->id_especialidad}}">{{ $lista->estado_especialidad }}</button></td>                        
                    @endif   
                    <td>{{ $lista->nombre_tipo}}</td>
                    <td><button class="btn btn-primary btn-xs editSpecialties" name="id_medico" value="{{$lista->id_especialidad}}">Editar Especialidad</button></td>               
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="x_footer">
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar Nuevo Especialidad</button></div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Agregar Nuevo Especialidad <label for=""></label></h4>
        </div>
        <div class="modal-body">
            <!--form class="sendform1" action="{{url('crear_turno')}}" method="post"-->
            <form class="sendform1" action="{{url('crear_especialidad')}}" method="post">            
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="">Nombre Especialidad</label>
                                <input name="nombre_especialidad" class="form-control" type="text" value="">
                        </div>               
                    </div>
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="">Usuario Especialidad</label>
                                <select name="tipo_usuario" id="" class="select2_group form-control">
                                    @foreach($rows as $list)                                    
                                        <option value="{{$list->id_tipo}}">{{$list->nombre_tipo}}</option>                                                         
                                    @endforeach
                                </select>                                
                        </div>               
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Descripcion</label>
                            <textarea class="form-control  col-md-6" rows="3" placeholder="Escribir ..." name="descripcion_esp"></textarea>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                        <div class="col-md-8"></div>
                        <div class="col-md-2">                        
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>                    
                </div>
            </form>
        </div>
        <div class="modal-footer">            
        </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editSpecialtiesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" id="close_save_modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Editar Especialidad <label for=""></label></h4>
            <div class="alert alert-warning">
                <h4><i class="fa fa-warning"></i> Alerta!</h4> 
                <a class="alert-link">* Seleccione Tipo Usuario</a>
            </div>
        </div>
        <div class="modal-body">
            <!--form class="sendform1" action="{{url('crear_turno')}}" method="post"-->
            <form class="sendform_save_edit_Specialties" action="{{url('saveSpecialties')}}" method="post">            
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="id_specialties" value="" id="id_specialties">
                <div class="row">
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="">Nombre Especialidades</label>
                                <input name="nombre_especialidad" id="name_specialties" class="form-control" type="text" value="">
                        </div>               
                    </div>
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="">Usuario Especialidad</label>
                                <select name="tipo_usuario" id="" class="select2_group form-control">
                                    @foreach($rows as $list)                                    
                                        <option value="{{$list->id_tipo}}">{{$list->nombre_tipo}}</option>                                                         
                                    @endforeach
                                </select>                                
                        </div>               
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Descripcion</label>
                            <textarea class="form-control  col-md-6" id="description" rows="3" placeholder="Escribir ..." name="descripcion_esp"></textarea>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                        <div class="col-md-8"></div>
                        <div class="col-md-2">                        
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>                    
                </div>
            </form>
        </div>
        <div class="modal-footer">            
        </div>
        </div>
    </div>
</div>


<script>
    $('#datatable').DataTable();
</script>