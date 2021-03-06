<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo SITE_NAME ." : ". ucfirst($this->uri->segment(1)) ." - ". ucfirst($this->uri->segment(2)) ?></title>
        <link href="<?php echo base_url('css/styles.css" rel="stylesheet') ?>" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    
                                    <?php if ($this->session->flashdata('msg')): ?>
				                        <div class="alert alert-danger" role="alert" >
                                        <h6 class="text-center ">
					                        <?php echo $this->session->flashdata('msg'); ?>
                                        </h6>
				                        </div>
				                    <?php endif; ?>
                                    
                                    <div class="card-body">
                                        <form action="<?= site_url('login/auth') ?>" method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="nik">NIK</label>
                                                <input class="form-control py-4" name="nik" type="text" placeholder="Masukkan NIK" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="password_login">Password</label>
                                                <input class="form-control py-4" name="password_login" type="password" placeholder="Masukkan password" />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <input type="submit" class="btn btn-primary" value="login" />
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.html"></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Nocsas 2020</div>
                            <div>
                                
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('js/scripts.js') ?>"></script>
    </body>
</html>