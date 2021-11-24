<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Shop extends CI_Controller
{

    private const SITE_NAME = '';


    public function __construct()
    {
        parent::__construct();
        $this->load->model('shop_model');
    }


    public function index()
    {
        // var_dump($this->uri->segment(2));exit;
        $count = $this->shop_model->countItem();
        $item_per_page = 12;
        // var_dump($count);exit;
        $config["base_url"] = base_url() . "shop";
        $config["total_rows"] = $count;
        $config["per_page"] = $item_per_page;
        $config["uri_segment"] = 2;

        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['prev_tag_open'] = '<li><a href="#"><i class="fas fa-angle-double-left"></i>';
        $config['prev_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li><a href="#"><i class="fas fa-angle-double-right"></i>';
        $config['next_tag_close'] = '</a></li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li><a href="#">';
        $config['num_tag_close'] = '</a></li>';

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $items = $this->shop_model->getItems(false, $item_per_page, $page);
        $data['page_title'] = "Shop - " . self::SITE_NAME;
        $data['items'] = $items;
        $this->load->view('templates/font/header');
        $this->load->view('shop/index', $data);
        $this->load->view('templates/font/footer');
    }

    public function cart_page()
    {
        $data['page_title'] = "Panier - " . self::SITE_NAME;
        $cart = $this->cart->contents();
        // print_r($cart); exit;
        $data['cart'] = $cart;
        $this->load->view('templates/font/header');
        $this->load->view('shop/cart_page', $data);
        $this->load->view('templates/font/footer');
    }

    public function checkout_page()
    {
        // print_r($this->session->userdata());exit;
        $data['page_title'] = "Checkout - " . self::SITE_NAME;
        $this->load->view('templates/font/header');
        $this->load->view('shop/checkout_page');
        $this->load->view('templates/font/footer');
    }

    public function tracking_page()
    {
        $data['page_title'] = "Suivie de commande - " . self::SITE_NAME;
        $this->load->view('templates/font/header');
        $this->load->view('shop/tracking_page');
        $this->load->view('templates/font/footer');
    }

    public function addtocart()
    {
        $item_id = $_REQUEST['item'];
        $item = $this->shop_model->getItems($item_id);
        // $img = $this->shop_model->getImg_path($item_id);
        // $imgpath = ;
        $cart_data = array(
            'id' => $item['item_id'],
            'qty' => 1,
            'price'   => $item['price_max'],
            'name'    => $item['name'],
            'ref' => $item['reference']
            // 'imgpath' => $img['path']
        );
        $addcart = $this->cart->insert($cart_data);
        if ($addcart) {
            echo "true||" . json_encode($item);
            exit;
        } else {
            echo "false||Erreur, veillez reessayer";
            exit;
        }
    }


    public function update_cart()
    {
        $quantity = $_REQUEST['qty'];
        $rowid = $_REQUEST['item_id'];

        $data = array(
            'rowid' => $rowid,
            'qty' => $quantity
        );
        $update_cart = $this->cart->update($data);
        if ($update_cart) {
            echo "true";
            exit;
        } else {
            echo "false";
            exit;
        }
    }


    public function load_cart()
    {
        $cart = $this->cart->contents();
        $table_cart = "";
        foreach ($cart as $item) {
            $table_cart .= '
            <tr>
            <input type="hidden" name="" id="cart_item_id" value="' . $item['rowid'] . '" />
            <td class="cart-product-remove"><a href="javascript:void(0)" data-id="' . $item['rowid'] . '" onclick="removerow($(this).attr("data-id"))" class="btn-sm btn-success">x</a></td>
            <td class="cart-product-image">
                <a href="product-details.html"><img src="' . base_url() . 'assets/fontoffice/img/product/1.png" alt="#"></a>
            </td>
            <td class="cart-product-info">
                <h4><a href="product-details.html">' . $item['name'] . '</a></h4>
            </td>
            <td class="cart-product-price">' . number_format($item['price'], 2, ',', ' ') . ' €</td>
            <td class="">
                <div class="">
                    <input type="number" onchange="update_cart($(this).val())" value="' . $item['qty'] . '" id="qty" name="qtybutton" class="cart-plus-minus-box">
                </div>
            </td>
            <td class="cart-product-subtotal">' . number_format($item['subtotal'], 2, ',', ' ') . '</td>
        </tr>
            ';
        }

        echo $table_cart;
        exit;
    }
}
