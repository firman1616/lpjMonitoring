<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kwitansi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // if ($this->session->userdata('status') == FALSE || $this->session->userdata('level') != 1) {
        //     redirect(base_url("login"));
        // }
        // $this->load->library('pdf');
        $this->load->model('M_Kwitansi', 'kwitansi');
    }

    public function index()
    {
        $data = [
            'title' => 'Kwitansi',
            'table_title' => 'Kwitansi List',
            'conten' => 'kwitansi/index',
            'footer_js' => array('assets/js/kwitansi.js')
        ];
        $this->load->view('template/conten', $data);
    }

    function tableKwitansi()
    {
        $data['kwitansi'] = $this->kwitansi->getKwitansi()->result();

        echo json_encode($this->load->view('kwitansi/kwitansi-table', $data, false));
    }

    function cetak_kwitansi($kwi)
    {
        $header_data = $this->kwitansi->cetak_kwitansi($kwi)->result();
        $detail_data = $this->kwitansi->det_kwitansi($kwi)->result();
        $name = !empty($header_data) && isset($header_data[0]->name) ? $header_data[0]->name : $kwi;
        // $name = '123';
        $data = [
            'title' => $name,
            'header_kwi' => $header_data,
            // 'det_kwi' => $detail_data,
        ];
        // $name = $so;
        $this->load->library('pdf');
        $html = $this->load->view('kwitansi/cetak_kwitansi', $data, true);
        $this->pdf->createPDF($html, $name);
    }

    public function cetak_kwi($kwi)
    {
        $header_data = $this->kwitansi->cetak_kwitansi($kwi)->result();
        $detail_data = $this->kwitansi->det_kwitansi($kwi)->result();
        $name = !empty($header_data) && isset($header_data[0]->name) ? $header_data[0]->name : $kwi;

        // 🧮 Hitung nilai netto
        if (!empty($header_data)) {
            $bruto = $header_data[0]->total_untaxed;
            $dpp_lain = 11 / 12 * $bruto;
            $ppn12 = $dpp_lain * 12 / 100;
            $netto = $bruto + $ppn12;

            $terbilang_nilai = ucfirst($this->terbilang($netto));
        } else {
            $netto = 0;
            $terbilang_nilai = "Nol rupiah";
        }

        $data = [
            'title' => $name,
            'header' => $header_data,
            'detail' => $detail_data,
            'netto'  => $netto,
            'terbilang' => $terbilang_nilai,
        ];

        $html_page1 = $this->load->view('kwitansi/cetak_kwi', $data, true);

         $mpdf = new \Mpdf\Mpdf([
             'format' => 'Letter',
             'margin_top' => 28,
             'margin_bottom' => 30,
         ]);

        // $mpdf = new \Mpdf\Mpdf([
        //     'format' => 'A5-L',
        //     'margin_top' => 27,
        //     'margin_left' => 3,
        //     'margin_right' => 3,
        // ]);

        $logoPath = base_url('assets/img/lpjHeader.png');
        $mpdf->SetHTMLHeader('
            <div style="text-align: left; margin-bottom: 4px;">
                <img src="' . $logoPath . '" alt="Logo" style="width: 330px; height: auto; margin-bottom: 2px;" />
            </div>
            <hr style="border: 2px solid black; width: 100%; margin-top: 0px">
        ');

        $mpdf->WriteHTML($html_page1);
        $mpdf->Output("$name.pdf", 'D');
    }

    private function terbilang_ribuan($n)
    {
        $satuan = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];
        $n = (int)$n;
        if ($n < 12) return $satuan[$n];
        if ($n < 20) return $this->terbilang_ribuan($n - 10) . " belas";
        if ($n < 100) return $this->terbilang_ribuan(intval($n / 10)) . " puluh" . (($n % 10) ? " " . $this->terbilang_ribuan($n % 10) : "");
        if ($n < 200) return "seratus" . (($n - 100) ? " " . $this->terbilang_ribuan($n - 100) : "");
        if ($n < 1000) return $this->terbilang_ribuan(intval($n / 100)) . " ratus" . (($n % 100) ? " " . $this->terbilang_ribuan($n % 100) : "");
        if ($n < 2000) return "seribu" . (($n - 1000) ? " " . $this->terbilang_ribuan($n - 1000) : "");
        if ($n < 1000000) return $this->terbilang_ribuan(intval($n / 1000)) . " ribu" . (($n % 1000) ? " " . $this->terbilang_ribuan($n % 1000) : "");
        if ($n < 1000000000) return $this->terbilang_ribuan(intval($n / 1000000)) . " juta" . (($n % 1000000) ? " " . $this->terbilang_ribuan($n % 1000000) : "");
        if ($n < 1000000000000) return $this->terbilang_ribuan(intval($n / 1000000000)) . " miliar" . (($n % 1000000000) ? " " . $this->terbilang_ribuan($n % 1000000000) : "");
        return $this->terbilang_ribuan(intval($n / 1000000000000)) . " triliun" . (($n % 1000000000000) ? " " . $this->terbilang_ribuan($n % 1000000000000) : "");
    }

    private function terbilang($number)
    {
        if (!is_numeric($number)) return "nol rupiah";

        $num = number_format((float)$number, 2, '.', '');
        list($intPart, $decPart) = explode('.', $num);

        $intPart = (int)$intPart;
        $decPart = (int)$decPart;

        $resultParts = [];

        if ($intPart == 0) {
            $resultParts[] = "nol rupiah";
        } else {
            $resultParts[] = trim($this->terbilang_ribuan($intPart) . " rupiah");
        }

        if ($decPart > 0) {
            $senText = $this->terbilang_ribuan($decPart) . " sen";
            $resultParts[] = $senText;
        }

        return implode(" ", $resultParts);
    }
}
