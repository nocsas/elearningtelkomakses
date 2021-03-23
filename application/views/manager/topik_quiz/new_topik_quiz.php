<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view("manager/_partials/head.php") ?>
    </head>
    <body class="sb-nav-fixed">
        <?php $this->load->view("manager/_partials/navbar.php") ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php $this->load->view("manager/_partials/sidebar.php") ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Manajemen Topik Quiz</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Topik Quiz</li>
                            <li class="breadcrumb-item active">New Topik Quiz</li>
                        </ol>
						
                        <?php if ($this->session->flashdata('success_simpan')): ?>
				        <div class="alert alert-success" role="alert">
					        <?php echo $this->session->flashdata('success_simpan'); ?>
				        </div>
				        <?php endif; ?>

				        <div class="card mb-4">
					        <div class="card-header">
						        <a href="<?php echo site_url('topik_quiz') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					        </div>
					    <div class="card-body">

						<form action="<?php echo site_url('topik_quiz/add') ?>" method="post" enctype="multipart/form-data" >
                        
                            <div class="form-group">
								<label for="judul">Judul</label>
								<input class="form-control <?php echo form_error('judul') ? 'is-invalid':'' ?>"
								 type="text" name="judul" min="0" placeholder="judul" />
								<div class="invalid-feedback">
									<?php echo form_error('judul') ?>
								</div>
							</div>

                            <div class="form-group">
								<label for="id_div">Id Divisi</label>
                                <input type="hidden" name="id_div" value="<?php echo $this->session->userdata('id_div') ?>">
								<input class="form-control <?php echo form_error('id_div') ? 'is-invalid':'' ?>"
								 type="text" name="id_div" disabled value="<?php echo $this->session->userdata('id_div') ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('id_div') ?>
								</div>
							</div>

                            <div class="form-group">
								<label for="id_tim">Tim</label>
                    			<select class="form-control" name="id_tim">
                                    <option value=""></option>
                  					<?php foreach($tim as $tim){?>
                  					<option value="<?php echo $tim->id_tim ?>">
									  <?php echo $tim->id_tim ?> 
									</option>
									<?php }?>
                  				</select>
							</div>

							<input type="hidden" name="tgl_buat" value="<?php echo date("d-m-Y"); ?>">

							<input type="hidden" name="pembuat" value="<?php echo $this->session->userdata('nama_lengkap'); ?>">

							<div class="form-group">
								<label for="batas_mengerjakan">Batas Mengerjakan</label>
								<input class="form-control <?php echo form_error('batas_mengerjakan') ? 'is-invalid':'' ?>"
								 type="date" name="batas_mengerjakan" min="0" placeholder="Batas Mengerjakan " />
								<div class="invalid-feedback">
									<?php echo form_error('batas_mengerjakan') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="info">Info</label>
								<input class="form-control <?php echo form_error('info') ? 'is-invalid':'' ?>"
								 type="text" name="info" min="0" placeholder="Info" />
								<div class="invalid-feedback">
									<?php echo form_error('info') ?>
								</div>
							</div>

                            <div class="form-group">
                                <label for="terbit">Terbit</label>
                                <div>
                                    <label><input type="radio" name="terbit" value="Y"> Yes</label>
                                    <label><input type="radio" name="terbit" value="N"> No</label>
                                </div>
                            </div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						
					</div>

                </main>
                <?php $this->load->view("manager/_partials/footer.php") ?>
            </div>
        </div>
        <?php $this->load->view("manager/_partials/scrolltop.php") ?>
        <?php $this->load->view("manager/_partials/modal.php") ?>
        <?php $this->load->view("manager/_partials/js.php") ?>
    </body>
</html>