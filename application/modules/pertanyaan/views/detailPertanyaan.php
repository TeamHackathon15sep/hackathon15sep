    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pertanyaan
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pertanyaan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-8">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Detail Pertanyaan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" id="desk_pertanyaan" name="desk_pertanyaan" disabled><?php echo $row['desk_pertanyaan'] ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jenis Pilihan</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="jenis_pilihan" disabled>
                      <option><?php echo $row['nama_pilihan'] ?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="kategori" disabled>
                      <option><?php echo $row['nama_kategori'] ?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Prioritas</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="prioritas" name="prioritas" value="<?php echo $row['prioritas'] ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tgl Input</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tgl_input" name="tgl_input" value="<?php echo $row['tgl_input'] ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tahun</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tahun" name="tahun" value="<?php echo $row['tahun'] ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Satus</label>

                  <div class="col-sm-10">
                    <?php
                      if ($row['status']=='1') {
                        # code...
                        echo "<span class='label label-success'>Aktif</span>";
                      }else if ($row['status']=='0') {
                        # code...
                        echo "<span class='label label-danger'>Tidak Aktif</span>";
                      }
                    ?>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <?php echo anchor('pertanyaan', 'Cancel', array("class"=>"btn btn-default")) ?>
                <?php echo anchor('pertanyaan/editPertanyaan/'.$row['id_pertanyaan'], 'Edit', array("class"=>"btn btn-info pull-right")) ?>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->