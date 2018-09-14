    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Jawaban
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Jawaban</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-8">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Jawaban</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('jawaban/updateJawabanDb', array('class'=>'form-horizontal')); ?>
              <div class="box-body">
                <input type="hidden" name="id_jwb" value="<?php echo $row['id_jwb'] ?>">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nilai</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nilai_jwb" name="nilai_jwb" value="<?php echo $row['nilai_jwb'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" id="desk_jwb" name="desk_jwb"><?php echo $row['desk_jwb'] ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Point</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="point_jwb" name="point_jwb" value="<?php echo $row['point_jwb'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jenis Pilihan</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="jenis_pilihan">
                      <?php
                        foreach ($recordJP as $rJP) {
                          echo "<option value='$rJP->id_pilihan'>$rJP->nama_pilihan</option>";
                        }
                       ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Icon</label>

                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="icon_url" id="icon_url">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <?php echo anchor('jawaban', 'Cancel', array("class"=>"btn btn-default")) ?>
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