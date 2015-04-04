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
  <div class="header">
  <h1 >
    <a href='index.php' style="color:#333">Quaerere</a><br/>
    <small>Movie Searching System<br/>
    <a href="search.php">See it now</a>
    </small>
  </h1>
  <form method="post"  >
	  <div class="searchBox" align="center">
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
                  
                  <input name="search" type="submit" class="btn" value="search"  />
	  </div>
      </form>
</div>
 
 


  <div style="max-width:850px; margin:auto;">
  	
	  
		  
		  <?php 
		  	
			  $tbldata = $dbobject->fetchall( "SELECT * FROM movies where 1=1 $searchtext");
			 
			  ?>
				<div class="row">
                  
			  <?php
			  $rowcount = 1 ;
			  foreach($tbldata  as $key=>$datasetvalues)
			  {
				  ?>
                  <div class="col-md-4">
                  		<h3><?=$datasetvalues["title"]?></h3>
                        <img style="height:320px" class="img-thumbnail" src='<?=$datasetvalues["poster"]?>'  />
                        <div><b>Director : </b>  <?=$datasetvalues["director"]?></div>
                        <div><b>Genre : </b> <?=$datasetvalues["genre"]?></div>
                        <div><b>Plot : </b> <?=$datasetvalues["plot"]?></div>
                        <a href="movie.php?id=<?=$datasetvalues["id"]?>">View Details</a>
                  </div>
                  
				  <?php
				  
				  if($rowcount%3==0)
				  {
					  ?>
                      	<div class="row">
                        </div>
                      <?php
				  }$rowcount++;
			  }
			   
		  ?>
		 </div>
	  </div>
  </div>
<?php require_once('footer.php'); ?>