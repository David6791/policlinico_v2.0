<div class="row">
    <div class="x_panel">
        <div class="x_title">
            <label for="">Lista de Citas Medicas para Atencion </label>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <div class="alert alert-info">
                    <ul class="fa-ul">
                        <li>
                        <i class="fa fa-user fa-lg fa-li"></i> Bienbenido Dr. {{ Auth::user()->name }}
                        </li>
                    </ul>
                </div>
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
                                <th>Hora Atencion</th>                            
                                <th>Estado Atencion</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $a = 1 ?>
                            @foreach($list as $lista)
                                @if($lista->emergency=='S')
                                <tr bgcolor="#FAD2D2">
                                    <td>{{ $a++ }}</td>
                                    <td>{{ $lista->r_ci }}</td>
                                    <td>{{ $lista->r_nombres }} {{ $lista->r_apaterno }} {{ $lista->r_amaterno }}</td>
                                    <td>{{ $lista->r_name_schedules }}</td>
                                    <td>{{ $lista->r_name_state_appoinments }}</td>
                                    <td><button class="btn btn-primary btn-xs start_appointment" value="{{ $lista->r_id_medical_appointments }}">Iniciar Atencion</button></td>
                                </tr>
                                @else
                                <tr bgcolor="#CDF3A9">
                                    <td>{{ $a++ }}</td>
                                    <td>{{ $lista->r_ci }}</td>
                                    <td>{{ $lista->r_nombres }} {{ $lista->r_apaterno }} {{ $lista->r_amaterno }}</td>
                                    <td>{{ $lista->r_start_time }}</td>
                                    <td>{{ $lista->r_name_state_appoinments }}</td>
                                    <td><button class="btn btn-primary btn-xs start_appointment" value="{{ $lista->r_id_medical_appointments }}">Iniciar Atencion</button></td>
                                </tr>
                                @endif                            
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