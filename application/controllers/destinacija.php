<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * destinacija Controller class
 * 
 * @author Igor Golub
 * @class Post
 * 
 */
class Destinacija extends RE_Controller {
	
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

	
	/**
	 * Akcija jedan clanak
	 * sadrzaj clanka
	 * meni sa ostalim kategorijama
	 * meni sa ostalim clancima iz te kategorije
	 */
	public function action_index()
	{
		
		redirect(base_url());
	
	}
	
	
	public function action_destinacije($id = null)
	{
		
		$this->load->model("mdes");
		
		
		$destination = $this->mdes->return_destination($id);
		$menu = $this->mdes->return_destinations();
		$this->section_title = "Destinacije";
		$this->page_title = $destination->naslov;
		if($destination->opis) $this->meta_description = $destination->opis;
		
		$this->render(array(
		   "name" => "destinacija.php",
		   "data" =>  array(
		   "destination" => $destination,
		   "menu" => $menu
		  		
		  		)
		));
	
	}
	
	
	
	
	
	
	
	
// Administracija----------------------------------------------------------

		/**
		 * Akcija spisak clanaka prikazuje sve clanke
		 */
		public function action_spisak_destinacija($id=null)
		{
			$this->check_login();
			$this->page_title = "Spisak Destinacija";
			$this->layout = "admin_layout";
			
			$this->load->model("mdes");
	
			$params = $this->mdes->return_all_destinations();

			
			$this->render(array(
			"name" => "admin_destinacije",
			"data" => array(
			"params" => $params,
			 )
			));
		}
		
		
		
		/**
		 *Akcija izmjeni clanak otvara postojeci clanak u formi
		 */
		
		public function action_izmjeni_destinaciju($pid)
		{
			$this->check_login();
			$this->page_title = "Izmjeni Destinaciju";
			$this->layout = "admin_layout";
			
			$this->load->model("mdes");
			$param = $this->mdes->return_admin_destination($pid);
			
			
			$this->render(array(
			"name" => "_admin_izmjeni_destinaciju",
			"data" => array(
				"param" => $param
				)
			));
		}
		
		/**
		*Akcija novi clanak otvara formu za unos novog clanka
		**/
		
		public function action_nova_destinacija()
		{
			$this->check_login();
			$this->page_title = "Nova Destinacija";
			$this->layout = "admin_layout";

			$this->render(array(
			"name" => "_admin_nova_destinacija",
			"data" => array(
				)
			));
		}
		
		
		/**
		 * Akcija update calnak kupi podatke iz foreme metodom POST
		 * i upisuje ih u bazu
		 */
		public function action_update_destinaciju()
		{
			$this->check_login();
			$this->load->model("mdes");
			if (!$this->input->post("slika-clanka")) 
			{
				$img = $this->mdes->return_admin_destination($this->input->post("id"))->link;
			}
			else 
				$img = substr($this->input->post("slika-clanka"),1);
			
			$post = array(
				"did" => $this->input->post("id"),
				"naslov" => $this->input->post("naslov-clanka"),
				"tekst" => $this->input->post("sadrzaj-clanka"), 
				"link" => $img,
				"status" => $this->input->post("status"),
				"opis" => $this->input->post("opis")
			);
			$this->mdes->update_destinaciju($post);
			redirect(site_url("destinacija/spisak_destinacija"));
		}
		
		/**
		 * Akcija add calnak kupi podatke iz foreme metodom POST
		 * i upisuje ih u bazu
		 */
		public function action_add_destinaciju()
		{
			$this->check_login();
			$this->load->model("mdes");
			$this->load->library('upload');
		   $img = $this->upload_file(TRUE);
		   //$img = "konj";
			
			$post = array(
				"naslov" => $this->input->post("naslov-clanka"),
				"tekst" => $this->input->post("sadrzaj-clanka"), 
				"link" => substr($this->input->post("slika-clanka"),1),
				"status" => $this->input->post("status"),
				"opis" => $this->input->post("opis")				
			);
			$this->mdes->write_destinaciju($post);
			redirect(site_url("destinacija/spisak_destinacija"));
		}
		
		/**
		 * Akcija delete calnak brise red u bazi odredjen id-om
		 */
		public function action_delete_destinaciju($id)
		{
			$this->check_login();
			$this->load->model("mdes");
			
			
			$this->mdes->delete_destinaciju($id);
			redirect(site_url("destinacija/spisak_destinacija"));
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
				
            	$config['upload_path'] = "images/clanci";
            	$config['allowed_types'] = 'gif|jpg|jpg|png|pdf';
            	$config['max_width'] = '609';
            	$config['max_height'] = '289';
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
}

/* End of file post.php */
/* Location: ./application/controllers/post.php */
