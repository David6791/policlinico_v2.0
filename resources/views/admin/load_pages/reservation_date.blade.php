<div class="form-group">
    
    <div class='input-group date' id='myDatepicker21'>
        <input name="fecha_viaje" type='text' class="form-control" />
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
</div>

<div class="x_content">

<div class="container">
    <div class="row">

        <div class='col-sm-4'>
            Basic Example
            <div class="form-group">
                <div class='input-group date' id='myDatepicker'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                       <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>

        <div class='col-sm-4'>
            Only Date Picker
            <div class="form-group">
                <div class='input-group date' id='myDatepicker2'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                       <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        
         <div class='col-sm-4'>
            Only Time Picker <small>For 24H format use format: 'HH:mm'</small>
            <div class="form-group">
                <div class='input-group date' id='myDatepicker3'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                       <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        
        <div class='col-sm-4'>
            Using ReadOnly
            <div class="form-group">
                <div class='input-group date' id='myDatepicker4'>
                    <input type='text' class="form-control" readonly="readonly" />
                    <span class="input-group-addon">
                       <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        
         <div class='col-sm-4'>
            Linked Picker Parent
            <div class="form-group">
                <div class='input-group date' id='datetimepicker6'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <div class='col-sm-4'>
            Linked Picker Children
            <div class="form-group">
                <div class='input-group date' id='datetimepicker7'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        
    </div>
</div>

<script>
/*$('#myDatepicker2').datetimepicker({
    format: 'MM-DD-YYYY'
});*/
$('#myDatepicker').datetimepicker();
    
    $('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
    });
    
    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });
    
    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });
    $('#datetimepicker6').datetimepicker();
    
    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });
    
    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    
    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
</script>