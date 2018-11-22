<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function index()
    {
        $this->load->view('css');
        $this->load->view('headerindex');
        $this->load->view('login');
        $this->load->view('footer');
    }
}
