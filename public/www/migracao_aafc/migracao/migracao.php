<?php
    include '../config/params.php';
    include '../config/conexaobd.php';


    $COUNT_ID 		= '0';

    for($i = 1; $i <= 279 ; $i++ )
		{
			$qry = "SELECT
					*
					FROM
					tbl_cities
					WHERE
					id = ".$i;
			$Registros = $cfg_exec_qry ($qry, $conexaoDB);
				if($cfg_qte_reg($Registros)!=Null)
					{
						while($rs = $cfg_fields ($Registros))
							{
								$NAME			= $rs['name'];
								$STATE 			= $rs['state'];
								$REGION_ID		= $rs['region_id'];

								if (($STATE == "ND") || ($STATE == "RS"))
									{
										$STATE_ID = "1";
									}

								if ($STATE == "PR")
									{
										$STATE_ID = "2";
									}

								if ($STATE == "RJ")
									{
										$STATE_ID = "3";
									}

								if ($STATE == "SC")
									{
										$STATE_ID = "4";
									}

								if ($STATE == "SP")
									{
										$STATE_ID = "5";
									}

								echo "STATE: ".$STATE."<br>";
								echo "STATE_ID: ".$STATE_ID."<br>";

						
								$qry1 = "INSERT INTO
									cities
									(region_id,
									state_id,
									description,
									created_at)
									VALUES
									('$REGION_ID',
									'$STATE_ID',
									'$NAME',
									'2013-01-01 00:00:00')";
								echo "qry1: ".$qry1."<br>";
								$Registros1 = $cfg_exec_qry ($qry1, $conexaoDB);
							}
					}
				else
					{	
						$NAME			= "(DISPONIVEL)";
						$STATE_ID		= 1;
						$REGION_ID		= 1;

						$qry1 = "INSERT INTO
							cities
							(region_id,
							state_id,
							description,
							created_at,
							deleted_at)
							VALUES
							('$REGION_ID',
							'$STATE_ID',
							'$NAME',
							'2013-01-01 00:00:00',
							'$cfg_Now_Y_m_d_H_i_s')";
						echo "qry1: ".$qry1."<br>";
						$Registros1 = $cfg_exec_qry ($qry1, $conexaoDB);

					}							
		}


    for($i = 1; $i <= 8768 ; $i++ )
		{
			echo " ".$i."<br>";

			$qry = "SELECT
				*
				FROM
				tbl_members
				WHERE
				(id = ".$i.")
				ORDER BY
				id";
			echo $qry;
			$Registros = $cfg_exec_qry ($qry, $conexaoDB);
				while($rs = $cfg_fields ($Registros))
					{
						if ($rs['visible']==1)
							{
								$MEMBER_STATUS_ID 	= $rs['member_situation_id'];
								echo "MEMBER_STATUS_ID: ".$MEMBER_STATUS_ID."<br>";
								if ($MEMBER_STATUS_ID == 1) //INATIVO
									{
										$MEMBER_STATUS_ID = 1;
										$MEMBER_STATUS_REASON_ID = 1;	
									}

								if ($MEMBER_STATUS_ID == 2) //ATIVO
									{
										$MEMBER_STATUS_ID = 2;
										$MEMBER_STATUS_REASON_ID = 1;	
									}

								if ($MEMBER_STATUS_ID == 3) //FALECIMENTO
									{
										$MEMBER_STATUS_ID = 1;
										$MEMBER_STATUS_REASON_ID = 2;	
									}

								if ($MEMBER_STATUS_ID == 4) //DESL A PEDIDO
									{
										$MEMBER_STATUS_ID = 1;
										$MEMBER_STATUS_REASON_ID = 3;	
									}

								$GENDER_ID 			= $rs['member_gender_id'];
								$CITY_ID 			= $rs['city_id'];
								$PLAN_ID 			= $rs['plan_id'];
								$CODE 	 			= $rs['code'];
								$CPF 	 			= $rs['cpf'];

								$CPF 				= str_replace(".", "", $CPF);
								$CPF 				= str_replace("-", "", $CPF);

								echo "CPF: ".$CPF."<br>";

								$NAME				= $rs['name'];
								$ADDRESS 			= $rs['address'];
								$ZIP_CODE			= $rs['zip_code'];
								$ZIP_CODE 			= str_replace(".", "", $ZIP_CODE);
								$ZIP_CODE 			= str_replace("-", "", $ZIP_CODE);
								$NEIGHBORHOOD		= $rs['neighborhood'];
								$PHONE 				= $rs['phone'];
								$MOBILE 			= $rs['mobile'];
								$EMAIL  			= $rs['email'];
								$DATE_AAFC_INI 		= $rs['date_aafc_ini'];
								if ($DATE_AAFC_INI == '0000-00-00')
									{	
										$DATE_AAFC_INI = NULL;
									}
								$DATE_AAFC_FIM 		= $rs['date_aafc_fim'];
								
								if ($DATE_AAFC_FIM == '0000-00-00')
									{	
										$DATE_AAFC_FIM = NULL;
								}

								$DATE_INSS 			= $rs['date_inss'];
								if ($DATE_INSS == '0000-00-00')
									{	
										$DATE_INSS = NULL;
									}

								$DATE_FUNDACAO 		= $rs['date_fundacao'];
								if ($DATE_FUNDACAO == '0000-00-00')
									{	
										$DATE_FUNDACAO = NULL;
									}

								$BANK_ID			= $rs['bank_id'];
								$BANK_AGENCY  		= $rs['bank_agency'];
								$BANK_ACCOUNT 		= $rs['bank_account'];
								$BIRTHDAY 	 		= $rs['birthday'];
								if ($BIRTHDAY == '0000-00-00')
									{	
										$BIRTHDAY = NULL;
									}

								$qry1 = "INSERT INTO
									members
									(code,
									cpf,
									name,
									address,
									zip_code,
									neighborhood,
									phone,
									mobile,
									email,
									city_id,
									member_status_id,
									member_status_reason_id,
									plan_id,
									gender_id,
									date_aafc_ini,
									date_aafc_fim,
									date_inss,
									date_fundacao,
									birthday,
									bank_id,
									bank_agency,
									bank_account,
									created_at)
									VALUES
									('$CODE',
									'$CPF',
									'$NAME',
									'$ADDRESS',
									'$ZIP_CODE',
									'$NEIGHBORHOOD',
									'$PHONE',
									'$MOBILE',
									'$EMAIL',
									'$CITY_ID',
									'$MEMBER_STATUS_ID',
									'$MEMBER_STATUS_REASON_ID',
									'$PLAN_ID',
									'$GENDER_ID',
									'$DATE_AAFC_INI',
									'$DATE_AAFC_FIM',
									'$DATE_INSS',
									'$DATE_FUNDACAO',
									'$BIRTHDAY',
									'$BANK_ID',
									'$BANK_AGENCY',
									'$BANK_ACCOUNT',
									'2013-01-01 00:00:00')";
								echo "qry1: ".$qry1."<br>";
								$Registros1 = $cfg_exec_qry ($qry1, $conexaoDB);
							}
						else
							{	
								$qry1 = "INSERT INTO
									members
									(code,
									cpf,
									name,
									address,
									zip_code,
									neighborhood,
									phone,
									mobile,
									email,
									city_id,
									member_status_id,
									member_status_reason_id,
									plan_id,
									gender_id,
									date_aafc_ini,
									date_aafc_fim,
									date_inss,
									date_fundacao,
									birthday,
									bank_id,
									bank_agency,
									bank_account,
									created_at,
									updated_at,
									deleted_at)
									VALUES
									('0',
									'',
									'(EXCLUIDO)',
									'',
									'',
									'',
									'',
									'',
									'',
									'1',
									'1',
									'1',
									'1',
									'1',
									'NULL',
									'NULL',
									'NULL',
									'NULL',
									'NULL',
									'1',
									'',
									'',
									'2013-01-01 00:00:00',
									'2013-01-01 00:00:00',
									'2013-01-01 00:00:00')";
								echo "qry1: ".$qry1."<br>";
								$Registros1 = $cfg_exec_qry ($qry1, $conexaoDB);

							}
					}

				#echo "COUNT_ID: ".$COUNT_ID."<br>";
		}	

	for($i = 1; $i <= 228 ; $i++ )
		{
			echo " ".$i."<br>";

			$qry = "SELECT
				*
				FROM
				tbl_partners
				WHERE
				(id = ".$i.")
				ORDER BY
				id";
			echo $qry;
			$Registros = $cfg_exec_qry ($qry, $conexaoDB);
				while($rs = $cfg_fields ($Registros))
					{
						if ($rs['visible']==1)
							{
								$PARTNER_TYPE_ID	= $rs['partner_type_id'];
								$CITY_ID			= $rs['city_id'];
								$NAME				= $rs['name'];
								$ADDRESS 			= $rs['address'];
								$ZIP_CODE			= $rs['zip_code'];
								$ZIP_CODE 			= str_replace(".", "", $ZIP_CODE);
								$ZIP_CODE 			= str_replace("-", "", $ZIP_CODE);
								$NEIGHBORHOOD		= $rs['neighborhood'];
								$PHONE 				= $rs['phone'];
								$EMAIL  			= $rs['email'];
								
								$qry1 = "INSERT INTO
									partners
									(partner_type_id,
									name,
									address,
									zip_code,
									neighborhood,
									phone,
									email,
									city_id,
									created_at)
									VALUES
									('$PARTNER_TYPE_ID',
									'$NAME',
									'$ADDRESS',
									'$ZIP_CODE',
									'$NEIGHBORHOOD',
									'$PHONE',
									'$EMAIL',
									'$CITY_ID',
									'2013-01-01 00:00:00')";
								echo "qry1: ".$qry1."<br>";
								$Registros1 = $cfg_exec_qry ($qry1, $conexaoDB);
							}
						else
							{	
								$qry1 = "INSERT INTO
									partners
									(partner_type_id,
									name,
									address,
									zip_code,
									neighborhood,
									phone,
									email,
									city_id,
									created_at,
									updated_at,
									deleted_at)
									VALUES
									('1',
									'(EXCLUIDO)',
									'',
									'',
									'',
									'',
									'',
									'1',
									'2013-01-01 00:00:00',
									'2013-01-01 00:00:00',
									'2013-01-01 00:00:00')";
								echo "qry1: ".$qry1."<br>";
								$Registros1 = $cfg_exec_qry ($qry1, $conexaoDB);

							}
					}

				#echo "COUNT_ID: ".$COUNT_ID."<br>";
		}	
?>
