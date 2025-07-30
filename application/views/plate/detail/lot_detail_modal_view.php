<table class="table table-bordered">
    <thead>
        <tr>
            <th>Origin</th>
            <th>Quantity Done</th>
            <th>Product Qty</th>
            <th>Location ID</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lot_detail->result() as $row): ?>
        <tr>
            <td><?= $row->origin ?></td>
            <td><?= $row->quantity_done ?></td>
            <td><?= $row->product_qty ?></td>
            <td><?= $row->location_id ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
