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
                        <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
						
                        <?php if ($this->session->flashdata('success_simpan')): ?>
				        <div class="alert alert-success" role="alert">
					        <?php echo $this->session->flashdata('success_simpan'); ?>
				        </div>
				        <?php endif; ?>

				        <div class="card mb-4">
					        <div class="card-header">
						        <a href="<?php echo site_url('admin/karyawan') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					        </div>
					    <div class="card-body">

						<form action="<?php echo site_url('admin/karyawan/add') ?>" method="post" enctype="multipart/form-data" >
                        <div class="form-group">
								<label for="nik">Nik</label>
								<input class="form-control <?php echo form_error('nik') ? 'is-invalid':'' ?>"
								 type="numeric" name="nik" min="0" placeholder="Nik" />
								<div class="invalid-feedback">
									<?php echo form_error('nik') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nama_lengkap">Nama Lengkap</label>
								<input class="form-control <?php echo form_error('nama_lengkap') ? 'is-invalid':'' ?>"
								 type="text" name="nama_lengkap" min="0" placeholder="Nama Lengkap" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_lengkap') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="password_login">Password Login</label>
								<input class="form-control <?php echo form_error('password_login') ? 'is-invalid':'' ?>"
								 type="password" name="password_login" min="0" placeholder="Password Login" />
								<div class="invalid-feedback">
									<?php echo form_error('password_login') ?>
								</div>
							</div>

                            <div class="form-group">
								<label for="id_div">Divisi</label>
                    			<select class="form-control" name="id_div">
                  					<?php foreach($divisi as $divisi){?>
                  					<option value="<?php echo $divisi->id_div ?>">
									  <?php echo $divisi->id_div ?> 
									</option>
									<?php }?>
                  				</select>
							</div>

							<div class="form-group">
								<label for="jabatan">Jabatan</label>
                    			<select class="form-control" name="jabatan">
                  					<option value="Teknisi">Teknisi</option>
									<option value="Helpdesk">Helpdesk</option>
                  					<option value="Staff">Staff</option>
                  					<option value="Team Leader">Team Leader</option>
                  					<option value="Site Manager">Site Manager</option>
                  					<option value="Manager">Manager</option>
									<option value="Admin">Admin</option>
                  				</select>
							</div>

							<div class="form-group">
								<label for="alamat">Alamat</label>
								<input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
								 type="text" name="alamat" min="0" placeholder="Alamat" />
								<div class="invalid-feedback">
									<?php echo form_error('alamat') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="tempat_lahir">Tempat Lahir</label>
								<input class="form-control <?php echo form_error('tempat_lahir') ? 'is-invalid':'' ?>"
								 type="text" name="tempat_lahir" min="0" placeholder="Tempat Lahir" />
								<div class="invalid-feedback">
									<?php echo form_error('tempat_lahir') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="tgl_lahir">Tanggal Lahir</label>
								<input class="form-control <?php echo form_error('tgl_lahir') ? 'is-invalid':'' ?>"
								 type="date" name="tgl_lahir" min="0" placeholder="Tgl Lahir" />
								<div class="invalid-feedback">
									<?php echo form_error('tgl_lahir') ?>
								</div>
							</div>

                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <div>
                                    <label><input type="radio" name="jenis_kelamin" value="L"> Laki-Laki</label>
                                    <label><input type="radio" name="jenis_kelamin" value="P"> Perempuan</label>
                                </div>
                            </div>

							<div class="form-group">
								<label for="agama">Agama</label>
                    			<select class="form-control" name="agama">
                  					<option value="ISLAM">ISLAM</option>
									<option value="KRISTEN">KRISTEN</option>
                  					<option value="HINDU">HINDU</option>
                  					<option value="BUDHA">BUDHA</option>
                  					<option value="KONGHUCU">KONGHUCU</option>
                  					<option value="KATOLIK">KATOLIK</option>
                  				</select>
							</div>

							<div class="form-group">
								<label for="email">E-mail</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"
								 type="email" name="email" min="0" placeholder="email@nocsas.com" />
								<div class="invalid-feedback">
									<?php echo form_error('email') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="no_hp">No Hp</label>
								<input class="form-control <?php echo form_error('no_hp') ? 'is-invalid':'' ?>"
								 type="phone" name="no_hp" min="0" placeholder="No Hp" />
								<div class="invalid-feedback">
									<?php echo form_error('no_hp') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
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