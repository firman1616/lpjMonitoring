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

        $data = [
            'title' => $name,
            'header' => $header_data,
            'detail' => $detail_data
        ];

        // Render HTML dari view utama (halaman 1)
        $html_page1 = $this->load->view('kwitansi/cetak_kwi', $data, true);

        // Inisialisasi mPDF
        // $mpdf = new \Mpdf\Mpdf([
        //     'format' => 'A4',
        //     'margin_top' => 28,
        //     'margin_bottom' => 30,
        // ]);
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A5-L', // A5 Landscape
            'margin_top' => 27, // sesuaikan margin agar proporsional
            // 'margin_bottom' => 20,
            'margin_left' => 3,
            'margin_right' => 3,
        ]);

        $logoPath = base_url('assets/img/lpjHeader.png');

        // Header & Footer
        $mpdf->SetHTMLHeader('
        <div style="text-align: left; margin-bottom: 4px;">
            <img 
                src="' . $logoPath . '" 
                alt="Logo" 
                style="width: 330px; height: auto; margin-bottom: 2px;"
            />
        </div>
        <hr style="border: 2px solid black; width: 100%; margin-top: 0px">
    ');

    //     $mpdf->SetHTMLFooter('
    //     <div style="text-align: center; font-size: 11px;">
    //         <hr style="border: none; border-top: 1px solid #000; margin-bottom: 5px;">
    //         Office: Komplek Pergudangan Sinar Gedangan B-06 Ds. Gemurung - Gedangan<br>
    //         Phone: +62 31 - 99038048, 99038054, 99038064 • Fax: +62 31 - 8011489<br>
    //         Email: sales@laprintjaya.com • Website: http://www.laprintjaya.com
    //     </div>
    // ');

        // Tambahkan halaman 1
        $mpdf->WriteHTML($html_page1);

        // Output ke browser
        $mpdf->Output("$name.pdf", 'I');
    }
}
