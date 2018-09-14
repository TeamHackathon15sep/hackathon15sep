    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="<?php echo base_url('assets/img/admin/'.$this->session->userdata('foto')) ?>" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?php echo $this->session->userdata('nama'); ?></h3>
              <h5 class="widget-user-desc"><?php echo $this->session->userdata('level'); ?></h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Username <span class="pull-right badge bg-blue"><?php echo $this->session->userdata('username'); ?></span></a></li>
                <li><a href="#">Create Time <span class="pull-right badge bg-aqua"><?php echo $this->session->userdata('create_time'); ?></span></a></li>
                <li><a href="#">Last Update <span class="pull-right badge bg-green"><?php echo $this->session->userdata('last_update'); ?></span></a></li>
                <li><a href="#">E-mail <span class="pull-right badge bg-red"><?php echo $this->session->userdata('email'); ?></span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>

        <div class="col-md-8">
          <!-- Application buttons -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Application Buttons</h3>
            </div>
            <div class="box-body">
              <!-- <p>Pilihan menu : </p> -->
              <a class="btn btn-lg btn-app" href="<?php echo site_url('pertanyaan') ?>">
                <i class="fa fa-question"></i> Pertanyaan
              </a>
              <a class="btn btn-app" href="<?php echo site_url('jawaban') ?>">
                <i class="fa fa-star"></i> Jawaban
              </a>
              <a class="btn btn-app" href="<?php echo site_url('kategori') ?>">
                <i class="fa fa-bars"></i> Kategori
              </a>
              <a class="btn btn-app" href="<?php echo site_url('pilihan') ?>">
                <i class="fa fa-th"></i> Pilihan
              </a>
              <br>
              <a class="btn btn-app" href="<?php echo site_url('survey') ?>">
                <i class="fa fa-line-chart"></i> Data Survey
              </a>
              <a class="btn btn-app" href="<?php echo site_url('grafik_pertanyaan/index') ?>">
                <i class="fa fa-circle-o"></i> Grafik Pertanyaan
              </a>
              <a class="btn btn-app" href="<?php echo site_url('grafik_responden/index') ?>">
                <i class="fa fa-circle-o"></i> Grafik Responden
              </a>
              <br>
              <a class="btn btn-app" href="<?php echo site_url('laporan') ?>">
                <i class="fa fa-file-pdf-o"></i> Laporan
              </a>
              <br>
              <a class="btn btn-app" href="<?php echo site_url('admin') ?>">
                <i class="fa fa-users"></i> Admin
              </a>
              <br>
              <a class="btn btn-app" href="<?php echo site_url('auth/logout') ?>">
                <i class="fa fa-stop"></i> Log Out
              </a>
            </div>
            <!-- /.box-body -->
          </div>
        </div>

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->