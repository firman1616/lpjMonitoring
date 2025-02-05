<table class="table table-bordered" id="tableCOA" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>No. COA</th>
            <th>Customer</th>
            <th>No Surat Jalan</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $x=1;
        foreach ($coa as $row) { ?>
        <tr>
            <td><?= $x++; ?></td>
            <td><?= $row->no_coa ?></td>
            <td><?= $row->x_customer ?></td>
            <td><?= $row->no_sjk ?></td>
            <td>
                <a href="<?= base_url('index.php/COA/cetak_coa') ?>" class="btn btn-primary" title="cetak coa"><i class="fa fa-print"></i></a>
            </td>
        </tr>
        <?php }
        ?>
    </tbody>
</table>