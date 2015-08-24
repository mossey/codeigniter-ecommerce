<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends Admin {

    public $data;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['offers'] = $this->offer_model->get_data();

        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/offers', $this->data);
        $this->load->view('admin/footer', $this->data);
    }

    public function create()
    {
        $this->data['products'] = $this->product_model->get_data();

        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/offer', $this->data);
        $this->load->view('admin/footer', $this->data);
    }

    public function edit($id)
    {
        $this->data['products'] = $this->product_model->get_data();

        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/offer', $this->data);
        $this->load->view('admin/footer', $this->data);
    }
}
