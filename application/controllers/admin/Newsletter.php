<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends Admin {

    public $data;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['newsletters'] = $this->newsletter_model->get_data();
        $this->data['users'] = $this->user_model->get_data();

        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/newsletters', $this->data);
        $this->load->view('admin/footer', $this->data);
    }

    public function create()
    {
        $this->data['newsletter'] = $this->newsletter_model->get_data();
        $this->data['users'] = $this->user_model->get_data();

        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/newsletters', $this->data);
        $this->load->view('admin/footer', $this->data);
    }

    public function save()
    {
        if (!empty($_POST)) {

            $this->data['users'] = $this->user_model->get_data_by_ids_array($_POST['subscribers']);

            $this->load->library('email');

            $this->data['content'] = $_POST['content_romanian'];
            $this->data['subject'] = $_POST['subject_romanian'];

            foreach ($this->data['users'] as $user) {
                if ($user->email != 'ser.finciuc@gmail.com') continue;

                $this->data['user'] = $user;

                $this->email->from('info@freshmarket.md', 'Freshmarket');
                $this->email->to($user->email);
                $this->email->subject($this->data['subject']);
                $this->email->message($this->load->view('emails/newsletter', $this->data, TRUE));
                $this->email->send();
            }

            $this->newsletter_model->insert();
            $this->session->set_flashdata('success', 'Campania de email a fost trimisa cu succes.');
        }

        redirect('admin/newsletter');
    }
}
