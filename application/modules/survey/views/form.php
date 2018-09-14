    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Survey
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Survey</a></li>
        <li class="active">Import</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">

<!-- ------------------------------------------------------------------------------------------------------------ -->

      <!-- Buat sebuah tombol Cancel untuk kemabli ke halaman awal / view data -->
      <?php echo anchor('survey', 'Cancel', array("class"=>"btn btn-danger pull-right glyphicon glyphicon-remove")) ?>
      
      <h3>Form Import Data</h3>
      <hr>
      
      <!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
      <form method="post" action="" enctype="multipart/form-data">
        <a href="<?php echo base_url('assets/tmp/Format.xlsx') ?>" class="btn btn-default">
          <span class="glyphicon glyphicon-download"></span>
          Download Format
        </a><br><br>
        
        <!-- 
        -- Buat sebuah input type file
        -- class pull-left berfungsi agar file input berada di sebelah kiri
        -->
        <input type="file" name="file" class="pull-left">
        
        <button type="submit" name="preview" class="btn btn-success btn-sm">
          <span class="glyphicon glyphicon-eye-open"></span> Preview
        </button>
      </form>
      
      <hr>
      
      <!-- Buat Preview Data -->
      <?php
      // Jika user telah mengklik tombol Preview
      if(isset($_POST['preview'])){
        //$ip = ; // Ambil IP Address dari User
        $nama_file_baru = 'data.xlsx';
        
        // Cek apakah terdapat file data.xlsx pada folder tmp
        if(is_file('./assets/tmp/'.$nama_file_baru)) // Jika file tersebut ada
          unlink('./assets/tmp/'.$nama_file_baru); // Hapus file tersebut
        
        $tipe_file = $_FILES['file']['type']; // Ambil tipe file yang akan diupload
        $tmp_file = $_FILES['file']['tmp_name'];
        
        // Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
        if($tipe_file == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
          // Upload file yang dipilih ke folder tmp
          // dan rename file tersebut menjadi data{ip_address}.xlsx
          // {ip_address} diganti jadi ip address user yang ada di variabel $ip
          // Contoh nama file setelah di rename : data127.0.0.1.xlsx
          move_uploaded_file($tmp_file, './assets/tmp/'.$nama_file_baru);
          
          // Load librari PHPExcel nya
          //require_once 'PHPExcel/PHPExcel.php';
          
          $excelreader = new PHPExcel_Reader_Excel2007();
          $loadexcel = $excelreader->load('./assets/tmp/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp
          $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
          
          // Buat sebuah tag form untuk proses import data ke database
          //echo "<form method='post' action='import.php'>";
          echo form_open_multipart('survey/saveSurvey', array('class'=>'form-horizontal'));
          
          echo "<table id='example1' class='table table-bordered table-hover'>
          <thead>
            <tr>
              <th>ID Pertanyaan</th>
              <th>ID Jawab</th>
              <th>Date Time</th>
            </tr>
          </thead>
          <tbody>";
          
          $numrow = 1;
          $kosong = 0;
          foreach($sheet as $row){ // Lakukan perulangan dari data yang ada di excel
            // Ambil data pada excel sesuai Kolom
            $id_pertanyaan = $row['A']; // Ambil data id_pertanyaan
            $id_jwb = $row['B']; // Ambil data id_jwb
            $tgl_survey = $row['C']; // Ambil data tgl_survey
            
            // Cek jika semua data tidak diisi
            if(empty($id_pertanyaan) && empty($id_jwb) && empty($tgl_survey))
              continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
            
            // Cek $numrow apakah lebih dari 1
            // Artinya karena baris pertama adalah nama-nama kolom
            // Jadi dilewat saja, tidak usah diimport
            if($numrow > 1){
              // Validasi apakah semua data telah diisi
              $id_pertanyaan_td = ( ! empty($id_pertanyaan))? "" : " style='background: #E07171;'"; // Jika id_pertanyaan kosong, beri warna merah
              $id_jwb_td = ( ! empty($id_jwb))? "" : " style='background: #E07171;'"; // Jika id_jwb kosong, beri warna merah
              $tgl_survey_td = ( ! empty($tgl_survey))? "" : " style='background: #E07171;'"; // Jika tgl_survey kosong, beri warna merah
              
              // Jika salah satu data ada yang kosong
              if(empty($id_pertanyaan) or empty($id_jwb) or empty($tgl_survey)){
                $kosong++; // Tambah 1 variabel $kosong
              }
              
              echo "<tr>";
              echo "<td".$id_pertanyaan_td.">".$id_pertanyaan."</td>";
              echo "<td".$id_jwb_td.">".$id_jwb."</td>";
              echo "<td".$tgl_survey_td.">".$tgl_survey."</td>";
              echo "</tr>";
            }
            
            $numrow++; // Tambah 1 setiap kali looping
          }
          
          echo "
            </tbody>
          </table>";
          
          // Cek apakah variabel kosong >= 1
          // Jika >= 1, berarti ada data yang masih kosong
          if($kosong >= 1){
            echo "
              <div class='alert alert-danger'>
                Ada nilai yang kosong.
              </div>
            ";
          }else{ // Jika semua data sudah diisi
            echo "<hr>";
            
            // Buat sebuah tombol untuk mengimport data ke database
            echo "<button type='submit' name='import' class='btn btn-primary'><span class='glyphicon glyphicon-upload'></span> Import</button>";
          }
          
          echo "</form>";
        }else{ // Jika file yang diupload bukan File Excel 2007 (.xlsx)
          // Munculkan pesan validasi
          echo "<div class='alert alert-danger'>
          Hanya File Excel 2007 (.xlsx) yang diperbolehkan
          </div>";
        }
      }
      ?>

<!-- ------------------------------------------------------------------------------------------------------------ -->

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