<table class="table table-bordered" id="tablePlate" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Code</th>
            <th>Width (mm)</th>
            <th>Length (mm)</th>
            <th>Luasan (m2)</th>
            <th>Gd Stock</th>
            <th>Gd PLDC</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $x=1;
        foreach ($plate as $row) { 
            $m2 = ($row->x_width * $row->x_length)/1000;            
            ?>
            <tr>
                <td><?= $x++; ?></td>
                <td><?= $row->prod_tmpl ?></td>
                <td><?= $row->default_code ?></td>
                <td><?= number_format($row->x_width) ?></td>
                <td><?= number_format($row->x_length) ?></td>
                <td><?= number_format($m2) ?></td>
                <td><?= $row->gd_stock ?></td>
                <td><?= $row->gd_pldc ?></td>
                <td><a href="<?= base_url('index.php/Plate/getLot/'.$row->id) ?>" class="btn btn-primary"><i class="fa fa-list"></i></a></td>
            </tr>
        <?php } ?>

    </tbody>
</table>