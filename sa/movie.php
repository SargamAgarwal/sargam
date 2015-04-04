  <?php
  require_once ('connection.php');
  require_once ('mysqlclass.php');
  $dbobject = new mysqlclass();
  require_once('header.php');?>

<style>
	.details div b
	{
		display:block;
		float:left;
		min-width:120px;
		text-transform:capitalize;
	}
</style>
<div class="header">
  <h1 >
    <a href='index.php' style="color:#333">Quaerere</a><br/>
    <small>Movie Searching System<br/>
    <a href="search.php">See it now</a>
    </small>
  </h1>
</div>
<div style="max-width:800px;margin:auto;">
	<?php
		if(isset($_REQUEST["id"]) && $_REQUEST["id"]!='')
		{
				$id = $_REQUEST["id"];
				$selectqry = "Select * from  movies where id = $id";
				$obj = $dbobject->fetchsingle($selectqry);
				if(!empty($obj))
				{
				
					?>
                    	<div class="details">
                        	<h2 class="text-center"><?=$obj["title"]?></h2>
                        	<div class="row">
                            	<div class="col-md-6">
                                	<img src='<?=$obj["poster"]?>'  class="img-thumbnail" />
                                </div>
                                <div class="col-md-6">
                                	<p>
										<?=$obj["plot"]?>
                                    </p>

                                <div>
                                <div style="border-bottom:dotted 1px #ccc;padding:4px 0px">
                                	<span class="text-danger">Cast : </span><?=$obj["actors"]?>
<br/>                                	<span class="text-danger">Awards : </span><?=$obj["awards"]?>
									<br/>
                                    <span class="text-danger">Director : </span><?=$obj["director"]?>
                                    <br/>
                                    <span class="text-danger">Writer : </span><?=$obj["writer"]?>
                                    <br/>
                                    <span class="text-danger">Genre : </span><?=$obj["genre"]?>
                                    <br/>
                                    <span class="text-danger">Type : </span><?=$obj["type"]?>
                                    <br/>
                                    <span class="text-danger">Language : </span><?=$obj["language"]?>
                                    <br/>
                                    <span class="text-danger">Year : </span><?=$obj["year"]?>
                                </div>
                             <div style="border-bottom:dotted 1px #ccc;padding:4px 0px">
                                	<span class="text-info">Country : </span><?=$obj["country"]?>
<br/>                                	<span class="text-info">Imdb id : </span><?=$obj["imdb_id"]?>
									<br/>
                                    <span class="text-info">Imdb rating : </span><?=$obj["imdb_rating"]?>
                                    <br/>
                                    <span class="text-info">Imdb votes : </span><?=$obj["imdb_votes"]?>
                                    <br/>
                                    <span class="text-info">Rated : </span><?=$obj["rated"]?>
                                    <br/>
                                    <span class="text-info">Metascore : </span><?=$obj["metascore"]?>
                                    <br/>
                                    <span class="text-info">Released : </span><?=$obj["released"]?>
                                    <br/>
                                    <span class="text-info">Response : </span><?=$obj["response"]?>
                                    <br/>
                                    <span class="text-info">Runtime : </span><?=$obj["runtime"]?>
                                </div>
                                </div>
                            </div>
                            
                        </div>
                    <?php
				}
				
		}
	?>
</div>
</div>
<?php require_once('footer.php'); ?>