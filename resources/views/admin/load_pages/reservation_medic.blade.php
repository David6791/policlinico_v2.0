<div class="row">
    <div class="col-md-1"></div>    
    <div class="col-md-10 load_list_medics">
        <label for="">Seleccione Medico</label>
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nro.</th>
                    <th>Tipo</th>
                    <th>Nombres y Apellidos</th>
                    <th>Turno Asignado</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php $a = 1 ?>
                @foreach($medics as $lista)
                <tr>
                    <td>{{ $a++ }}</td>
                    <td>{{ $lista->nombre_tipo }}</td>
                    <td>{{ $lista->name }} {{ $lista->apellidos }}</td>
                    <td>{{ $lista->name_schedules }}</td>                    
                    <td><button class="btn btn-primary btn-xs load_date_medic" name="id_assignments" value="{{$lista->id_medical_assignments}}">Crear Cita Medica</button></td>          
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
$('#myDatepicker2').datetimepicker({
    format: 'MM-DD-YYYY'
});
</script>