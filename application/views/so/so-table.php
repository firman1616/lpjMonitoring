<table class="table table-bordered" id="tableSO" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>No. SO</th>
            <th>Customer</th>
            <th>Sales</th>
            <th>Payment Terms</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $x=1;
        foreach ($so as $row) { ?>
        <tr>
            <td><?= $x++; ?></td>
            <td><?= $row->nama_so ?></td>
            <td><?= $row->nama_cust ?></td>
            <td><?= $row->nama_sales ?></td>
            <td><?= $row->payment_term ?></td>
            <td>
                <a href="<?= base_url('index.php/SO/cetak_so/'.$row->id) ?>" target="_new" type="button" class="btn btn-primary" title="cetak SO "><i class="fa fa-print"></i></a>
            </td>
        </tr>
        <?php } ?>

    </tbody>
</table>