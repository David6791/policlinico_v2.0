<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="x_panel">
            <div class="x_title">
                Datos Reservacion de Cita Medica
            </div>
            <form class="sendform_insert_appointsment" role="form" action="{{url('insert_appointsments')}}" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Fecha Cita</label>
                            <div class="form-group">
                                <div class='input-group date' id='myDatepicker3'>
                                    <input name="date_appointsment" id="date_appointsment" type='text' class="form-control" value="{{ $dates }}" disabled/>
                                    <input name="date_appointsment"type='hidden' value="{{ $dates }}"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>   
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Turno Cita</label>
                            <div class="form-group">
                                <div class='input-group date' id='myDatepicker3'>
                                    <input name="turn_appointsment" id="turn_appointsment" type='text' class="form-control" disabled value="{{ $turno[0]->name_schedules }}"/>
                                    <input name="id_schedule" type='hidden' value="{{ $turno[0]->id_schedule }}"/>
                                    <span class="input-group-addon">
                                        <span class="fa fa-group"></span>
                                    </span>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-1"> </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Hora Cita</label>
                            <div class="form-group">
                                <div class='input-group date' id='myDatepicker3'>
                                    <input name="hour_appointsment" id="hour_appointsment" type='text' class="form-control" disabled value="{{ $turno[0]->start_time }}" />
                                    <input name="id_hour_appointsment" id="hour_appointsment" type='hidden' value="{{ $turno[0]->id_hour_turn }}" />
                                    <span class="input-group-addon">
                                        <span class="fa fa-clock-o"></span>
                                    </span>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div> <br>
                <div class="row">
                    <div class="x_title">
                        Datos del Medico
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Seleccion Medico</label>
                            <div class="form-group">
                                <div class='input-group date' id='myDatepicker3'>
                                    <select name="id_medico" id="" class="select2_group form-control">
                                        @foreach($medic as $list)
                                            <option value="{{ $list->id }}">Dr. {{ $list->apellidos }} {{ $list->name }} -- {{ $list->nombre_tipo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Tipo Cita</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <select name="type_appointments" id="" class="select2_group form-control">
                                        @foreach($types as $li)
                                            <option value="{{ $li->id_type_appointments }}">{{ $li->name_type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <br>
                <div class="row">
                    <div class="x_title">
                        Datos Paciente
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col md 3">
                            <label for="">Numero de Carnet</label>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <div class="form-group">                            
                            <div class="form-group">
                                <div class='input-group date' id='myDatepicker3'>
                                    <input name="ci_patient" id="ci_patient" type='text' class="form-control"  value="" />
                                    <span class="input-group-addon">
                                        <span class="fa fa-user"></span>
                                    </span>
                                </div>
                            </div>
                        </div>  
                    </div>
                        <div class="col-md-2">                        
                            <button type="button" class="btn btn-primary search">Buscar</button>
                        </div>
                    </div>
                    <div class="row load_dates_patient" id="load_dates_patient">
                        
                    </div>                                                                       
                </div>                                           
            </form>
        </div>
    </div>
</div>