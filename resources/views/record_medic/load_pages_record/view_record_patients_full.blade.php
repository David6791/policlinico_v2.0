<div class="row">
    <div class="x_panel">
        <?php $a = 1 ?>
        @foreach(array_chunk($list_record, 3) as $chunk)
            <div class="row">                                            
                @foreach($chunk as $add)
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="x_panel pint">
                                    <div class="x_title">
                                        <label for="">Historial Nro. {{ $a++ }} </label>
                                    </div>
                                    <div class="x_content">
                                        <label for="">DATOS DE PACIENTE</label>
                                        <div class="row">
                                            <div class="col-md-8"></div>
                                            <div class="col-md-4">
                                                Fecha: {{ date('d/m/Y', strtotime($add['data_creation_appointments'])) }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                Nombre Paciente: {{ $add['nombres'] }} {{ $add['ap_paterno'] }} {{ $add['ap_materno'] }}
                                            </div>
                                        </div> <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                CI: {{ $add['ci_paciente'] }}
                                            </div>
                                            <div class="col-md-8">
                                                Fecha Nacimiento: {{ date('d/m/Y', strtotime($add['fecha_nacimento'])) }}
                                            </div>
                                        </div> <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                Turno: {{ $add['name_schedules'] }}
                                            </div>
                                            <div class="col-md-4">
                                                Hora: {{ $add['start_time'] }}
                                            </div>
                                            <div class="col-md-4">
                                                Estado: {{ $add['name_state_appointments'] }}
                                            </div>
                                        </div> <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                Descripcion Cita Medica: {{ $add['appointment_description'] }}
                                            </div>
                                        </div> <br>
                                        <label for="">DATOS DEL MEDICO</label>
                                        <div class="row">
                                            <div class="col-md-8">
                                                Nombre Medico: {{ $add['name'] }} {{ $add['apellidos'] }}
                                            </div>
                                            <div class="col-md-4">
                                                Ci: {{ $add['ci_medic'] }}
                                            </div>                                            
                                        </div> <br>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-4">
                                                <button type="button" class="btn btn-success view_full_record_medic" value="{{ $add['id_medical_appointments'] }}"> <span class="glyphicon glyphicon-eye-open"></span> Ver Historial Completo</button>
                                            </div>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-4">
                                                <button type="button" class="btn btn-info"> <span class="glyphicon glyphicon-print"></span> Imprimir</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
<style>
.pint{
    background-color:#F3F0EF;
}
</style>