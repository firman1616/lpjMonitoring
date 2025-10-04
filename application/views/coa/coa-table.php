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
                <a href="<?= base_url('index.php/COA/cetak_coa/'.$row->id) ?>" class="btn btn-primary" title="cetak coa"><i class="fa fa-print"></i></a>
                <?php 
                if ($row->x_customer == 'PT. AJINOMOTO INDONESIA') { ?>
                    <a href="<?= base_url('index.php/COA/cetak_coa_aji/'.$row->id) ?>" class="btn btn-warning" type="button" title="coa ajimonoto"><i class="fa fa-print"></i></a>
                    <a href="#" class="btn btn-danger" type="button" title="coa ajimonoto 2"><i class="fa fa-print"></i></a>
                <?php }
                ?>
            </td>
        </tr>
        <?php }
        ?>
    </tbody>
</table>