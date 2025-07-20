<?php
foreach ($header_sph as $row) {
    $no_sph = $row->no_sph;
    $ket = $row->x_keterangan;
    $ket2 = $row->x_keterangan2;
    $nama_cust = $row->nama_cust;
    $alamat = $row->street;
    $sales = $row->admin_name;
    $phone = $row->phone;
    $pic_cust = $row->x_pic_cust;
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
    <table width="100%" style="font-size: 10px; font-weight:bold; border-collapse: collapse;">
        <tbody>
            <tr>
                <td width="10%">No</td>
                <td width="2%" align="center">:</td>
                <td width="37%"><?= $no_sph ?></td>
                <td width="27%">&nbsp;</td>
                <td width="24%" style="text-align: right;"><b>Sidoarjo, <?= date('d F Y') ?></b></td>
            </tr>
            <tr>
                <td>To</td>
                <td align="center">:</td>
                <td><?= $nama_cust ?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Tlp</td>
                <td align="center">:</td>
                <td><?= $phone ?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td align="center">:</td>
                <td><?= $alamat ?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Attn</td>
                <td align="center">:</td>
                <td><?= $pic_cust ?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Re</td>
                <td align="center">:</td>
                <td>Perhal Penawaran Harga</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </tbody>
    </table>

    <br>
    <span style="font-size: 12px;">Dengan Hormat,
        <br>
        Bersama ini kami sampaikan penawaran harga dalam pokok surat ini sebagai berikut :
    </span>

    <table class="tabel-penawaran">
        <thead>
            <tr>
                <th width="14%" style="border: 1px solid black; text-align: center;">Quotation</th>
                <th width="31%" style="border: 1px solid black; text-align: center;">Nama Item</th>
                <th width="9%" style="border: 1px solid black; text-align: center;">Ukuran (mm)</th>
                <th width="25%" style="border: 1px solid black; text-align: center;">Detail Spesifikasi</th>
                <th width="10%" style="border: 1px solid black; text-align: center;">Jumlah (pcs)</th>
                <th width="11%" style="border: 1px solid black; text-align: center;">Harga (Rp/pcs)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($det_sph as $row) { ?>
                <tr>
                    <td valign="middle" style="border: 1px solid black;"><?= $row->sq ?></td>
                    <td valign="middle" style="border: 1px solid black;">[<?= $row->default_code ?>] <?= $row->nama_produk ?></td>
                    <td align="center" valign="middle" style="border: 1px solid black;"><?= $row->x_length . 'x' . $row->x_width ?></td>
                    <td valign="middle" style="border: 1px solid black;">
                        Bahan : <?= $row->kategori_bahan ?><br>
                        Warna : <?= $row->x_tinta_std ?><br>
                        Finishing : None<br>
                        Diecut :<?= $row->diecute_shape ?><br>
                        Packing Layout : <?= $row->packing_layout ?>
                    </td>
                    <td valign="middle" style="border: 1px solid black;"><?= number_format($row->x_qty) ?></td>
                    <td valign="middle" style="border: 1px solid black;"><?= number_format($row->harga_pcs, 2) ?></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
    <table class="tabel-keterangan">
        <tbody>
            <tr>
                <td colspan="<?= empty($ket2) ? '1' : '2' ?>" align="center">Keterangan</td>
            </tr>
            <tr>
                <td style="font-weight: normal;"><?= nl2br($ket) ?></td>
                <?php if (!empty($ket2)) : ?>
                    <td style="font-weight: normal;"><?= nl2br($ket2) ?></td>
                <?php endif; ?>
            </tr>

        </tbody>
    </table>

    <p style="font-size:12px; text-align: justify;">Demikian surat penawaran ini disampaikan, sambil menanti PO dari Bapak / Ibu atas perhatian dan kerjasamanya kami ucapkan terima kasih. </p>

    <table width="100%" style="font-size: 12px;">
        <tbody>
            <tr>
                <td width="37%" align="center">Hormat Kami, <br> PT. Laprint Jaya</td>
                <td width="30%" align="center">Mengetahui</td>
                <td width="33%" align="center">Konfirmas (ACC) Pembeli</td>
            </tr>
            <tr>
                <td height="57">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td align="center"><?= $sales ?> <br>Staff Marketing and Sales</td>
                <td align="center">JANE LIDYA SUTJIONO <br> Marketing Manager</td>
                <td align="center">_________________________________</td>
            </tr>
        </tbody>
    </table>

</div>