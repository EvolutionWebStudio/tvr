<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Post Controller class
 * 
 * @author Igor Golub
 * @class Post
 * 
 */
class Location extends RE_Controller {
	
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
	
	public function action_zemlje()
	{
		$this->check_login();
		$this->page_title = "Spisak Zemalja";
		$this->layout = "admin_layout";
		
		$this->load->model("mlocation");
		$zemlje = $this->mlocation->return_countries();
		
		$this->render(array(
			"name" => "admin_zemlje",
			"data" => array(
				"zemlje" => $zemlje
			 )
		));
	}
	
	public function action_nova_zemlja()
	{
		$this->check_login();
		$this->page_title = "Nova Zemlja";
		$this->layout = "admin_layout";
		$this->render(array(
			"name" => "_admin_nova_zemlja",
			"data" => array()
		));
	}
	
	public function action_add_zemlju()
	{
			$this->check_login();
			$this->load->model("mlocation");
			//$this->load->library('upload');
		   	//$img = $this->upload_file(TRUE);
			
			$offer = array(
				"name" => $this->input->post("naslov-specijalne-ponude"),
				"link" => substr($this->input->post("slika-clanka"),1),

			);
			$this->mlocation->write_country($offer);
			redirect(site_url("location/zemlje"));
	}
	
	public function action_izmjeni_zemlju($id)
	{
		$this->check_login();
		$this->page_title = "Izmjeni Zemlju";
		$this->layout = "admin_layout";
			
		$this->load->model("mlocation");
		$country = $this->mlocation->return_country($id);
			
		$this->render(array(
			"name" => "_admin_izmjeni_zemlju",
			"data" => array(
				"country" => $country
				)
		));
	}
	
	public function action_update_zemlju()
	{
		$this->check_login();
		$this->load->model("mlocation");
			//$this->load->library('upload');
		    //$img = $this->upload_file(TRUE);
		if (!$this->input->post("slika-clanka")) 
		{
			$img = $this->mlocation->return_country($this->input->post("id"))->link;
		}
		else 
			$img = substr($this->input->post("slika-clanka"),1);
			
			$offer = array(
				"zemlja_id" => $this->input->post("id"),
				"name" => $this->input->post("naslov-specijalne-ponude"),
				"link" => $img,
			
			);
			$this->mlocation->update_country($offer);
			redirect(site_url("location/zemlje"));
	}
	
	public function action_delete_zemlju($id)
	{
		$this->check_login();
		$this->load->model("mlocation");
			
		$this->mlocation->delete_country($id);
		redirect(site_url("location/zemlje"));
	}
	
	public function action_gradovi()
	{
		$this->check_login();
		$this->page_title = "Spisak Gradova";
		$this->layout = "admin_layout";
		
		$this->load->model("mlocation");
		$gradovi = $this->mlocation->return_cities();
		
		$this->render(array(
			"name" => "admin_gradovi",
			"data" => array(
				"gradovi" => $gradovi
			 )
		));
	}

	public function action_novi_grad()
	{
		$this->check_login();
		$this->page_title = "Nova Grad";
		$this->layout = "admin_layout";
		
		$this->load->model("mlocation");
		$zemlje = $this->mlocation->return_countries();
		
		$this->render(array(
			"name" => "_admin_novi_grad",
			"data" => array(
			'drzave' => $zemlje,
			)
		));
	}
	
	public function action_add_grad()
	{
			$this->check_login();
			$this->load->model("mlocation");
			//$this->load->library('upload');
		   	//$img = $this->upload_file(TRUE);
			
			$offer = array(
				"name" => $this->input->post("naslov-specijalne-ponude"),
				"link" => substr($this->input->post("slika-clanka"),1),
				"zemlja_id" => $this->input->post("drzava"),

			);
			$this->mlocation->write_city($offer);
			redirect(site_url("location/gradovi"));
	}

	public function action_izmjeni_grad($id)
	{
		$this->check_login();
		$this->page_title = "Izmjeni Grad";
		$this->layout = "admin_layout";
			
		$this->load->model("mlocation");
		$city = $this->mlocation->return_city($id);
		
		$this->load->model("mlocation");
		$zemlje = $this->mlocation->return_countries();
			
		$this->render(array(
			"name" => "_admin_izmjeni_grad",
			"data" => array(
				"city" => $city,
				"drzave" => $zemlje,
				)
		));
	}
	
	public function action_update_grad()
	{
		$this->check_login();
		$this->load->model("mlocation");
			//$this->load->library('upload');
		    //$img = $this->upload_file(TRUE);
		if (!$this->input->post("slika-clanka")) 
		{
			$img = $this->mlocation->return_city($this->input->post("id"))->link;
		}
		else 
			$img = substr($this->input->post("slika-clanka"),1);
			
			$offer = array(
				"grad_id" => $this->input->post("id"),
				"name" => $this->input->post("naslov-specijalne-ponude"),
				"link" => $img,
				"zemlja_id" => $this->input->post("drzava"),
			);
			$this->mlocation->update_city($offer);
			redirect(site_url("location/gradovi"));
	}
	
	public function action_delete_grad($id)
	{
		$this->check_login();
		$this->load->model("mlocation");
			
		$this->mlocation->delete_city($id);
		redirect(site_url("location/gradovi"));
	}	
}