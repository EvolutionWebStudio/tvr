<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**Kategorija Controller class
 * 
 * @author Igor Golub
 * @class Page
 * 
 */
class Kategorija extends RE_Controller {
	
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
	
	// vraca spisak svih stranica
	public function action_index()
	{
		$this->check_login();
		$this->page_title = "Kategorije";
		$this->layout = "admin_layout";
		
		
		$this->load->model("mkategorija");
		
		
		$categories = $this->mkategorija->return_categories();

		$this->render(array(
		   "name" => "admin_kategorije",
		   "data" =>  array(
		  		"categories" => $categories
		  		)
		));
	}
	
	//Akcije
	
	/**
		*Akcija dodaj kategoriju Admin
		**/
	public function action_dodaj_kategoriju()
		{
			$this->check_login();
			$this->page_title = "Dodaj Kategoriju";
			$this->layout = "admin_layout";
			
			$this->render(array(
			"name" => "_admin_nova_kategorija",
			"data" => array(
				)
			));
		}
	/**
		*Akcija obrisi kategoriju Admin
		**/
	public function action_obrisi_kategoriju($id)
		{
			$this->check_login();
			$this->page_title = "Dodaj Kategoriju";
			
			$this->load->model("mkategorija");
			
			$this->mkategorija->delete_category($id);
			
			redirect(site_url("kategorija"));
		}
	


		/**
		*Akcija izmjeni kategoriju Admin
		**/
		
		public function action_izmjeni_kategoriju($id)
		{
			$this->check_login();
			$this->page_title = "Izmjeni Kategoriju";
			$this->layout = "admin_layout";
			
			$this->load->model("mkategorija");
			$category = $this->mkategorija->return_category($id);
			
			$this->render(array(
			"name" => "_admin_izmjeni_kategoriju",
			"data" => array(
				"category" => $category
				)
			));
		}
		
		
		/**
		 * update stranicu
		 */
		public function action_update_kategoriju()
		{
			$this->check_login();
			$this->load->model("mkategorija");
			if (!$this->input->post("slika-clanka")) 
			{
				$img = $this->mkategorija->return_category($this->input->post("id"))->link;
			}
			else 
				$img = substr($this->input->post("slika-clanka"),1);
			
			$category = array(
				"id" => $this->input->post("id"),
				"naziv" => $this->input->post("naziv-kategorije"),
				"opis" => $this->input->post("opis-kategorije"),
				"link" => $img
			);
			$this->mkategorija->update_category($category);
			redirect(site_url("kategorija"));
		}
		
		/**
		 * add stranicu
		 */
		public function action_add_kategoriju()
		{
			$this->check_login();
			$this->load->model("mkategorija");
		
			
			$category = array(
				"naziv" => $this->input->post("naziv-kategorije"),
				"opis" => $this->input->post("opis-kategorije"),
				"link" => substr($this->input->post("slika-clanka"),1)
			);
			$this->mkategorija->write_category($category);
			redirect(site_url("kategorija"));
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
}

/* End of file post.php */
/* Location: ./application/controllers/post.php */
