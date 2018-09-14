    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Jawaban
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Jawaban</a></li>
        <li class="active">Detail Jawaban</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-8">
          <div class="box box-info box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Data Jawaban</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <td>Nilai</td>
                  <td><?php echo $row['nilai_jwb'] ?></td>
                </tr>
                <tr>
                  <td>Deskripsi</td>
                  <td><?php echo $row['desk_jwb'] ?></td>
                </tr>
                <tr>
                  <td>Point</td>
                  <td><?php echo $row['point_jwb'] ?></td>
                </tr>
                <tr>
                  <td>Jenis Pilihan</td>
                  <td><?php echo $row['nama_pilihan'] ?></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <?php echo anchor('jawaban', 'Cancel', array("class"=>"btn btn-default")) ?>
              <?php echo anchor('jawaban/editJawaban/'.$row['id_jwb'], 'Edit', array("class"=>"btn btn-info pull-right")) ?>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <div class="box box-info box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Icon</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                 	<img src="<?php echo base_url()."assets/img/icon_jawaban/".$row['icon_url'] ?>">
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->