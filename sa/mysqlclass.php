<?php

class mysqlclass 
{
	public function execqry($qry)
		{
			mysql_query($qry);
			if(mysql_affected_rows()!=0)
			{
				return 1;
			}
			else
			{
				return -1;
			}
		}
		
		public function fetchsingle($qry)
		{
			$res = mysql_query($qry);
			$rows = mysql_fetch_array($res);
			return  $rows;
		}
		
		
		public function fetchall($qry)
		{
			$data = array();
			$res = mysql_query($qry);
			while($rows = mysql_fetch_array($res))
			{
				array_push($data,$rows);
			}
			return  $data;
		}
		
		
}

?>