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
                        <h1 class="mt-4">Manajemen Divisi</h1>
                        <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
						
                        <?php if ($this->session->flashdata('success_update')): ?>
				        <div class="alert alert-success" role="alert">
					        <?php echo $this->session->flashdata('success_update'); ?>
				        </div>
				        <?php endif; ?>

				        <!-- Card  -->
				        <div class="card mb-4">
					        <div class="card-header">
                                <a href="<?php echo site_url('admin/divisi') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					    </div>
					    <div class="card-body">

					        <form action="" method="post" enctype="multipart/form-data">
						        <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							    oleh controller tempat vuew ini digunakan. Yakni index.php/admin/divisi/edit/ID --->

							        <div class="form-group">
								        <label for="id_div">Id Divisi</label>
										<input type="hidden" name="id_div" value="<?php echo $divisi->id_div?>" />
								        <input class="form-control <?php echo form_error('id_div') ? 'is-invalid':'' ?>"
								        type="text" name="id_div" placeholder="Id Divisi" disabled value="<?php echo $divisi->id_div ?>" />
							        </div>

							        <div class="form-group">
								        <label for="nama">Nama Divisi</label>
								        <input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								         type="text" name="nama" min="0" placeholder="Nama Divisi" value="<?php echo $divisi->nama ?>" />
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