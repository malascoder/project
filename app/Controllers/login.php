<?php

class Login extends CI_Controller{
    
    public function index(){
        $this->load->view('v_login');
    }

    function userauth(){
    $username = htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

        echo $username."<br>";
        $password = md5($password);
        echo $password;


        $this->load->model('Crm_model');
        $cek_user = $this->Crm_model->cari_user($username, $password);

        if ($cek_user->num_rows() > 0){
            $data = $cek_user->row_array();
            $this->session->set_userdata('masuk', TRUE);
            if ($data['id_level'] == '1'){
                $this->session->set_userdata('id_level','1');
                $this->session->set_userdata('ses_username',$data['username']);
                $this->session->set_userdata('ses_password', $data['password']);
                redirect('main');
            }elseif ($data['id_level'] == '2') {
                $this->session->set_userdata('id_level','2');
                $this->session->set_userdata('ses_username',$data['username']);
                $this->session->set_userdata('ses_password', $data['password']);
                redirect('main');
            }elseif ($data['id_level'] == '3') {
                $this->session->set_userdata('id_level','3');
                $this->session->set_userdata('ses_username',$data['username']);
                $this->session->set_userdata('ses_password', $data['password']);
                redirect('main');
            }
        }else{
            redirect('');
        }
        
    }

    function logout(){
        redirect('v_login');
    }
}