<?php
class WPS_PLUGIN_FUNCTIONS
{	

	public function getTableName($table_name)
	{
		global $wpdb;
		return $wpdb->prefix . $table_name;
	}

	public function getAll($table_name,$aCon = '',$aOrder = '',$aLimit = '')
	{
		global $wpdb;
		$aSql = "SELECT * FROM $table_name where 1 {$aCon} {$aLimit} {$aOrder}";
		$aVals = $wpdb->get_results($aSql,ARRAY_A );		
		return $aVals;		
	}

	public function getAllData($table_name,$aCon )
	{
		global $wpdb;
		$aSql = "SELECT * FROM $table_name where  {$aCon} {$aLimit} {$aOrder}";
		$aVals = $wpdb->get_results($aSql,ARRAY_A );		
		return $aVals;		
	}
  




	

	public function getById($table_name,$field,$id)

	{	

		global $wpdb;

		return  $wpdb->get_row("SELECT * FROM $table_name where {$field} = '$id'",ARRAY_A );

	}

	

	public function getByCondition($table_name,$aCon = '',$aOrder = '',$aLimit = '')

	{	

		global $wpdb;

		 $aSql = "SELECT * FROM $table_name where 1 {$aCon} {$aLimit} {$aOrder}";

		return $wpdb->get_results($aSql,ARRAY_A );

	}



	public function getresultCondition($table_name,$asum,$aCon  )

	{	

		global $wpdb;
		   $aSql = "SELECT {$asum} FROM $table_name where {$aCon}";
		return $wpdb->get_results($aSql,ARRAY_A );

	}


	public function getByConditionleftjoin($getfields, $table_name1,$table_name2,$fieldd, $fieldID, $fieldIDs, $fieldVal )

	  {	
		global $wpdb;
		 $aSql = "SELECT DISTINCT {$getfields} FROM {$table_name1} LEFT JOIN {$table_name2} ON {$table_name1}.{$fieldd} = {$table_name2}.{$fieldID} WHERE  {$table_name1}.{$fieldIDs}={$fieldVal}";
		return $wpdb->get_results($aSql,ARRAY_A );

	}


	public function GetAllDataJoin($getfields, $table_name1,$table_name2,$table_name3,$fieldrelationt1,$fieldrelationt3, $fieldrelationt4, $fieldrelationt2, $aCon )

	  {	

		global $wpdb;
		$aSql = "SELECT DISTINCT {$getfields} FROM {$table_name1}  LEFT JOIN {$table_name2} As descti ON {$table_name1}.{$fieldrelationt2} = descti.{$fieldrelationt3} LEFT JOIN {$table_name2} As sor ON {$table_name1}.{$fieldrelationt1} = sor.{$fieldrelationt3}  LEFT JOIN {$table_name3} ON {$table_name1}.{$fieldrelationt4}  = {$table_name3}.{$fieldrelationt3}   WHERE  $aCon";




		return $wpdb->get_results($aSql,ARRAY_A );

	}
 
	

	public function getByCustomQuery($aSql)

	{

		global $wpdb;

		return $wpdb->get_results($aSql,ARRAY_A );

	}

	

	public function delete($table_name,$field,$id)

	{

		global $wpdb;

		$wpdb->query("delete from $table_name where {$field} = {$id}");

		return true;

	}	

	

	public function add($table_name,$aCon,$where = '',$bEdit=false)

	{

		global $wpdb;

	

		if(!$aCon)

		return false;		

		

						

		if($bEdit)

		{

			 $sql = "UPDATE {$table_name} set {$aCon}  where {$where}";

		}

		

		else

		{

			 $sql = "INSERT into {$table_name} set {$aCon}";	

		}

		



		$wpdb->query($sql);

		

		return true;

	}

	

	

	public function getErrors()

	{

		$aErrors = get_settings_errors();



		if($aErrors)

		{

			foreach($aErrors as $aError)

			{

				echo '<div class="'.$aError['type'].'"><p>'.$aError['message'].'</p></div>';

			}

		}

	}

	

	

	public function setMsgs($type,$msg)

	{

		if($type == "error")

		{

			$_SESSION['wps_error'] = $msg;

		}

		else

		{

			$_SESSION['wps_success'] = $msg;

		}

	}

	

	

	

}


?>