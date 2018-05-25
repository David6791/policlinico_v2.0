<div class="row">
    <div class="x_panel">
        <div class="x_title">
            <h5>Datos para registrar durante una Cita Medica</h5>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <table class="table table-striped table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th>NRO.</th>
                                <th>NOMBRE DATO</th>
                                <th>DESCRIPCION</th>
                                <th>ESTADO</th>
                                <th>FECHA REGISTRO</th>
                                <th>ACCION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $a = 1 ?>
                            @foreach($list as $lista)
                                <tr>
                                    <td> {{ $a++ }}</td>
                                    <td> {{ $lista->name_date }}</td>
                                    <td> {{ $lista->description_dates }}</td>
                                    <td> {{ $lista->state_date_register }}</td>
                                    <td> {{ $lista->date_register }} </td>
                                    <td> <button class="btn btn-danger btn-xs" data-original-title="Editar"><span class="glyphicon glyphicon-edit"></span></button> <button class="btn btn-success btn-xs" data-original-title="Eliminar"><span class="glyphicon glyphicon-trash"></span></button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#create_medical_dates" data-whatever="@mdo">Agregar Nuevo</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#datatable').DataTable();
</script>