<table class="table table-bordered" id="tableSPH" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>No. SPH</th>
            <th>Customer</th>
            <th>Payment Terms</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $x=1;
        foreach ($sph as $row) { ?>
            <tr>
                <td><?= $x++; ?></td>
                <td><?= $row->no_sph ?></td>
                <td><?= $row->nama_cust ?></td>
                <td><?= $row->x_payment_term ?></td>
                <td>
                    <a href="<?= base_url('index.php/SPH/cetak_sph/'.$row->id) ?>" target="_new" type="button" class="btn btn-primary" title="cetak SPH "><i class="fa fa-print"></i></a>
                </td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>