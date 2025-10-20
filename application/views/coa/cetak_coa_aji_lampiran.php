<style>
    table {
        border-collapse: collapse;
        width: 100%;
        font-size: 12px;
    }

    th,
    td {
        border: 1px solid black;
        padding: 6px;
        text-align: center;
    }

    th {
        background-color: #B9B6B6;
    }
</style>

<div style="page-break-before: always;"> <!-- Page break ke halaman baru -->
    <h3 style="text-align: center; margin-bottom: 10px;">Lampiran</h3>

    <table>
        <thead>
            <tr>
                <td width="185" bgcolor="#B0ADAD"><strong>Lot / Serial Number </strong></td>
                <td width="99" bgcolor="#B0ADAD"><strong>Quantity</strong></td>
                <td width="105" bgcolor="#B0ADAD"><strong>Production Date</strong></td>
                <td width="114" bgcolor="#B0ADAD"><strong>Expired Date</strong></td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($detail as $row) { ?>
                <tr>
                    <td><?= $row->no_lot ?></td>
                    <td><?= number_format($row->qty) ?> Pcs</td>
                    <td><?= date('d - m - Y', strtotime($row->tgl_produksi)) ?></td>
                    <td><?= date('d - m - Y', strtotime($row->tgl_expired)) ?></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>