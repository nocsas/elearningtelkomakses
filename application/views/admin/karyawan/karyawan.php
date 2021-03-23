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
                        <h1 class="mt-4">Manajemen Karyawan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Karyawan</li>
                        </ol>

						<?php if ($this->session->flashdata('success_delete')): ?>
				        <div class="alert alert-success" role="alert">
					        <?php echo $this->session->flashdata('success_delete'); ?>
				        </div>
				        <?php endif; ?>

                        <!-- DataTables -->
				        <div class="card mb-4">
                            <div class="card-header">
						        <a href="<?php echo site_url('karyawan/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					        </div>
					        <div class="card-body">
						        <div class="table-responsive">
							        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								        <thead>
									        <tr>
												<th>No</th>
										        <th>Nik</th>
										        <th>Nama</th>
												<th>Id Divisi</th>
												<th>Id Tim</th>
										        <th>Jabatan</th>
										        <th>Action</th>
									        </tr>
								        </thead>
								        <tbody>
									        <?php $no = 1; foreach ($karyawan as $karyawan): ?>
									        <tr>
										        <td width="50">
													<?php echo $no++ ?>
												</td>
										        <td>
											        <?php echo $karyawan->nik ?>
										        </td>
										        <td>
											        <?php echo $karyawan->nama_lengkap ?>
										        </td>
										        <td>
											        <?php echo $karyawan->id_div ?>
										        </td>
										        <td>
											        <?php echo $karyawan->id_tim ?>
										        </td>
										        <td>
											        <?php echo $karyawan->jabatan ?>
										        </td>
										        <td width="250">
											        <a href="<?php echo site_url('admin/karyawan/edit/'.$karyawan->nik) ?>"
											        class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											        <a onclick="deleteConfirm('<?php echo site_url('admin/karyawan/delete/'.$karyawan->nik) ?>')"
    												href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										        </td>
									        </tr>
									        <?php endforeach; ?>
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