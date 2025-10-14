<!-- <style>
    .tabel-penawaran {
        margin-top: 10px;
        font-size: 11px;
        width: 100%;
        border-collapse: collapse;
    }

    .tabel-penawaran th,
    .tabel-penawaran td {
        border: 1px solid black;
        text-align: left;
        vertical-align: top;
        padding: 4px;
    }

    .tabel-penawaran th {
        text-align: center;
    }

    .tabel-keterangan {
        margin-top: 12px;
        font-size: 12px;
        font-weight: bold;
        width: 100%;
        border-collapse: collapse;
    }

    .tabel-keterangan th,
    .tabel-keterangan td {
        border: 1px solid black;
        text-align: left;
        vertical-align: top;
        padding: 4px;
    }

    .tabel-keterangan th {
        text-align: center;
    }
</style> -->

<?php 
foreach ($header as $row) { 
    $nama_barang = $row->x_nama_barang;
    $kirim = $row->x_tanggal_kirim;
}
?>

<div style="page-break-inside: avoid;">
    <table width="575" style="width: 100%">
        <tbody>
            <tr>
                <td width="139">Nama Material</td>
                <td width="10" align="center" valign="middle">:</td>
                <td width="751"><?= $nama_barang ?></td>
            </tr>
            <tr>
                <td>Delivery Date</td>
                <td align="center" valign="middle">:</td>
                <td><?= date('d F Y', strtotime($kirim)) ?></td>
            </tr>
        </tbody>
    </table>
    <!-- detail data -->
     <table style="width:100%; border-collapse: collapse; border: 1px solid black; margin-top:3%;">
        <tbody>
            <tr>
                <td style="border: 1px solid black; text-align: center; vertical-align: middle;"><strong>No.</strong></td>
                <td style="border: 1px solid black; text-align: center; vertical-align: middle;"><strong>Production Date (Lot)</strong></td>
                <td style="border: 1px solid black; text-align: center; vertical-align: middle;"><strong>Batch No.</strong></td>
                <td style="border: 1px solid black; text-align: center; vertical-align: middle;"><strong>Expired Date</strong></td>
                <td style="border: 1px solid black; text-align: center; vertical-align: middle;"><strong>Quantity</strong></td>
                <td style="border: 1px solid black; text-align: center; vertical-align: middle;"><strong>UoM</strong></td>
                <td style="border: 1px solid black; text-align: center; vertical-align: middle;"><strong>Remarks</strong></td>
            </tr>
            <?php 
            $x=1;
            foreach ($detail as $row) { ?>
            <tr>
                <td align="center" valign="middle" style="border: 1px solid black;"><?= $x++; ?></td>
                <td align="center" valign="middle" style="border: 1px solid black;"><?= date('d - m - Y', strtotime($row->tgl_produksi)) ?></td>
                <td align="center" valign="middle" style="border: 1px solid black;"><?= $row->no_lot ?></td>
                <td align="center" valign="middle" style="border: 1px solid black;"><?= date('d - m - Y', strtotime($row->tgl_expired)) ?></td>
                <td align="center" valign="middle" style="border: 1px solid black;"><?= number_format($row->qty) ?></td>
                <td align="center" valign="middle" style="border: 1px solid black;"><?= $row->uom ?></td>
                <td align="center" valign="middle" style="border: 1px solid black;">&nbsp;</td>
            </tr>
            <?php }
            ?>
        </tbody>
    </table>

</div>