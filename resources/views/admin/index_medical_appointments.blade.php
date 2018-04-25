<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="x_title">
        <h2>Lista <small>Citas Medicas</small></h2><br>
    </div>
    <div class="x_content">
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nro.</th>
                    <th>Nombre Paciente</th>
                    <th>Fecha Cita</th>
                    <th>Turno</th>
                    <th>Hora</th>
                    <th>Estado Cita Medica</th>
                    <th>Medico</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $a = 1 ?>
                @foreach($row as $lista)
                <tr>
                    <td>{{ $a++ }}</td>
                    <td>{{ $lista->nombres }} {{ $lista->ap_paterno }} {{ $lista->ap_materno }}</td>                
                    <td>{{ date('m-d-Y', strtotime( $lista->date_appointments )) }}</td>
                    <td>{{ $lista->name_schedules }}</td>
                    <td>{{ $lista->start_time }}</td>
                    <td>{{ $lista->name_state_appointments }}</td>
                    <td>{{ $lista->m_name }} {{ $lista->m_apellidos }}</td>
                    <td><button type="button" class="btn btn-primary btn-xs get_ViewAppointments" value="{{$lista->id_medical_appointments}}">Ver Detalles</button></td>
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