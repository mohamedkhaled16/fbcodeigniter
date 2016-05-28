<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->helper('url');
        $dbconnect = $this->load->database();
   $this->load->model('Adminmodel');
           $this->load->library('Facebook');


 }
 
 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');
 
   $this->form_validation->set_rules('username', 'Username', 'trim|required');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
 
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
    $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('FacebookClass/login'),
                'scope' => array("email","public_profile")  //permissions here
            ));
     $this->load->view('login',$data);
   }
   else
   {
     //Go to private area
     redirect('FacebookClass/admin', 'refresh');
   }
 
 }
 
 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
 
   //query the database
 

   $result = $this->Adminmodel->login($username, $password);
 
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->username
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }


  function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('FacebookClass/login', 'refresh');
 }
}
?>