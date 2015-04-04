  <?php
  require_once ('connection.php');
  require_once ('mysqlclass.php');
  $dbobject = new mysqlclass();
  $searchtext = "";
  if(isset($_POST))
  {
	  
	  
	  if(isset($_POST["genre"]) && $_POST["genre"]!="-1")
	  {
		  $genre = str_replace("'", "\\'",$_POST["genre"]);
		  $searchtext.=" and genre =  '".$genre."' ";
	  }
	  if(isset($_POST["title"]) && $_POST["title"]!="")
	  {
		  $title = str_replace("'","\\'",$_POST["title"]);
		   $searchtext.=" and title like '%".$title."%' ";
	  }
	  if(isset($_POST["plot"]) && $_POST["plot"]!="")
	  {
		  $plot = str_replace("'","\\'",$_POST["plot"]);
		   $searchtext.=" and plot like '%".$plot."%' ";
	  }
	  if(isset($_POST["director"]) && $_POST["director"]!="")
	  {
		  $director = str_replace("'","\\'",$_POST["director"]);
		   $searchtext.=" and director like '%".$director."%' ";
	  }
  }
  require_once('header.php');
  ?>
  
 
  <div>
  	<form method="post"  >
	  <div class="searchBox">
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
								  <option <?php if($values[0]==@$_POST["genre"]) { echo 'selected="selected"';} ?>  value="<?php echo $values[0];?>"><?php echo $values[0];?></option>
								  <?php
							  }
						  ?>
					  </select>
				  </label>
                  <label>
					  Title
                      <input type="text" name="title" placeholder="title" value="<?=@$_POST["title"]?>"  />
				  </label>
                   <label>
					  Plot
                      <input type="text" placeholder="plot" name="plot" value="<?=@$_POST["plot"]?>" />
				  </label>
				  <label>
					  Director
                      <input type="text" placeholder="director" name="director" value="<?=@$_POST["director"]?>"  />
				  </label>
                  
                  <input name="search" type="submit" value="search"  />
	  </div>
      </form>
	  <div>
		  <table border="1px" cellpadding="5" width="100%">
		  <?php 
		  	
			  $tbldata = $dbobject->fetchall( "SELECT * FROM movies where 1=1 $searchtext");
			  $keys  = array_keys($tbldata[0]);
			  ?>
				  <tr>
                    <td>title</td>
                   
                    
                    <td>country</td>
                    <td>director</td>
                    <td>genre</td>
                    
                    
                    <td>plot</td>
                    
                    <td>Details</td>
                   
                    
                    
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
						  <td><?=$datasetvalues["title"]?></td>
						  
						  
						  <td><?=$datasetvalues["country"]?></td>
						  <td><?=$datasetvalues["director"]?></td>
						  <td><?=$datasetvalues["genre"]?></td>
						 <td><?=$datasetvalues["plot"]?></td>
						 <td><a href="movie.php?id=<?=$datasetvalues["id"]?>">View Details</a></td>
						  
						 
					  </tr>
				  <?php
			  }
			   
		  ?>
		  </table>
	  </div>
  </div>
  </body>
  </html>