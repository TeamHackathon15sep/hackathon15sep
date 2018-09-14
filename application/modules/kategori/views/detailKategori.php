    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kategori
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Kategori</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-8">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Detail kategori</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?php echo $row['nama_kategori'] ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" id="desk_kategori" name="desk_kategori" disabled><?php echo $row['desk_kategori'] ?></textarea>
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
                <?php echo anchor('kategori', 'Cancel', array("class"=>"btn btn-default")) ?>
                <?php echo anchor('kategori/editKategori/'.$row['id_kategori'], 'Edit', array("class"=>"btn btn-info pull-right")) ?>
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