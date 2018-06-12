<div class="row">
    <div class="x_panel">
        <div class="x_title">Lista de Pacientes</div>
        <div class="x_content">
            <diw class="row">
                <div class="x_panel">
                    <div class="col-md-12">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>NRO.</th>
                                    <th>CI.</th>
                                    <th>NOMBRES Y APELLIDOS</th>
                                    <th>SEXO</th>
                                    <th>FECHA NACIMIENTO</th>
                                    <th>LUGAR NACIMIENTO</th>
                                    <th>ESTADO</th>
                                    <th>ACCION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1 ?>
                                    @foreach($list_patients as $lista)
                                        <tr>   
                                            <td>{{ $a++ }}</td>
                                            <td>{{ $lista->ci_paciente }}</td>
                                            <td>{{ $lista->nombres }} {{ $lista->ap_paterno }} {{ $lista->ap_materno }} </td>
                                            <td>{{ $lista->sexo }}</td>
                                            <td>{{ $lista->fecha_nacimento }}</td>
                                            <td>{{ $lista->localidad_nacimiento }}</td>
                                            <td>{{ $lista->esta_paciente }}</td>
                                            <td><button class="btn btn-success btn-xs"> <span class="glyphicon glyphicon-eye-open"></span> Ver</button> <button class="btn btn-info btn-xs"> <span class="glyphicon glyphicon-print"></span> Imprimir</button> <button class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-edit"></span> Editar</button></td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>                
            </diw>
        </div>
    </div>
</div>
<script>
    $('#datatable').DataTable();
</script>