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
                        <h1 class="mt-4">Manajemen Topik Quiz</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Topik Quiz</li>
                        </ol>

                        <?php if ($this->session->flashdata('success_delete')): ?>
				        <div class="alert alert-success" role="alert">
					        <?php echo $this->session->flashdata('success_delete'); ?>
				        </div>
				        <?php endif; ?>

                        <!-- DataTables -->
				        <div class="card mb-4">
                            <div class="card-header">
						        
					        </div>
					        <div class="card-body">
						        <div class="table-responsive">
							        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
									        <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Tgl Buat</th>
                                                <th>Pembuat</th>
                                                <th>Batas Mengerjakan</th>
                                                <th>Info</th>
										        <th>Action</th>
									        </tr>
								        </thead>
								        <tbody>
                                            <?php $no = 1; foreach($topik_quiz as $topik_quiz): ?>
                                            <?php if($topik_quiz->terbit == "Y"  && $topik_quiz->batas_mengerjakan > date("Y-m-d") ) { ?>
									        <tr>
										        <td width="50">
                                                    <?php echo $no++ ?>
                                                </td>
                                                <td>
											        <?php echo $topik_quiz->judul ?>
										        </td>
                                                <td>
											        <?php echo $topik_quiz->tgl_buat ?>
										        </td>
                                                <td>
											        <?php echo $topik_quiz->pembuat ?>
										        </td>
										        <td>
											        <?php echo $topik_quiz->batas_mengerjakan  ?>
										        </td>
										        <td>
											        <?php echo $topik_quiz->info ?>
										        </td>

										        <td width="250">
                                                    <a href="<?php echo site_url('admin/quiz/soal/'.$topik_quiz->id_tq) ?>"
                                                        class="btn btn-small"><i class="fas fa-edit"></i> Kerjakan Soal</a>

                                                    <a href="<?php echo site_url('admin/nilai/hasil/'.$topik_quiz->id_tq) ?>"
                                                        class="btn btn-small"><i class="fas fa-edit"></i> Hasil</a>
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