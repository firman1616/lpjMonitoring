<?php
defined('BASEPATH') or exit('No direct script access allowed');

class COA extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // if ($this->session->userdata('status') == FALSE || $this->session->userdata('level') != 1) {
        //     redirect(base_url("login"));
        // }
        // $this->load->library('pdf');
        $this->load->model('M_COA', 'coa');
    }

    public function index()
    {
        $data = [
            'title' => 'CoA',
            'table_title' => 'COA List',
            'conten' => 'coa/index',
            'footer_js' => array('assets/js/coa.js')
        ];
        $this->load->view('template/conten', $data);
    }

    function tableCOA()
    {
        $data['coa'] = $this->coa->getCOA()->result();

        echo json_encode($this->load->view('coa/coa-table', $data, false));
    }

    function cetak_coa($coa)
    {
        $header_data = $this->coa->cetak_coa($coa)->result();
        $detail_data = $this->coa->det_coa($coa)->result();
        $name = !empty($header_data) && isset($header_data[0]->name) ? $header_data[0]->name : $coa;
        // $name = '123';
        $data = [
            'title' => $name,
            'header_coa' => $header_data,
            'det_coa' => $detail_data,
        ];
        // $name = $so;
        $this->load->library('pdf');
        $html = $this->load->view('coa/cetak_coa', $data, true);
        $this->pdf->createPDF($html, $name);
    }

    function cetak_coa_aji($coa)
    {
        $header_data = $this->coa->cetak_coa($coa)->result();
        $detail_data = $this->coa->det_coa($coa)->result();
        $lot_aji = $this->coa->lot_aji($coa)->result();
        $name = !empty($header_data) && isset($header_data[0]->name) ? $header_data[0]->name : $coa;
        // $name = '123';
        $data = [
            'title' => $name,
            'header_coa' => $header_data,
            'det_coa' => $detail_data,
            'lot_aji' => $lot_aji,
        ];
        // $name = $so;
        $this->load->library('pdf');
        $html = $this->load->view('coa/cetak_coa_aji', $data, true);
        $this->pdf->createPDF($html, $name);
    }

    public function cetak_pl_aji($coa)
    {
        $header_data = $this->coa->cetak_coa($coa)->result();
        // $detail_data = $this->sph->det_sph($sph)->result();

        $name = !empty($header_data) && isset($header_data[0]->name) ? $header_data[0]->name : $coa;

        $data = [
            'title' => $name,
            'header_sph' => $header_data,
            // 'det_sph' => $detail_data,
        ];

        // Render HTML dari view
        $html = $this->load->view('coa/cetak_coa_aji2', $data, true);

        // Inisialisasi mPDF
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4-L',
            'margin_top' => 28,
            'margin_bottom' => 30,
            // 'default_font' => 'Arial',
        ]);

        // $logoPath = base_url('assets/img/LPJ_halal.jpg');


        $mpdf->SetHTMLHeader('
             <div style="text-align: center; font-size: 20px; font-weight: bold;">
                PACKING LIST MATERIAL
            </div>
        ');

        // $mpdf->SetHTMLFooter('
        //     <div style="text-align: center; font-size: 11px;">
        //         <hr style="border: none; border-top: 1px solid #000; margin-bottom: 5px;">
        //         Office: Komplek Pergudangan Sinar Gedangan B-06 Ds. Gemurung - Gedangan<br>
        //         Phone: +62 31 - 99038048, 99038054, 99038064 • Fax: +62 31 - 8011489<br>
        //         Email: sales@laprintjaya.com • Website: http://www.laprintjaya.com
        //     </div>
        // ');

        // Tambahkan HTML ke PDF
        $mpdf->WriteHTML($html);

        // Output ke browser
        $mpdf->Output("PL_" . $name . ".pdf", 'I'); // 'I' = Inline (di-browser), 'D' = Download
    }
}
