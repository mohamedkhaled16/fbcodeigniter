<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FacebookClass extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $dbconnect = $this->load->database();
        $this->load->model('Facebookmodel');
        $this->load->library('Facebook');

    }

    public function index()
    {
        redirect('FacebookClass/login', 'refresh');
    }


    public function CheckActiveTokens($token)
    {
         $this->facebook->setAccessToken($token);

                if (($userId = $this->facebook->getUser())) {

                    try{
                    $this->facebook->api('/me');
                    return true;
                    }
                    catch(Exception $e){
                        return false;

                    }
                    }
    }

    public function login()
    {
$this->load->helper(array('form'));
        $user = $this->facebook->getUser();

        if ($user) {
            try {
                $param['user_profile'] = $this->facebook->api('/me');
                $data['user_id'] = $param['user_profile']['id'];
                $data['name'] = $param['user_profile']['name'];
                $data['token'] = $this->facebook->getAccessToken();
                
                if (!$this->Facebookmodel->CheckUserExist($data['user_id'])) {
                    $this->Facebookmodel->insert_entry($data);
                }
                else
                {
                    $this->Facebookmodel->update_entry($data);
                }
                $param['logout_url'] = site_url('FacebookClass/logout');
                $this->load->view('normalpost', $param);

            } catch (FacebookApiException $e) {
                $user = null;
            }
        } else {
             $param['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('FacebookClass/login'),
                'scope' => array("email","public_profile")  //permissions here
            ));
              $this->load->view('login', $param);

        }


    }

    public function logout()
    {
        $this->facebook->destroySession();
        redirect('FacebookClass/login');
    }
    public function admin(){
        $param['result']= $this->Facebookmodel->selectAll();
        $this->method_call = &get_instance(); 
        $this->load->view('admin',$param);

    }
    public function facebook(){

        if(empty($this->input->post('userID'))) redirect('FacebookClass/login');
        $token = $this->Facebookmodel->getToken($this->input->post('userID'));
        $token = $token['access_token'];
        $PostuserID = $this->input->post('userID');
        $FBuserID = $this->facebook->getUser();
        if($PostuserID == $FBuserID || $this->session->userdata('logged_in'))
        {
            $this->facebook->setAccessToken($token);
            $this->facebook->api('/me/feed','post',array('message' => $this->input->post('facebookPost')));
            redirect('FacebookClass/admin');
        }
        else
        {
            redirect('FacebookClass/login');
        }

    }
}

