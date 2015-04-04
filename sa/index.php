  <?php
  require_once ('connection.php');
  require_once ('mysqlclass.php');
  $dbobject = new mysqlclass();
 
  
  require_once('header.php');
  ?>
<div class="header">
  <h1 >
    <a href='index.php' style="color:#333">Quaerere</a><br/>
    <small>Movie Searching System<br/>
    <a href="search.php">See it now</a>
    </small>
  </h1>
</div>
 <div class="intro" style="max-width:800px;margin:auto;padding:0px 15px">
 	<h2 class="text-center">Who are we? </h2><br/>
 	<p style="padding:12px 0px"> 
    Allows users to search for films using flexible criteria. Film listings include general information, cast and crew, synopses, reviews. Allows users to rate films. 
</p><br/>
 </div>
 <div class="RandomPicks text-center">
 	<h2>Random Selection for you</h2><div class="clearfix" style="max-width:800px;margin:auto">
 <div class="row">
 	<?php
    	$randomdata = $dbobject->fetchall(" SELECT * FROM movies  ORDER BY RAND()  LIMIT 3");
		foreach($randomdata as $randdata)
		{
			?>
            <div class="col-md-4 text-center">
            	<div style="padding:4px;border:solid 1px #ccc;margin:12px;background:#fff">
            	<h5 style="color:#C36"><?=$randdata["title"]?></h5>
                <div align="center">
                	<img style="height:320px" class="img-thumbnail" src="<?=$randdata['poster']?>" />
                </div>
                <div>
                	<a href="">view</a>
                </div>
                </div>
    		</div>
            <?php
		}
	?>
	
   
</div>
 </div>
 </div>
<div class="intro text-center" style="max-width:800px;margin:auto;padding:0px 15px">
  <h1>Key Features</h1>
  <br/>
  
    <div style="color:#999">-- Search by genre --</div>
    <div style="color:#bbb">-- Search with keywords --</div>
    <div style="color:#999">-- View all details at one place --</div>
  
  <br/>
</div>
<?php require_once('footer.php'); ?>