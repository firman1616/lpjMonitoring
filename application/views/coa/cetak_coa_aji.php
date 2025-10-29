<?php
foreach ($header as $row) {
    $coa = $row->name;
    $cus = $row->x_customer;
    $nama_barang = $row->x_nama_barang;
    $po_cus = $row->x_po_customer;
    $sjk = $row->no_sjk;
    $jumlah = $row->x_jumlah;
    $kode_mat = $row->x_kode_material;
    $tgl_kirim = $row->x_tanggal_kirim;
    $gramatur = $row->x_gramature;
    $tiknes = $row->x_thickness;
    $app = $row->x_apperance;
    $warna = $row->x_colour;
    $diecut = $row->x_diecut;
    $lem = $row->x_glueing;
    $panjang = $row->x_lenght;
    $lebar = $row->x_width;
    $shelf = $row->x_shelflife;
    $user = $row->user;
    $create = $row->create_date;
    $ket = $row->x_keterangan;
    $ball_tack = $row->x_ball_tack;
    $ball_tack_weight = $row->x_ball_tack_weight;
    $ball_tack_dia = $row->x_ball_tack_diameter;
}
?>

<?php
foreach ($lot as $row) {
    $a = $row->no_lot;
    $b = $row->tgl_produksi;
    $c = $row->tgl_expired;
}
?>

<div style="page-break-inside: avoid;">

    <table width="231" style="border-bottom: 1px solid black; font-size: 11px;">
        <tbody>
            <tr>
                <td>
                    <span>Laprint Jaya, PT</span><br>
                    <span>Komplek Pergudangan Sinar Gedangan B-06 Ds Gemurung -</span><br>
                    <span>Gedangan</span><br>
                    <span>Sidoarjo JATIM 61254</span><br>
                    <span>Indonesia</span><br>
                    <span>NPWP 01.599.758.8-619.000</span>
                </td>
            </tr>
        </tbody>
    </table>

    <br>

    <div style="text-align: center;">
        <span style="font-size: 20px;"><b>COA</b></span><br>
        <span style="font-size: 14px;"><u>Certificate of Analysis</u></span><br>
        <span style="font-size: 12px;"><b>No : <?= $coa ?></b></span><br>
    </div>
    <br>
    <table width="100%" style="font-size:11px">
        <tbody>
            <tr>
                <td width="14%"><strong>Customer</strong></td>
                <td width="2%" align="center" valign="middle">:</td>
                <td width="26%"><?= $cus ?></td>
                <td width="21%">&nbsp;</td>
                <td width="15%"><strong>No Po Customer</strong></td>
                <td width="2%" align="center" valign="middle">:</td>
                <td width="20%"><?= $po_cus ?></td>
            </tr>
            <tr>
                <td><strong>Nama Barang</strong></td>
                <td align="center" valign="middle">:</td>
                <td><?= $nama_barang ?></td>
                <td>&nbsp;</td>
                <td><strong>No SJK</strong></td>
                <td align="center" valign="middle">:</td>
                <td><?= $sjk ?></td>
            </tr>
            <tr>
                <td><strong>Tanggal Produksi</strong></td>
                <td align="center" valign="middle">:</td>
                <td><?= date('d/m/Y', strtotime($b)) ?></td>
                <td>&nbsp;</td>
                <td><strong>Jumlah</strong></td>
                <td align="center" valign="middle">:</td>
                <td><?= number_format($jumlah) ?> pcs</td>
            </tr>
            <tr>
                <td><strong>Tanggal Expired</strong></td>
                <td align="center" valign="middle">:</td>
                <td><?= date('d/m/Y', strtotime($c)) ?></td>
                <td>&nbsp;</td>
                <td><strong>Kode Material</strong></td>
                <td align="center" valign="middle">:</td>
                <td><?= $kode_mat ?></td>
            </tr>
            <tr>
                <td><strong>Tanggal Kirim</strong></td>
                <td align="center" valign="middle">:</td>
                <td><?= date('d/m/Y', strtotime($tgl_kirim)) ?></td>
                <td>&nbsp;</td>
                <td><strong>No Batch</strong></td>
                <td align="center" valign="middle">:</td>
                <td><?= $a ?></td>
            </tr>
        </tbody>
    </table>

    <table width="95%" border="1" style="margin: 5px auto; text-align: center; font-size: 12px; border-collapse: collapse; border: 1px solid black;">
        <tbody>
            <tr style="background-color: #B9B6B6;">
                <td width="40%" height="35"><strong>ITEM</strong></td>
                <td width="24%"><strong>STANDART</strong></td>
                <td width="36%"><strong>RESULT</strong></td>
            </tr>
            <tr>
                <td height="35" align="left" valign="middle">GRAMATURE</td>
                <td><?= number_format($gramatur, 1) ?> gsm</td>
                <td><?= number_format($gramatur, 1) ?> gsm</td>
            </tr>
            <tr>
                <td height="35" align="left" valign="middle">THIKNESS</td>
                <td><?= number_format($tiknes) ?> mikron</td>
                <td><?= number_format($tiknes) ?> mikron</td>
            </tr>
            <tr>
                <td height="35" align="left" valign="middle">LENGHT (+/-1 mm)</td>
                <td><?= number_format($panjang) ?> mm</td>
                <td><?= number_format($panjang) ?> mm</td>
            </tr>
            <tr>
                <td height="35" align="left" valign="middle">WIDTH (+/-1 mm)</td>
                <td><?= number_format($lebar, 1) ?> mm</td>
                <td><?= number_format($lebar, 1) ?> mm</td>
            </tr>
            <tr>
                <td height="35" align="left" valign="middle">
                    <p>ADHESIVE</p>
                    <p>NO BALL TACK :</p>
                    <p>BALL TACK WIGHT :</p>
                    <p>BALL TACK DIAMETER</p>
                </td>
                <td>
                    <p>&nbsp;</p>
                    <p>12 s/d 16</p>
                    <p>2.497 g s/d 5.060 g</p>
                    <p>8.50 mm s/d 11.10mm</p>
                </td>
                <td>
                    <p>&nbsp;</p>
                    <p><?= $ball_tack ?></p>
                    <p><?= $ball_tack_weight ?></p>
                    <p><?= $ball_tack_dia ?></p>
            </td>
            </tr>
            <tr>
                <td height="35" align="left" valign="middle">APPERANCE</td>
                <td><?= $app ?></td>
                <td><?= $app ?></td>
            </tr>
            <tr>
                <td height="35" align="left" valign="middle">COLOUR</td>
                <td><?= $warna ?></td>
                <td><?= $warna ?></td>
            </tr>
            <tr>
                <td height="35" align="left" valign="middle">DIECUT</td>
                <td><?= $diecut ?></td>
                <td><?= $diecut ?></td>
            </tr>
            <tr>
                <td height="35" align="left" valign="middle">SHELF LIFE (25C; 55% RH)</td>
                <td><?= $shelf ?> month</td>
                <td><?= $shelf ?> month</td>
            </tr>
        </tbody>
    </table>

    <table width="100%" style="font-size:12px; margin-top:10px">
        <tbody>
            <tr>
                <td width="70%">&nbsp;</td>
                <td width="23%" align="center" valign="middle">Surabaya, <?= date('d/m/Y', strtotime($create)) ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td height="65">&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td align="center" valign="middle">
                    <b><?= $user ?></b><br>
                    Quality Assurance
                </td>
            </tr>
        </tbody>
    </table>
</div>