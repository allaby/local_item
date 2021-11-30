<?php

class Customer extends CI_Controller
{
    private const SITE_NAME = "";


    public function __construct()
    {
        parent::__construct();
        $this->load->model("customer_model");
    }

    public function dashboard()
    {
        $data['page_title'] = "Suivie de commande - " . self::SITE_NAME;
        $this->load->view('templates/font/header');
        $this->load->view('customer/dashboard');
        $this->load->view('templates/font/footer');
    }

    public function signin_page()
    {
        $data['page_title'] = "Connexion - " . self::SITE_NAME;
        $this->load->view('templates/font/header');
        $this->load->view('customer/signin_page');
        $this->load->view('templates/font/footer');
    }

    public function signup_page()
    {
        $data['page_title'] = "Inscription - " . self::SITE_NAME;
        $this->load->view('templates/font/header');
        $this->load->view('customer/signup_page');
        $this->load->view('templates/font/footer');
    }


    public function signin()
    {
        // print_r($_REQUEST);exit;
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        if (empty($email) || empty($password)) {
            echo "false||Renseigner tous les champs obligatoire";
            exit;
        }

        $checkcontact = $this->customer_model->checkUserLogin($email, $password);
        // print_r($checkcontact);
        if ($checkcontact) {
            echo "true||ok";
            exit;
        } else {
            echo "false||Erreur, veiller vérifier vos identifiants";
            exit;
        }
    }


    public function create()
    {

        // print_r($_REQUEST);exit;

        $firstname = $_REQUEST['firstname'];
        $lastname = $_REQUEST['lastname'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $pass_confirm = $_REQUEST['pass_confirm'];
        $terms = $_REQUEST['terms'];

        if (empty($firstname) or empty($lastname) or empty($email) or empty($password) or empty($pass_confirm)) {
            echo "false||Remplissez tous les champs obligatoire";
            exit;
        } elseif ($password != $pass_confirm) {
            echo "false||Les mots de passe ne correspondent pas";
            exit;
        } else {
            if ($terms == 0) {
                echo "false||Accepter les thermes et conditions";
                exit;
            } elseif ($terms == 1) {
                $pass_encript = password_hash($password, PASSWORD_DEFAULT);

                $contact_data = array(
                    "fisrtname" => $firstname,
                    "lastname" => $lastname,
                    "email" => $email,
                    "password" => $pass_encript,
                    "role_id" => 2,
                    "creation_date" => date("Y-m-d H:i:s"),
                );

                $newcust = $this->customer_model->insertCust($contact_data);
                // print_r($newcust);exit;
                if ($newcust) {
                    $address_data = array(
                        "contact_id" => $newcust
                    );

                    $custaddre = $this->customer_model->newAddre($address_data);
                    if ($custaddre)
                        echo "true||Compte créer";
                    exit;
                    // print_r($custaddre);exit;
                }
            }
        }
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }


    public function admin_login() {
        // var_dump(password_hash('azerty123', PASSWORD_DEFAULT));exit;
        $this->load->view('admin/admin_login');
    }


}
