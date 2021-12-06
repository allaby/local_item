<?php

class Customer_model extends CI_Model
{


    private $user_table = "contacts";
    private $address_table = "addresses";
    private $role_table = "roles";


    public function get_cust()
    {
        $this->db->select($this->user_table . '.*');
        $this->db->select($this->address_table . '.*');
        $this->db->select($this->role_table . '.role_id');
        $this->db->join($this->address_table, $this->address_table . '.contact_id = ' . $this->user_table . '.contact_id', 'left');
        $this->db->join($this->role_table, $this->role_table . '.role_id = ' . $this->user_table . '.role_id');
    }


    public function getContact($contact_id = false)
    {
        $this->get_cust();
        if ($contact_id == true) {
            $this->db->where($this->user_table . '.contact_id', $contact_id);
            return $this->db->get($this->user_table)->row_array();
        }
        return $this->db->get($this->user_table)->result();
    }


    public function insertCust($data)
    {
        $this->db->insert($this->user_table, $data);
        $lastid = $this->db->insert_id();
        return $lastid;
    }

    public function newAddre($data)
    {
        $this->db->insert($this->address_table, $data);
        return true;
    }

    public function checkUserLogin($login, $pass)
    {
        $user = $this->getContactByEmail($login);
        // print_r($user);
        // exit;
        if (password_verify($pass, $user['password'])) {
            $this->loadsession($user['contact_id']);
            return TRUE;
        } else {
            return FALSE;
        }
    }


    public function loadsession($user_id)
    {
        $user = $this->getContact($user_id);
        // print_r($user);
        // exit;
        $user_data = array(
            'contact_id' => $user_id,
            'lastname' => $user['lastname'],
            'firstname' => $user['fisrtname'],
            'email' => $user['email'],
            'gender' => $user['gender'],
            'img' => $user['img'],
            'phone' => $user['phone'],
            'role' => $user['role_id'],
            'address_id' => $user['address_id'],
            'postalcode' => $user['postalcode'],
            'street' => $user['street'],
            'city' => $user['city'],
            'street2' => $user['street2'],
            'country' => $user['country'],
            'is_logged' => TRUE
        );
        $this->session->set_userdata($user_data);
        $this->session->sess_experition = '900';
    }


    public function getContactByEmail($email)
    {
        $this->get_cust();
        $this->db->where($this->user_table . '.email', $email);
        return $this->db->get($this->user_table)->row_array();
    }


    public function checkAddr($contact)
    {
        $this->db->select($this->address_table . '.*');
        $this->db->where($this->address_table . '.contact_id', $contact);
        return $this->db->get($this->address_table)->row_array();
    }


    public function updateaddres($data, $address_id, $contact_id)
    {
        $this->db->where($this->address_table . '.address_id', $address_id);
        $this->db->update($this->address_table, $data);
        $this->loadsession($contact_id);
        return true;
    }

    public function updateCustomer($data, $user)
    {
        $this->db->where($this->user_table . '.contact_id', $user);
        $this->db->update($this->user_table, $data);
        return true;
    }

    public function getCustomers(){
        $this->db->select($this->user_table . '.*');
        $this->db->where($this->user_table . '.role_id', 2);
        return $this->db->get($this->user_table)->result();
    }

}
