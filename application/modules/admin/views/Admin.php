  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data Admin</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- <div class="box-header">
              <h3 class="box-title">Admin</h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body table-responsive pad">
              <table class="table table-bordered">
                <tr>
                  <td>
                    <div class="btn-group">
                      <?php echo anchor('admin/tambahAdmin', 'Tambah', array("class"=>"btn btn-info")) ?>
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
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Create Time</th>
                  <th>Last Update</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1; 
                  foreach ($record as $r) {
                    
                    echo "<tr>
                            <td>$no</td>
                            <td>$r->username</td>
                            <td>$r->nama</td>
                            <td>$r->email</td>
                            <td>$r->create_time</td>
                            <td>$r->last_update</td>
                            <td>
                                ".anchor('admin/detailAdmin/'.$r->username, 'Detail')."
                                ".anchor('admin/deleteAdminDb/'.$r->username, 'Delete')."
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