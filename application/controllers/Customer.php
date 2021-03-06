<?php

class Customer extends CI_Controller
{
    private const SITE_NAME = "";


    public function __construct()
    {
        parent::__construct();
        $this->load->model("customer_model");
        $this->load->model("shop_model");
    }

    public function dashboard()
    {
        $this->auth->isLoggedIn();
        $userorder = $this->shop_model->getCustOrders($this->session->userdata('contact_id'));
        // print_r($this->session->userdata());
        // exit;
        $data['myorders'] = $userorder;
        $data['page_title'] = "Suivie de commande - " . self::SITE_NAME;
        $this->load->view('templates/font/header', $data);
        $this->load->view('customer/dashboard', $data);
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
        // print_r($this->session->userdata());exit;
        if ($checkcontact) {
            if ($this->session->userdata('role') == 1) {
                echo "true||admin";
                exit;
            } else if ($this->session->userdata('role') == 2) {
                echo "true||customer";
                exit;
            }
        } else {
            echo "false||Erreur, veiller v??rifier vos identifiants";
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

                $checkcontact = $this->customer_model->chechEmail($email);

                // var_dump($checkcontact);exit;

                if ($checkcontact == 1) {
                    echo "false||Cet utilisateur existe d??j??, veillez r??initialiser votre mot de passe";
                    exit;
                } else {
                    $newcust = $this->customer_model->insertCust($contact_data);
                    // print_r($newcust);exit;
                    if ($newcust) {
                        $address_data = array(
                            "contact_id" => $newcust
                        );

                        $custaddre = $this->customer_model->newAddre($address_data);


                        //Send Wellcome Mail

                        //Getting mail template from db

                        $template = $this->customer_model->getTemplateMail(1);

                        $subjectmail = "";

                        $message = '';
                        $subject = '';
                        /* Replacing content from template */
                        $keywordsContent = array(
                            "|FNAME|" => ucfirst($firstname),
                            "{LOGIN}" => $email,
                            "{PASSWORD}" => $password,
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

                        $sender = sender($email, $firstname, $subject, $message);

                        // var_dump($sender);
                        // die;
                        if ($sender)
                            echo "true||Compte cr??er";
                        exit;
                        // print_r($custaddre);exit;
                    }
                }
            }
        }
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }


    public function admin_login()
    {
        // var_dump(password_hash('azerty123', PASSWORD_DEFAULT));exit;
        $data['page_title'] = "Connexion - Admin - " . self::SITE_NAME;
        $this->load->view('admin/admin_login', $data);
    }

    public function changpass()
    {
        // print_r($_REQUEST);
        $old_pass = $_REQUEST['old_pass'];
        $new_pass = $_REQUEST['new_pass'];
        $conf_pass = $_REQUEST['conf_pass'];
        if (empty($old_pass) || empty($new_pass) || empty($conf_pass)) {
            echo "false||Remplissez tous les champs svp";
            die;
        } else if ($conf_pass != $old_pass) {
            echo "false||Les nouveaux mot de passe de correspondent pas";
            die;
        }
        // echo "ok";
        $userdetails = $this->customer_model->getContact($this->session->userdata("contact_id"));
        // print_r($userdetails);exit;
        if (password_verify($old_pass, $userdetails['password'])) {
            $passdata = array(
                'password' => password_hash($new_pass, PASSWORD_DEFAULT)
            );

            $updatpass = $this->customer_model->updateCustomer($passdata, $this->session->userdata('contact_id'));
            // var_dump($updatpass);exit;
            if ($updatpass) {
                echo 'true||Mot de passe mis ?? jour';
                exit;
            } else {
                echo 'false||Errur veillez reessayer SVP';
                exit;
            }
        } else {
            echo "false||Vous aviez entrer un moveau mot de passe";
            die;
        }
    }
}
