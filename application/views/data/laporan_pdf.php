<?php if($this->session->userdata('level')!='admin'){redirect('login');};?>

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                <h5 style="font-size:40;text-align:center;margin:0;padding:0"><h3 style="font-size:30;">Kementrian Agama</h3>Kantor Kota Malang</h5>
    <p style="text-align:center;margin:0;padding:0">Jl. Raden Panji Suroso No.2, Polowijen, Kec. Blimbing, Kota Malang, Jawa Timur 65126</p>
    <p style="text-align:center;margin:0;padding:0">Telp : (0341) 491605 &nbsp;&nbsp;Email : kotamalang@kemenag.go.id</p>
    <hr>
    <br>
    
                <style>
            #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #table td, #table th {
                border: 0.1px solid #000;
                /* padding:3px; */
            }

            #table tr:nth-child(even){background-color: #f2f2f2;}

            #table tr:hover {background-color: #ddd;}

            #table th {
                padding-top: 10px;
                padding-bottom: 10px;
                padding-left: 10px;
                padding-right: 10px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
        </style>
        <table id="table">

                <tr >
                  <th style="text-align:center;">No</th>
                  <th style="text-align:center;">Tanggal</th>
                  <th style="text-align:center;">Nomor</th>
                  <th style="text-align:center;">Id Instansi</th>
                  <th style="text-align:center;">Id Layanan</th>
                  <th style="text-align:center;">Waktu Datang</th>
                  <th style="text-align:center;">Waktu Panggil</th>
                  <th style="text-align:center;">Waktu Selesai</th>
                  <th style="text-align:center;">Status</th>
                 
                </tr>
              
                <?php $i= 1;
                 foreach ($laporan as $rows) : ?>
                    <tr>
                        <td style="text-align:center;"><?= $i++; ?></td>
                        <td style="text-align:center;"><?= $rows->tanggal; ?></td>
                        <td style="text-align:center;"><?= $rows->nomor; ?></td>
                        <td style="text-align:center;"><?= $rows->id_instansi ; ?></td>
                        <td style="text-align:center;"><?= $rows->id_layanan; ?></td>
                        <td style="text-align:center;"><?= $rows->waktu_datang; ?></td>
                        <td style="text-align:center;"><?= $rows->waktu_panggil; ?></td>
                        <td style="text-align:center;"><?= $rows->waktu_selesai; ?></td>
                        <td style="text-align:center;"><?= $rows->status; ?></td>
                        
                    </tr>
                        <?php endforeach; ?>
</table>
<br>
    <hr>
                        <script type="text/javascript">
                            window.print();
                        </script>
                             

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>