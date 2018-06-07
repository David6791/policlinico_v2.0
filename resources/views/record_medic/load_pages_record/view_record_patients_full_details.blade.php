<div class="row">
    <div class="x_panel">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="x_panel">   
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <div class="x_title">
                                <h1>Historial Medico</h1>
                            </div>                            
                        </div>
                    </div>                 
                    <div class="row"> <br>
                        <div class="col-md-6">                            
                            <div class="x_panel">
                                <div class="row"><label for="">DATOS GENERALES DEL PACIENTE</label></div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{ asset('img/med.png') }}" width="150px" alt=""><br>
                                    </div>
                                    <div class="col-md-9"> <br> <br> <br>
                                        <div class="row spa">
                                            <div class="col-md-12">
                                                <label for="">NOMBRES:</label> {{ $paciente[0]->nombres }} {{ $paciente[0]->ap_paterno }} {{ $paciente[0]->ap_materno }}
                                            </div>
                                        </div>
                                        <div class="row spa">
                                            <div class="col-md-12">
                                                <label for="">CI:</label> {{ $paciente[0]->ci }}
                                            </div>
                                        </div>
                                        <div class="row spa">
                                            <div class="col-md-12">
                                                <label for="">FECHA NACIMIENTO:</label> {{ $paciente[0]->fecha_nacimento }}
                                            </div>
                                        </div>
                                        <div class="row spa">
                                            <div class="col-md-12">
                                                <label for="">SEXO:</label> {{ $paciente[0]->sexo }}
                                            </div>
                                        </div>
                                        <div class="row spa">
                                            <div class="col-md-12">
                                                <label for="">DIRECCION:</label> {{ $paciente[0]->direccion }}
                                            </div>
                                        </div>
                                        <div class="row spa">
                                            <div class="col-md-12">
                                                <label for=""> TELEFONO - CELULAR:</label> {{ $paciente[0]->telefono }} - {{ $paciente[0]->celular }}
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                            </div>                        
                        </div>
                        <div class="col-md-6">                            
                            <div class="x_panel">
                                <div class="row"><label for="">DATOS MEDICOS GENERALES y PATOLOGIAS DEL PACIENTE</label></div>
                                <div class="row">                                                                       
                                    <div class="col-md-12">
                                        @foreach($date_medic as $dm) 
                                        <div class="row spa">
                                            <div class="col-md-12">                                            
                                                <h5><label> {{ $dm['pregunta_mostrar'] }}:</label></h5>
                                                {{ $date_medic[0]['descripcion'] }}                                        
                                            </div>                                        
                                        </div>
                                        @endforeach
                                        <hr>
                                        <div class="row"> <label for="">PATOLOGIAS QUE TIENE EL PACIENTE</label> </div>
                                        <div class="row spa">
                                            <div class="col-md-12">
                                                Tiene las Siguientes Patologias: <br> <br>
                                                @foreach($patologies_medic as $pat)
                                                    {{ $pat['nombre_patologia'] }},
                                                @endforeach                                                
                                            </div>
                                        </div>
                                        
                                    </div>                                    
                                </div>                                
                            </div>                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="row"> <label for="">NOTAS MEDICAS REGISTRADAS AL MOMENTO DE LA CITA MEDICA</label> </div>
                                <div class="row spa">
                                    <div class="col-md-12">
                                        <label for=""> NOTAS MEDICAS:</label> {{ $notes_medic[0]->observation_medical_appoinments }} 
                                    </div>
                                </div>
                                <div class="row spa">
                                    <div class="col-md-12">
                                        @if(empty($notes_medic[0]->observation_re_medical_consusltation))
                                            <label for="">NO TIENE RECONSULTA</label>
                                        @else
                                            <label for=""> SI TIENE RECONSULTA:</label> <br> OBSERVACIONES DE LA RECONSULTA: {{ $notes_medic[0]->observation_re_medical_consusltation }}
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="row"> <label for="">TRANSFERENCIAS MEDICAS DEL PACIENTE</label> </div>
                                @if(empty($transfer_medic[0]->id_patient_trasfer))
                                    <div class="row">
                                        <div class="col-md-12">
                                            El paciente no tuvo Transferencias medicas.
                                        </div>
                                    </div>
                                @else
                                <div class="row"> <br>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                    @foreach($transfer_medic as $dat)                                                      
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for=""> FECHA: </label>{{ date('d/m/Y', strtotime($dat->date_creation)) }}
                                            </div>
                                            <div class="col-md-3"></div>
                                            <div class="col-md-3">
                                                <label for=""> NRO. TRANSFERENCIA: </label>{{ $dat->id_transfer_patient }}
                                            </div>
                                        </div> <hr>                                                
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label for=""> MEDICO SOLICITANTE: </label>{{ $dat->name }} {{ $dat->apellidos }}  
                                            </div>
                                            <div class="col-md-4"></div>                    
                                        </div> <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for=""> TIPO TRANSFERENCIA MEDICA: </label>{{ $dat->name_type_transfer }}
                                            </div>
                                        </div> <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for=""> DIAGNOSTICO: </label>{{ $dat->diagnostic }}
                                            </div>
                                        </div> <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for=""> JUSTIFICACION TRANSFERENCIA: </label>{{ $dat->justified_transfer }}
                                            </div>
                                        </div> <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for=""> ORIGEN TRANSFERENCIA: </label>{{ $dat->origin_transfer }}
                                            </div>
                                            <div class="col-md-6">
                                                <label for=""> DESTINO TRANSFERENCIA: </label>{{ $dat->destini_transfer }}
                                            </div>
                                        </div>  
                                    @endforeach
                                    </div>                                    
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="x_panel">
                                <div class="row">
                                    <label for=""> EXAMEN MEDICO SOLICITADO</label>
                                </div>
                                @if(count($exam_medics))
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <div class="row spa">
                                                <div class="col-md-12">
                                                    <label for=""> EXAMEN MEDICO SOLICITADO: </label>  {{ $exam_medics[0]->name_medical_exam }}
                                                </div>                                                
                                            </div>
                                            <div class="row spa">
                                                <div class="col-md-12">
                                                    <label for=""> RAZON EXAMEN MEDICO SOLICITADO: </label>  {{ $exam_medics[0]->reason_medical_examn }}
                                                </div>                                                
                                            </div>
                                            <div class="row spa">
                                                <div class="col-md-12">
                                                    <label for=""> OBSERVACIONES EXAMEN MEDICO SOLICITADO: </label>  {{ $exam_medics[0]->observation_medical_exam }}
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div><br>
                                @else
                                    No tiene examenes medicos solicitado. 
                                @endif
                                <div class="row">
                                    <label for="">RESULTADOS EXAMEN MEDICO</label>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.spa{    
    margin:10px;
}
</style>