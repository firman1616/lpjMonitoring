<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PO extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // if ($this->session->userdata('status') == FALSE || $this->session->userdata('level') != 1) {
        //     redirect(base_url("login"));
        // }
        // $this->load->library('pdf');
        $this->load->model('M_PO','po');
    }

	public function index()
	{
        $data = [
            'title' => 'Purchase Order',
            'table_title' => 'Purchase Order List',
            'conten' => 'po/index',
            'footer_js' => array('assets/js/po.js')
        ];
		$this->load->view('template/conten',$data);
	}

    function tablePO()
    {
        $data['po'] = $this->po->getPO()->result();

        echo json_encode($this->load->view('po/po-table',$data,false));
    }

    function cetak_po()  {
        // $header_data = $this->so->cetak_so($so)->result();
        // $detail_data = $this->so->cetak_so_detail($so)->result();
        // $name = !empty($header_data) && isset($header_data[0]->name) ? $header_data[0]->name : $so;
        $name = '123';
        $data = [
            'title' => $name,
            // 'header_so' => $header_data,
            // 'det_so' => $detail_data,
        ];
        // $name = $so;
        $this->load->library('pdf');
        // $this->load->view('po/print-po', $data, TRUE);s
        $html = $this->load->view('po/cetak_po', $data, TRUE);
        $this->pdf->createPDF($html, $name, false);
    }
}