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
                        <h1 class="mt-4">Manajemen Topik Quiz</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Topik Quiz</li>
                            <li class="breadcrumb-item active">Edit Topik Quiz</li>
                        </ol>
						
                        <?php if ($this->session->flashdata('success_update')): ?>
				        <div class="alert alert-success" role="alert">
					        <?php echo $this->session->flashdata('success_update'); ?>
				        </div>
				        <?php endif; ?>

				        <!-- Card  -->
				        <div class="card mb-4">
					        <div class="card-header">
                                <a href="<?php echo site_url('topik_quiz') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					    </div>
					    <div class="card-body">

					        <form action="" method="post" enctype="multipart/form-data">
						        <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							    oleh controller tempat vuew ini digunakan. Yakni index.php/admin/divisi/edit/ID --->
                                    
                                    <input type="hidden" name="id_tq" value="<?php echo $topik_quiz->id_tq?>" />

							        <div class="form-group">
								        <label for="judul">Judul</label>
								        <input class="form-control <?php echo form_error('judul') ? 'is-invalid':'' ?>"
								        type="text" name="judul" value="<?php echo $topik_quiz->judul ?>" />
							        </div>

                                    <div class="form-group">
								        <label for="id_div">Divisi</label>
                                        <select class="form-control" name="id_div" >
                                            <option value="<?php echo $topik_quiz->id_div ?>"><?php echo $topik_quiz->id_div ?></option>
											<option value=""></option>
                                            <?php foreach($divisi as $divisi){?>
                  					            <option value="<?php echo $divisi->id_div ?>">
									                <?php echo $divisi->id_div ?>
									            </option>
                                            <?php }?>
                  				        </select>
							        </div>

                                    <div class="form-group">
								        <label for="id_tim">Tim</label>
                                        <select class="form-control" name="id_tim" >
											<option value="<?php echo $topik_quiz->id_tim ?>"><?php echo $topik_quiz->id_tim ?></option>
                                            <option value=""></option>
                                            <?php foreach($tim as $tim){?>
                  					            <option value="<?php echo $tim->id_tim ?>">
									                <?php echo $tim->id_tim ?>
									            </option>
                                            <?php }?>
                  				        </select>
							        </div>

                                    <input type="hidden" name="tgl_buat" value="<?php echo date("d-m-Y"); ?>">

                                    <input type="hidden" name="pembuat" value="<?php echo $topik_quiz->pembuat ?>">
                                    
							        <div class="form-group">
								        <label for="batas_mengerjakan">Waktu Mengerjakan</label>
								        <input class="form-control <?php echo form_error('batas_mengerjakan') ? 'is-invalid':'' ?>"
								            type="date" name="batas_mengerjakan" min="0" value="<?php echo $topik_quiz->batas_mengerjakan ?>" />
								        <div class="invalid-feedback">
									        <?php echo form_error('batas_mengerjakan') ?>
								        </div>
							        </div>

							        <div class="form-group">
								        <label for="info">Info</label>
								        <input class="form-control <?php echo form_error('info') ? 'is-invalid':'' ?>"
								            type="text" name="info" min="0" value="<?php echo $topik_quiz->info ?>" />
								        <div class="invalid-feedback">
									        <?php echo form_error('info') ?>
								        </div>
							        </div>

                                    <div class="form-group">
                                        <label for="terbit">Terbit</label>
                                        <div>
                                            <label><input type="radio" name="terbit" value="Y" <?php if($topik_quiz->terbit == 'Y'){echo "checked";}?>> YES</label>
                                            <label><input type="radio" name="terbit" value="N" <?php if($topik_quiz->terbit == 'N'){echo "checked";}?>> No</label>
                                        </div>
                                    </div>

							        <input class="btn btn-success" type="submit" name="btn" value="Save" />
						        </form>

					        </div>

					    <div class="card-footer small text-muted">
						    
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