<table class="table table-bordered" id="tableKwitansi" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>No. Kwitansi</th>
            <th>Customer</th>
            <th>Invoice Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $x=1;
        foreach ($kwitansi as $row) { ?>
        <tr>
            <td><?= $x++; ?></td>
            <td><?= $row->no_kwitansi ?></td>
            <td><?= $row->customer ?></td>
            <td><?= date('d-m-Y',strtotime($row->tgl_invoice)) ?></td>
            <td>
                <a href="<?= base_url('index.php/Kwitansi/cetak_kwitansi/'.$row->id) ?>" class="btn btn-primary" title="cetak kwitansi"><i class="fa fa-print"></i></a>
                 <a href="<?= base_url('index.php/Kwitansi/cetak_kwi/'.$row->id) ?>" class="btn btn-warning" title="cetak kwitansi 2"><i class="fa fa-print"></i></a>
            </td>
        </tr>
        <?php }
        ?>
    </tbody>
</table>