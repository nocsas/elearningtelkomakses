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
                        <h1 class="mt-4">Manajemen Materi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Quiz</li>
                            <li class="breadcrumb-item active">Edit Quiz</li>
                        </ol>
						
                        <?php if ($this->session->flashdata('success_update')): ?>
				        <div class="alert alert-success" role="alert">
					        <?php echo $this->session->flashdata('success_update'); ?>
				        </div>
				        <?php endif; ?>

				        <!-- Card  -->
				        <div class="card mb-4">
					        <div class="card-header">
                                <a href="<?php echo site_url('admin/quiz/soal/'.$quiz->id_tq) ?>"><i class="fas fa-arrow-left"></i> Back</a>
					    </div>
					    <div class="card-body">

					        <form action="" method="post" enctype="multipart/form-data">
						        <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							    oleh controller tempat vuew ini digunakan. Yakni index.php/admin/divisi/edit/ID --->
                                    
                                    <input type="hidden" name="id_quiz" value="<?php echo $quiz->id_quiz?>" />

							        <input type="hidden" name="id_tq" value="<?php echo $quiz->id_tq ?>">

                                    <div class="form-group">
								        <label for="pertanyaan">Pertanyaan</label>
                                        <textarea class="form-control <?php echo form_error('pertanyaan') ? 'is-invalid':'' ?>" type="text" name="pertanyaan" rows="3" ><?php echo $quiz->pertanyaan ?></textarea>
								        <div class="invalid-feedback">
									        <?php echo form_error('pertanyaan') ?>
								        </div>
							        </div>

							        <div class="form-group">
								        <label for="gambar">Gambar</label>
										<input class="form-control" type="file" name="gambar" min="0" />
								<label for="ketgam" style="color:red;font-size:13px">JIka tidak ada gambar form bisa dikosongkan</label>
								<label for="ketgam2" style="color:red;font-size:13px">File yang diijinkan jpg, png</label>
							        </div>

                                    <div class="form-group">
								        <label for="pil_a">Pilihan A</label>
                                        <textarea class="form-control <?php echo form_error('pil_a') ? 'is-invalid':'' ?>" type="text" name="pil_a" rows="2" ><?php echo $quiz->pil_a ?></textarea>
								        <div class="invalid-feedback">
									        <?php echo form_error('pil_a') ?>
								        </div>
							        </div>

                                    <div class="form-group">
								        <label for="pil_b">Pilihan B</label>
                                        <textarea class="form-control <?php echo form_error('pil_b') ? 'is-invalid':'' ?>" type="text" name="pil_b" rows="2" ><?php echo $quiz->pil_b ?></textarea>
								        <div class="invalid-feedback">
									        <?php echo form_error('pil_b') ?>
								        </div>
							        </div>

                                    <div class="form-group">
								        <label for="pil_c">Pilihan C</label>
                                        <textarea class="form-control <?php echo form_error('pil_c') ? 'is-invalid':'' ?>" type="text" name="pil_c" rows="2" ><?php echo $quiz->pil_c ?></textarea>
								        <div class="invalid-feedback">
									        <?php echo form_error('pil_c') ?>
								        </div>
							        </div>

                                    <div class="form-group">
								        <label for="pil_d">Pilihan D</label>
                                        <textarea class="form-control <?php echo form_error('pil_d') ? 'is-invalid':'' ?>" type="text" name="pil_d" rows="2" ><?php echo $quiz->pil_d ?></textarea>
								        <div class="invalid-feedback">
									        <?php echo form_error('pil_d') ?>
								        </div>
							        </div>

                                    <div class="form-group">
                                        <label for="kunci">Kunci Jawaban</label>
                                        <div>
                                            <label><input type="radio" name="kunci" value="A" <?php if($quiz->kunci == 'A'){echo "checked";}?>> A</label>
                                            <label><input type="radio" name="kunci" value="B" <?php if($quiz->kunci == 'B'){echo "checked";}?>> B</label>
                                            <label><input type="radio" name="kunci" value="C" <?php if($quiz->kunci == 'C'){echo "checked";}?>> C</label>
                                            <label><input type="radio" name="kunci" value="D" <?php if($quiz->kunci == 'D'){echo "checked";}?>> D</label>
                                        </div>
                                    </div>

							        <input type="hidden" name="tgl_buat" value="<?php echo date("d-m-Y"); ?>">

							        <input class="btn btn-success" type="submit" name="btn" value="Save" />
						        </form>

					        </div>

					    <div class="card-footer small text-muted">
						    
					    </div>
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