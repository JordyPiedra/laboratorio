<?php

Class Producto_model extends Model {
    
    public function __construct() {
       $this->db = parent::getInstance('MYSQL-LAB'); 
    }

   
function setProducto($PRODUCTO)	{
		if(!$this->db->check('*','PRODUCTO',"CODREF_PRO=".$PRODUCTO['CODREF_PRO']))
		{
			$nom=($PRODUCTO['CAT_PRO']=="'E'")?"EXÁMEN":"PRODUCTO";
			if($this->db->insert('PRODUCTO', $PRODUCTO))
				return ['STATE'=>true,"MSG"=>$nom." ".$PRODUCTO['NOM_PRO'].' registrado exitosamente!'];
				else
				return ['STATE'=>false,"MSG"=>"Error al registrar ".$nom."!."];
		}
	    else
		{
			//if($this->db->update('PERSONA',$PRODUCTO,false,"CED_PER=".$PRODUCTO['CED_PER'] ))
			//return ['STATE'=>true,"MSG"=>"PRODUCTO ".$PRODUCTO['PRINOM_PER'].' '.$PRODUCTO['PRIAPE_PER'].' actualizado exitosamente!'];
				//else
				return ['STATE'=>false,"MSG"=>"No existen cambios!"];
		}		
	}



public function select_all($CAT_PRO='%')
		{
      return $this->db->select('COD_PRO,CODREF_PRO,NOM_PRO,CAN_PRO,DES_PRO
	  							,CAT_PRO,TIP_PRO,EST_PRO','PRODUCTO', "CAT_PRO LIKE '$CAT_PRO'", PDO::FETCH_NUM);

		}

public function setEquivalencia($EQUIVALENCIA){
	$result=  $this->db->select('NOM_PRO','PRODUCTO P ,EQUIVALENCIA E', "P.CODREF_PRO = E.CODREF_PRO AND E.CODREF_PRO = ".$EQUIVALENCIA['CODREF_PRO'], PDO::FETCH_NUM);
	if($result)
	{
		return ['STATE'=>false,"MSG"=>"Equivalencia existente con el producto ".$result[0][0]];
	}else if($this->db->insert('EQUIVALENCIA', $EQUIVALENCIA))
	return ['STATE'=>true,"MSG"=>'Equivalencia y producto registrado exitosamente'];
	else
	return ['STATE'=>false,"MSG"=>"Error al insertar"];

			
}






}