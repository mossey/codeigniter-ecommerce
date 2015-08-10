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
        $this->data['newsletter'] = $this->newsletter_model->get_data();

        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/newsletter', $this->data);
        $this->load->view('admin/footer', $this->data);
    }
}
