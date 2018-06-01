<div class="row">
    <div class="x_panel">
        <div class="x_title">
            <label for="">Examenes Medicos</label>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="x_panel">
                        <table id="datatable" class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>Nro.</th>
                                    <th>Nombre Examen Medico</th>
                                    <th>Descripcion Examen Medico</th>
                                    <th>Fecha Registro</th>
                                    <th>Estado</th>         
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1 ?>
                                @foreach($list as $lista)
                                    <tr>
                                        <td>{{ $a++ }}</td>
                                        <td>{{ $lista->name_medical_exam }}</td>
                                        <td>{{ $lista->description_medical_exam }}</td>
                                        <td>{{ $lista->date_regsiter }}</td>
                                        <td>{{ $lista->state_medical_exam }}</td>
                                        <td><button class="btn btn-primary btn-xs" value="">Editar</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>                
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#medical_exam_modal" data-whatever="@mdo">Agregar Nuevo Examen Medico</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="medical_exam_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" id="close_save_modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Agregar Nuevo Examen Medico <label for=""></label></h4>
        </div>
        <div class="modal-body">
            <!--form class="sendform1" action="{{url('crear_turno')}}" method="post"-->
            <form class="sendform_medical_exam" action="{{url('create_medical_exam')}}" method="post">            
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="">Nombre Examen Medico</label>
                                <input name="name_medical_exam" class="form-control" type="text" value="">
                        </div>               
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Descripcion Examen Medico</label>
                            <textarea class="form-control  col-md-6" rows="3" placeholder="Escribir ..." name="medical_exam_description"></textarea>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Registrar Examen Medico</button>
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