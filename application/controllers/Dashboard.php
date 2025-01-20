<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
        $data = [
            'title' => 'Dashboard',
            'conten' => 'conten/dashboard',
        ];
		$this->load->view('template/conten',$data);
	}
}
