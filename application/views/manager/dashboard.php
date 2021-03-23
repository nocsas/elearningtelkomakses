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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

                    </div>
                    <div class="card-body">
                        <div class="jumbotron">
                            <h1>Welcome Back <?php echo $this->session->userdata('nama_lengkap');?></h1>
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
