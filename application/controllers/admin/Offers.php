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
        $this->data['offer'] = $this->offer_model->get_data_by_id($id);

        $this->load->view('admin/header', $this->data);
        $this->load->view('admin/offer', $this->data);
        $this->load->view('admin/footer', $this->data);
    }

    public function delete($id)
    {
        $this->offer_model->delete_by_id($id);
        $this->session->set_flashdata('success', 'Oferta data a fost stearsa cu succes.');
        redirect('admin/offers');
    }

    public function save()
    {
        if (!empty($_POST) && !empty($_POST['id'])) {
            $this->offer_model->update();
            $this->session->set_flashdata('success', 'Oferta a fost editata cu succes.');
        } elseif (!empty($_POST)) {
            $this->offer_model->insert();
            $this->session->set_flashdata('success', 'Oferta a fost adaugat cu succes.');
        }

        redirect('admin/offers');
    }
}
