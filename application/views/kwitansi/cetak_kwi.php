<?php
foreach ($header as $row) {
    $no_kwi = $row->no_kwitansi;
    $customer = $row->customer;
    // $terbilang = $row->amount_to_text;
    $faktur = $row->faktur;
    $invoice_date = $row->list_date_invoice;
    $sjk = $row->no_sjk;
    $bruto = $row->total_untaxed;
    $dpp_lain = 11 / 12 * $bruto;
    $ppn12 = $dpp_lain * 12 / 100;
    // $netto = $bruto + $ppn12;
    $jalan = $row->street;
    $tgl_invoice = $row->tgl_invoice;
}

?>

<style>
    .invship {
        margin-top: 5px;
        font-size: 13px;
    }

    table.item {
        width: 100%;
        border-collapse: collapse;
        /* Menggabungkan border untuk tabel */
        font-size: 12px;
        margin-top: 2px;
    }

    table.item td,
    table.item th {
        border: 1px solid black;
        /* Garis solid hitam untuk setiap sel */
        /*            padding: 5px;*/
        /* Memberikan jarak di dalam sel */
    }

    table.item th {
        background-color: #f2f2f2;
        /* Warna latar belakang untuk header tabel */
    }

    table.item td {
        text-align: left;
        /* Default teks rata kiri */
    }

    table.item td[align="right"] {
        text-align: right;
        /* Rata kanan jika align diatur ke "right" */
    }

    table.item td[align="center"],
    table.item th[align="center"] {
        text-align: center;
        /* Rata tengah jika align diatur ke "center" */
    }
</style>

<div style="page-break-inside: avoid; font-size: 10px;">

    <table width="200" style="margin: 5px auto; font-size: 15px;">
        <tbody>
            <tr>
                <td align="center" style="font-size: 20px; font-weight: bold; font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;">Kwitansi Jual</td>
            </tr>
            <tr>
                <td align="center" style="font-size: 12px;"><?= $no_kwi ?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <table width="100%" class="invship">
        <tbody>
            <tr>
                <td width="33%" rowspan="2"><strong>Diterima Dari</strong> :<br>
                    <?= $customer ?>,<br>
                    <?= $jalan ?></td>
                <td width="20%">&nbsp;</td>
                <td width="7%" valign="top"><strong>Terbilang</strong></td>
                <td width="1%" valign="top"><strong>:</strong></td>
                <td width="39%" valign="top"><?= $terbilang ?></td>
            </tr>
            <tr>
                <td width="20%">&nbsp;</td>
                <td width="7%" valign="top"><strong>Untuk Pembayaran</strong></td>
                <td width="1%" valign="top"><strong>:</strong></td>
                <td width="39%" valign="top"><?= $faktur ?> <?= $invoice_date ?></td>
            </tr>
            <tr>
                <td colspan="5"><strong>SJ Keluar : </strong><?= $sjk ?></td>
            </tr>
        </tbody>
    </table>
    <table width="100%" class="item">
        <tbody>
            <tr>
                <td width="30%" align="center"><strong>Keterangan</strong></td>
                <td width="30%" align="center"><strong>Jumlah</strong></td>
            </tr>

            <tr>
                <td>Bruto</td>
                <td align="right">Rp. <?= number_format($bruto, 2) ?></td>
            </tr>
            <tr>
                <td>Diskon</td>
                <td align="right">Rp. 0.00</td>
            </tr>
            <tr>
                <td>DPP Nilai Lain</td>
                <td align="right">Rp. <?= number_format($dpp_lain, 2) ?><br></td>
            </tr>
            <tr>
                <td>PPN 12%</td>
                <td align="right">Rp. <?= number_format($ppn12, 2) ?></td>
            </tr>
            <tr>
                <td><strong>Netto</strong></td>
                <td align="right">Rp. <?= number_format($netto, 2) ?></td>
            </tr>
        </tbody>
    </table>

    <table width="100%">
        <tbody>
            <tr>
                <td width="19%"><strong>Alamat Transfer</strong></td>
                <td width="1%" align="center"><strong>:</strong></td>
                <td width="45%">&nbsp;</td>
                <td width="2%">&nbsp;</td>
                <td width="33%" align="center">Sidoarjo, <?= date('d F Y', strtotime($tgl_invoice)) ?></td>
            </tr>
            <tr>
                <td><strong>Bank</strong></td>
                <td align="center">:</td>
                <td>BCA Cabang GALAXY Surabaya</td>
                <td>&nbsp;</td>
                <td rowspan="3" align="center">&nbsp;</td>
            </tr>
            <tr>
                <td><strong>A/C</strong></td>
                <td align="center">:</td>
                <td>788.093.2688</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td height="16"><strong>A.N</strong></td>
                <td align="center">:</td>
                <td>PT LAPRINT JAYA</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td height="26" colspan="3" align="left" valign="top">
                    <p><em style="font-size: 9px">NB : Pembayaran dengan CHEQUE dicantumkan a.n PT LAPRINT JAYA <br>Kwitansi ini baru berlaku setelah CHEQUE yang diterima cair</em></p>
                </td>
                <td>&nbsp;</td>
                <td align="center">......................................</td>
            </tr>
        </tbody>
    </table>


</div>