<?php

Class Inventario_model extends Model {
    
    public function __construct() {
       $this->db = parent::getInstance('MYSQL-LAB'); 
    }

   
public function setKardex($KARDEX)	{
		if($this->db->insert('KARDEX_PRODUCTO', $KARDEX))
				return ['STATE'=>true,"MSG"=>"Kardex ".$KARDEX['DES_KARPRO'].' registrado exitosamente!'];
				else
				return ['STATE'=>false,"MSG"=>"Error al registrar ".$KARDEX['DES_KARPRO']."!."];
	
	}

public function get_productoHist($COD_PRO){
	  return $this->db->select('distinct COD_PROD,EST_KARPRO,FECORD_KARPRO,FECCAD_KARPRO,
	  SAL_KARPRO,CAN_KARPRO,DES_KARPRO,FECCRE_KARPRO','KARDEX_PRODUCTO',
	   "COD_PROD = '$COD_PRO' ORDER BY FECCRE_KARPRO DESC", PDO::FETCH_NUM);

}

}