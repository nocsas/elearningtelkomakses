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

                        <?php if ($this->session->flashdata('success_delete')): ?>
				        <div class="alert alert-success" role="alert">
					        <?php echo $this->session->flashdata('success_delete'); ?>
				        </div>
				        <?php endif; ?>

                        <!-- DataTables -->
				        <div class="card mb-4">
                            <div class="card-header">
						        <a href="<?php echo site_url('admin/tim/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					        </div>
					        <div class="card-body">
						        <div class="table-responsive">
							        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								        <thead>
									        <tr>
                                                <th>No</th>
										        <th>Id Tim</th>
                                                <th>Id Divisi</th>
										        <th>Nama</th>
										        <th>Action</th>
									        </tr>
								        </thead>
								        <tbody>
                                            <?php $no = 1; foreach ($tim as $tim): ?>
									        <tr>
										        <td width="50">
                                                    <?php echo $no++ ?>
                                                </td>
                                                <td>
											        <?php echo $tim->id_tim ?>
										        </td>
                                                <td>
											        <?php echo $tim->id_div ?>
										        </td>
										        <td>
											        <?php echo $tim->nama ?>
										        </td>
										        <td width="250">
											        <a href="<?php echo site_url('admin/tim/edit/'.$tim->id_tim) ?>"
											        class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											        <a href="<?php echo site_url('admin/tim/delete/'.$tim->id_tim) ?>"
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
    </body>
</html>