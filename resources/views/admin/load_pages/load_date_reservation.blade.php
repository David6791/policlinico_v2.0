<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="x_panel">
            <div class="x_title">
                Datos Reservacion de Cita Medica
            </div>
            <form action="">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">Fecha Cita</label>
                            <div class="form-group">
                                <div class='input-group date' id='myDatepicker3'>
                                    <input name="date_appointsment" id="date_appointsment" type='text' class="form-control" value="{{ $dates }}" disabled/>
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
                                    <select name="" id="" class="select2_group form-control">
                                        @foreach($medic as $list)
                                            <option value="{{ $list->id }}">Dr. {{ $list->apellidos }} {{ $list->name }} -- {{ $list->nombre_tipo}}</option>
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
                                    <input name="hour_appointsment" id="hour_appointsment" type='text' class="form-control"  value="" />
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
                </div>
            </form>
        </div>
    </div>
</div>