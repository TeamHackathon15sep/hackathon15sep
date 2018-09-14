    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">UI</a></li>
        <li class="active">General</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- START CUSTOM TABS -->
      <div class="row">
        <div class="col-xs-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <label for="inputEmail3" class="col-xs-12 control-label">Hasil Survey berdasarkan Jumlah Responden</label>
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Harian</a></li>
              <li><a href="#tab_2" data-toggle="tab">Periode</a></li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <?php echo form_open_multipart('laporan/cetakExcelHarian', array('class'=>'form-horizontal')); ?>
                  <div class="box-body">
                    <!-- Date dd/mm/yyyy -->
                    <div class="form-group">
                      <label>Tanggal :</label>

                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask  name="day">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <!-- <div class="form-group">
                      <label>Kategori</label>
                      <select class="form-control select2" style="width: 100%;">
                        <option selected="selected">Umum</option>
                        <option>Pencetakan</option>
                      </select>
                    </div> -->
                    <!-- /.form-group -->
                    <div class="pull-right">
                      <button type="submit" name="submit" class="btn btn-info pull-right">Cetak</button>
                    </div>
                  </div>
                </form>

                
          
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <?php echo form_open_multipart('laporan/cetakExcelPeriode', array('class'=>'form-horizontal')); ?>
                  <div class="box-body">

                    <!-- Date range -->
                    <!-- <div class="form-group">
                      <label>Periode :</label>

                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="reservation" name="periode">
                      </div> -->
                      <!-- /.input group -->
                    <!-- </div> -->

                    <div class="form-group">
                      <label>Dari :</label>

                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask  name="start">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <div class="form-group">
                      <label>Sampai :</label>

                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask  name="end">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <div class="pull-right">
                      <button type="submit" name="submit" class="btn btn-info pull-right">Cetak</button>
                    </div>
                  </div>
                </form>

              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->



        <div class="col-xs-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <label for="inputEmail3" class="col-xs-12 control-label">Hasil Survey berdasarkan Jenis Jawaban</label>
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1a" data-toggle="tab">Harian</a></li>
              <li><a href="#tab_2a" data-toggle="tab">Periode</a></li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1a">
                <?php echo form_open_multipart('laporan/cetakExcelHarian2', array('class'=>'form-horizontal')); ?>
                  <div class="box-body">
                    <!-- Date dd/mm/yyyy -->
                    <div class="form-group">
                      <label>Tanggal :</label>

                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask  name="day">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <!-- <div class="form-group">
                      <label>Kategori</label>
                      <select class="form-control select2" style="width: 100%;">
                        <option selected="selected">Umum</option>
                        <option>Pencetakan</option>
                      </select>
                    </div> -->
                    <!-- /.form-group -->
                    <div class="pull-right">
                      <button type="submit" name="submit" class="btn btn-info pull-right">Cetak</button>
                    </div>
                  </div>
                </form>

                
          
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2a">
                <?php echo form_open_multipart('laporan/cetakExcelPeriode2', array('class'=>'form-horizontal')); ?>
                  <div class="box-body">

                    <!-- Date range -->
                    <!-- <div class="form-group">
                      <label>Periode :</label>

                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="reservation" name="periode">
                      </div> -->
                      <!-- /.input group -->
                    <!-- </div> -->

                    <div class="form-group">
                      <label>Dari :</label>

                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask  name="start">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <div class="form-group">
                      <label>Sampai :</label>

                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask  name="end">
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <div class="pull-right">
                      <button type="submit" name="submit" class="btn btn-info pull-right">Cetak</button>
                    </div>
                  </div>
                </form>

              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->




      </div>
      <!-- /.row -->
      <!-- END CUSTOM TABS -->
    
    </section>
    <!-- /.content -->