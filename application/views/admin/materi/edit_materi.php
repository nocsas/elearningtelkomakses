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
                            <li class="breadcrumb-item active">Edit Materi</li>
                        </ol>
						
                        <?php if ($this->session->flashdata('success_update')): ?>
				        <div class="alert alert-success" role="alert">
					        <?php echo $this->session->flashdata('success_update'); ?>
				        </div>
				        <?php endif; ?>

				        <!-- Card  -->
				        <div class="card mb-4">
					        <div class="card-header">
                                <a href="<?php echo site_url('materi') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					    </div>
					    <div class="card-body">

					        <form action="" method="post" enctype="multipart/form-data">
						        <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							    oleh controller tempat vuew ini digunakan. Yakni index.php/admin/divisi/edit/ID --->
                                    
                                    <input type="hidden" name="id_file" value="<?php echo $materi->id_file?>" />

							        <div class="form-group">
								        <label for="judul">Judul</label>
								        <input class="form-control <?php echo form_error('judul') ? 'is-invalid':'' ?>"
								        type="text" name="judul" value="<?php echo $materi->judul ?>" />
							        </div>

                                    <div class="form-group">
								        <label for="id_div">Divisi</label>
                                        <select class="form-control" name="id_div" >
                                            <option >
									            <?php echo $materi->id_div ?>
									        </option>
                                            
                                            <?php foreach($divisi as $divisi){?>
                  					            <option value="<?php echo $divisi->id_div ?>">
									                <?php echo $divisi->id_div ?>
									            </option>
                                            <?php }?>
                  				        </select>
							        </div>

							        <div class="form-group">
								        <label for="id_tim">Tim</label>
                    			        <select class="form-control" name="id_tim">
                                            <option >
									            <?php echo $materi->id_tim ?>
									        </option>
                  				            <?php foreach($tim as $tim){?>
                  					            <option value="<?php echo $tim->id_tim ?>">
									                <?php echo $tim->id_tim ?> 
									            </option>
									        <?php }?>
                  				        </select>
							        </div>


                                    <div class="form-group">
								        <label >File</label>
										<input type="hidden" name="old_file" value="<?php echo $materi->file ?>" />
										<input class="form-control <?php echo form_error('file') ? 'is-invalid':'' ?>"
										type="file" name="file" />
										<label for="ketgam2" style="color:red;font-size:13px">File harus di isi dengan extention pdf, docx, doc</label>
							        </div>

                                    <input type="hidden" name="tgl_posting" value="<?php echo date("d-m-Y"); ?>">

                                    <input type="hidden" name="pembuat" value="<?php echo $materi->pembuat ?>">

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