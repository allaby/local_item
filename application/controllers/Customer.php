<?php

class Customer extends CI_Controller
{
    private const SITE_NAME = ""; 


    public function __construct()
    {
        parent::__construct();
    }

    public function dashboard()
    {
        $data['page_title'] = "Suivie de commande - " . self::SITE_NAME;
        $this->load->view('templates/font/header');
        $this->load->view('customer/dashboard');
        $this->load->view('templates/font/footer');
    }
}
