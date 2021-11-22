<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Page extends CI_Controller {


    public function __construct(){
        parent::__construct();
    }


    public function homepage(){
        // $data
        // $this->load->view('templates/font/header');
        $this->load->view('pages/homepage');
        $this->load->view('templates/font/footer');
    }


}