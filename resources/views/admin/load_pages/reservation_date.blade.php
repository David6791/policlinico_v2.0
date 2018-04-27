<div class="row"> <br>
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <label for="">Seleccione Fecha:</label>
    </div>
    <div class="col-md-4"></div>
</div>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-2">        
        <div class="form-group">
            <div class='input-group date' id='myDatepicker2'>
                <input name="fecha_viaje" type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>        
    </div>
    <div class="col-md-2">
        <select name="id_user" id="" class="select2_group form-control">
            @foreach($schedul as $list)                                    
                <option value="{{$list->id}}">{{$list->nombre_tipo}}: {{$list->name}} {{$list->apellidos}}</option>                                                         
            @endforeach
        </select>
    </div>
    <div class="col-md-1">
        <button type="button" class="btn btn-primary btn-sm view_turns_day" value="fecha">Ver Turnos</button>   
    </div>
    <div class="col-md-4"></div>
</div>
<script>
$('#myDatepicker2').datetimepicker({
    format: 'DD-MM-YYYY'
});
</script>