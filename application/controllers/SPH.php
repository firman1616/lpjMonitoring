<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Mpdf\Mpdf;

class SPH extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // if ($this->session->userdata('status') == FALSE || $this->session->userdata('level') != 1) {
        //     redirect(base_url("login"));
        // }
        // $this->load->library('pdf');
        $this->load->model('M_SPH', 'sph');
    }

    public function index()
    {
        $data = [
            'title' => 'SPH',
            'table_title' => 'SPH List',
            'conten' => 'sph/index',
            'footer_js' => array('assets/js/sph.js')
        ];
        $this->load->view('template/conten', $data);
    }

    function tableSPH()
    {
        $data['sph'] = $this->sph->getSPH()->result();

        echo json_encode($this->load->view('sph/sph-table', $data, false));
    }

    public function cetak_sph($sph)
    {
        $header_data = $this->sph->cetak_sph($sph)->result();
        $detail_data = $this->sph->det_sph($sph)->result();

        $name = !empty($header_data) && isset($header_data[0]->no_sph) ? $header_data[0]->no_sph : $sph;

        $data = [
            'title' => $name,
            'header_sph' => $header_data,
            'det_sph' => $detail_data,
        ];

        // Render HTML dari view
        $html = $this->load->view('sph/cetak_sph', $data, true);

        // Inisialisasi mPDF
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
            'margin_top' => 28,
            'margin_bottom' => 30,
            // 'default_font' => 'Arial',
        ]);

        $logoPath = base_url('assets/img/lpjHalal.png');


        $mpdf->SetHTMLHeader('
            <div style="text-align:left;">
                <img width="100%" height="68" alt="Logo" style="margin-bottom: 2px;" src="' . $logoPath . '" />
            </div>
            <hr style="border: 2px solid black; width: 100%; margin-top: 0px">
        ');

        $mpdf->SetHTMLFooter('
            <div style="text-align: center; font-size: 11px;">
                <hr style="border: none; border-top: 1px solid #000; margin-bottom: 5px;">
                Office: Komplek Pergudangan Sinar Gedangan B-06 Ds. Gemurung - Gedangan<br>
                Phone: +62 31 - 99038048, 99038054, 99038064 • Fax: +62 31 - 8011489<br>
                Email: sales@laprintjaya.com • Website: http://www.laprintjaya.com
            </div>
        ');



        // Tambahkan HTML ke PDF
        $mpdf->WriteHTML($html);

        // Output ke browser
        $mpdf->Output("SPH_$name.pdf", 'I'); // 'I' = Inline (di-browser), 'D' = Download
    }

    // function cetak_sph($sph)  {
    //     $header_data = $this->sph->cetak_sph($sph)->result();
    //     $detail_data = $this->sph->det_sph($sph)->result();
    //     $name = !empty($header_data) && isset($header_data[0]->no_sph) ? $header_data[0]->no_sph : $sph;
    //     // $name = '123';
    //     $data = [
    //         'title' => $name,
    //         'header_sph' => $header_data,
    //         'det_sph' => $detail_data,
    //     ];
    //     // $name = $so;
    //     $this->load->library('pdf');
    //     $html = $this->load->view('sph/cetak_sph', $data, true);
    //     $this->pdf->createPDF($html, $name, FALSE);
    // }


}
