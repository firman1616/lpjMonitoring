<table class="table table-bordered" id="tablePO" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>No. PO</th>
            <th>Vendor</th>
            <th>Order Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $x=1;
        foreach ($po as $row) { ?>
            <tr>
                <td><?= $x++; ?></td>
                <td><?= $row->no_po ?></td>
                <td><?= $row->nama_vendor ?></td>
                <td><?= date('d-m-Y', strtotime($row->date_order)) ?></td>
                <td>
                    <a href="<?= site_url('index.php/PO/cetak_po/') ?>" class="btn btn-primary" title="Print PO" target="_new"><i class="fa fa-print"></i></a>
                </td>
            </tr>
        <?php }
        ?>

    </tbody>
</table>