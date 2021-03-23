<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <?php $this->load->view("admin/_partials/head.php") ?>
    <style type="text/css">
        
        
    </style>
</head>
<body >
    <?php $this->load->view("admin/_partials/navbar.php") ?>
    <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php $this->load->view("admin/_partials/sidebar.php") ?>
            </div>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4"><?php echo $materi->judul ?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Materi</li>
                            <li class="breadcrumb-item active">Diskusi</li>
                        </ol>
                        <div class="card mb-4">
					        <div class="card-header  w3-red" >
						        <a href="<?php echo site_url('materi') ?>" style="color:white"><i class="fas fa-arrow-left " style="color:white"></i> Back</a>
					        </div>
					    <div class="card-body">
                        
                        <div class="w3-panel w3-red">
                            <p></p>
                            <p>Kolom Komentar:</p>
                        </div>
                        <form method="POST" action="<?php echo site_url('admin/komentar/kirim/'.$materi->id_file) ?>">
                            <div class="w3-row-padding">
                                <div class="w3-half">
                                    <input type="hidden" name="id_file" value="<?php echo $materi->id_file ?>" >
                                    <input type="hidden" name="nama" value="<?php echo $this->session->userdata('nama_lengkap') ?>" >
                                    <input class="w3-input w3-border" type="text"name="nama" disabled value="<?php echo $this->session->userdata('nama_lengkap') ?>">
                                </div>
                                <div class="w3-half">
                                    <input type="hidden" name="nik" value="<?php echo $this->session->userdata('nik') ?>" >
                                    <input class="w3-input w3-border" type="numeric" name="nik" disabled value="<?php echo $this->session->userdata('nik') ?>" >
                                </div>
                            </div>
                            <div class="w3-padding">
                                <textarea style="width: 100%;" rows="4" name="isi"></textarea>
                            </div>
                            <button class="w3-button w3-block w3-red w3-section w3-padding" type="submit" value="send" >Kirim Komentar</button>
                        </form>
                   

                        <?php foreach ($komentar as $komentar): ?>
                        <div class="container">
                            <div class="w3-panel w3-pale-red w3-leftbar w3-border-red">
                                <p>
                                    <b><?php echo $komentar->nama?></b>
                                    <br><?php echo $komentar->isi?>
                                </p>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                    <footer class="w3-container w3-red w3-border-top w3-padding-16"></footer>
                </main>
                <?php $this->load->view("admin/_partials/footer.php") ?>
            </div>
                
   </div>
   
        <?php $this->load->view("admin/_partials/scrolltop.php") ?>
        <?php $this->load->view("admin/_partials/modal.php") ?>
        <?php $this->load->view("admin/_partials/js.php") ?>
</body>
</html>