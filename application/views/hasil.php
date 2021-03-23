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
                        <h1 class="mt-4">Hasil Quiz</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">hasil</li>
                        </ol>

                        <?php if ($this->session->flashdata('success_delete')): ?>
				        <div class="alert alert-success" role="alert">
					        <?php echo $this->session->flashdata('success_delete'); ?>
				        </div>
                        <?php endif; ?>

                        
                        

                                    <dl>
                                    <dt><label>JUDUL             : <span style="color:red"><?php echo $topik_quiz->judul ?></span></label></dt> 
                                    <dt><label>PEMBUAT           : <span style="color:red"><?php echo $topik_quiz->pembuat ?></span></label></dt>
                                    <dt><label>BATAS MENGERJAKAN : <span style="color:red"><?php echo $topik_quiz->batas_mengerjakan ?></span></label></dt>
                                    </dl>
                        


                        <!-- DataTables -->
				        <div class="card mb-4">

                            <div class="card-header">
                                <a href="<?php echo site_url('topik_quiz') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					        </div>
					        <div class="card-body">
						        <div class="table-responsive">
							        <table class="table table-hover"  width="100%" cellspacing="0">
                                        <thead>
									        <tr>
                                                <th>No</th>
                                                <th>Nik</th>
										        <th>Benar</th>
										        <th>Salah</th>
                                                <th>Tanggal</th>
                                                <th>Nilai</th>
									        </tr>
								        </thead>
								        <tbody>
                                            <?php $no = 1; foreach($nilai as $nilai): ?>
                                            <?php if($nilai->nik == $this->session->userdata('nik')) { ?>
									        <tr>
										        <td width="50">
                                                    <?php echo $no++ ?>
                                                </td>

										        <td>
                                                    <?php echo $nilai->nik ?>
                                                </td>

										        <td>
                                                    <?php echo $nilai->benar ?>
                                                </td>

										        <td>
                                                    <?php echo $nilai->salah ?>
                                                </td>

										        <td>
                                                    <?php echo $nilai->waktu_mengerjakan ?>
                                                </td>

										        <td>
                                                    <?php echo $nilai->nilai ?>
                                                </td>
									        </tr>
                                            <?php } ?>
									        <?php endforeach;?>
								        </tbody>
							        </table>
						        </div>
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