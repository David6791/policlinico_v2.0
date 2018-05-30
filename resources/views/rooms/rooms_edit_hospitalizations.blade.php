<div class="row">
    <div class="x_panel">
        <div class="x_title">
            <label for="">Editar lista de Internaciones</label>
        </div>
        <div class="x_content">
            @foreach(array_chunk($rooms_edit, 4) as $chunk)
                <div class="row">
                    <div class="col-md-1"></div>                                         
                    @foreach($chunk as $list)
                        <div class="col-md-3">  
                            <div class="x_panel">
                                <div class="x_title">
                                    Habitacion Nr.: {{ $list->id_patient_room}}
                                </div>
                                <div class="x_content">
                                    <ul class="list-inline widget_tally">
                                        <li>
                                            <p>
                                                <span class="month">Nombre: {{ $list->name_room}}</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <span class="month">Paciente: {{ $list->nombres}} {{ $list->ap_paterno}} {{ $list->ap_materno}}</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <span class="month">Fecha internacion: {{ date('m-d-Y', strtotime( $list->date_start )) }}</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <span class="month">Fecha Alta: {{ date('m-d-Y', strtotime( $list->date_end )) }}</span>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>