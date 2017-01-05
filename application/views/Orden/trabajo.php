	<!-- Bootstrap modal -->
	<div class="modal fade modal_trabajo" id="modal_trabajo" role="dialog" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close cancelar_trabajo" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h3 class="modal-title">Asignación trabajo</h3>
				</div>
				<div class="modal-body">  
					<form class="form-horizontal">
						<div class="form-group row">
							<label for="smFormGroupTrabajo" class="col-sm-2 col-form-label">Ejecutor</label>
							<div class="col-sm-4">
								<select class="js-example-basic-single form-control form-control-sm ejecutores">									
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="smFormGroupTrabajo" class="col-sm-2 col-form-label col-form-label-sm">Recepción</label>
							<div class="col-sm-2 date">				
								<div class="input-group input-append date" id="recepcionTrabajo">
									<input type="text" class="form-control form-control-sm" name="date" />
									<span class="input-group-addon add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>					
								</div>
							</div>						
						</div>	
						<div class="form-group row">
							<label for="smFormGroupTrabajo" class="col-sm-2 col-form-label col-form-label-sm">Entrega</label>
							<div class="col-sm-2 date">				
								<div class="input-group input-append date" id="entregaTrabajo">
									<input type="text" class="form-control form-control-sm" name="date" />
									<span class="input-group-addon add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>					
								</div>
							</div>						
						</div>
						<div class="form-group row">
							<label for="smFormGroupTrabajo" class="col-sm-2 col-form-label">Labor</label>
							<div class="col-sm-4">
								<select class="js-example-basic-single form-control form-control-sm">									
								</select>
							</div>
						</div>	
					</form>
				</div>
				<div class="modal-footer footer-orden">
					<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Guardar</button>
					<button type="button" class="btn btn-danger cancelarTrabajo" data-dismiss="modal">Cancelar</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- End Bootstrap modal -->


