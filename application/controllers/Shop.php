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
        // $sender = $this->mailer->load();
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
            <td class="cart-product-price">' . number_format($item['price'], 2, ',', ' ') . ' ???</td>
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

            $updateItemStock = $this->shop_model->updateItemStock($item['id'], $item['qty']);
            $newinventory = $this->shop_model->newInventoty($inventorydata);
            // var_dump($newinventory);exit;
            $order_line = $this->shop_model->insert_order_line($orderdetails);
        }

        if ($order_line) {
            $invoice_data = array(
                'order_id' => $neworder,
                'invoice_amount' => $this->cart->total(),
                'invoice_date' => date("Y-m-d H:i:s"),
                'creation_date' => date("Y-m-d H:i:s"),
                'invoice_number' => "FAC" . date("YmdHis"),
                'payment_status' => 1
            );

            $newinvoice = $this->shop_model->newInvoice($invoice_data);
            // print_r($newinvoice);
            // exit;
            if ($newinvoice) {

                //Send Wellcome Mail

                //Getting mail template from db

                $template = $this->customer_model->getTemplateMail(2);

                $subjectmail = "Commande n?? ";

                $message = '';
                $subject = '';
                /* Replacing content from template */
                $keywordsContent = array(
                    "|FNAME|" => $this->session->userdata('firstname'),
                    "{INVOICE_LINK}" => base_url().'customer/invoice/'.$newinvoice
                );

                $keywordsSubject = array(
                    "{SUBJECT}" => $subjectmail
                );

                $message = str_replace(
                    array_keys($keywordsContent),
                    array_values($keywordsContent),
                    $template['mail_body']
                );
                $subject = str_replace(array_keys($keywordsSubject), array_values($keywordsSubject), $template['mail_subject']);

                $sender = sender($this->session->userdata('email'), $this->session->userdata('firstname'), $subject, $message);

                // var_dump($sender);
                // die;
                // if ($sender)
                //     echo "true||Compte cr??er";
                // exit;

                $this->cart->destroy();
                echo "true||" . $newinvoice;
            } else {
                echo "false||";
            }
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
        $data['page_title'] = ucfirst($itemdetails['name']) . " - " . self::SITE_NAME;
        $this->load->view('templates/font/header', $data);
        $this->load->view('shop/single_item', $data);
        $this->load->view('templates/font/footer');
    }


    public function quickview()
    {
        // var_dump($_REQUEST);
        $item_id = $_REQUEST['item'];
        $itemdetails = $this->shop_model->getItems($item_id);

        $image = $this->shop_model->getFeImg($item_id);

        // print_r($itemdetails);exit;
        $itemdata = array(
            "item_id" => $itemdetails['item_id'],
            "ref" => $itemdetails['reference'],
            "name" => $itemdetails['name'],
            "price" => number_format($itemdetails['price_max'], 2, ',', ' '),
            "category" => $itemdetails['category_name']
        );
        echo json_encode($itemdata);
        exit;
    }

    public function newcat()
    {

        $cat_name = $_REQUEST['cat_name'];
        if (empty($_REQUEST['cat_name'])) {
            echo "false||Veillez entrer le nom de la cat??gorie";
            exit;
        }
        $checkcat_name = $this->shop_model->checkcatnam($cat_name);
        // print_r($checkcat_name);die;
        if ($checkcat_name == 0) {
            $catdata = array(
                "name" => $cat_name,
                "creation_date" => date("Y-m-d H:i:s"),
                "is_active" => 1
            );
            $insertnewcat = $this->shop_model->insertCat($catdata);
            if ($insertnewcat) {
                echo "true||Cat??gorie ajout??e";
                exit;
            } else {
                echo "false||Une erreur est survenu lors de la cr??ation d'une cat??gorie, veillez r??esayer";
                exit;
            }
        } else {
            echo "false||Ce nom existe d??j??, veillez le changer";
            exit;
        }
    }


    public function orderdetails()
    {
        // var_dump($_REQUEST);exit;
        $order_id = $_REQUEST['orderid'];
        $orderlines = $this->shop_model->getOrderlines($order_id);
        // print_r($orderlines);exit;
        $output = '<table class="table">
        <thead>
          <tr>
            <th scope="col">Qt??</th>
            <th scope="col">Article</th>
            <th scope="col">PU</th>
            <th scope="col">Total</th>
          </tr>
        </thead>
        <tbody>
        ';
        foreach ($orderlines as $orderline) {
            $output .= '
        <tr>
            <th scope="row">' . $orderline->quantity . '</th>
            <td>' . $orderline->item_name . '</td>
            <td>' . number_format($orderline->unit_price, 2, ',', ' ') . ' ???</td>
            <td>' . number_format($orderline->subtotal, 2, ',', ' ') . ' ???</td>
          </tr>
        ';
        }

        $output .= '</tbody>
      </table>';

        echo $output;
        exit;
    }


    public function add_item()
    {

        $item_name = $_REQUEST['item_name'];
        $item_price = $_REQUEST['item_price'];
        $item_stock = $_REQUEST['item_stock'];
        $item_cat = $_REQUEST['category'];
        $item_tag = $_REQUEST['product_tag'];
        $description = $_REQUEST['description'];

        if (empty($item_price) or empty($item_name) or empty($item_stock) or empty($item_cat) or empty($description)) {
            echo 'false||REmplissez tous les champs obligatoires';
            exit;
        }

        $item_data = array(
            'reference' => "PROD" . date('dmYhis'),
            'name' => $item_name,
            'stock' => $item_stock,
            'price_max' => $item_price,
            'description' => $description,
            'creation_date' => date('Y-m-d H:i:s'),
            'slug' => $item_tag,
            'status' => 1,
            'category_id' => $item_cat
        );

        $item_insert = $this->shop_model->newItem($item_data);



        if ($_FILES) {

            // $contact_id = $this->session->userdata('user_id');
            $type = explode('.', $_FILES['item_img']['name']);
            $type = $type[count($type) - 1];


            $test = date('YmdHms');

            $file_name = $test . "." . strtolower($type);


            $file_tmp = $_FILES['item_img']['tmp_name'];
            $target = './uploads/images/items/';
            $url = './uploads/images/items/' . $file_name;
            if (in_array($type, array('jpg', 'jpeg', 'png', 'gif'))) {
                if (is_uploaded_file($_FILES['item_img']['tmp_name'])) {
                    if (move_uploaded_file($_FILES['item_img']['tmp_name'], $url)) {
                        $imgpath = $file_name;

                        $img_data = array(
                            'item_id' => $item_insert,
                            'path' => $imgpath,
                            'feath_img' => 1,
                            'status' => 1
                        );

                        $insert_img = $this->shop_model->insertFeaImg($img_data);

                        // print_r($item_insert);
                        // die;
                        if ($insert_img) {
                            echo 'true||Article ajout?? avec success';
                            exit;
                        } else {
                            echo 'false||Un probleme est survenu lors de la cr??ation du produit, veillez reessayer plus tard';
                            exit;
                        }
                    }
                }
            }
            return '';
        }
        print_r($_FILES);
    }

    public function viewinvoice($invoice_id)
    {

        $invoice_data = $this->shop_model->getInvoice($invoice_id);
        $orderdetails = $this->shop_model->getOrders($invoice_data['order_id']);
        $orderaddress = $this->shop_model->getAddbyID($orderdetails['address_id']);
        $orderlines = $this->shop_model->getOrderlines($invoice_data['order_id']);
        // print_r($orderlines);die;
        $data['invoicelines'] = $orderlines;
        $data['order'] = $orderdetails;
        $data['address'] = $orderaddress;
        $data['invoice'] = $invoice_data;
        $this->load->view('shop/view_invoice', $data);
    }
}
