<table class="table table-bordered" id="tableINV" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>No. Invoice</th>
            <th>Customer</th>
            <th>Sales</th>
            <th>Payment Terms</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $x = 1;
        foreach ($inv as $row) { ?>
            <tr>
                <td><?= $x++; ?></td>
                <td><?= $row->number ?></td>
                <td>Customer</td>
                <td>Sales</td>
                <td>Payment Terms</td>
                <td>
                <a href="<?= base_url('index.php/INV/cetak_inv/'.$row->id) ?>" target="_new" type="button" class="btn btn-primary" title="cetak Invoice "><i class="fa fa-print"></i></a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>