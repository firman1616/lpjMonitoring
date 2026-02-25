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
    $std_thiknes = $row->x_std_thickness;
    $std_gramatur = $row->x_std_gramature;
    $manu_date = $row->x_manufacturing_date;
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
                <td width="30%"><?= $cus ?></td>
                <td width="13%">&nbsp;</td>
                <td width="17%"><strong>No Po Customer</strong></td>
                <td width="2%" align="center" valign="middle">:</td>
                <td width="20%"><?= $po_cus ?></td>
            </tr>
            <tr>
                <td><strong>Product Name</strong></td>
                <td align="center" valign="middle">:</td>
                <td><?= $nama_barang ?></td>
                <td>&nbsp;</td>
                <td><strong>No SJK</strong></td>
                <td align="center" valign="middle">:</td>
                <td><?= $sjk ?></td>
            </tr>
            <tr>
                <td><strong>Material</strong></td>
                <td align="center" valign="middle">:</td>
                <td><?= $kode_mat ?></td>
                <td>&nbsp;</td>
                <td><strong>Jumlah</strong></td>
                <td align="center" valign="middle">:</td>
                <td><?= number_format($jumlah) ?> pcs</td>
            </tr>
            <tr>
                <td><strong>Mfg. Material</strong></td>
                <td align="center" valign="middle">:</td>
                <td><?= date('d/m/Y', strtotime($manu_date)) ?></td>
                <td>&nbsp;</td>
                <td><strong>Exp. Date Printing</strong></td>
                <td align="center" valign="middle">:</td>
                <td><?= date('d/m/Y', strtotime($manu_date)) ?></td>
            </tr>
            <tr>
                <td><strong>Printing Date</strong></td>
                <td align="center" valign="middle">:</td>
                <td><?= date('d/m/Y', strtotime($b)) ?></td>
                <td>&nbsp;</td>
                <td><strong>No. Batch</strong></td>
                <td align="center" valign="middle">:</td>
                <td>Terlampir</td>
            </tr>
        </tbody>
    </table>

    <table width="95%" border="1" style="margin: 5px auto; text-align: center; font-size: 12px; border-collapse: collapse; border: 1px solid black;">
        <tbody>
            <tr style="background-color: #B9B6B6;">
                <td width="21%" height="35"><strong>TEST ITEM</strong></td>
                <td width="42%"><strong>TARGET / LIMITS</strong></td>
                <td width="20%"><strong>METHODE</strong></td>
                <td width="17%"><strong>RESULT</strong></td>
            </tr>
            <tr>
                <td height="35" align="left" valign="middle"><strong><u>APPERANCE</u></strong></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td height="35" align="left" valign="middle">PRINTING</td>
                <td>No smearing, scratch and dirty</td>
                <td>Visual</td>
                <td>OK</td>
            </tr>
            <tr>
                <td height="35" align="left" valign="middle">CUTTNG</td>
                <td>Label complety cut</td>
                <td>Visual</td>
                <td>OK</td>
            </tr>
            <tr>
                <td height="35" align="left" valign="middle">COLOUR</td>
                <td>Within approved color range</td>
                <td>Visual</td>
                <td>OK</td>
            </tr>
            <tr>
                <td height="35" align="left" valign="middle">
                    <p>&nbsp;</p>
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>
              <p>&nbsp;</p></td>
            </tr>
            <tr>
                <td height="35" align="left" valign="middle"><strong><U>DIMENSION</U></strong></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td height="35" align="left" valign="middle">LENGTH (+/-1 mm)</td>
                <td><?=  number_format($panjang,1) ?> mm</td>
                <td>Caliper of Ruler</td>
                <td><?=  number_format($panjang,1) ?> mm</td>
            </tr>
            <tr>
                <td height="35" align="left" valign="middle">WIDTH (+/-1 mm)</td>
                <td><?=  number_format($lebar,1) ?> mm</td>
                <td>&nbsp;</td>
                <td><?=  number_format($lebar,1) ?> mm</td>
            </tr>
            <tr>
                <td height="35" align="left" valign="middle">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
			<tr>
                <td height="35" align="left" valign="middle"><strong><u>TEST ITEMS</u></strong></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
			<tr>
                <td height="35" align="left" valign="middle">CONTAMINATION</td>
                <td>No insect, hair and other foreign material</td>
                <td>Visual</td>
                <td>Pass</td>
            </tr>
        </tbody>
    </table>

    <table width="100%" style="font-size:12px; margin-top:5px">
        <tbody>
            <tr>
				<td width="69%">&nbsp;</td>
                <td width="6%">&nbsp;</td>
                <td width="25%" align="center" valign="middle">Surabaya, <?= date('d/m/Y', strtotime($create)) ?></td>
            </tr>
            <tr>
				<td width="69%" align="left" valign="top">&nbsp;</td>
                <td>&nbsp;</td>
                <td height="45">&nbsp;</td>
            </tr>
            <tr>
				<td width="69%">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="center" valign="middle">
                    <b><?= $user ?></b><br>
                    Quality Assurance
                </td>
            </tr>
      </tbody>
  </table>
</div>