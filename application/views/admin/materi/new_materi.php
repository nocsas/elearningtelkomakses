<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view("admin/_partials/head.php") ?>
    </head>
    <body class="sb-nav-fixed">
        <?php $this->load->view("admin/_partials/navbar.php") ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php $this->load->view("admin/_partials/sidebar.php") ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Manajemen Materi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Materi</li>
                            <li class="breadcrumb-item active">New Materi</li>
                        </ol>
						
                        <?php if ($this->session->flashdata('success_simpan')): ?>
				        <div class="alert alert-success" role="alert">
					        <?php echo $this->session->flashdata('success_simpan'); ?>
				        </div>
				        <?php endif; ?>

				        <div class="card mb-4">
					        <div class="card-header">
						        <a href="<?php echo site_url('materi') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					        </div>
					    <div class="card-body">

						<form action="<?php echo site_url('materi/add') ?>" method="post" enctype="multipart/form-data" >
                        	<div class="form-group">
								<label for="judul">Judul</label>
								<input class="form-control <?php echo form_error('judul') ? 'is-invalid':'' ?>"
								 type="text" name="judul" min="0" placeholder="Judul" />
								<div class="invalid-feedback">
									<?php echo form_error('judul') ?>
								</div>
							</div>

							<div class="form-group">
								<label>Divisi</label>
                    			<select class="form-control" name="id_div">
									<option value=""></option>
                  					<?php foreach($divisi as $divisi){?>
                  					<option value="<?php echo $divisi->id_div ?>">
									  <?php echo $divisi->id_div ?> 
									  <?php }?>
									</option>
                  				</select>
							</div>

							<div class="form-group">
								<label>Tim</label>
                    			<select class="form-control" name="id_tim">
									<option value=""></option>
                  					<?php foreach($tim as $tim){?>
                  					<option value="<?php echo $tim->id_tim ?>">
									  <?php echo $tim->id_tim ?> 
									  <?php }?>
									</option>
                  				</select>
							</div>

							<div class="form-group">
								<label for="file">File</label>
								<input class="form-control <?php echo form_error('file') ? 'is-invalid':'' ?>"
								 type="file" name="file" min="0" />
								<label for="ketgam2" style="color:red;font-size:13px">File harus di isi dengan extention pdf, docx, doc</label>
								<div class="invalid-feedback">
									<?php echo form_error('file') ?>
								</div>
							</div>

							<input type="hidden" name="tgl_posting" value="<?php echo date("d-m-Y"); ?>">

							<div class="form-group">
								<input class="form-control <?php echo form_error('pembuat') ? 'is-invalid':'' ?>"
								 type="hidden" name="pembuat" min="0" placeholder="pembuat" value="<?php echo $this->session->userdata('nama_lengkap');?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('pembuat') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						
					</div>

                </main>
                <?php $this->load->view("admin/_partials/footer.php") ?>
            </div>
        </div>
        <?php $this->load->view("admin/_partials/scrolltop.php") ?>
        <?php $this->load->view("admin/_partials/modal.php") ?>
        <?php $this->load->view("admin/_partials/js.php") ?>
    </body>
</html>