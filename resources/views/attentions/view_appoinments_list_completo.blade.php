<div class="row">
    <div class="x_panel">
        <div class="x_title">
            <label for="">LISTA CITAS MEDICAS ATENDIDAS </label>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3 tile_stats_count">
                <div class="count red"> <h3> {{ "Fecha: ".date("m-d-Y") }} </h3></div>
            </div>
        </div> <br>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="x_panel">
                    <table id="datatable" class="table table-bordered datatable">
                        <thead>
                            <tr>
                                <th>Nro.</th>
                                <th>Ci.</th>
                                <th>Nombres y Apellidos</th>
                                <th>Tipo Cita Medica</th>
                                <th>Hora Atencion</th>                            
                                <th>Estado Atencion</th>
                                <th>Fecha Cita Medica</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $a = 1 ?>
                            @foreach($list as $lista)                                
                                <tr>
                                    <td>{{ $a++ }}</td>
                                    <td>{{ $lista->r_ci }}</td>
                                    <td>{{ $lista->r_nombres }} {{ $lista->r_apaterno }} {{ $lista->r_amaterno }}</td>
                                    <td>{{ $lista->name_type }}</td>
                                    <td>{{ $lista->r_start_time }}</td>
                                    <td>{{ $lista->r_name_state_appoinments }}</td>
                                    <td>{{ $lista->r_date_appointments }}</td>
                                    <td><button class="btn btn-primary btn-xs start_appointment" value="{{ $lista->r_id_medical_appointments }}"> <span class="glyphicon glyphicon-eye-open"></span> Ver Atencion Medica </button></td>
                                </tr>                          
                            @endforeach
                        </tbody>
                    </table>
                </div>                
            </div>
        </div>
    </div>
</div>
<script>
    $('#datatable').DataTable();
</script>