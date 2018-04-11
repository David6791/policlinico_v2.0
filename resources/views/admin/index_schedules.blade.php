<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
        <h2>Lista <small>Horarios</small></h2><br>
    </div>
    <div class="x_content">
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nro.</th>
                    <th>Nombre Horario</th>
                    <th>Hora Inicio</th>
                    <th>Hora Fin</th>
                    <th>Descipcion</th>
                    <th>Estado</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php $a = 1 ?>
                @foreach($row as $lista)
                <tr>
                    <td>{{ $a++ }}</td>
                    <td>{{ $lista->name_schedules }}</td>                
                    <td>{{ $lista->schedules_start }}</td>
                    <td>{{ $lista->schedules_end }}</td>
                    <td>{{ $lista->description }}</td>
                    @if($lista->state==='activo')
                    <td><button class="btn btn-success btn-xs get_BajaSchedule" name="id_medico" value="{{$lista->id_schedule}}">Activo</button></td>
                    @else
                    <td><button class="btn btn-danger btn-xs get_BajaSchedule" name="id_medico" value="{{$lista->id_schedule}}">Inactivo</button></td>
                    @endif 
                    <td><div class="col-md-2"><button type="button" class="btn btn-primary btn-xs get_EditSchedule" value="{{$lista->id_schedule}}">Editar Horario</button></div></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="x_footer">
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar Nuevo Horario</button></div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Agregar Nuevo Turno <label for=""></label></h4>
        </div>
        <div class="modal-body">
            <!--form class="sendform1" action="{{url('crear_turno')}}" method="post"-->
            <form class="sendform_schedules" action="{{url('create_schedules')}}" method="post">            
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="">Nombre Horario</label>
                                <input name="name_schedules" class="form-control" type="text" value="">
                        </div>               
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="">Hora Inicio</label>
                            <div class="form-group">
                                <div class='input-group date' id='myDatepicker3'>
                                    <input name="hour_start" type='text' class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>               
                    </div>
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="">Hora Fin</label>
                            <div class="form-group">
                                <div class='input-group date' id='myDatepicker2'>
                                    <input name="hour_end" type='text' class="form-control" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>               
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Descripcion</label>
                            <textarea class="form-control  col-md-6" rows="3" placeholder="Escribir ..." name="hour_description"></textarea>
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
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Editar Horario<label for=""></label></h4>
        </div>
        <div class="modal-body">
            <!--form class="sendform1" action="{{url('crear_turno')}}" method="post"-->
            <form class="sendform_schedules" action="{{url('create_schedules')}}" method="post">            
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="">Nombre Horario</label>
                                <input name="name_schedules" class="form-control" type="text" value="" id="name_schedules"/>
                        </div>               
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="">Hora Inicio</label>
                            <div class="form-group">
                                <div class='input-group date' id='myDatepicker3'>
                                    <input name="hour_start" type='text' class="form-control" id="hour_start"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>               
                    </div>
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="">Hora Fin</label>
                            <div class="form-group">
                                <div class='input-group date' id='myDatepicker2'>
                                    <input name="hour_end" type='text' class="form-control" id="hour_end"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>               
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Descripcion</label>
                            <textarea class="form-control  col-md-6" rows="3" placeholder="Escribir ..." name="hour_description" id="hour_description"></textarea>
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
$('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });
$('#myDatepicker2').datetimepicker({
        format: 'hh:mm A'
    });
$('#datatable').DataTable();
</script>