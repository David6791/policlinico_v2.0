<div class="row">
    <div class="x_panel">
        <div class="x_title">
            <label for="">REPORTE DE MEDICOS POR RANGO DE FECHA</label>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <p style="color:#FF0000">* Ingrese el rango de fechas que desea ver, Tambien se puede ver reportes SEMANALES y MENSUALES.</p> 
                <div class="row">
                <br>
                    <div class="col-md-2"></div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Fecha Incio <span class="required"></span></label>
                            <div class="form-group">
                                <div class='input-group date' id=''>
                                    <input name="date_start" id="myDatepicker3" type='text' class="form-control" value=""/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 col-xs-12">Fecha Fin <span class="required"></span></label>
                            <div class="form-group">
                                <div class='input-group date' id=''>
                                    <input name="date_end" id="myDatepicker2" type='text' class="form-control" value=""/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-success send_range_dates"> <span class="glyphicon glyphicon-eye-open"></span> Ver Lista de Datos</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="load_table_range_date">

        </div>
    </div>
</div>
<script>
    $('#myDatepicker3').datepicker({format: 'yyyy-mm-dd' })
    $('#myDatepicker2').datepicker({format: 'yyyy-mm-dd' })
</script>