<?php

class Application_Model_Produtores extends Zend_Db_Table_Abstract
{
	protected $_name = 'tbl_produtores';
	protected $_primary = 'id_produtor';
	
	
	public function incluir(
		$nome = NULL,$facebook = NULL,$rg = NULL,$cpf = NULL,$endereco = NULL,$cep = NULL,$uf = NULL,$cidade = NULL,$telefone,
		$celular = NULL,$email = NULL,$formacao = NULL,$atividades = NULL,$descritivo = NULL,$complementares = NULL,$perfil,
		$master = NULL,$master_min_diario = NULL,$master_min_mensal= NULL,
		$executivo = NULL,$executivo_min_diario = NULL,$executivo_min_mensal= NULL,
		$assistente = NULL,$assistente_min_diario = NULL,$assistente_min_mensal= NULL,
		$produtor = NULL,$produtor_min_diario = NULL,$produtor_min_mensal= NULL,
		$servicos = NULL,$servicos_min_diario = NULL,$servicos_min_mensal= NULL,
		$financeiro = NULL,$financeiro_min_diario = NULL,$financeiro_min_mensal= NULL,
		$logistico = NULL,$logistico_min_diario = NULL,$logistico_min_mensal= NULL,
		$apoio = NULL,$apoio_min_diario = NULL,$apoio_min_mensal = NULL
	)
	{
		$model = $this->createRow();
		$model->nome = $nome;
		$model->facebook = $facebook;
		$model->rg = $rg;
		$model->cpf = $cpf;
		$model->endereco = $endereco;
		$model->cep = $cep;
		$model->uf = $uf;
		$model->cidade = $cidade;
		$model->telefone = $telefone;
		$model->celular = $celular;
		$model->email = $email;
		$model->formacao = $formacao;
		$model->atividades = $atividades;
		$model->descritivo = $descritivo;
		$model->complementares = $complementares;
		$model->perfil = $perfil;
		if($master != NULL)
		{
		$model->master = $master;
		$model->master_min_diario = $master_min_diario;
		$model->master_min_mensal = $master_min_mensal;
		}
		if($executivo != NULL)
		{
		$model->executivo = $executivo;
		$model->$executivo_min_diario = $executivo_min_diario;
		$model->$executivo_min_mensal = $executivo_min_mensal;
		}
		if($assistente != NULL)
		{
		$model->assistente = $assistente;
		$model->assistente_min_diario = $assistente_min_diario;
		$model->assistente_min_mensal = $assistente_min_mensal;
		}
		if($produtor != NULL)
		{
		$model->produtor = $produtor;
		$model->produtor_min_diario = $produtor_min_diario;
		$model->produtor_min_mensal = $produtor_min_mensal;
		}
		if($servicos != NULL)
		{
		$model->servicos = $servicos;
		$model->servicos_min_diario = $servicos_min_diario;
		$model->servicos_min_mensal = $servicos_min_mensal;
		}
		if($financeiro != NULL)
		{
		$model->financeiro = $financeiro;
		$model->financeiro_min_diario = $financeiro_min_diario;
		$model->financeiro_min_mensal = $financeiro_min_mensal;
		}
		if($logistico != NULL)
		{
			$model->logistico = $logistico;
		$model->logistico_min_diario = $logistico_min_diario;
		$model->logistico_min_mensal = $logistico_min_mensal;
		}
		if($apoio != NULL)
		{
		$model->apoio = $apoio;
		$model->apoio_min_diario = $apoio_min_diario;
		$model->apoio_min_mensal = $apoio_min_mensal;
		}
		return $model->save();
	}
	
	
	public function porFiltro($nome,$uf,$order)
	{
		$select =  $this->select()
					->where("nome like ('%?%')",$nome)
					->orWhere("uf = '?'",$uf)
					->order('? ASC',$order);
			
		return $this->fetchAll($select);
	}
}

