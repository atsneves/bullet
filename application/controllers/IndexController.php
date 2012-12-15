<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
       
    }
	public function actincluirAction()
	{
		$this->_helper->layout->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		
		$master  = 0;  
		$master_min_diario = 0;
		$master_min_mensal = 0;
		$executivo = 0;
		$executivo_min_diario = 0;
		$executivo_min_mensal = 0;
		$assistente = 0;
		$assistente_min_diario = 0;
		$assistente_min_mensal = 0;
		$produtor = 0;
		$produtor_min_diario = 0;
		$produtor_min_mensal = 0;
		$servicos = 0;
		$servicos_min_diario = 0; 
		$servicos_min_mensal = 0;
		$financeiro = 0;
		$financeiro_min_diario = 0;
		$financeiro_min_mensal = 0; 
	
		$logistico = 0;
		$logistico_min_diario = 0;
		$logistico_min_mensal = 0;
	
		$apoio = 0;
		$apoio_min_diario = 0;
		$apoio_min_mensal = 0;
	
		
		$modelProdutor = new Application_Model_Produtores();
		
		$nome = $_POST["nome"];
		$facebook = $_POST["facebook"];
		$rg = $_POST["rg"];
		$cpf = $_POST["cpf"];
		$endereco = $_POST["endereco"];
		$cep = $_POST["cep"];
		$uf = $_POST["uf"];
		$cidade = $_POST["cidade"];
		$telefone = $_POST["telefone"];
		$celular  = $_POST["celular"]; 
		$email = $_POST["email"];
		$formacao = $_POST["formacao"];
		$atividades = $_POST["atividades"];
		$descritivo = $_POST["descritivo"];
		$complementares = $_POST["informacoes"];
		$perfil = $_POST["perfil"];
		
		if (isset($_POST["master"])){
			$master  = $_POST["master"];  
			$master_min_diario = $_POST["master_min_diario"];
			$master_min_mensal = $_POST["master_min_mensal"];
		}
		if (isset($_POST["executivo"])){
			$executivo = $_POST["executivo"];
			$executivo_min_diario = $_POST["executivo_min_diario"];
			$executivo_min_mensal = $_POST["executivo_min_mensal"];
		}
		if (isset($_POST["assistente"])){
			$assistente = $_POST["assistente"];
			$assistente_min_diario = $_POST["assistente_min_diario"];
			$assistente_min_mensal = $_POST["assistente_min_mensal"];
		}
		if (isset($_POST["produtor"])){ 
			$produtor = $_POST["produtor"];
			$produtor_min_diario = $_POST["produtor_min_diario"];
			$produtor_min_mensal = $_POST["produtor_min_mensal"];
		}
		if (isset($_POST["servicos"])){
			$servicos = $_POST["servicos"];
			$servicos_min_diario = $_POST["servicos_min_diario"]; 
			$servicos_min_mensal = $_POST["servicos_min_mensal"];
		}
		if (isset($_POST["financeiro"])){
			$financeiro = $_POST["financeiro"];
			$financeiro_min_diario = $_POST["financeiro_min_diario"];
			$financeiro_min_mensal = $_POST["financeiro_min_mensal"]; 
		}
		if (isset($_POST["logistico"])){
			$logistico = $_POST["logistico"];
			$logistico_min_diario = $_POST["logistico_min_diario"];
			$logistico_min_mensal = $_POST["logistico_min_mensal"];
		}
		if (isset($_POST["apoio"])){
			$apoio = $_POST["apoio"];
			$apoio_min_diario = $_POST["apoio_min_diario"];
			$apoio_min_mensal = $_POST["apoio_min_mensal"];
		} 
		
		$ret = $modelProdutor->incluir($nome, $facebook, $rg, $cpf, $endereco, $cep, $uf, $cidade, $telefone, $celular, 
										$email, $formacao, $atividades, $descritivo, $complementares, $perfil, $master, 
										$master_min_diario, $master_min_mensal, $executivo, $executivo_min_diario, 
										$executivo_min_mensal, $assistente, $assistente_min_diario, $assistente_min_mensal, 
										$produtor, $produtor_min_diario, $produtor_min_mensal, $servicos, $servicos_min_diario, 
										$servicos_min_mensal, $financeiro, $financeiro_min_diario, $financeiro_min_mensal, 
										$logistico, $logistico_min_diario, $logistico_min_mensal, $apoio, $apoio_min_diario, 
										$apoio_min_mensal);
										
		echo $ret;
	}
	public function relatorioAction()
	{
		$logado = new Zend_Session_Namespace('novo');
		
		if(isset($logado->user) && $logado->user != "")
		{
			
		}
		else {
			$this->_redirect("/index/login");
		}
	}
	
	public function loginAction()
	{
		
	}
	
	public function actloginAction()
	{	
		$this->_helper->layout->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		$modelLogin = new Application_Model_Cadastro();
		
		$ret = $modelLogin->logar($_POST["login"], $_POST["senha"]);
		if ($ret["id_usuario"] > 0)
		{
			$novo = new Zend_Session_Namespace('novo');
			$novo->user = $_POST["login"];
			$novo->senha = $_POST["senha"];
			echo 1;
		}
		else {
			echo 0;
		}
		
	}
	
	public function logoutAction()
	{
		Zend_Session::destroy(true);
		$this->_redirect("/index/login");
	}	
}

