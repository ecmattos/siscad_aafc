<?php
	

//********************************************************
//Atributos da SQL com banco de dados
//********************************************************
	$cfg_exec_qry 			= 'mysql_query';
	$cfg_qte_reg 			= 'mysql_num_rows';
	$cfg_fields 			= 'mysql_fetch_array';
	$cfg_fields_assoc		= 'mysql_fetch_assoc';
	$cfg_reg_id 			= 'mysql_fetch_row';
	$cfg_clean_qry 			= 'mysql_free_result';
	$cfg_results 			= 'mysql_result';
	$cfg_nr_reg 			= 'mysql_data_seek';
//********************************************************

//********************************************************
//Atributos de Formata??o
//********************************************************
  $cfg_Now_Y_m_d_H_i_s 		= date("Y-m-d H:i:s");
  echo "cfg_Now_Y_m_d_H_i_s: ".$cfg_Now_Y_m_d_H_i_s;
 
?>