<?php

Class Circuito_model extends Model {
    
      public function __construct() {
      $this->db = parent::getInstance('MYSQL-LAB'); 
    }

   
function setCircuito($CIRCUITO,$id=false)	{
		if($id)
				{
				 if($this->db->update('CIRCUITO', $CIRCUITO,false,'COD_CIR='.$id))
						return ['STATE'=>false,"MSG"=>"Circuito ".$CIRCUITO['NOM_CIR'].' Actualizado!'];	
				 else 
				 		return ['STATE'=>false,"MSG"=>"Circuito ".$CIRCUITO['NOM_CIR'].' sin cambios!'];
				}
		else if(!$this->db->check('*','CIRCUITO',"NOM_CIR=".$CIRCUITO['NOM_CIR']." AND EST_CIR='H'"))
		{
			if($this->db->insert('CIRCUITO', $CIRCUITO))
				return ['STATE'=>true,"MSG"=>"Circuito ".$CIRCUITO['NOM_CIR'].' registrado exitosamente!'];
				else
				return ['STATE'=>false,"MSG"=>"Error al registrar circuito"];
		}
	    else
		{
				return ['STATE'=>false,"MSG"=>"Circuito ".$CIRCUITO['NOM_CIR'].' ya existe!'];
		}
			
	}

function deleteCircuito($COD_CIR,$EST_CIR='D')	{
	if($this->db->update('CIRCUITO', ['EST_CIR' => "'".$EST_CIR."'"],false,'COD_CIR='.$COD_CIR))
						return ['STATE'=>false,"MSG"=>"Circuito ha sido eliminado!"];	
				 else 
				 		return ['STATE'=>false,"MSG"=>"Circuito no se pudo eliminar!"];
	}

public function select_all()
		{
      return $this->db->select('COD_CIR,NOM_CIR,DIR_CIR','CIRCUITO', "EST_CIR='H'", PDO::FETCH_NUM);
				
		}

public function selectbyID($COD_CIR)
		{
      return $this->db->select('COD_CIR,NOM_CIR,DIR_CIR','CIRCUITO', "EST_CIR='H' AND COD_CIR='$COD_CIR'", PDO::FETCH_NUM);
				
		}
}