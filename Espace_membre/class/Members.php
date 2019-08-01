<?php // Members class

class Members
{
	private $_ID;
	private $_ID_GROUPS;
	private $_usrname;
	private $_pass;
	private $_mail;
	private $_subscribe_date;
	
	// Fonction en attente d'un tableau de données
	
	public function hydrate(array $donnees)
	
	{
		
	}
	
	// Liste des GETTERS
	
	public function ID()
	{
		return $this->_ID;
	}
	
	public function ID_GROUPS()
	{
		return $this->_ID_GROUPS;
	}
	
	public function usrname()
	{
		return $this->_usrname;
	}
	
	public function pass()
	{
		return $this->_pass;
	}
	public function mail()
	{
		return $this->_mail;
	}

	
	// Liste des SETTERS
	
	public function setID($ID)
	{
		$this->_ID = (int) $ID;
	}
	public function setID_GROUPS($ID_GROUPS)
	{
		$this->_ID_GROUPS = (int) $ID_GROUPS;
	}
	
	
}
	
	
?>