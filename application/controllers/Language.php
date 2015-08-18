<?php
class Language extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    function change($language = "") {
        $language = !empty($language) ? $language : $this->config['language'];
        $this->session->set_userdata('site_lang', $language);
        redirect($_SERVER['HTTP_REFERER']);
    }
}
