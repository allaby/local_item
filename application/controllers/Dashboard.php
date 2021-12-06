<?php


class Dashboard extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('shop_model');
    }


    public function index()
    {
        $this->auth->isLoggedIn();
        $this->auth->isAdmin();
        $data['activemenu'] = "dashboard";
        $this->load->view('templates/back/header', $data);
        $this->load->view('admin/admin_dashboard', $data);
        $this->load->view('templates/back/footer');
    }

    public function category_page()
    {
        $this->auth->isLoggedIn();
        $this->auth->isAdmin();
        $data['activemenu'] = "items";
        $data['page_title'] = "";
        $data['page'] = "Catégories";
        $data['categories'] = $this->shop_model->getAllCat();
        // var_dump($data['categories']);exit;
        $this->load->view('templates/back/header', $data);
        $this->load->view('admin/admin_category', $data);
        $this->load->view('templates/back/footer');
    }

    public function items_page()
    {
        $this->auth->isLoggedIn();
        $this->auth->isAdmin();
        $data['activemenu'] = "items";
        $data['page_title'] = "";
        $data['page'] = "Tous Les Article";
        $data['items'] = $this->shop_model->getItems();
        // var_dump($data['items']);exit;
        $this->load->view('templates/back/header', $data);
        $this->load->view('admin/items_page', $data);
        $this->load->view('templates/back/footer');
    }


    public function order_page(){
        $this->auth->isLoggedIn();
        $this->auth->isAdmin();
        $data['activemenu'] = "orders";
        $data['page_title'] = "";
        $data['page'] = "Tous les commande";
        $data['orders'] = $this->shop_model->getOrders();
        // var_dump($data['orders']);exit;
        $this->load->view('templates/back/header', $data);
        $this->load->view('admin/order_page', $data);
        $this->load->view('templates/back/footer');
    }

}
