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
			return ['STATE'=>true,"COD" =>$COD[0][0],"MSG"=>"Orden ".$SECUENC.' registrada exitosamente!'];
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
								  (SELECT CED_PER PRIAPE_PER FROM PERSONA WHERE COD_PER = O.COD_PER) CEDULA",'ORDEN O', "ID_ORD = '$COD' AND EST_ORD = '$EST_ORD'", PDO::FETCH_NUM);

		}

		public function selectDETbyCOD($COD)
		{
		 return $this->db->select("DET_ORD,ID_ORD,COD_PRO,
								  (SELECT NOM_PRO FROM PRODUCTO WHERE COD_PRO = O.COD_PRO) EXAMEN" ,'DETALLE_ORDEN O', "ID_ORD = '$COD' ", PDO::FETCH_NUM);

		}
		public function updateDet($DETALLE,$DET_ORD){
		if($this->db->update('DETALLE_ORDEN',$DETALLE,false,"DET_ORD=".$DET_ORD ))
		return ['STATE'=>true,"MSG"=>""];
		else
		return ['STATE'=>true,"MSG"=>"Error al insertar muestras"];
		}


}