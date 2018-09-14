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
              <h3 class="box-title">Edit Pertanyaan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('pertanyaan/updatePertanyaanDb', array('class'=>'form-horizontal')); ?>
            
              <div class="box-body">
                <input type="hidden" name="id_pertanyaan" value="<?php echo $row['id_pertanyaan'] ?>">  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Deskripsi</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" id="desk_pertanyaan" name="desk_pertanyaan"><?php echo $row['desk_pertanyaan'] ?></textarea>
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
                  <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="kategori">
                      <?php
                        foreach ($recordK as $rK) {
                          echo "<option value='$rK->id_kategori'>$rK->nama_kategori</option>";
                        }
                       ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Prioritas</label>

                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="prioritas" name="prioritas" value="<?php echo $row['prioritas'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tahun</label>

                  <div class="col-sm-10">
                    <select class="form-control" name="tahun">
                      <option value="2013" <?php echo ($row['tahun'] == '2013') ? 'selected="selected"': ''; ?>>2013</option>
                      <option value="2014" <?php echo ($row['tahun'] == '2014') ? 'selected="selected"': ''; ?>>2014</option>
                      <option value="2015" <?php echo ($row['tahun'] == '2015') ? 'selected="selected"': ''; ?>>2015</option>
                      <option value="2016" <?php echo ($row['tahun'] == '2016') ? 'selected="selected"': ''; ?>>2016</option>
                      <option value="2017" <?php echo ($row['tahun'] == '2017') ? 'selected="selected"': ''; ?>>2017</option>
                      <option value="2018" <?php echo ($row['tahun'] == '2018') ? 'selected="selected"': ''; ?>>2018</option>
                      <option value="2019" <?php echo ($row['tahun'] == '2019') ? 'selected="selected"': ''; ?>>2019</option>
                    </select>
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
                <?php echo anchor('pertanyaan', 'Cancel', array("class"=>"btn btn-default")) ?>
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