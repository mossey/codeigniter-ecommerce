<?php
class User_model extends CI_Model {

    public $name;
    public $email;
    public $password;
    public $telephone;
    public $address;
    public $subscribed;
    public $ip;
    public $admin = 0;
    public $date;

    const TABLE = 'users';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_data()
    {
        $query = $this->db->get($this::TABLE);

        return $query->result();
    }

    public function unsubscribe($id, $token) {
        $user = $this->get_data_by_id($id);

        if (sha1($user->password).sha1($user->date) == $token) {
            $this->db->update($this::TABLE, ['subscribed' => 0], "id = " . $id);
        }
    }

    public function get_data_by_ids_array($array)
    {
        $query = $this->db->where_in('id', $array)->get($this::TABLE);

        return $query->result();
    }

    public function get_user()
    {
        $user_id = $this->session->userdata('user_id');

        if (!empty($user_id)) {
            $query = $this->db->get_where($this::TABLE, ['id' => $user_id]);

            $data = $query->result();

            return end($data);
        } else {
            return false;
        }
    }

    public function get_data_by_id($id)
    {
        $query = $this->db->get_where($this::TABLE, ['id' => $id]);

        $data = $query->result();

        return end($data);
    }

    public function get_admin()
    {
        if (!empty($_POST)) {
            $query = $this->db->get_where($this::TABLE, ['admin' => 1, 'email' => $_POST['email'], 'password' => sha1($_POST['password'])]);

            $data = $query->result();

            return end($data);
        } else {
            return false;
        }
    }

    public function login()
    {
        $query = $this->db->get_where($this::TABLE, ['email' => $_POST['email'], 'password' => sha1($_POST['password'])]);
        $result = $query->result();

        $user = end($result);
        if (!empty($user)) {
            $this->session->set_userdata('user_id', $user->id);
            return true;
        }
        return false;
    }

    public function register()
    {
        $query = $this->db->get_where($this::TABLE, ['email' => $_POST['email']]);
        $result = $query->result();

        if (!empty($result)) {
            return false;
        } else {
            $this->name             = $_POST['name'];
            $this->email            = $_POST['email'];
            $this->password         = sha1($_POST['password']);
            $this->telephone        = $_POST['telephone'];
            $this->address          = $_POST['address'];
            $this->ip               = $this->input->ip_address();

            if ($this->db->insert($this::TABLE, $this)) {
                $this->session->set_userdata('user_id', $this->id);

                return true;
            } else {
                return false;
            }
        }
    }

    public function update($id = null)
    {
        $id = !empty($id) ? $id : $_POST['id'];

        $result = $this->get_data_by_id($id);

        if (empty($result)) {
            return false;
        } else {
            $obj = clone $result;
            $obj->name             = $_POST['name'];
            $obj->email            = $_POST['email'];

            if (
                !empty($_POST['old_password']) && !empty($_POST['new_password']) && !empty($_POST['confirm_new_password']) &&
                $result->password == sha1($_POST['old_password']) &&
                $_POST['new_password'] == $_POST['confirm_new_password']
            ) {
                $obj->password = sha1($_POST['new_password']);
            }

            $obj->telephone        = $_POST['telephone'];
            $obj->address          = $_POST['address'];
            $obj->subscribed       = !empty($_POST['subscribed']) ? 1 : 0;
            $obj->ip               = $this->input->ip_address();

            return $this->db->update($this::TABLE, $obj, array('id' => $result->id));
        }
    }
}