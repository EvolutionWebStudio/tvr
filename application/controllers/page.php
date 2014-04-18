<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Page Controller class
 * 
 * @author Igor Golub
 * @class Page
 * 
 */
class Page extends RE_Controller {
	
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
	 * Akcija vraca spisak svih stranica
	 */
	public function action_index()
	{
		$this->check_login();
		$this->page_title = "Sve stranice";
		$this->layout = "admin_layout";
		
		
		$this->load->model("mpage");
		
		
		$pages = $this->mpage->return_pages();

		$this->render(array(
		   "name" => "admin_stranice",
		   "data" =>  array(
		  		"pages" => $pages
		  		)
		));
	}
	
	/**
	 * Akcija vraca stranicu opsti uslovi
	 */
	public function action_opsti_uslovi()
	{
		$this->page_title = "Opšti uslovi";
		$this->section_title = "Opšti uslovi";
		
		$this->load->model("mpage");
		
		$page = $this->mpage->return_page(1);
		
		
		$this->render(array(
		   "name" => "opsti-uslovi.php",
		   "data" =>  array(
		   		"page" => $page
		  		)
		));
	
	}
	
	
	/**
	 * Akcija vraca stranicu kontakt
	 */
	public function action_kontakt()
	{
		$this->page_title = "Kontakt";
		$this->section_title = "Kontakt";
		
		
		$this->load->model("mpage");
		
		$page = $this->mpage->return_page(1);
		
		
		$this->render(array(
		   "name" => "kontakt.php",
		   "data" =>  array(
		   		"page" => $page
		  		)
		));
	
	}
	
	/**
	 * Akcija vraca stranicu rezervacija
	 */
	
	public function action_rezervacija()
	{
		$this->page_title = "Rezervacija";
		$this->section_title = "Rezervacija";
		
		
		$this->load->model("mpage");
		$this->load->model("mpost");
		
		$page = $this->mpage->return_page(1);
		$params = $this->mpost->return_all_active_posts();
		
		
		$this->render(array(
		   "name" => "rezervacija",
		   "data" =>  array(
		   		"page" => $page,
		   		"params" => $params
		  		)
		));
	
	}
	/**
	 * akcija koja salje mail sa rezervacijom
	 */
	public function action_rezervisi()
	{
		$config['mailtype'] = "html";
		$this->email->initialize($config);	
		$message = "Destinacija: ". $this->input->post("destinacija")."<br>".
					"Destinacija precizno: ". $this->input->post("opis-destinacije")."</br>".
					"Datum dolaska: ". $this->input->post("datum-dolaska")."</br>".
					"Datum povratka: ". $this->input->post("datum-povratka")."</br>".
					"Broj odraslih: ". $this->input->post("broj-odraslih")."</br>".
					"Broj djece: ". $this->input->post("broj-djece")."</br>".
					"Kucni ljubimci: ". $this->input->post("ljubimci")."</br>".
					"Ime i prezime: ". $this->input->post("ime-i-prezime")."</br>".
					"Email: ". $this->input->post("email")."</br>".
					"Broj telefona: ". $this->input->post("telefon")."</br>".
					"Broj mobitela: ". $this->input->post("mobitel")."</br>".
					"Adresa: ". $this->input->post("adresa")."</br>".
					"Broj poste: ". $this->input->post("broj-poste")."</br>".
					"Grad: ". $this->input->post("grad")."</br>".
					"Drzava: ". $this->input->post("drzava")."</br>".
					"Komentar: ". $this->input->post("komentar")."</br>";
					
		$this->email->from($this->input->post("email"), $this->input->post("author"));
		$this->email->to('tavor.turizam@gmail.com');

		$this->email->subject("rezervacija sa sajta");
		$this->email->message($message);

		$this->email->send();
		
		
	}

	/**
	 * akcija koja salje mail sa rezervacijom
	 */
	public function action_kontaktiraj()
	{

		$this->email->from($this->input->post("email"), $this->input->post("ime"));
		$this->email->to('tavor.turizam@gmail.com');
		$this->email->subject("Kontakt sa sajta");
		$this->email->message($this->input->post("poruka"));
		
		if($this->email->send()) echo "sent";
		else echo "error";
		
		
	}
	
	
//Administracija-----------------------------------------------

		/**
		*Akcija izmjeni stranicu 
		**/
		public function action_izmjeni_stranicu($id)
		{
			$this->check_login();
			$this->page_title = "Izmjeni Stranicu";
			$this->layout = "admin_layout";
			
			
			$this->load->model("mpage");
			$page = $this->mpage->return_page($id);
			
			$this->render(array(
			"name" => "_admin_izmjeni_stranicu",
			"data" => array(
				"page" => $page
				)
			));
		}
		
		
		/**
		 * update stranicu
		 */
		public function action_update_stranicu()
		{
			$this->check_login();
			$this->load->model("mpage");
			
			$page = array(
				"stranica_id" => $this->input->post("id"),
				"naslov" => $this->input->post("naslov-stranice"),
				"tekst" => $this->input->post("sadrzaj-stranice")
			);
			$this->mpage->update_page($page);
			redirect(site_url("page"));
		}
}

/* End of file post.php */
/* Location: ./application/controllers/post.php */
