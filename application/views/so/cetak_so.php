<?php 
foreach ($header_so as $row) {
    $cust = $row->nama_cust;
    $alamat_cust = $row->alamat;
    $alamat_tagih = $row->inv_street;
    $alamat_kirim = $row->ship_street;
    $tgl_penawaran = $row->date_order;
    $sales = $row->nama_sales;
    $payment = $row->payment_term;
    $no_so = $row->name;
    $po_cust = $row->x_po_cust;
    $sph = $row->sph;
    $date_sph = $row->date_sph;
}
?>

<style>
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
</style>

<div style="page-break-inside: avoid;">
    <table width="100%" style="font-size: 11px; font-family: Arial, sans-serif; border-collapse: collapse;">
        <tbody>
            <tr>
                <td width="48%" rowspan="5" valign="top" style="line-height: 1.5;">
                    <b>Kepada Yth,</b><br>
                    <?= $cust ?><br>
                    <?= $alamat_cust ?>
                </td>
                <td width="4%" valign="top">&nbsp;</td>

                <td width="17%" valign="top"><b>Delivery Invoice</b></td>
                <td width="1%" valign="top" align="center">:</td>
                <td width="30%" valign="top" style="line-height: 1.5;">
                    <?= $alamat_tagih ?>
            </tr>
            <tr>
              <td valign="top" style="padding-top: 10px;">&nbsp;</td>
                <td valign="top" style="padding-top: 10px;"><b>Delivery Address</b></td>
                <td valign="top" align="center" style="padding-top: 10px;">:</td>
                <td valign="top" style="padding-top: 10px; line-height: 1.5;">
                    <?= $alamat_kirim ?>
                </td>
            </tr>
            <tr>
              <td valign="top" style="padding-top: 15px;">&nbsp;</td>
                <td valign="top" style="padding-top: 15px;"><b>SO Date</b></td>
                <td valign="top" align="center" style="padding-top: 15px;">:</td>
                <td valign="top" style="padding-top: 15px;"><?= date('d-m-Y h:i:s', strtotime($tgl_penawaran)) ?></td>
            </tr>
            <tr>
              <td valign="top" style="padding-top: 10px;">&nbsp;</td>
                <td valign="top" style="padding-top: 10px;"><b>SPH Number</b></td>
                <td valign="top" align="center" style="padding-top: 10px;">:</td>
                <td valign="top" style="padding-top: 10px;"><?=  $sph ?> </td>
            </tr>
            <tr>
              <td valign="top" style="padding-top: 10px;">&nbsp;</td>
                <td valign="top" style="padding-top: 10px;"><b>Sales Person</b></td>
                <td valign="top" align="center" style="padding-top: 10px;">:</td>
                <td valign="top" style="padding-top: 10px;"><?= $sales ?></td>
            </tr>
        </tbody>
    </table>

    <h1 style="font-size: 14px; text-align: center; font-family: Arial, sans-serif; font-weight: bold; line-height: 1.6; margin-top: 20px; margin-bottom: 20px;">
       <u><?= $no_so ?></u> 
    </h1>

    <table width="100%" style="font-size: 11px; font-family: Arial, sans-serif; border-collapse: collapse; margin-top: 15px;">
    <thead>
        <tr>
            <th width="3%" align="center" style="border-top: 1.5px solid black; border-bottom: 1.5px solid black; padding: 6px 0;">No</th>
            <th width="26%" align="center" style="border-top: 1.5px solid black; border-bottom: 1.5px solid black;">Product Name</th>
            <th width="7%" align="center" style="border-top: 1.5px solid black; border-bottom: 1.5px solid black;">Quantity</th>
            <th width="5%" align="center" style="border-top: 1.5px solid black; border-bottom: 1.5px solid black;">Satuan</th>
            <th width="5%" align="center" style="border-top: 1.5px solid black; border-bottom: 1.5px solid black;">Unit Price</th>
            <th width="10%" align="center" style="border-top: 1.5px solid black; border-bottom: 1.5px solid black;">Tax</th>
            <th width="15%" align="center" style="border-top: 1.5px solid black; border-bottom: 1.5px solid black;">Total</th>
        </tr>
    </thead>
    <tbody>
        <?php 
		$x=1;
        foreach ($det_so as $row) { 
        $subtotal = $row->qty * $row->price_unit;
        $total_untaxes += $subtotal;
        $taxes = $total_untaxes * (11/100);
        $grand_total = $total_untaxes + $taxes;
        ?>
        <tr>
            <td width="5%" align="center" valign="top" style="border-bottom: 1px solid #e0e0e0; padding: 8px 0;"><?= $x++; ?></td>
            <td width="40%" valign="top" style="border-bottom: 1px solid #e0e0e0; padding: 8px 5px 8px 0; line-height: 1.4;">
                <?=  $row->produk_name ?>
            </td>
            <td width="15%" valign="top" align="center" style="border-bottom: 1px solid #e0e0e0; padding: 8px 0;"><?= number_format($row->qty) ?></td>
            <td width="15%" valign="top" align="center" style="border-bottom: 1px solid #e0e0e0; padding: 8px 0;"><?= $row->uom ?></td>
            <td width="15%" valign="top" align="center" style="border-bottom: 1px solid #e0e0e0; padding: 8px 0; line-height: 1.4;"><?= $row->price_unit ?></td>
            <td width="10%" valign="top" align="center" style="border-bottom: 1px solid #e0e0e0; padding: 8px 0; line-height: 1.4;">11 %<br></td>
            <td width="10%" valign="top" align="right" style="border-bottom: 1px solid #e0e0e0; padding: 8px 0;">Rp. <?= number_format($subtotal,2) ?></td>
        </tr>
        <?php }
        ?>
    </tbody>
