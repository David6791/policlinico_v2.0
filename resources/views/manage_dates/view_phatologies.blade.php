<div class="row">
    <div class="x_panel">
        <div class="x_title">
            <label for="">Patologias Medicas</label>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th>NRO.</th>
                                <th>NOMBRE PATOLOGIA</th>
                                <th>DESCRIPCION PATOLOGIA</th>
                                <th>ESTADO PATOLOGIA</th>
                                <th>TIPO PATOLOGIA</th>
                                <th>FECHA REGISTRO</th>
                                <th>ACCION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $a = 1 ?>
                            @foreach($list as $lista)
                                <tr>
                                    <td> {{ $a++ }}</td>
                                    <td> {{ $lista->nombre_patologia }}</td>
                                    <td> {{ $lista->descripcion_patologia }}</td>
                                    <td> {{ $lista->estado_patologia }}</td>
                                    <td> {{ $lista->tipo_patologia }} </td>
                                    <td> {{ $lista->fecha_creacion_patologia }} </td>
                                    <td> <button class="btn btn-danger btn-xs" data-original-title="Editar"><span class="glyphicon glyphicon-edit"></span></button> <button class="btn btn-success btn-xs" data-original-title="Eliminar"><span class="glyphicon glyphicon-trash"></span></button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9"></div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#create_phatologies" data-whatever="@mdo">Agregar nueva Patologia</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="create_phatologies" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" id="close_save_modal" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Agregar Nueva Patologia <label for=""></label></h4>
        </div>
        <div class="modal-body">
            <!--form class="sendform1" action="{{url('crear_turno')}}" method="post"-->
            <form class="sendform_phatologies" action="{{url('create_phatologies')}}" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="">Nombre Patologia</label>
                                <input name="name_phatologie" class="form-control" type="text" value="">
                        </div>               
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Descripcion Patologia</label>
                            <textarea class="form-control  col-md-6" rows="3" placeholder="Escribir ..." name="phatologie_description"></textarea>
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