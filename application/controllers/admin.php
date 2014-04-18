<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Home Controller class
 * 
 * @author Igor Golub
 * @class Home
 * 
 */
class Admin extends RE_Controller {
	
	/**
	 * Funkcija koja provjerava da li je korisnik ulogovan.
	 */
	public function check_login()
	{
		if (!$this->session->userdata("prijavljen"))
		{
			redirect(site_url("admin"));
		}
		
	}
	
	public function action_index()
	{
		if (!$this->session->userdata("prijavljen"))
		{

			
			$this->section_title = "Prijava korisnika";
			$this->render(array(
			"name" => "login"
			));
		}
		else 
		{
			$this->layout = "admin_layout";
			$season = $this->config->item('season'); 
			$this->render(array(
			"name" => "administracija",
			"data" =>array(
				"season" => $season)
			));
		}
	}
	public function action_prijavi()
	{
		
		$password = md5($this->input->post("password"));
		$username = $this->input->post("username");
		if (strlen($username) < 4) 
			show_error("Korisnik mora imati vise od 4 znaka.");
		
		$this->load->model("muser");
		
		$korisnik = $this->muser->check_user($username, $password);
		
		if ($korisnik != NULL)
		{
			$podaci = array(
				"uid" => $korisnik->kid,
				"name" => $korisnik->ime, 
				"username" => $korisnik->username,
				"prijavljen" => true
			);
			
			$this->session->set_userdata($podaci);
			redirect(site_url("admin"));
		}
		else 
		{
			show_error("Korisnik ne postoji ili pogrešna šifra.");
		}
	}
	/**
	 * Odjavi se
	 */
	public function action_logout()
	{
		$this->session->sess_destroy();
		
		redirect(site_url("admin"));
	}
	
	public function action_configurate()
	{
		$value = $this->input->post('season');
		$this->load->library('upload');
		$img = $this->upload_file(TRUE);
		

		if (!$this->input->post("slika-clanka")) 
			{
				$img = $this->config->item('background_picture');
			}
			else 
				$img = substr($this->input->post("slika-clanka"),1);
		
		$data = "<?php \$config['season'] = '".$value."';
				\$config['background_picture'] = '".$img."';";
				
		$path = './application/config/main.php';
		

		if ( ! write_file($path, $data))
		{
     		echo 'Unable to write the file';
		}
		else
		{
     		redirect(site_url("admin"));
		}
		
	}
	
	/**
	 * funkcija za upload file
	 */
	 function upload_file($upload_type,$path= null)
		{
			$this->load->library('upload');
    		//upload file
    		if($upload_type)
			{
				
            	$config['upload_path'] = "img/pozadine";
            	$config['allowed_types'] = 'gif|jpg|jpg|png|pdf';
            	$config['max_width'] = '1300';
            	$config['max_height'] = '1030';
				 $this->upload->initialize($config);
			}
			else {
				$config['upload_path'] = $path;
            	$config['allowed_types'] = 'pdf';
            	$config['max_size'] = '3145728';
			
				 $this->upload->initialize($config);
			}
    
			
			

			if($upload_type)
			{
				if ( ! $this->upload->do_upload("slika-clanka"))
				{
					//echo  $this->upload->display_errors();
				}
				/*else 
				{
					$data = $this->upload->do_upload();
				}*/
			}
			
			else
			{
				if ( ! $this->upload->do_upload("pdf"))
				{
					echo  $this->upload->display_errors();
				}
				else 
				{
					$data = $this->upload->do_upload("pdffile");
				}
			}
				
			
			
			 $data = $this->upload->data();
			 return $data["file_name"];
		}

	public function action_test()
	{
		if (!$this->session->userdata("prijavljen"))
		{
			$this->render(array(
			"name" => "login"
			));
		}
		else
		{
			$params = findImages();
			$this->render(array(
			"name" => "admin_slike",
			"data" => array(
				'params' => $params, 
				) 
			));
		}
	}
		

     
    
	
		
		
		
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
