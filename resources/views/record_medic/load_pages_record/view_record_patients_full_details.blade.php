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