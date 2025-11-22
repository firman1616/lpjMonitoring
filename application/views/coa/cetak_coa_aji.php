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
    $gap = $row->x_gap;
    $amount_roll = $row->x_amount_pcs_roll;
    $w_roll = $row->x_w_roll_bruto;
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
                <td width="16%"><strong>Customer</strong></td>
                <td width="2%" align="center" valign="middle">:</td>
                <td width="24%"><?= $cus ?></td>
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
                <td height="35" align="left" valign="middle">SIZE</td>
                <td><?= number_format($lebar) ?> x <?= number_format($panjang) ?> &plusmn; 1.2 mm roving (diecut position)</td>
                <td><?= number_format($lebar) ?> x <?= number_format($panjang) ?> mm</td>
            </tr>
            <tr>
                <td height="35" align="left" valign="middle">GAP DISTANCE</td>
                <td>3,00 - 6,10 mm</td>
                <td><?= $gap ?> mm</td>
            </tr>
            <tr>
                <td height="35" align="left" valign="middle">
                    <p>ID CORE (Inner Diameter Core)</p>
                </td>
                <td>76,2 &plusmn; 1 mm</td>
                <td>
              <p>76,2 mm</p></td>
            </tr>
            <tr>
                <td height="35" align="left" valign="middle">AMOUNT Pcs/Roll</td>
                <td><?= $amount_roll ?> pcs &plusmn; 3%</td>
                <td><?= $amount_roll ?> pcs</td>
            </tr>
            <tr>
                <td height="35" align="left" valign="middle">OD CORE (Outer Diameter Core)</td>
                <td>310 mm &plusmn; 3%</td>
                <td>310 mm</td>
            </tr>
            <tr>
                <td height="35" align="left" valign="middle">WEIGHT ROLL BRUTO</td>
                <td><?= $w_roll ?> Kg &plusmn; 5%</td>
                <td><?= $w_roll ?> Kg</td>
            </tr>
            <tr>
                <td height="35" align="left" valign="middle">CORE LENGTH</td>
                <td>64 &plusmn; 5mm </td>
                <td>64 mm</td>
            </tr>
			<tr>
                <td height="35" align="left" valign="middle">AMOUNT OF JOIN</td>
                <td>5</td>
                <td>0 - 3</td>
            </tr>
			<tr>
                <td height="35" align="left" valign="middle">LABEL POSITION</td>
                <td>midle core length &plusmn; 3 mm</td>
                <td>Good</td>
            </tr>
			<tr>
                <td height="35" align="left" valign="middle">LABEL ROLL CONDITION</td>
                <td><p>Roll neatly</p>
                <p>condition zig zag</p>
                <p>Label Roll Max &plusmn; 3 mm</p>
                <p>(right &amp; left &plusmn; 1.5 mm)</p></td>
                <td>Roll Neatly</td>
            </tr>
        </tbody>
    </table>

    <table width="100%" style="font-size:12px; margin-top:5px">
        <tbody>
            <tr>
                <td width="70%">&nbsp;</td>
                <td width="23%" align="center" valign="middle">Surabaya, <?= date('d/m/Y', strtotime($create)) ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td height="45">&nbsp;</td>
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