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
						<h1 class="mt-4">Manajemen Karyawan</h1>
                        <ol class="breadcrumb mb-4">
							<li class="breadcrumb-item active">Karyawan</li>
                            <li class="breadcrumb-item active">Edit Karyawan</li>
                        </ol>
						
                        <?php if ($this->session->flashdata('success_update')): ?>
				        <div class="alert alert-success" role="alert">
					        <?php echo $this->session->flashdata('success_update'); ?>
				        </div>
				        <?php endif; ?>

				        <!-- Card  -->
				        <div class="card mb-4">
					        <div class="card-header">
                                <a href="<?php echo site_url('karyawan') ?>"><i class="fas fa-arrow-left"></i> Back</a>
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
								        <label for="nama_lengkap">Nama Lengap</label>
								        <input class="form-control <?php echo form_error('nama_lengkap') ? 'is-invalid':'' ?>"
								         type="text" name="nama_lengkap" min="0" placeholder="Nama Lenkap" value="<?php echo $karyawan->nama_lengkap ?>" />
								        <div class="invalid-feedback">
									        <?php echo form_error('nama_lengkap') ?>
								        </div>
							        </div>

							        <div class="form-group">
								        <label for="password_login">Password Login</label>
								        <input class="form-control <?php echo form_error('password_login') ? 'is-invalid':'' ?>"
								        type="password" name="password_login" min="0" placeholder="Password Login" value="<?php echo $karyawan->password_login ?>"/>
								        <div class="invalid-feedback">
									        <?php echo form_error('password_login') ?>
								        </div>
							        </div>

                                    <div class="form-group">
								        <label for="id_div">Id Divisi</label>
                                        <input type="hidden" name="id_div" min="0" value="<?php echo $karyawan->id_div ?>"/>
										<input class="form-control <?php echo form_error('id_div') ? 'is-invalid':'' ?>"
								        type="text" name="id_div" placeholder="Id Divisi" disabled value="<?php echo $karyawan->id_div ?>" />
							        </div>

									<div class="form-group">
										<label for="id_tim">Tim</label>
										<select class="form-control" name="id_tim">
                                            <option ><?php echo $karyawan->id_tim ?></option>
											<option value=""></option>
											<?php foreach($tim as $tim){?>
											<option value="<?php echo $tim->id_tim ?>">
											<?php echo $tim->id_tim ?> 
											</option>
											<?php }?>
										</select>
									</div>

									<div class="form-group">
										<label for="jabatan">Jabatan</label>
										<select class="form-control" name="jabatan">
											<option value="<?php echo $karyawan->jabatan ?>"><?php echo $karyawan->jabatan ?></option>
											<option value=""></option>
											<option value="Teknisi">Teknisi</option>
											<option value="Helpdesk">Helpdesk</option>
											<option value="Staff">Staff</option>
											<option value="Team Leader">Team Leader</option>
										</select>
									</div>


									<div class="form-group">
										<label for="alamat">Alamat</label>
										<input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
										type="text" name="alamat" min="0" placeholder="Alamat" value="<?php echo $karyawan->alamat ?>"/>
										<div class="invalid-feedback">
											<?php echo form_error('alamat') ?>
										</div>
									</div>

									<div class="form-group">
										<label for="tempat_lahir">Tempat Lahir</label>
										<input class="form-control <?php echo form_error('tempat_lahir') ? 'is-invalid':'' ?>"
										type="text" name="tempat_lahir" min="0" placeholder="Tempat Lahir" value="<?php echo $karyawan->tempat_lahir ?>"/>
										<div class="invalid-feedback">
											<?php echo form_error('tempat_lahir') ?>
										</div>
									</div>

									<div class="form-group">
										<label for="tgl_lahir">Tanggal Lahir</label>
										<input class="form-control <?php echo form_error('tgl_lahir') ? 'is-invalid':'' ?>"
										type="date" name="tgl_lahir" min="0" placeholder="Tgl Lahir" value="<?php echo $karyawan->tgl_lahir ?>"/>
										<div class="invalid-feedback">
											<?php echo form_error('tgl_lahir') ?>
										</div>
									</div>

									<div class="form-group">
										<label for="jenis_kelamin">Jenis Kelamin</label>
										<div>
											<label><input type="radio" name="jenis_kelamin" value="L" <?php if($karyawan->jenis_kelamin == 'L'){echo "checked";}?>> Laki-Laki</label>
											<label><input type="radio" name="jenis_kelamin" value="P" <?php if($karyawan->jenis_kelamin == 'P'){echo "checked";}?>> Perempuan</label>
										</div>
									</div>

									<div class="form-group">
										<label for="agama">Agama</label>
										<select class="form-control" name="agama">
											<option value="<?php echo $karyawan->agama ?>"><?php echo $karyawan->agama ?></option>
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
										type="email" name="email" min="0" placeholder="email@nocsas.com" value="<?php echo $karyawan->email ?>"/>
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