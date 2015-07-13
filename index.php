<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sprite to css</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="row show-grid">
				<div class="col-md-12">
				<form  method="post" enctype="multipart/form-data" action="" id="upload_file">
  					
  					<div class="col-md-7" style="padding-right: 0px;padding-left: 0px;">
    					<input id="uploadFile" class="form-control" placeholder="Choose Sprite Image" disabled="disabled" />
  					</div>
					<div class="fileUpload btn btn-success" data-toggle="tooltip" data-placement="right" title="Chose a sprite image. Note: Image Type are jpg, png, jpeg, gif and file size should be 2MB Max. ">
					    <span>Upload</span>
					    <input id="uploadBtn" type="file" class="upload" name="userfile" />
					</div>
					<input type="submit" class="btn btn-danger" name="submit" id="submit" />
				</form>
				</div>
				</div>

				<div class="row show-grid">
				
				<div class="col-md-12">
					<div class="col-md-12 show-grid">
					<img src="" id="preview-image" class="img-responsive" alt="Responsive image" style="display:none;"/>
					<div class="alert alert-danger alert-dismissible" role="alert" id="alert" style="display:none;">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Error!</strong> <span id="msg"></span>.
					</div>
					
				    </div>
				    <div class="col-md-12">
				    <label class="col-md-12 control-label" for="formGroupInputSmall">After file upload. Use JCrop to get icon size,gap and starting position of the icons.  
				    </label>
				     
				    	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Use JCrop</button>
				    
					</div>
				  </div>
				</div>

				<div class="row show-grid">
				<div class="col-md-12">
				<form class="form-horizontal" id="gerenatecss" method="post" enctype="multipart/form-data" action="">
					<h4>Set Icon parameter</h4>
				<div class="form-group form-group-sm" >
				    <label class="col-sm-4 control-label" for="formGroupInputSmall">File Name</label>
				    <div class="col-sm-8">
				      <input class="form-control" type="text" name="img-name" id="img-name" placeholder="Image Name" data-toggle="tooltip" data-placement="top" title="Path to image uploaded to the server. This is set with return data after file upload.">
				    </div>
				    
				  </div>

				<div class="form-group form-group-sm">
				    <label class="col-sm-4 control-label" for="formGroupInputSmall">File Size</label>
				    <div class="col-sm-4">
				      <input class="form-control" type="number" name="img-width" id="img-width" placeholder="Width" data-toggle="tooltip" data-placement="top" title="Image actual width also set with return data after apload.">
				    </div>
				    <div class="col-sm-4">
				      <input class="form-control" type="number" name="img-height" id="img-height" placeholder="Height" data-toggle="tooltip" data-placement="top" title="Image actual height also set with return data after apload.">
				    </div>
				  </div>

				<div class="form-group form-group-sm">
				    <label class="col-sm-4 control-label" for="formGroupInputSmall">Other</label>
				    <div class="col-sm-4">
				      <input class="form-control" type="number" name="no_icon" id="no_icon" placeholder="No. of Icon" data-toggle="tooltip" data-placement="top" title="Number of icon that you want to display as preview.">
				    </div>
				    <div class="col-sm-4">
				      <input class="form-control" type="text" name="class_suffix" id="class_suffix" placeholder="Class Suffix" data-toggle="tooltip" data-placement="top" title="CSS class name of icons.">
				    </div>
				  </div>

				<div class="form-group form-group-sm">
				    <label class="col-sm-4 control-label" for="formGroupInputSmall">Icon Size</label>
				    <div class="col-sm-4">
				      <input class="form-control" type="number" name="icon-width" id="icon-width" placeholder="Width" data-toggle="tooltip" data-placement="top" title="Icon width on the sprite sheet, use JCrop to get dimension.">
				    </div>
				    <div class="col-sm-4">
				      <input class="form-control" type="number" name="icon-height" id="icon-height" placeholder="Height" data-toggle="tooltip" data-placement="top" title="IIcon height on the sprite sheet, use JCrop to get dimension.">
				    </div>
				  </div>

				  <div class="form-group form-group-sm">
				    <label class="col-sm-4 control-label" for="formGroupInputSmall">Icon Gap</label>
				    <div class="col-sm-4">
				      <input class="form-control" type="number" name="icon-hgap" id="icon-hgap" placeholder="Horizontal Gap" data-toggle="tooltip" data-placement="top" title="Horizontal gap between icons in the sprite sheet, use JCrop to get correct value.">
				    </div>
				    <div class="col-sm-4">
				      <input class="form-control" type="number" name="icon-vgap" id="icon-vgap" placeholder="Vertical Gap" data-toggle="tooltip" data-placement="top" title="Vertical gap between icons in the sprite sheet, use JCrop to get correct value.">
				    </div>
				  </div>

				  <div class="form-group form-group-sm">
				    <label class="col-sm-4 control-label" for="formGroupInputSmall">Start Co-Ord</label>
				    <div class="col-sm-4">
				      <input class="form-control" type="number" name="icon-sxp" id="icon-sxp" placeholder="Start X-pos" data-toggle="tooltip" data-placement="top" title="X-position of the first icon on the sprite sheet, use JCrop to get correct value.">
				    </div>
				    <div class="col-sm-4">
				      <input class="form-control" type="number" name="icon-syp" id="icon-syp" placeholder="Start Y-pos" data-toggle="tooltip" data-placement="top" title="Y-position of the first icon on the sprite sheet, use JCrop to get correct value.">
				    </div>
				  </div>

				  <div class="form-group form-group-sm">
				    <label class="col-sm-4 control-label" for="formGroupInputSmall">Row x Column</label>
				    <div class="col-sm-4">
				      <input class="form-control" type="number" name="sprite-row" id="sprite-row" placeholder="No. of Row" data-toggle="tooltip" data-placement="top" title="Number of rows in sprite sheet.">
				    </div>
				    <div class="col-sm-4">
				      <input class="form-control" type="number" name="sprite-column" id="sprite-column" placeholder="No. of Column" data-toggle="tooltip" data-placement="top" title="Number of column in sprite sheet.">
				    </div>
				  </div>

				  <div class="form-group form-group-sm">
				    <label class="col-sm-4 control-label" for="formGroupInputSmall">Zoom %</label>
				    <div class="col-sm-4">
				      <input class="form-control" type="number" name="zoom" id="zoom" placeholder="Enter %" data-toggle="tooltip" data-placement="top" title="Size of icon that you want in final output. It should be in percentage." value="100">
				    </div>
				    <div class="col-sm-4">
				      <input type="submit" class="btn btn-danger" name="submit" id="submit" value="Generate css" style="width:100%; padding:4px 0px;"/>
				    </div>
				  </div>

			</form>
		</div>
	</div>
			</div>

  			<div class="col-md-8">
  				<div class="bs-docs-section">

					  <!-- Nav tabs -->
					  <ul class="nav nav-tabs" role="tablist">
					    <li role="presentation" class="active"><a href="#demo" id="t_demo" aria-controls="demo" role="tab" data-toggle="tab">Preview</a></li>
					   
					    <li role="presentation"><a href="#edit" aria-controls="edit" id="t_edit" role="tab" data-toggle="tab">Edit Css</a></li>
					  </ul>

					  <!-- Tab panes -->
					  <div class="tab-content">
					    <div role="tabpanel" class="tab-pane active" id="demo">
					    	<div id="info"></div>
					    </div>
					  	<div role="tabpanel" class="tab-pane" id="edit">
					    	<div class="panel panel-default">
        
						        <div class="panel-body">
						            <div id="editor"></div>
						        </div>
						    </div>
						    
					  	</div>
					  </div>

				</div>
  				
  			</div>

  			
  
		</div>


	</div>


	<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <img src="" id="target" alt="[Jcrop Example]" />
      </div>
      <div class="modal-footer">

      	<div class="btn-group" id="set-background" data-toggle="buttons">
		  <label class="btn btn-primary" value="transparent" data-toggle="tooltip" data-placement="top" title="Click to set image background of JCrop.">
		    <input type="checkbox" name="back-info" id="back-info1" autocomplete="off"> Transparent
		  </label>
		</div>

        <div class="btn-group" id="cord" data-toggle="buttons">
		  <label class="btn btn-primary active" value="icon-size" data-toggle="tooltip" data-placement="top" title="Click to set icon size while using JCrop.">
		    <input type="radio" name="icon-info" id="icon-info1" autocomplete="off"  checked> Icon Size
		  </label>
		  <label class="btn btn-primary" value="icon-gap" data-toggle="tooltip" data-placement="top" title="Click to set icon gap while using JCrop.">
		    <input type="radio" name="icon-info" id="icon-info2" autocomplete="off"> Icon Gap
		  </label>
		  <label class="btn btn-primary" value="icon-start" data-toggle="tooltip" data-placement="top" title="Click to set icon starting points while using JCrop.">
		    <input type="radio" name="icon-info" id="icon-info3" autocomplete="off"> Icon Starts
		  </label>
		  <label class="btn btn-primary" value="done" data-toggle="tooltip" data-placement="top" title="Click to stop any uptade while using JCrop.">
		    <input type="radio" name="icon-info" id="icon-info4" autocomplete="off"> Stop Update
		  </label>
		  
		</div>
      </div>
    </div>
  </div>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
	<!-- <script src="js/jquery.min.js"></script> -->
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
   
    <script src="src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/jquery.Jcrop.js"></script>
    <script src="js/script.js"></script>
    
  </body>
</html>