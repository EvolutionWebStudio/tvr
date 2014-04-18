<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ekskurzija Controller class
 * 
 * @author Igor Golub
 * @class Post
 * 
 */
class Ekskurzija extends RE_Controller {
	
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
	/**
	 * Akcija index, prikazuje aktuelne clanke, slajder
	 */
	public function action_ekskurzije($kategorija = null)
	{
		
		$this->page_title = "Ekskurzije";
		$this->section_title = "Ekskurzije";
		
		
		$this->load->model("mekskurzija");
		
		if($this->input->get("tip-ekskurzije"))
		{
			$kategorija = $this->input->get("tip-ekskurzije");
		}
		if($kategorija == null) $kategorija = "osnovna skola";
		$ekskurzija = $this->mekskurzija->return_ekskurzije($kategorija);
		$menu = makeList($this->mekskurzija->return_categories());
		$this->meta_description = "Veliki broj ponuda za ekskurzije osnovne, srednje skole i fakulteta";
		
		
		
		$this->render(array(
		   "name" => "ekskurzije",
		   "data" =>  array(
		  		"ekskurzija" => $ekskurzija,
		  		"menu" => $menu,
		  		"tipEkskurzije" => $kategorija  
		  		)
		));
	}
	
	public function action_ekskurzij($id = null)
	{
		
		$this->load->model("mekskurzija");
		
		
		$param = $this->mekskurzija->return_ekskurziju($id);
		$menu = $this->mekskurzija->return_categories();
		$params = $this->mekskurzija->return_ekskurzije($param->kategorija);
		$this->section_title = $param->kategorija;
		$this->page_title = $param->naslov." | Turisticka agencija Tavor - Pale";
		if($param->opis) $this->meta_description = $param->opis;
		
		$this->render(array(
		   "name" => "ekskurzija.php",
		   "data" =>  array(
		   "param" => $param,
		   "menu" => $menu,
		   "params" => $params
		  		
		  		)
		));
	
	}
	
	
	
	
	
	
	
	
// Administracija----------------------------------------------------------

		/**
		 * Akcija spisak clanaka prikazuje sve clanke
		 */
		public function action_spisak_ekskurzija($id=null)
		{
			$this->check_login();
			$this->page_title = "Spisak Ekskurzija";
			$this->layout = "admin_layout";
			
			$this->load->model("mekskurzija");
			$menu = makeList($this->mekskurzija->return_categories());
	
			
			if($this->input->post('admin-filter'))
			{
				$data['status'] = (int)$this->input->post('status');
				$data['kategorija'] = $this->input->post('kategorija');
			}
			else 
			{
				$data['status'] = -1;
				$data['kategorija'] = "sve";	
			}

			if($data['status'] != -1 or $data['kategorija'] != "sve")
			{
				$params = $this->mekskurzija->filter($data);
			}
			else
			{
				$params = $this->mekskurzija->return_admin_ekskurzije();
			}

			
			$this->render(array(
			"name" => "admin_ekskurzije",
			"data" => array(
				"params" => $params,
				"status" => $data['status'],
				"kategorija" => $data['kategorija'],
				"menu" => $menu
			 )
			));
		}
		
		
		
		/**
		 *Akcija izmjeni clanak otvara postojeci clanak u formi
		 */
		
		public function action_izmjeni_ekskurziju($pid)
		{
			$this->check_login();
			$this->page_title = "Izmjeni Ekskurziju";
			$this->layout = "admin_layout";
			
			$this->load->model("mekskurzija");
			$param = $this->mekskurzija->return_ekskurziju($pid);
			$menu = $this->mekskurzija->return_categories();
			
			$this->render(array(
			"name" => "_admin_izmjeni_ekskurziju",
			"data" => array(
				"param" => $param,
				"categories" => $menu
				)
			));
		}
		
		/**
		*Akcija novi clanak otvara formu za unos novog clanka
		**/
		
		public function action_nova_ekskurzija()
		{
			$this->check_login();
			$this->page_title = "Novi Ekskurzija";
			$this->layout = "admin_layout";
			
			$this->load->model('mekskurzija');
			$menu = $this->mekskurzija->return_categories();

			$this->render(array(
			"name" => "_admin_nova_ekskurzija",
			"data" => array(
				"categories" => $menu
				)
			));
		}
		
		
		/**
		 * Akcija update calnak kupi podatke iz foreme metodom POST
		 * i upisuje ih u bazu
		 */
		public function action_update_ekskurziju()
		{
			$this->check_login();
			$this->load->model("mekskurzija");
			if (!$this->input->post("slika-clanka")) 
			{
				$img = $this->mekskurzija->return_ekskurziju($this->input->post("id"))->link;
			}
			else 
				$img = substr($this->input->post("slika-clanka"),1);
			
			$post = array(
				"eid" => $this->input->post("id"),
				"naslov" => $this->input->post("naslov-clanka"),
				"tekst" => $this->input->post("sadrzaj-clanka"), 
				"link" => $img,
				"status" => $this->input->post("status"),
				"kategorija" => $this->input->post("kategorija"),
				"opis" => $this->input->post("opis")
			);
			$this->mekskurzija->update_ekskurziju($post);
			redirect(site_url("spisak_ekskurzija"));
		}
		
		/**
		 * Akcija add calnak kupi podatke iz foreme metodom POST
		 * i upisuje ih u bazu
		 */
		public function action_add_ekskurziju()
		{
			$this->check_login();
			$this->load->model("mekskurzija");
			
			
			$post = array(
				"naslov" => $this->input->post("naslov-clanka"),
				"tekst" => $this->input->post("sadrzaj-clanka"), 
				"link" => substr($this->input->post("slika-clanka"),1),
				"status" => $this->input->post("status"),
				"opis" => $this->input->post("opis")				
			);
			$this->mekskurzija->write_ekskurziju($post);
			redirect(site_url("spisak_ekskurzija"));
		}
		
		/**
		 * Akcija delete calnak brise red u bazi odredjen id-om
		 */
		public function action_delete_ekskurziju($id)
		{
			$this->check_login();
			$this->load->model("mekskurzija");
			
			
			$this->mekskurzija->delete_ekskurziju($id);
			redirect(site_url("spisak_ekskurzija"));
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
