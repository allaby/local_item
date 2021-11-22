<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class Shop extends CI_Controller {

    private const SITE_NAME = '';


    public function __construct(){
        parent::__construct();
    }


    public function index(){
        $data['page_title'] = "Shop - ".self::SITE_NAME;
        $this->load->view('templates/font/header');
        $this->load->view('shop/index');
        $this->load->view('templates/font/footer');
    }

    public function cart_page(){
        $data['page_title'] = "Panier - ".self::SITE_NAME;
        $this->load->view('templates/font/header');
        $this->load->view('shop/cart_page');
        $this->load->view('templates/font/footer');
    }



}