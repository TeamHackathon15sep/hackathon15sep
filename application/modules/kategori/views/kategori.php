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
        <div class="col-xs-12">
          <div class="box">
            <!-- <div class="box-header">
              <h3 class="box-title">Kategori</h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body table-responsive pad">
              <table class="table table-bordered">
                <tr>
                  <td>
                    <div class="btn-group">
                      <?php echo anchor('kategori/tambahKategori', 'Tambah', array("class"=>"btn btn-info")) ?>
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
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Deskripsi</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1; 
                  foreach ($record as $r) {
                    $desk_kategori=substr($r->desk_kategori,0,100);
                    echo "<tr>
                            <td>$no</td>
                            <td>$r->nama_kategori</td>
                            <td>$desk_kategori...</td>
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
                                ".anchor('kategori/detailKategori/'.$r->id_kategori, 'Detail')."
                                ".anchor('kategori/editKategori/'.$r->id_kategori, 'Edit')."
                                ".anchor('kategori/deleteKategoriDb/'.$r->id_kategori, 'Delete')."
                            </td>
                        </tr>";
                        $no++;

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