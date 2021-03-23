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
                        <h1 class="mt-4">Manajemen Quiz</h1>
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
                                    <dt><label>BATAS MENGERJAKAN : <span style="color:red"><?php echo $topik_quiz->batas_mengerjakan ?></span></label></dt>
                                    </dl>
                        


                        <!-- DataTables -->
				        <div class="card mb-4">

                            <div class="card-header">
						        <a href="<?php echo site_url('admin/quiz/add/'.$topik_quiz->id_tq) ?>"><i class="fas fa-plus"></i> Add New</a>
					        </div>
					        <div class="card-body">
						        <div class="table-responsive">
							        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
									        <tr>
                                                <th>No</th>
                                                <th>Pertanyaan</th>
										        <th>Gambar</th>
										        <th>Pil A</th>
                                                <th>Pil B</th>
                                                <th>Pil C</th>
                                                <th>Pil D</th>
                                                <th>Kunci</th>
                                                <th>Tgl Buat</th>
										        <th>Action</th>
									        </tr>
								        </thead>
								        <tbody>
                                            <?php $no = 1; foreach($quiz as $quiz): ?>
									        <tr>
										        <td width="50">
                                                    <?php echo $no++ ?>
                                                </td>

										        <td>
                                                    <?php echo $quiz->pertanyaan ?>
                                                </td>

										        <td>
                                                    <img src="<?php echo base_url('upload/gambar/'.$quiz->gambar) ?>" width="64" />
                                                </td>

										        <td>
                                                    <?php echo $quiz->pil_a ?>
                                                </td>

										        <td>
                                                    <?php echo $quiz->pil_b ?>
                                                </td>

										        <td>
                                                    <?php echo $quiz->pil_c ?>
                                                </td>

										        <td>
                                                    <?php echo $quiz->pil_d ?>
                                                </td>

										        <td>
                                                    <?php echo $quiz->kunci ?>
                                                </td>

										        <td>
                                                    <?php echo $quiz->tgl_buat ?>
                                                </td>

										        <td width="250">
											        <a href="<?php echo site_url('admin/quiz/edit/'.$quiz->id_quiz) ?>"
											        class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											        <a onclick="deleteConfirm('<?php echo site_url('admin/quiz/delete/'.$quiz->id_quiz) ?>')"
    												href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										        </td>
									        </tr>
									        <?php endforeach;?>
								        </tbody>
							        </table>
						        </div>
					        </div>
				        </div>
                    </div>
                </main>
                <?php $this->load->view("admin/_partials/footer.php") ?>
            </div>
        </div>
        <?php $this->load->view("admin/_partials/scrolltop.php") ?>
        <?php $this->load->view("admin/_partials/modal.php") ?>
        <?php $this->load->view("admin/_partials/js.php") ?>
		<script>
			function deleteConfirm(url){
				$('#btn-delete').attr('href', url);
				$('#deleteModal').modal();
			}
		</script>
    </body>
</html>