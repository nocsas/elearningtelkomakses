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
                        <h1 class="mt-4">Manajemen Tim</h1>
                        <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
						
                        <?php if ($this->session->flashdata('success_simpan')): ?>
				        <div class="alert alert-success" role="alert">
					        <?php echo $this->session->flashdata('success_simpan'); ?>
				        </div>
				        <?php endif; ?>

				        <div class="card mb-4">
					        <div class="card-header">
						        <a href="<?php echo site_url('admin/tim') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					        </div>
					    <div class="card-body">

						<form action="<?php echo site_url('admin/tim/add') ?>" method="post" enctype="multipart/form-data" >
                        <div class="form-group">
								<label for="id_tim">Id Tim</label>
								<input class="form-control <?php echo form_error('id_tim') ? 'is-invalid':'' ?>"
								 type="text" name="id_tim" min="0" placeholder="Id Tim" />
								<div class="invalid-feedback">
									<?php echo form_error('id_tim') ?>
								</div>
							</div>

							<div class="form-group">
								<label>Divisi</label>
                    			<select class="form-control" name="id_div">
                  					<?php foreach($divisi as $divisi){?>
                  					<option value="<?php echo $divisi->id_div ?>">
									  <?php echo $divisi->nama ?> 
									  <?php }?>
									</option>
                  				</select>
							</div>

							<div class="form-group">
								<label for="nama">Nama</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama" min="0" placeholder="Nama Tim" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
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