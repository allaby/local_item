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

    public function signin_page(){
        $data['page_title'] = "Connexion - " . self::SITE_NAME;
        $this->load->view('templates/font/header');
        $this->load->view('customer/signin_page');
        $this->load->view('templates/font/footer');
    }

    public function signup_page() {
        $data['page_title'] = "Inscription - " . self::SITE_NAME;
        $this->load->view('templates/font/header');
        $this->load->view('customer/signup_page');
        $this->load->view('templates/font/footer');
    }

}
