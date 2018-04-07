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
                    <td><button class="btn btn-success btn-xs get_BajaUser" name="id_medico" value="{{$lista->id_schedule}}">Activo</button></td>
                    @else
                    <td><button class="btn btn-danger btn-xs get_BajaUser" name="id_medico" value="{{$lista->id_schedule}}">Inactivo</button></td>
                    @endif
                    <td><button class="btn btn-primary btn-xs getVerMedico" name="id_medico" value="{{$lista->id_schedule }}</td>}}">Editar Horario</button></td>               
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