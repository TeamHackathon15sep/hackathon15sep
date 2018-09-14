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
        <div class="col-xs-12">
          <div class="box">
            <!-- <div class="box-header">
              <h3 class="box-title">Pertanyaan</h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body table-responsive pad">
              <table class="table table-bordered">
                <tr>
                  <td>
                    <div class="btn-group">
                      <?php echo anchor('pertanyaan/tambahPertanyaan', 'Tambah', array("class"=>"btn btn-info")) ?>
                     <!--  <button type="button" class="btn btn-info">Edit</button>
                      <button type="button" class="btn btn-info">Hapus</button> -->
                    </div>
                  </td>
                </tr>
              </table>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Deskripsi</th>
                  <th>Pilihan</th>
                  <th>Kategori</th>
                  <th>Prioritas</th>
                  <th>Tahun</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  //$no = 1; 
                  foreach ($record as $r) {
                    $desk_pertanyaan=substr($r->desk_pertanyaan,0,50);
                    echo "<tr>
                            <td>$r->id_pertanyaan</td>
                            <td>$desk_pertanyaan...</td>
                            <td>$r->nama_pilihan</td>
                            <td>$r->nama_kategori</td>
                            <td>$r->prioritas</td>
                            <td>$r->tahun</td>
                            <td>";
                              if ($r->status=='1') {
                                # code...
                                echo "<span class='label label-success'>Aktif</span>";
                              }else if ($r->status=='0') {
                                # code...
                                echo "<span class='label label-danger'>Tidak Aktif</span>";
                              }
                              echo"
                            </td>
                            <td>
                                ".anchor('pertanyaan/detailPertanyaan/'.$r->id_pertanyaan, 'Detail')."
                                ".anchor('pertanyaan/editPertanyaan/'.$r->id_pertanyaan, 'Edit')."
                                ".anchor('pertanyaan/deletePertanyaanDb/'.$r->id_pertanyaan, 'Delete')."
                            </td>
                        </tr>";
                        //$no++;

                  }
                 ?>
                </tbody>
              </table>
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