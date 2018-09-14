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
              <h3 class="box-title">Edit Kategori</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('kategori/updateKategoriDb', array('class'=>'form-horizontal')); ?>
            
              <div class="box-body">
                <input type="hidden" name="id_kategori" value="<?php echo $row['id_kategori'] ?>">  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?php echo $row['nama_kategori'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="desk_kategori" name="desk_kategori" value="<?php echo $row['desk_kategori'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-10">
                     <select class="form-control" name="status">
                      <option value="1" <?php echo ($row['status'] == '1') ? 'selected="selected"': ''; ?>>Aktif</option>
                      <option value="0" <?php echo ($row['status'] == '0') ? 'selected="selected"': ''; ?>>Tidak Aktif</option>
                    </select>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <?php echo anchor('kategori', 'Cancel', array("class"=>"btn btn-default")) ?>
                <button type="submit" name="submit" class="btn btn-info pull-right">Save</button>
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