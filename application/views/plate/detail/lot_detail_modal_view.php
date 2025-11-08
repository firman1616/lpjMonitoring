<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>No OK</th>
            <th>Produk</th>
            <th>Quantity (m2)</th>
            <th>Tipe MO</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $x=1;
        foreach ($lot_detail->result() as $row): ?>
        <tr>
            <td><?= $x++; ?></td>
            <td><?= $row->origin ?></td>
            <td><?= $row->produk ?></td>
            <td><?= number_format($row->quantity_done,2) ?></td>
            <td><?= $row->x_type_mo ?></td>
            <td><?= $row->keterangan ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
