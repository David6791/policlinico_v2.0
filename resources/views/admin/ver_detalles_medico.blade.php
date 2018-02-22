<div class="row">
    <div class="col-md-6">
        <div class="xpanel">
            <div class="x_title">
                <h2>Datos <small>Medico</small></h2><br>
            </div>
            <div class="x_content">
                <div class="row"> <br>
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <img src="/img/med.png" width="150" alt="">
                    </div>
                    <div class="col-md-7"> <br><br><br><br>
                        <table>
                            <tr>
                                <td><label for=""><h2>Nombre:</h2></label> {{$rows[0]->name}} {{$rows[0]->apellidos}}</td>
                            </tr>
                            <tr>
                                <td><label for=""><h2>Nro. Documento:</h2></label> {{$rows[0]->ci}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="xpanel">
            <div class="x_title">
                <h2>Datos <small>Especialidades</small></h2><br>
            </div>
            <div class="x_content">
            </div>
        </div>
    </div>
</div>