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
                <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Atencion Cita</a>
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
                                    <div class="alert alert-success">
                                        <ul class="fa-ul">
                                            <li>
                                            <i class="fa fa-user fa-lg fa-li"></i> Informacion Personal
                                            </li>
                                        </ul>
                                    </div>
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
                                <div class="row">
                                    <div class="col-md-10"></div>
                                    <div class="col-md-2">
                                        <button class="btn btn-info load_filiation_dates_full" value="{{ $dates_patient[0]->id_paciente }}">Ver Datos Filiacion</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="load_dates_patients_full" id="load_dates_patients_full">
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                            <div class="alert alert-warning">
                                <ul class="fa-ul">
                                    <li>
                                    <i class="fa fa-list fa-lg fa-li"></i> Lista de Citas Medicas Pasadas
                                    </li>
                                </ul>
                            </div>
                                <table id="datatable " class="table table-striped table-bordered">
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
                                        <?php $a = 1; $e=1 ?>
                                        @foreach($list_app as $lista)
                                            <tr>   
                                                <td>{{ $a++ }}</td>
                                                <td>{{ date('d/m/Y', strtotime($lista->date_appointments)) }}</td>
                                                <td>{{ $lista->appointment_description }}</td> 
                                                @if( $lista->name_state_appointments === 'Atendido')                                               
                                                    <td style="color:#1FC125"><span class="glyphicon glyphicon-ok"></span> {{ $lista->name_state_appointments }}</td>
                                                @else
                                                    <td style="color:#DA0000">{{ $lista->name_state_appointments }}</td>
                                                @endif

                                                <td>{{ $lista->start_time }}</td>
                                                <td><button class="btn btn-success btn-xs load_dates_appoinments"  href="" type="button" value="{{ $lista->id_medical_appointments }}">Ver Datos Consulta</button></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="cargar_completo">
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                    <form class="form-horizontal form_send_dates_appointments_send" action="{{url('save_dates_appoinments_dates')}}" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="" value="">
                        <div class="row">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h3>Paciente: <small>{{ $dates_patient[0]->nombres }} {{ $dates_patient[0]->ap_paterno }} {{ $dates_patient[0]->ap_materno }} </small> </h3>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for=""> Tipo Consulta: </label> {{ $list_app[0]->name_type }} 
                                        </div>
                                        <div class="col-md-8"></div>
                                    </div>
                                    @foreach($dat as $lo)
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <label for="">{{ $lo->name_date }}: </label>
                                            <textarea rows=5 name="{{ $lo->id_date_register }}" placeholder="{{ $lo->description_dates }}..." id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10"></textarea>    
                                        </div>                                
                                    </div> <br>
                                    @endforeach
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                        <label for="">Esta Cita Medica tendra Reconsulta...?</label>
                                            <div class="row"> <br>                                            
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-info click_exec_1"  value="">SI   </button>
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-danger click_cancel_1"  value="">NO   </button>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Observaciones...</label>
                                                    <div class="form-group col-md-12">
                                                        <textarea class="form-control" rows="3" disabled placeholder="Escribir aqui ..." id="datos" name="observations_appointments"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <label for="">Observaciones de la Cita Medica</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea class="form-control" placeholder="Escriba aqui las Observaciones de la Cita Medica..." rows="5" name="observation_appointment_dates" id=""></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <br>
                                    <div class="row">
                                        <div class="col-md-5"></div>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar Datos Cita Medica</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </form>                                    
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#datatable').DataTable();
</script>