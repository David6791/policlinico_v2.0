<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
        <h2>Lista <small>Medicos</small></h2><br>
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
                    @if($lista->estado_user==='Activo')
                        <td style="color:green">{{ $lista->nombre_estado }}</td>
                    @else
                        <td style="color:red">{{ $lista->nombre_estado }}</td>
                    @endif   
                    <td><button class="btn btn-primary btn-xs getVerMedico" name="id_medico" value="{{$lista->id}}">Ver Medico</button></td>                 
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="x_footer">
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2"><button type="button" class="btn btn-success btn-sm agregar_medico">Agregar Nuevo Medico</button></div>
        </div>
    </div>
</div>
<script>
    $('#datatable').DataTable();
</script>