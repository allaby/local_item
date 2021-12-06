<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Shop extends CI_Controller
{

    private const SITE_NAME = '';


    public function __construct()
    {
        parent::__construct();
        $this->load->model('shop_model');
        $this->load->model('customer_model');
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
        $qtity = $_REQUEST['qty'];
        $item = $this->shop_model->getItems($item_id);
        // $img = $this->shop_model->getImg_path($item_id);
        // $imgpath = ;
        $cart_data = array(
            'id' => $item['item_id'],
            'qty' => $qtity,
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


    public function place_order()
    {

        $contact_id = $this->session->userdata('contact_id');
        $checkaddre = $this->customer_model->checkAddr($contact_id);
        if (empty($_REQUEST['firstname']) || empty($_REQUEST['lastname']) || empty($_REQUEST['email']) || empty($_REQUEST['phone']) || empty($_REQUEST['country']) || empty($_REQUEST['address']) || empty($_REQUEST['city']) || empty($_REQUEST['zip'])) {
            echo "false||Veillez remplir tous les champs obligatoire";
            exit;
        }

        if ($checkaddre['street'] == "") {
            $address_data = array(
                'postalcode' => $_REQUEST['zip'],
                'street' => $_REQUEST['address'],
                'street2' => $_REQUEST['address2'],
                'city' => $_REQUEST['city'],
                'country' => $_REQUEST['country'],
            );
            $address = $this->customer_model->updateaddres($address_data, $checkaddre['address_id'], $contact_id);
        }

        $order_data = array(
            'code' => "ORD" . date('YmdHms'),
            'creation_date' => date("Y-m-d H:i:s"),
            'total' => $this->cart->total(),
            'status' => 2,
            'address_id' => $checkaddre['address_id'],
            'contact_id' => $this->session->userdata('contact_id')
        );

        $neworder = $this->shop_model->neworder($order_data);

        $cart = $this->cart->contents();
        foreach ($cart as $item) {
            
            $orderdetails = array(
                'quantity' => $item['qty'],
                'subtotal' => $item['subtotal'],
                'order_id' => $neworder,
                'item_id' => $item['id']
            );

            $inventorydata = array(
                "item_id" => $item['id'],
                "order_id" => $neworder,
                "quantity" => $item['qty'],
                "inventory_date" => date("Y-m-d H:i:s"),
                "movement_flag" => 0
            );

            $updateItemStock = $this->shop_model->updateItemStock($item['id'],$item['qty']);
            $newinventory = $this->shop_model->newInventoty($inventorydata);
            // var_dump($newinventory);exit;
            $order_line = $this->shop_model->insert_order_line($orderdetails);
        }
        // print_r($order_line);
        // exit;
        if ($order_line) {
            $this->cart->destroy();
            echo "true||";
        }
        exit;
    }



    public function item_detail($item_id)
    {
        $itemdetails = $this->shop_model->getItems($item_id);
        $itemcat = $this->shop_model->getCat($itemdetails['category_id']);
        $relateditems = $this->shop_model->getRelatedItems($itemdetails['category_id']);
        $data['itemdetails'] = $itemdetails;
        $data['relateditems'] = $relateditems;
        // print_r($relateditems);exit;
        $data['page_title'] = ucfirst($itemdetails['name'])." - " . self::SITE_NAME;
        $this->load->view('templates/font/header',$data);
        $this->load->view('shop/single_item',$data);
        $this->load->view('templates/font/footer');
    }


    public function quickview(){
        // var_dump($_REQUEST);
        $item_id = $_REQUEST['item'];
        $itemdetails = $this->shop_model->getItems($item_id);

        $image = $this->shop_model->getFeImg($item_id);
        
        // print_r($itemdetails);exit;
        $itemdata = array(
            "item_id" => $itemdetails['item_id'],
            "ref" => $itemdetails['reference'],
            "name" => $itemdetails['name'],
            "price" => number_format($itemdetails['price_max'],2,',',' '),
            "category" => $itemdetails['category_name']
        );
        echo json_encode($itemdata);
        exit;
    }

    public function newcat(){
        
        $cat_name = $_REQUEST['cat_name'];
        if(empty($_REQUEST['cat_name'])){
            echo "false||Veillez entrer le nom de la catégorie";
            exit;
        }
        $checkcat_name = $this->shop_model->checkcatnam($cat_name);
        // print_r($checkcat_name);die;
        if($checkcat_name == 0){
            $catdata = array(
                "name" => $cat_name,
                "creation_date" => date("Y-m-d H:i:s"),
                "is_active" => 1
            );
            $insertnewcat = $this->shop_model->insertCat($catdata);
            if($insertnewcat){
                echo "true||Catégorie ajoutée";
                exit;
            }else{
                 echo "false||Une erreur est survenu lors de la création d'une catégorie, veillez réesayer";
                exit;
            }
        }else{
            echo "false||Ce nom existe déjà, veillez le changer";
            exit;
        }
    }

}
