<?php

Class Paciente_model extends Model {
    
    public function __construct() {
       $this->db = parent::getInstance('MYSQL-LAB'); 
    }

   
function setPaciente($PACIENTE)	{
		if(!$this->db->check('*','PERSONA',"CED_PER=".$PACIENTE['CED_PER']." AND EST_PER='H'"))
		{
			if($this->db->insert('PERSONA', $PACIENTE))
				return ['STATE'=>true,"MSG"=>"Paciente ".$PACIENTE['PRINOM_PER'].' '.$PACIENTE['PRIAPE_PER'].' registrado exitosamente!'];
				else
				return ['STATE'=>false,"MSG"=>"Error al registrar paciente"];
		}
	    else
		{
			$PACIENTE['EST_PER']="'H'";
			if($this->db->update('PERSONA',$PACIENTE,false,"CED_PER=".$PACIENTE['CED_PER'] ))
			return ['STATE'=>true,"MSG"=>"Paciente ".$PACIENTE['PRINOM_PER'].' '.$PACIENTE['PRIAPE_PER'].' actualizado exitosamente!'];
				else
				return ['STATE'=>false,"MSG"=>"No existen cambios!"];
		}		
	}



public function select_all()
		{
      return $this->db->select('CED_PER,HIS_PER,PRINOM_PER,SEGNOM_PER,PRIAPE_PER
	  							,SEGAPE_PER,FECNAC_PER,DIR_PER,CEL_PER,TEL_PER,SEX_PER,ESTDIS_PER,COD_CIR','PERSONA', false, PDO::FETCH_NUM);

		}

public function selectbyCED($CED_PER)
		{
      return $this->db->select('CED_PER,HIS_PER,PRINOM_PER,SEGNOM_PER,PRIAPE_PER
	  							,SEGAPE_PER,FECNAC_PER,DIR_PER,CEL_PER,TEL_PER,SEX_PER,ESTDIS_PER,COD_CIR','PERSONA', "CED_PER='$CED_PER'", PDO::FETCH_NUM);
				
		}
	

function eliminar($COD_CIR)
		{
			
			include_once('consultas_bdd.php');
				 
		

		$sql="UPDATE circuito SET EST_CIR=0 WHERE COD_CIR='$COD_CIR'";
		set_query($sql);
		echo "Registro Actualizado!";
					
		}
function editar($COD_CIR,$NOM_CIR,$DIR_CIR)
		{
			
		include_once('consultas_bdd.php');
		
		$sql="UPDATE circuito SET NOM_CIR='$NOM_CIR' , DIR_CIR = '$DIR_CIR' WHERE COD_CIR='$COD_CIR'";
		set_query($sql);
		echo "Registro Actualizado!";
					
		}

function REPORTE()
		{
			
			include_once('consultas_bdd.php');
				 
		

		$sql="SELECT NOM_CIR, count(COD_ORD) as porcentaje from orden, circuito where orden.COD_CIR=circuito.COD_CIR group by NOM_CIR";
			
			$result=get_query($sql);

			
		}








}