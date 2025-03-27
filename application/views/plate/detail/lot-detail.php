 <?php foreach ($get_lot->result() as $row) {
        $nama_item = $row->prod_tmpl;
    } ?>

 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Detail <?= $nama_item ?></h1>

     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary"><?= $nama_item ?></h6>
         </div>
         <div class="card-body">
             <div class="table-responsive">
                 <!-- <div id="div-table-detail-lot"></div> -->
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>No Lot</th>
                             <!-- <th>QTY Pemakaian (Sheet)</th> -->
                             <th>QTY Pemakaian (m2)</th>
                             <!-- <th>QTY Sisa (m2)</th> -->
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>

                         <?php
                            $x = 1;
                            foreach ($get_lot->result() as $row) { 
                            $L_m2 = ($row->x_length * $row->x_width)/1000;
                            $pemakaian = $L_m2 * $row->qty_lot;
                            $sisa_pemakaian = $L_m2 - $pemakaian;
                            ?>
                             <tr>
                                 <td><?= $x++; ?></td>
                                 <td><?= $row->no_lot ?></td>
                                 <td><?= number_format($row->qty_lot) ?></td>
                                 <!-- <td><?= number_format($pemakaian) ?></td>
                                 <td><?= number_format($sisa_pemakaian) ?></td> -->
                                 <td>
                                     <button type="button" class="btn btn-primary" title="tracking OK"><i class="fa fa-list"></i></button>
                                 </td>
                             </tr>
                         <?php } ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>

 </div>
 <!-- /.container-fluid -->