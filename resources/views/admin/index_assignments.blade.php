<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
        <h2>Lista <small>Asignacion de Horarios</small></h2><br>
    </div>
    <div class="x_content">
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nro.</th>
                    <th>Nombres y Apellidos</th>
                    <th>Tipo Usuarios</th>
                    <th>Turno Asignados</th>
                    <th>Fecha Creacion</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php $a = 1 ?>
                @foreach($rows as $lista)
                <tr>
                    <td>{{ $a++ }}</td>
                    <td>{{ $lista->name }} {{ $lista->apellidos }}</td>
                    <td>{{ $lista->nombre_tipo }}</td>
                    <td>
                        {{ $lista->name_schedules[0] }}
                    </td>
                    <td>{{ $lista->date_creation }}</td>
                    <td><button class="btn btn-primary btn-xs editSpecialties" name="id_medico" value="{{$lista->id_medical_assignments}}">Editar Especialidad</button></td>               
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="x_footer">
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar Nueva Asignacion</button></div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Crear Nueva Asignacion <label for=""></label></h4>
        </div>
        <div class="modal-body">
            <!--form class="sendform1" action="{{url('crear_turno')}}" method="post"-->
            <form class="send_form_assignments" action="{{url('create_assignments')}}" method="post">            
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">                    
                    <div class="col-md-12">  
                        <div class="form-group">
                            <label for="">Usuario Especialidad</label>
                                <select name="id_user" id="" class="select2_group form-control">
                                    @foreach($users as $list)                                    
                                        <option value="{{$list->id}}">{{$list->nombre_tipo}}: {{$list->name}} {{$list->apellidos}}</option>                                                         
                                    @endforeach
                                </select>                                
                        </div>               
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">                            
                            <th class="column-title">Nombre Turno </th>
                            <th class="column-title">Hora Inicio </th>
                            <th class="column-title">Hora Fin </th>
                            <th class="column-title no-link last"><span class="nobr">Seleccionar</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                        @foreach($schedul as $list)  
                            <tr class="even pointer"> 
                                <td class="a-center "> {{$list->name_schedules}} </td>
                                <td class="a-center "> {{$list->schedules_start}} </td>
                                <td class="a-center "> {{$list->schedules_end}} </td>
                                <td class="a-center "> <input type="checkbox" class="flat" name="add_schedule[]" value="{{$list->id_schedule}}"></td>
                            </tr>
                        @endforeach
                        </tbody>
                      </table>
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