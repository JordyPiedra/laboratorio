<?php

Class Orden_model extends Model {
    
    public function __construct() {
       $this->db = parent::getInstance('MYSQL-LAB'); 
    }

   
function setCabeceraOrden($ORDEN)	{
		
 $secuencia= $this->db->select('COUNT(*)','ORDEN', false, PDO::FETCH_NUM);
 $SECUENC=($secuencia[0][0]+1);
 $ORDEN["COD_ORD"] = "'".$SECUENC."'";
	if($this->db->insert('ORDEN', $ORDEN))
			{
			$COD=$this->db->select('ID_ORD','ORDEN', "COD_ORD='$SECUENC'", PDO::FETCH_NUM);	
			return ['STATE'=>true,"COD" =>$SECUENC,"MSG"=>"Orden ".$SECUENC.' registrada exitosamente!'];
			}	else
			{
				return ['STATE'=>false,"MSG"=>"Error al registrar orden"];
			}
				
	
	}

function setDetalleOrden($DETALLE,$COD)	{
foreach ($DETALLE as $key => $value) {

	$this->db->insert('DETALLE_ORDEN', ["ID_ORD" =>$COD,'COD_PRO'=>$value]);
}
}
function setInsumoOrden($INSUMO,$VALUE,$COD)	{
	$this->db->insert('DETALLE_ORDEN', ["ID_ORD" =>$COD,'COD_PRO'=>$INSUMO,'CAN_PRO'=>$VALUE]);
	
	}


public function select_all($EST_ORD="%")
		{
      return $this->db->select("ID_ORD,COD_ORD,COD_CIR,COD_PER,EST_ORD
	  							,OBS_ORD,FECMUE_ORD,FECCRE_ORD,FECRES_ORD,COD_USUCRE,COD_USURES,
								  (SELECT CONCAT(PRINOM_PER, ' ', PRIAPE_PER) FROM PERSONA WHERE COD_PER = O.COD_PER) PACIENTE,
								  (SELECT CED_PER PRIAPE_PER FROM PERSONA WHERE COD_PER = O.COD_PER) CEDULA",'ORDEN O', "EST_ORD = '$EST_ORD'", PDO::FETCH_NUM);

		}

public function selectbyCOD($COD,$EST_ORD="P")
		{
		 return $this->db->select("ID_ORD,COD_ORD,COD_CIR,COD_PER,EST_ORD
	  							,OBS_ORD,FECMUE_ORD,FECCRE_ORD,FECRES_ORD,COD_USUCRE,COD_USURES,
								  (SELECT CONCAT(PRINOM_PER, ' ', PRIAPE_PER) FROM PERSONA WHERE COD_PER = O.COD_PER) PACIENTE,
								  (SELECT CED_PER PRIAPE_PER FROM PERSONA WHERE COD_PER = O.COD_PER) CEDULA ,RES_ORD",'ORDEN O', "ID_ORD = '$COD' AND EST_ORD = '$EST_ORD'", PDO::FETCH_NUM);

		}

		public function selectDETbyCOD($COD)
		{
		 return $this->db->select("DET_ORD,ID_ORD,COD_PRO,
								  (SELECT NOM_PRO FROM PRODUCTO WHERE COD_PRO = O.COD_PRO) EXAMEN, NRB_PRO,NRS_PRO,NRM_PRO,NRN_PRO,CANT_EXAMEN(COD_PRO) MAX,CAN_PRO
								  ,IFNULL((SELECT CANT_SER FROM E_X_CONTABILIZAR WHERE COD_SER=O.COD_PRO),0) XCONT" ,'DETALLE_ORDEN O', "ID_ORD = '$COD' ", PDO::FETCH_NUM);

		}
		public function updateDet($DETALLE,$DET_ORD){
		if($this->db->update('DETALLE_ORDEN',$DETALLE,false,"DET_ORD=".$DET_ORD ))
		return ['STATE'=>true,"MSG"=>""];
		else
		return ['STATE'=>true,"MSG"=>"Error al insertar muestras"];
		}
public function updateOrd($ORDEN,$ID_ORD){
		if($this->db->update('ORDEN',$ORDEN,false,"ID_ORD=".$ID_ORD ))
		return ['STATE'=>true,"MSG"=>"Respuesta insertada"];
		else
		return ['STATE'=>true,"MSG"=>"Error al insertar respuesta"];
		}

	public function setPorContabilizar($COD,$CANT){
	 $RESULT= $this->db->select("*" ,'e_x_contabilizar', "COD_SER = '$COD' ", PDO::FETCH_NUM);
	 if(count($RESULT)>0)
	 {
		 $this->db->update('e_x_contabilizar',['CANT_SER' => $CANT],false,"COD_SER=".$COD );
	 }
	 else
	 $this->db->insert('e_x_contabilizar', ["COD_SER" =>$COD,'CANT_SER'=>$CANT]);
		
	}


}