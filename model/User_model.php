<?php

Class User_model extends Model {
    
    public function __construct() {
       $this->db = parent::getInstance('MYSQL-LAB'); 
    }

   
public function setUser($USUARIO)	{
	if($this->db->check('*','USUARIO','CED_USU = '.$USUARIO['CED_USU']))
	{
		if($this->db->update('USUARIO',$USUARIO,false,'CED_USU = '.$USUARIO['CED_USU']))
				return ['STATE'=>true,"MSG"=>"Usuario cédula ".$USUARIO['CED_USU'].' actualizado exitosamente!'];
				else
				return ['STATE'=>false,"MSG"=>"No existen Cambios"];
	
	}else if($this->db->insert('USUARIO', $USUARIO))
				return ['STATE'=>true,"MSG"=>"Usuario cédula ".$USUARIO['CED_USU'].' registrado exitosamente!'];
				else
				return ['STATE'=>false,"MSG"=>"Error al registrar ".$USUARIO['CED_USU']."!."];
	
	
		
	}

public function get_productoHist($COD_PRO){
	  return $this->db->select('distinct COD_PROD,EST_KARPRO,FECORD_KARPRO,FECCAD_KARPRO,
	  SAL_KARPRO,CAN_KARPRO,DES_KARPRO,FECCRE_KARPRO','KARDEX_PRODUCTO',
	   "COD_PROD = '$COD_PRO' ORDER BY FECCRE_KARPRO DESC", PDO::FETCH_NUM);

}

public function getUser($CEDULA){
  return $this->db->select('COD_USU, CED_USU, PRINOM_USU, SEGNOM_USU, PRIAPE_USU,
   SEGAPE_USU, TIP_USU, ESTA_USU, FECCRE_USU',
	  'USUARIO',
	   "CED_USU = '$CEDULA'", PDO::FETCH_NUM);


}

}