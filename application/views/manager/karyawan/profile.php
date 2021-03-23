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
						<h1 class="mt-4">Profile</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
						
                        <?php if ($this->session->flashdata('success_update')): ?>
				        <div class="alert alert-success" role="alert">
					        <?php echo $this->session->flashdata('success_update'); ?>
				        </div>
				        <?php endif; ?>

				        <!-- Card  -->
				        <div class="card mb-4">
					        <div class="card-header">
                                <a href="<?php echo site_url('dashboard') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					    </div>
					    <div class="card-body">

					        <form action="" method="post" enctype="multipart/form-data">
						        <!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							    oleh controller tempat vuew ini digunakan. Yakni index.php/admin/divisi/edit/ID --->

							        <div class="form-group">
								        <label for="nik">Nik</label>
										<input type="hidden" name="nik" value="<?php echo $karyawan->nik?>" />
								        <input class="form-control <?php echo form_error('nik') ? 'is-invalid':'' ?>"
								        type="numeric" name="nik" disabled value="<?php echo $karyawan->nik ?>" />
							        </div>

									<div class="form-group">
								        <label for="nama_lengkap">Nama Lengkap</label>
										<input type="hidden" name="nama_lengkap" value="<?php echo $karyawan->nama_lengkap?>" />
								        <input class="form-control <?php echo form_error('nama_lengkap') ? 'is-invalid':'' ?>"
								        type="text" name="nama_lengkap" disabled value="<?php echo $karyawan->nama_lengkap ?>" />
							        </div>

                                    

							        <div class="form-group">
								        <label for="password_login">Ganti Password</label>
								        <input class="form-control <?php echo form_error('password_login') ? 'is-invalid':'' ?>"
								        type="password" name="password_login" min="0" placeholder="Password Login" value="<?php echo $karyawan->password_login ?>"/>
								        <div class="invalid-feedback">
									        <?php echo form_error('password_login') ?>
								        </div>
							        </div>

									<div class="form-group">
								        <label for="id_div">Id Divisi</label>
										<input type="hidden" name="id_div" value="<?php echo $karyawan->id_div?>" />
								        <input class="form-control <?php echo form_error('id_div') ? 'is-invalid':'' ?>"
								        type="text" name="id_div" disabled value="<?php echo $karyawan->id_div ?>" />
							        </div>

									<div class="form-group">
								        <label for="id_tim">Id Tim</label>
										<input type="hidden" name="id_tim" value="<?php echo $karyawan->id_tim?>" />
								        <input class="form-control <?php echo form_error('id_tim') ? 'is-invalid':'' ?>"
								        type="text" name="id_tim" disabled value="<?php echo $karyawan->id_tim ?>" />
							        </div>

									<div class="form-group">
								        <label for="jabatan">Jabatan</label>
										<input type="hidden" name="jabatan" value="<?php echo $karyawan->jabatan?>" />
								        <input class="form-control <?php echo form_error('jabatan') ? 'is-invalid':'' ?>"
								        type="text" name="jabatan" disabled value="<?php echo $karyawan->jabatan ?>" />
							        </div>

									<div class="form-group">
								        <label for="alamat">Alamat</label>
										<input type="hidden" name="alamat" value="<?php echo $karyawan->alamat?>" />
								        <input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
								        type="text" name="alamat" disabled value="<?php echo $karyawan->alamat ?>" />
							        </div>

									<div class="form-group">
										<label for="tempat_lahir">Tempat Lahir</label>
										<input type="hidden" name="tempat_lahir" value="<?php echo $karyawan->tempat_lahir?>" />
										<input class="form-control <?php echo form_error('tempat_lahir') ? 'is-invalid':'' ?>"
										type="text" name="tempat_lahir" disabled value="<?php echo $karyawan->tempat_lahir ?>"/>
										<div class="invalid-feedback">
											<?php echo form_error('tempat_lahir') ?>
										</div>
									</div>

									<div class="form-group">
										<label for="tgl_lahir">Tanggal Lahir</label>
										<input type="hidden" name="tgl_lahir" value="<?php echo $karyawan->tgl_lahir?>" />
										<input class="form-control <?php echo form_error('tgl_lahir') ? 'is-invalid':'' ?>"
										type="date" name="tgl_lahir" disabled value="<?php echo $karyawan->tgl_lahir ?>"/>
										<div class="invalid-feedback">
											<?php echo form_error('tgl_lahir') ?>
										</div>
									</div>

									<div class="form-group">
										<label for="jenis_kelamin">Jenis Kelamin</label>
										<input type="hidden" name="jenis_kelamin" value="<?php echo $karyawan->jenis_kelamin?>" />
										<input class="form-control <?php echo form_error('jenis_kelamin') ? 'is-invalid':'' ?>"
										type="text" name="jenis_kelamin" disabled value="<?php if($karyawan->jenis_kelamin == "L"){ echo "Laki-Laki";}else{echo "Perempuan";} ?>"/>
										<div class="invalid-feedback">
											<?php echo form_error('jenis_kelamin') ?>
										</div>
									</div>

									<div class="form-group">
										<label for="agama">Agama</label>
										<input type="hidden" name="agama" value="<?php echo $karyawan->agama?>" />
										<input class="form-control <?php echo form_error('agama') ? 'is-invalid':'' ?>"
										type="text" name="agama" disabled value="<?php echo $karyawan->agama ?>"/>
										<div class="invalid-feedback">
											<?php echo form_error('agama') ?>
										</div>
									</div>

									<div class="form-group">
										<label for="email">E-mail</label>
										<input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"
										type="email" name="email" value="<?php echo $karyawan->email ?>"/>
										<div class="invalid-feedback">
											<?php echo form_error('email') ?>
										</div>
									</div>

									<div class="form-group">
										<label for="no_hp">No Hp</label>
										<input class="form-control <?php echo form_error('no_hp') ? 'is-invalid':'' ?>"
										type="phone" name="no_hp" min="0" placeholder="No Hp" value="<?php echo $karyawan->no_hp ?>"/>
										<div class="invalid-feedback">
											<?php echo form_error('no_hp') ?>
										</div>
									</div>

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