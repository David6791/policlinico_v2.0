<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2> Atencion Paciente</h2>                    
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Datos del Paciente</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Citas Anteriores</a>
                </li>
                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Historial Medico</a>
                </li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ asset('img/img_patient.png') }}" alt="" width="300">
                        </div>
                        <div class="col-md-9">
                            <div class="x_panel">
                                <div class="x_title">
                                    Informacion Personal
                                </div>
                                <div class="x_content"></div>
                                <div class="row">
                                    <div class="col-md-6">
                                    <table class="table table-user-information">
                                        <tbody>
                                            <tr>
                                                <td class="col-md-4"><label for="">CI.:</label></td>
                                                <td> {{ $dates_patient[0]->ci }}</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-5"><label for="">NOMBRES:</label></td>
                                                <td> {{ $dates_patient[0]->nombres }}</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-5"><label for="">APELLIDOS:</label> </td>
                                                <td>{{ $dates_patient[0]->ap_paterno }} {{ $dates_patient[0]->ap_materno }}</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-5"><label for="">FECHA NACIMIENTO:</label> </td>
                                                <td>{{ $dates_patient[0]->fecha_nacimento }}</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-5"><label for="">GENERO:</label> </td>
                                                <td>{{ $dates_patient[0]->sexo }}</td>
                                            </tr>
                                        </tbody>
                                    </table>                                        
                                    </div>
                                    <div class="col-md-6">
                                    <table class="table table-user-information">
                                        <tbody>
                                            <tr>
                                                <td class="col-md-4"><label for="">DIRECCION:</label></td>
                                                <td> {{ $dates_patient[0]->direccion }}</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-5"><label for="">PAIS DE NACIMIENTO:</label></td>
                                                <td> {{ $dates_patient[0]->pais_nacimiento }}</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-5"><label for="">LUGAR DE NACIMIENTO:</label></td>
                                                <td> {{ $dates_patient[0]->localidad_nacimiento }}</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-5"><label for="">TELEFONO - CELULAR:</label> </td>
                                                <td>{{ $dates_patient[0]->telefono }} - {{ $dates_patient[0]->celular }}</td>
                                            </tr>
                                            <tr>
                                                <td class="col-md-5"><label for="">FECHA DE REGISTRO:</label> </td>
                                                <td>{{ $dates_patient[0]->fecha_creacion }}</td>
                                            </tr>
                                        </tbody>
                                    </table>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nro.</th>
                                            <th>Fecha</th>
                                            <th>Descripcion Cita Medica</th>
                                            <th>Estado Cita Medica</th>
                                            <th>Hora Cita</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $a = 1 ?>
                                        @foreach($list_app as $lista)
                                            <tr>   
                                                <td>{{ $a++ }}</td>
                                                <td>{{ date('d/m/Y', strtotime($lista->data_creation_appointments)) }}</td>
                                                <td>{{ $lista->appointment_description }}</td>
                                                <td>{{ $lista->name_state_appointments }}</td>
                                                <td>{{ $lista->start_time }}</td>
                                                
                                                <td>Ver Historial Medico</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>                            
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                    <p>3</p>
                </div>
            </div>
        </div>

        </div>
    </div>
</div>
<script>
    $('#datatable').DataTable();
</script>