<div class="row">
    <div class="x_panel">
        <div class="x_title">
            <label for="">Habitaciones Libres para Internacion</label>
        </div>
        <div class="x_content">
            @foreach(array_chunk($rooms_free, 4) as $chunk)
                <div class="row">
                    <div class="col-md-1"></div>                                         
                    @foreach($chunk as $list)
                    <div class="col-md-3 widget widget_tally_box">
                        <div class="x_panel fixed_height_390 cooer">
                            <div class="x_title">
                                <h2><small>Habitacion:</small>Nro. {{ $list->id_available_beds }}</h2>
                            </div>
                            <div class="x_content" align="center">
                                <img src="{{ asset('img/cama1.png') }}" alt="" width="120px"> <br>
                                <ul class="list-inline widget_tally">
                                    <li>
                                        <p>
                                            <span class="month">Nombre:</span>
                                            <span class="count">{{ $list->name_room }}</span>
                                        </p>
                                    </li>
                                    <li>
                                        <p>
                                            <span class="month">Estado:</span>
                                            <span class="count">{{ $list->state_room }}</span>
                                        </p>
                                    </li>
                                    @if($list->occupied_rom === "N")
                                    <li class="col_div">
                                        <p>
                                            <span class="month">Estado:</span>
                                            <span class="count">Libre</span>
                                        </p>
                                    </li>
                                    @endif
                                    <li>
                                        <p>
                                            <span class="month">Fecha Registro:</span>
                                            <span class="count">{{ date('m-d-Y', strtotime( $list->date_creation )) }}</span>
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
<style>
.cooer{
    background-color:#F0FCEB;
}
.col_div{
    background-color:#A0D38B;
}
</style>