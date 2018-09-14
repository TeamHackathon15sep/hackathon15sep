    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pilihan
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Pilihan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-8">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Pilihan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('pilihan/updatePilihanDb', array('class'=>'form-horizontal')); ?>
            
              <div class="box-body">
                <input type="hidden" name="id_pilihan" value="<?php echo $row['id_pilihan'] ?>">  
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_pilihan" name="nama_pilihan" value="<?php echo $row['nama_pilihan'] ?>">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <?php echo anchor('pilihan', 'Cancel', array("class"=>"btn btn-default")) ?>
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