<?php
class BDD extends PDO
{
	private static $bdd;

	public function __construct(){
		parent::__construct('mysql:host=localhost;dbname=projetphp2','root');

		$this->exec("set names utf8");
	}

	public static function load()
	{
		if(BDD::$bdd == null)
		{
			BDD::$bdd = new BDD();
		}
		return BDD::$bdd;
	}
	
	function ecrire($sql)
	{
		$res = $this->exec($sql);
		return $res;
	}

	function lire($sql,&$nb = 0)
	{
		$cur = $this->query($sql);
		if($cur === FALSE) return FALSE;
		$tab = $cur->fetchall(PDO::FETCH_ASSOC);
		$nb = count($tab);
		return $tab;
	}

	function prep($sql)
	{
		$cur = $this->prepare($sql);
		return $cur;
	}

	function addParam($cur,$param,$contenu)
	{
		$cur->bindValue($param, $contenu);
		return $cur;
	}

	function ecrirePrep($cur, $tab = array())
	{
		$res = $cur->execute($tab);
		return $res;
	}

	function lirePrep($cur, $tab = array())
	{
		$res = $cur->execute($tab);
		if(!$res) return FALSE;
		return $cur->fetchall(PDO::FETCH_ASSOC);
	}

	function afficher($tab)
	{
		echo "<PRE>";
		print_r($tab);
		echo "</PRE>";
	}
}
?>
