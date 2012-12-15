<?php

class Application_Model_Cadastro extends Zend_Db_Table_Abstract
{
	protected $_name = 'tbl_usuarios';
	protected $_primary = 'id_usuario';
	
	
	public function incluir(
		$user,$senha
	)
	{
		$model = $this->create();
		$model->login = $user;
		$model->senha = $senha;
		return $model->save();
	}
	public function logar($user,$senha)
	{
	
		$am = $this->fetchRow($this->select()->where('login = ?', $user)->where('senha = ?',$senha));
		
			
		return $am;
	}

}

