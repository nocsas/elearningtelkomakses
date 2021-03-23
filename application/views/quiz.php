<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view("_partials/head.php") ?>
    </head>
    <body class="sb-nav-fixed">
        <?php $this->load->view("_partials/navbar.php") ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php $this->load->view("_partials/sidebar.php") ?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Quiz</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Quiz</li>
                        </ol>

                        <?php if ($this->session->flashdata('success_delete')): ?>
				        <div class="alert alert-success" role="alert">
					        <?php echo $this->session->flashdata('success_delete'); ?>
				        </div>
                        <?php endif; ?>

                        
                        

                        <dl>
                            <dt><label>JUDUL             : <span style="color:red"><?php echo $topik_quiz->judul ?></span></label></dt> 
                            <dt><label>PEMBUAT           : <span style="color:red"><?php echo $topik_quiz->pembuat ?></span></label></dt>
                            <dt><label>BATAS MENGERJAKAN : <span style="color:red"><?php echo $topik_quiz->batas_mengerjakan  ?></span></label></dt>
                        </dl>
                                     
                        


                        <!-- DataTables -->
				        <div class="card mb-4">

                            <div class="card-header">
						        <a href="<?php echo site_url('topik_quiz') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					        </div>
					        <div class="card-body">
                                    <form action="<?php echo site_url('admin/nilai/add/'.$topik_quiz->id_tq) ?>" method="post" enctype="multipart/form-data" >

                                            
                                            <input type="hidden" name="nik" value="<?php echo $this->session->userdata('nik'); ?>" >

                                            <?php $no = 1; foreach($quiz as $quiz): ?>
									        
                                                <div class="form-group">
                                                    <label><?php echo $no++ ?>. <?php echo $quiz->pertanyaan ?> </label>
                                                    <?php if($quiz->gambar != "default.jpg") { ?>
                                                    <div>
										                <td>
                                                            <img src="<?php echo base_url('upload/gambar/'.$quiz->gambar) ?>" width="500" />
                                                        </td>
                                                    </div>
                                                    <?php } ?>
                                                    <div>
                                                        <div class="radio-inline"> <input type="radio" name="<?php echo $quiz->id_quiz; ?>" value="A"> A. <?php echo $quiz->pil_a ?></div>
                                                        <div class="radio-inline"> <input type="radio" name="<?php echo $quiz->id_quiz; ?>" value="B"> B. <?php echo $quiz->pil_b ?></div>
                                                        <div class="radio-inline"> <input type="radio" name="<?php echo $quiz->id_quiz; ?>" value="C"> C. <?php echo $quiz->pil_c ?></div>
                                                        <div class="radio-inline"> <input type="radio" name="<?php echo $quiz->id_quiz; ?>" value="D"> D. <?php echo $quiz->pil_d ?></div>
                                                    </div>
                                                </div>
									        
									        <?php endforeach;?>

                                            <input type="hidden" name="id_tq" value="<?php echo $quiz->id_tq; ?>" >
                                            <input type="hidden" name="waktu_mengerjakan" value="<?php echo date("d-m-Y"); ?>">

                                            <input class="btn btn-success" type="submit" name="btn" value="simpan" >

						            </form> 
					        </div>
				        </div>
                    </div>
                </main>
                <?php $this->load->view("_partials/footer.php") ?>
            </div>
        </div>
        <?php $this->load->view("_partials/scrolltop.php") ?>
        <?php $this->load->view("_partials/modal.php") ?>
        <?php $this->load->view("_partials/js.php") ?>
    </body>
</html>