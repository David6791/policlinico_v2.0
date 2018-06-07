<div class="row">
    <div class="x_panel">
        <div class="x_title">
            <label for="">Lista de Pacientes Atendidos al Dia del Medico</label>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="">Nombre Medico:</label> {{ Auth::user()->name }} {{ Auth::user()->apellidos }}
            </div>
        </div> <br>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="row">
                    <div class="x_panel">
                        <table class="table table-striped table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th>NRO.</th>
                                    <th>CI.</th>
                                    <th>NOMBRE PACIENTE</th>
                                    <th>HORA ATENCION</th>
                                    <th>ESTADO CITA MEDICA</th>
                                    <th>DESCRIPCION CITA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1 ?>
                                @foreach($list_daily as $lista)
                                    <tr>
                                        <td> {{ $a++ }}</td>
                                        <td> {{ $lista->ci_paciente }} </td>
                                        <td> {{ $lista->nombres }} {{ $lista->ap_paterno }} {{ $lista->ap_materno }}</td>
                                        <td> {{ $lista->start_time }}</td>
                                        <td> {{ $lista->name_state_appointments }}</td>
                                        <td> {{ $lista->appointment_description}} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <a class="btn btn-success" > <span class="glyphicon glyphicon-print "></span> Imprimir</a>
            </div>
        </div>       
    </div>
</div>
<script>
    $('#datatable').DataTable();
</script>