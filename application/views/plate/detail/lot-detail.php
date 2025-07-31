 <?php foreach ($get_lot->result() as $row) {
        $nama_item = $row->nama_produk;
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
                             <th>QTY Awal (m2)</th>
                             <th>QTY Pemakaian</th>
                             <th>QTY Sisa</th>
                             <th>Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php
                            $x = 1;
                            foreach ($get_lot->result() as $row) {

                            ?>
                             <tr>
                                 <td><?= $x++; ?></td>
                                 <td><?= $row->no_lot ?></td>
                                 <td>QTY Awal (m2)</td>
                                 <td><?= $row->pemakaian ?></td>
                                 <td><?= $row->qty ?></td>
                                 <td>
                                     <button type="button" class="btn btn-primary btn-detail-lot" data-id="<?= $row->id_lot ?>" title="Tracking OK">
                                         <i class="fa fa-list"></i>
                                     </button>
                                 </td>
                             </tr>
                         <?php }
                            ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>

 </div>
 <!-- /.container-fluid -->

 <!-- Modal -->
 <div class="modal fade" id="lotDetailModal" tabindex="-1" role="dialog" aria-labelledby="lotDetailModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="lotDetailModalLabel">Detail Lot</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span>&times;</span>
                 </button>
             </div>
             <div class="modal-body" id="modal-lot-content">
                 <!-- Data akan di-load di sini -->
             </div>
         </div>
     </div>
 </div>