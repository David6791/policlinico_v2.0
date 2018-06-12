<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
        <h2>Lista <small>Enfermeras</small></h2><br>
    </div>
    <div class="x_content">
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nro.</th>
                    <th>Ci.</th>
                    <th>Nombres y Apellidos</th>
                    <th>Matricula</th>
                    <th>Fecha Registro</th>
                    <th>Estado</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php $a = 1 ?>
                @foreach($row as $lista)
                <tr>
                    <td>{{ $a++ }}</td>
                    <td>{{ $lista->ci }}</td>
                    <td>{{ $lista->name }} {{ $lista->apellidos }}</td>                 
                    <td>{{ $lista->matricula_medico }}</td>
                    <td>{{ $lista->fecha_creacion}}</td>
                    @if($lista->estado_user===1)
                        <td><button class="btn btn-success btn-xs get_BajaUser" name="id_medico" value="{{$lista->id}}"> <span class="glyphicon glyphicon-arrow-up"></span> Activo</button></td>
                    @else
                        <td><button class="btn btn-danger btn-xs get_BajaUser" name="id_medico" value="{{$lista->id}}"> <span class="glyphicon glyphicon-arrow-down"></span> Inactivo</button></td>
                    @endif   
                    <td><button class="btn btn-info btn-xs getVerMedico" name="id_medico" value="{{$lista->id}}"> <span class="glyphicon glyphicon-eye-open"></span> Ver</button><button class="btn btn-danger btn-xs" name="id_medico" value="{{$lista->id}}"> <span class="glyphicon glyphicon-edit"></span> Editar</button><button class="btn btn-primary btn-xs" name="id_medico" value="{{$lista->id}}"> <span class="glyphicon glyphicon-print"></span> Imprmir</button></td>                 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="x_footer">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2"><button type="button" class="btn btn-info btn-sm agregar_medico"> <span class="glyphicon glyphicon-print"></span> Imrimir Lista de Enfermeras</button></div>
            <div class="col-md-6"></div>
            <div class="col-md-2"><button type="button" class="btn btn-success btn-sm agregar_enfermera">Agregar Nuevo Enfermera</button></div>
        </div>
    </div>
</div>
<script>
    $('#datatable').DataTable();
</script>