                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="<?php echo site_url('dashboard') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                        <div class="sb-sidenav-menu-heading">Menu Utama</div>
                              
                            <a class="nav-link" href="<?php echo site_url('karyawan') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Tim
                            </a>  
                            <a class="nav-link" href="<?php echo site_url('materi') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Materi
                            </a>  
                            <a class="nav-link" href="<?php echo site_url('topik_quiz') ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Quiz
                            </a>  
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $this->session->userdata('jabatan');?>
                    </div>
                </nav>