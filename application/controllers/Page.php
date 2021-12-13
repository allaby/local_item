<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Page extends CI_Controller {


    public function __construct(){
        parent::__construct();
        $this->load->model('shop_model');
    }


    public function homepage(){
        // $data
        // $this->load->view('templates/font/header');
        $data['items'] = $this->shop_model->getitems(false, 8, false);
        // print_r($data['items']);exit;
        $this->load->view('pages/homepage2',$data);
        $this->load->view('templates/font/footer');
    }


}