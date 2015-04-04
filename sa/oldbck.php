  <?php
  require_once ('connection.php');
  require_once ('mysqlclass.php');
  $dbobject = new mysqlclass();
  ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Untitled Document</title>
  </head>
  
  <body>
  <div>
	  <div>
				  <?php 
					  $query = "SELECT DISTINCT(genre) FROM movies";
					  $datagenre = $dbobject->fetchall($query);
				  ?>
				  <label> Search by genre 
					  <select name="genre" id="genre"> 
						  <option value="-1">Please Select</option>
						  <?php
							  foreach($datagenre as $key=>$values)
							  {
								  ?>
								  <option value="<?php echo $values[0];?>"><?php echo $values[0];?></option>
								  <?php
							  }
						  ?>
					  </select>
				  </label>
				  <label>
					  Director
				  </label>
	  </div>
	  <div>
		  <table border="1px" cellpadding="5" width="100%">
		  <?php 
			  $tbldata = $dbobject->fetchall( "SELECT * FROM movies where 1=1");
			  $keys  = array_keys($tbldata[0]);
			  ?>
				  <tr>
                    
                    <td>actors</td>
                    <td>awards</td>
                    <td>country</td>
                    <td>director</td>
                    <td>genre</td>
                    
                    
                    <td>plot</td>
                    
                    <td>title</td>
                   
                    <td>writer</td>
                    <td>year</td>
                  </tr>
			  <?php
			  /*echo "<tr>";
			  for($i=1;$i<count($keys);)
			  {
				  
				  echo "<td>$keys[$i]</td>";
				  $i+=2;
			  }
			  echo "</tr>";*/
			  foreach($tbldata  as $key=>$datasetvalues)
			  {
				  ?>
					  <tr>
						  <td><?=$datasetvalues["id"]?></td>
						  <td><?=$datasetvalues["actors"]?></td>
						  <td><?=$datasetvalues["awards"]?></td>
						  <td><?=$datasetvalues["country"]?></td>
						  <td><?=$datasetvalues["director"]?></td>
						  <td><?=$datasetvalues["genre"]?></td>
						  <td><?=$datasetvalues["imdb_id"]?></td>
						  <td><?=$datasetvalues["imdb_rating"]?></td>
						  <td><?=$datasetvalues["imdb_votes"]?></td>
						  <td><?=$datasetvalues["language"]?></td>
						  <td><?=$datasetvalues["metascore"]?></td>
						  <td><?=$datasetvalues["plot"]?></td>
						  <td><?=$datasetvalues["poster"]?></td>
						  <td><?=$datasetvalues["rated"]?></td>
						  <td><?=$datasetvalues["released"]?></td>
						  <td><?=$datasetvalues["response"]?></td>
						  <td><?=$datasetvalues["runtime"]?></td>
						  <td><?=$datasetvalues["title"]?></td>
						  <td><?=$datasetvalues["type"]?></td>
						  <td><?=$datasetvalues["writer"]?></td>
						  <td><?=$datasetvalues["year"]?></td>
					  </tr>
				  <?php
			  }
			   
		  ?>
		  </table>
	  </div>
  </div>
  </body>
  </html>