<div class="row">
    <div class="x_panel">
        <div class="x_title">
            <div class="alert alert-success">
                <ul class="fa-ul">
                    <li>
                    <i class="fa fa-user fa-lg fa-li"></i> Datos de Filiacion del Paciente
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <div class="x_panel">
                    <div class="x_title">
                        <label for="">DATOS MEDICOS</label> 
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12">                            
                                @foreach($datos_medicos as $lista)
                                    <div class="row" >
                                        <div class="x_panel pintar" id="pintar">
                                            <div class="col-md-12">
                                                <label for="">{{ $lista->pregunta_mostrar }}</label>
                                                <div class="divider"></div>
                                                <p>{{ $lista->descripcion }}</p>
                                            </div>
                                        </div>                                        
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="x_panel">
                    <div class="x_title">
                        <label for="">PATOLOGIAS</label>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>NRO.</th>
                                            <th>NOMBRE PATOLOGIA</th>
                                            <th>DETALLE PATOLOGIA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $a = 1 ?>
                                        @foreach($patologias as $lista)
                                            <tr>
                                                <td>{{ $a++ }}</td>
                                                <td>{{ $lista->nombre_patologia }}</td>
                                                <td>{{ $lista->descripcion_patologia }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.pintar{
    background-color: #EFF1EE;  
}
</style>