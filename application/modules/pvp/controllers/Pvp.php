<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pvp extends MX_Controller {

    public function __construct()
    {
        parent::__construct();

        if ($this->m_modules->getStatusLadPVP() != '1')
            redirect(base_url(),'refresh');

        if ($this->config->item('maintenance_mode') == '1' && $this->m_data->isLogged() && $this->m_general->getPermissions($this->session->userdata('fx_sess_id')) != 1)
        {
            redirect(base_url('maintenance'),'refresh');
        }

        $this->load->model('pvp_model');
    }

    public function index()
    {
        $this->load->view('index');
        $this->load->view('footer');
    }
}