</table>

<table align="right" width="35%" style="font-family: Arial, Helvetica, sans-serif; font-size: 11px; border-collapse: collapse; margin-top: 15px; color: #000;">
    <tbody>
        <tr>
            <td width="49%" style="border-top: 1.5px solid #000; border-bottom: 1px solid #eaeaea; padding: 5px 2px; font-size: 11px;"><b>Amount Untaxes</b></td>
            <td width="51%" align="right" style="border-top: 1.5px solid #000; border-bottom: 1px solid #eaeaea; padding: 5px 2px; font-size: 11px;"><strong>Rp 
            <?= number_format($total_untaxes) ?>
            </strong></td>
        </tr>
        <tr>
            <td style="border-bottom: 1.5px solid #000; padding: 5px 2px; font-size: 11px;">Taxes</td>
            <td align="right" style="border-bottom: 1.5px solid #000; padding: 5px 2px; font-size: 11px;">Rp <?= number_format($taxes,2) ?></td>
        </tr>
        <tr>
            <td style="padding: 6px 2px; font-size: 11px;"><b>Total</b></td>
            <td align="right" style="padding: 6px 2px; font-size: 11px;"><b>Rp <?= number_format($grand_total,2) ?></b></td>
        </tr>
    </tbody>
</table>

<div style="clear: both;"></div>
<table class="tabel-keterangan">
        <tbody>
            <tr>
                <td colspan="<?= empty($ket2) ? '1' : '2' ?>" align="left">Keterangan</td>
            </tr>
            <tr>
                <td style="font-weight: normal;"><p>Syarat dan  ketentuan telah tertuang dalam <?=  $sph ?> </p></td>
            </tr>

        </tbody>
  </table>
<p>&nbsp;</p>
<p>Demikian Sales Order  ini kami berikan. Atas perhatiannya kami ucapkan terima kasih.</p>    
    <br>
    <table width="100%" style="font-size: 12px;">
        <tbody>
            <tr>
                <td width="37%" align="center">Di Setujui Oleh, <br> Nama Customer</td>
                <td width="30%" align="center"></td>
                <td width="33%" align="center">Di Setujui Oleh, <br>PT. Laprint Jaya</td>
            </tr>
            <tr>
                <td height="57">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td align="center"><strong><br>
                    
                <?= $cust ?>
                </strong></td>
                <td align="center"></td>
                <td align="center"><strong>
                <?= $sales ?>
                </strong></td>
            </tr>
        </tbody>
    </table>

</div>