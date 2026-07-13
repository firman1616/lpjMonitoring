<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SO extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // if ($this->session->userdata('status') == FALSE || $this->session->userdata('level') != 1) {
        //     redirect(base_url("login"));
        // }
        // $this->load->library('pdf');
        $this->load->model('M_SO','so');
    }

	public function index()
	{
        $data = [
            'title' => 'Sales Order',
            'table_title' => 'Sale Order List',
            'conten' => 'so/index',
            'footer_js' => array('assets/js/so.js')
        ];
		$this->load->view('template/conten',$data);
	}

    function tableSO()
    {
        $data['so'] = $this->so->getSO()->result();

        echo json_encode($this->load->view('so/so-table',$data,false));
    }

    public function cetak_so($so)
    {
        $header_data = $this->so->cetak_so($so)->result();
        $detail_data = $this->so->cetak_so_detail($so)->result();
        // echo "<pre>";
        // print_r($detail_data);
        // die;

        $name = !empty($header_data) && isset($header_data[0]->name) ? $header_data[0]->name : $so;

        $data = [
            'title' => $name,
            'header_so' => $header_data,
            'det_so' => $detail_data,
        ];

        // Render HTML dari view
        $html = $this->load->view('so/cetak_so', $data, true);

        // Inisialisasi mPDF
        $mpdf = new \Mpdf\Mpdf([
            'format' => 'A4',
            'margin_top' => 28,
            'margin_bottom' => 30,
            // 'default_font' => 'Arial',
            
            // --- TAMBAHKAN BARIS INI ---
            'tempDir' => sys_get_temp_dir() . '/mpdf' 
            // ---------------------------
        ]);

        $logoPath = FCPATH . 'assets/img/LPJ_halal.jpg';


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
        $mpdf->Output("SO_$name.pdf", 'I'); // 'I' = Inline (di-browser), 'D' = Download
    }

    function cetak_so_old($so)  {
        $header_data = $this->so->cetak_so($so)->result();
        $detail_data = $this->so->cetak_so_detail($so)->result();
        $name = !empty($header_data) && isset($header_data[0]->name) ? $header_data[0]->name : $so;
        $data = [
            'title' => $name,
            'header_so' => $header_data,
            'det_so' => $detail_data,
        ];
        // $name = $so;
        $this->load->library('pdf');
        // $this->load->view('po/print-po', $data, TRUE);s
        $html = $this->load->view('so/cetak_so', $data, TRUE);
        $this->pdf->createPDF($html, $name);
    }
}