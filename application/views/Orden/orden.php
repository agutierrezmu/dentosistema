<!-- Bootstrap modal -->
<div class="modal fade modal_Orden" id="modal_Orden" role="dialog" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<div class="row">
					<div class="col-xs-3"><h3 class="modal-title tituloOrden">Orden N° 11111</h3></div>
					<div class="col-xs-3"><button class="btn btn-fijas px-3 py-1">Protesis Fija <i class="fa fa-user-md" aria-hidden="true"></i></button></div>
					<div class="col-xs-3"><button class="btn btn-colados px-3 py-1">Colados <i class="fa fa-user-md" aria-hidden="true"></i></button></div>
					<div class="col-xs-3"><button class="btn btn-removibles px-3 py-1">Removibles <i class="fa fa-user-md" aria-hidden="true"></i></button>
					<input type="hidden" name="tipo" id="tipo" value="" />
					<input type="hidden" name="codorden" id="codorden" value="" />
					</div>
				</div>
			</div>
			<div class="modal-body">  
				<div class="datosGenerales">
					<form class="form-horizontal">
						<fieldset>
							<legend>
								Datos Generales
							</legend>
							<div class="form-group row">
								<label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Origen</label>
								<div class="col-sm-4">
									<select class="js-example-basic-single form-control form-control-sm origen" id="origen">
										<?php 
										if ($instituciones)
										{						
											foreach($instituciones->result() as $institucion) { 
												echo '<option value="'.$institucion->CODINSTITUCION.'">'.$institucion->DESCRIPCION.'</option>';
											}
										}
										?>
									</select>
								</div>
								<label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Recepción</label>
								<div class="col-sm-2 date">				
									<div class="input-group input-append date" id="recepcion">
										<input type="text" class="form-control form-control-sm recepcion" name="recepcion" />
										<span class="input-group-addon add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>					
									</div>
								</div>
							</div>						
							<div class="form-group row">
								<label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Filiación</label>
								<div class="col-sm-4">
									<select class="js-example-basic-single form-control form-control-sm filiacion" name="filiacion">
										<?php 
										if ($filiaciones)
										{						
											foreach($filiaciones->result() as $filiacion) { 
												echo '<option value="'.$filiacion->CODFILIACION.'">'.$filiacion->DESCRIPCION.'</option>';
											}
										}
										?>
									</select>
								</div>
								<label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Entrega</label>
								<div class="col-sm-2 date">				
									<div class="input-group input-append date" id="entrega">
										<input type="text" class="form-control form-control-sm entrega" name="entrega" />
										<span class="input-group-addon add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>					
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Odontólogo</label>
								<div class="col-md-4">
									<select class="js-example-basic-single form-control form-control-sm odontologos" name="odontologo">									
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Paciente</label>
								<div class="col-sm-10">
									<select class="js-example-basic-single form-control form-control-sm pacientes" name="paciente">									
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Adherente/Obs</label>
								<div class="col-sm-10">
									<textarea class="form-control form-control-sm adherentes" rows="3" id="comment" name="adherente"></textarea>
								</div>			
							</div>
						</fieldset>
					</form>
				</div>                    
				<div class="datosEspecificos">
					<fieldset>
						<legend>
							Datos Específicos
						</legend>
					</fieldset>
				</div>
				<div class="dientes">
					<div class="row">
						<div class="col-md-6 col-xs-6 text-xs-right">
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="18">18
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="17">17
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="16">16
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="15">15
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="14">14
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="13">13
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="12">12
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="11">11
						</div>
						<div class="col-md-6 col-xs-6 text-xs-left">
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="21">21
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="22">22
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="23">23
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="24">24
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="25">25
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="26">26
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="27">27
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="28">28
						</div>
					</div><br>
					<div class="row">
						<div class="col-md-6 col-xs-6 text-xs-right">
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="55">55
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="54">54
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="53">53
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="52">52
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="51">51
						</div>
						<div class="col-md-6 col-xs-6 text-xs-left">
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="61">61
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="62">62
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="63">63
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="64">64
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="65">65
						</div>	
					</div><br>
					<div class="row">
						<div class="col-md-6 col-xs-6 text-xs-right">
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="85">85
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="84">84
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="83">83
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="82">82
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="81">81
						</div>
						<div class="col-md-6 col-xs-6 text-xs-left">
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="71">71
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="72">72
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="73">73
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="74">74
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="75">75
						</div>
					</div><br>
					<div class="row">
						<div class="col-md-6 col-xs-6 text-xs-right">
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="48">48
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="47">47
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="46">46
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="45">45
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="44">44
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="43">43
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="42">42
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="41">41
						</div>
						<div class="col-md-6 col-xs-6 text-xs-left">
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="31">31
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="32">32
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="33">33
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="34">34
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="35">35
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="36">36
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="37">37
							<img src="assets/images/dienteSinFondo32x32.svg" onClick="selectDiente(this);" id="38">38
						</div>
					</div>
				</div>
				<br>			
				<div class="especificosFijas">
					<form class="form-horizontal">
						<div class="form-group row">
							<label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">N° Apoyos</label>
							<div class="col-sm-4">
								<input type="text" class="nApoyos" name="nApoyos">
							</div>
							<label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Piezas Apoyos</label>
							<div class="col-sm-4">
								<input type="text" class="pApoyos" name="pApoyos">
							</div>
						</div>
						<div class="form-group row">
							<label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Singulares</label>
							<div class="col-sm-4">
								<input type="text" class="singulares" name="singulares">
							</div>
							<label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Plurales</label>
							<div class="col-sm-4">
								<input type="text" class="plurales" name="plurales">
							</div>
						</div>
						<div class="form-group row">
							<label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Color</label>
							<div class="col-sm-4">
								<input type="text" class="color" name="color">
							</div>							
						</div>
					</form>
				</div>
				<div class="especificasColados">
					<form class="form-horizontal">
						<div class="form-group row">
							<label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Metal</label>
							<div class="col-sm-4">
								<select class="js-example-basic-single form-control form-control-sm metal" name="metal"></select>
							</div>
							<label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Peso (grs.)</label>
							<div class="col-sm-4">
								<input type="text" class="peso" name="peso">
							</div>
						</div>						
					</form>
				</div>
				<div class="especificasRemovibles">
					<form class="form-horizontal">
						<div class="form-group row">
							<label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">N° Cromos</label>
							<div class="col-sm-4">
								<input type="text" class="cromos" name="cromos">
							</div>
						</div>
						<div class="form-group row">

							<label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">P. Superior</label>
							<div class="col-sm-4">
								<input type="text" class="pSuperior" name="pSuperior">
							</div>
							<label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">P. Inferior</label>
							<div class="col-sm-4">
								<input type="text" class="pInferior" name="pInferior">
							</div>							
						</div>
					</div>
				</form>
				<br>
				<div class="detalleTrabajo">
					<fieldset>
						<legend>
							plan de Trabajo <button class="btn btn-success Nuevotrabajo" data-toggle="modal" data-target="#modal_trabajo">nuevo <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
						</legend>
						<div class="table-responsive">
							<table class="table table-hover table-sm trabajos">
								<thead class="thead-inverse">
									<tr>
										<td>
											Ejecutor
										</td>
										<td>
											Trabajo
										</td>
										<td>
											Recepción
										</td>
										<td>
											Entrega
										</td>
										<td>
											Cantidad
										</td>
										<td>
											Valor
										</td>
										<td>
											Estado
										</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											1
										</td>
										<td>
											Yeso
										</td>
										<td>
											12/12/12
										</td>
										<td>
											30/30/30
										</td>
										<td>
											1
										</td>
										<td>
											25000
										</td>
										<td>
											entregado
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</fieldset>
				</div>				
			</div>
			<div class="modal-footer footer-orden">
				<button type="button" id="btnSave" onclick="guardarOrden();" class="btn btn-primary">Guardar</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
