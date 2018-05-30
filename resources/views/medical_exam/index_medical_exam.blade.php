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
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#medicines_rooms_modal" data-whatever="@mdo">Agregar Nuevo Medicamento</button>
            </div>
        </div>
    </div>
</div>
<script>
    $('#datatable').DataTable();
</script>