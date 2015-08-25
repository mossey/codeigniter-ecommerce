<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Frontend
{

    public function __construct()
    {
        parent::__construct();
    }

    public function unsubscribe($id, $token)
    {
        $this->user_model->unsubscribe($id, $token);
        $this->session->set_flashdata('success', 'Ati fost dezabonat cu success.');
        redirect('/');
    }

    public function profile()
    {
        $this->load->view('partials/header', $this->data);
        $this->load->view('profile', $this->data);
        $this->load->view('partials/footer', $this->data);
    }

    public function comment()
    {
        if (!empty($_POST)) {
            if ($this->comment_model->insert()) {
                $this->session->set_flashdata('success', 'Comentariul dvs a fost adaugat cu succes.');
            } else {
                $this->session->set_flashdata('error', 'S-a produs o eroare. Comentariul dvs nu a putut fi adaugat. Va rugam incercati mai tirziu.');
            }
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function login()
    {
        if (!empty($_POST)) {
            if ($this->user_model->login()) {
                $this->session->set_flashdata('success', 'Dvs ati fost logat cu succes.');
                redirect('/');
            } else {
                $this->session->set_flashdata('error', 'Va rugam, verificati din nou datele de acces.');
                redirect('user/login');
            }
        } else {
            $this->load->view('partials/header', $this->data);
            $this->load->view('login', $this->data);
            $this->load->view('partials/footer', $this->data);
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        redirect('/');
    }

    public function register()
    {
        if (!empty($_POST)) {
            if ($this->user_model->register()) {
                $this->session->set_flashdata('success', 'Felicitari, a-ti fost inregistrat cu success.');
                redirect('user/profile');
            } else {
                $this->session->set_flashdata('error', 'Acest email este deja in baza de date. Va rugam folositi alta adresa de email.');
                redirect('user/login');
            }
        }
    }
}
