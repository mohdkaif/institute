<?php
class forgot_model  extends CI_Model  {

	
	
	
	
	function get_user_by_email($email)
    {
        $result = $this->db->get_where('admin', array('email'=>$email));
        return $result->row_array();
    }

	
	
	function get_admin_by_code($code)
	{
		$this->db->where("token", $code);
		$this->db->select("email");
		 $this->db->limit(1);
		$result = $this->db->get('users')->result(); 
		
		 if (sizeof($result) > 0)
        {
            return $result; 
        }
        else
        {
			$this->session->set_flashdata('error', "Reset Password Failed");
			redirect(base_url(''));
         
        }
	}	
	
	function save_password($save,$email)
	{
		$this->db->where('email',$email);
		$this->db->update('users', $save);
		
	}
	
	function save_user_info($save)
	{
		$this->db->insert('users', $save);
	}
	
	 private function get_admin_by_email($email)
    {
        $this->db->select('*');
        $this->db->where('email', $email);
        $this->db->limit(1);
        $result = $this->db->get('users');
        $result = $result->row_array();

        if (sizeof($result) > 0)
        {
            return $result; 
        }
        else
        {
            return false;
        }
    }
	
	function edit_admin_to_save_code($email,$token) //save randon string in admin by email
	 {
	 			
	 $admin_email = $this->get_admin_by_email($email);
		
		if ($admin_email['email'])
        {	
		$this->load->library('email');
		$config['protocol'] = 'mail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		
		$this->email->initialize($config);
		
			$result = $this->db->where('id', '1')->get('settings');
			$settings = $result->row();
			//echo '<pre>'; print_r($settings->name);die;
			$link = site_url('forgot/forgot_password/reset_password/' . $token['token']);
			
			
				
				$msg	=	"Hello ".$admin_email['name'].",<br />
							Your Reset Password Link Is ".$link."<br />
							Username:	".$admin_email['username']."<br />
							Email	:	".$admin_email['email']."";			
				
			//echo '<pre>'; print_r($row['content']);die;	
				$this->db->where('email',$admin_email['email']);
				//$this->db->set('token',$token);
				$this->db->update('users',$token);
				
				$this->email->from($settings->email, $settings->name);
				$this->email->to($admin_email['email']);
				$this->email->bcc($settings->email);
				$this->email->subject("Password Rest Link");
				$this->email->message(html_entity_decode($msg));
			 //	$this->email->send();
				if ($this->email->send() )
				  {
						$this->session->set_flashdata('message', "Reset password link Sent to email");
						redirect(site_url('forgot/forgot_password'));
				 }else{
				 
					echo print_r($this->email->print_debugger()); die;
					
				}
				
		}else
		{
				$this->session->set_flashdata('error','Email Not Found');
				redirect(site_url('forgot/forgot_password'));
         
        }		
	 }

	
	
	
}
