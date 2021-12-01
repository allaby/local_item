<?php


class Dashboard extends CI_Controller {


    public function __construct(){
        parent::__construct();
        $this->load->model('shop_model');
    }


    public function index(){
        $data['activemenu'] = "dashboard";
        $this->load->view('templates/back/header', $data);
        $this->load->view('admin/admin_dashboard', $data);
        $this->load->view('templates/back/footer');
    }

    public function category_page(){
        $data['activemenu'] = "items";
        $data['page_title'] = "";
        $data['page'] = "Catégories";
        $data['categories'] = $this->shop_model->getAllCat();
        // var_dump($data['categories']);exit;
        $this->load->view('templates/back/header', $data);
        $this->load->view('admin/admin_category', $data);
        $this->load->view('templates/back/footer');
    }


    


}