
<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "test";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);


  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>image manager</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
</head>
<body>
  
  <div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>Product image manager</h1>
      <div class="product-image-manager">
          
        
        <?php
        $path= "./image/";
        $sql = "SELECT multi_image from imagetest where id='1'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $listimage = unserialize($row['multi_image']);
        foreach($listimage as $value => $key){
            ?>
            <div class="image-container">
          <div class="inner-image-container">
            <div class="on-image-controls">
              <div class="delete-confirm">Confirm deleting!</div>
              <span class="fa fa-arrows"></span>
              <span class="fa fa-check" data-toggle="tooltip" data-placement="top" title="Pick as primary"></span>
              <span class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="Image info"></span>
              <span class="fa fa-times" data-toggle="tooltip" data-placement="top" title="Delete image"></span>
            </div>
            <div class="center-container">
              <img src="<?php echo $path.$key; ?>">
            </div>
          </div>
        </div>

<?php
        }
        ?>
        
      </div>
      <form action="upload.php" enctype="multipart/form-data" class="dropzone" id="image-upload">
      
      </form>
      <button id="uploadFile">Upload Files</button>

    </div>
  </div>
</div>
<div class="modal fade" id="file-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Details for image</h4>
      </div>
      <div class="modal-body">
        <div id="image-preview-modal"></div>
        <div class="row image-data-row">
          <div class="col-sm-4 static-data">
            <ul class="file-info-list">
              <li><strong>File name:</strong> <span id="filename"></span></li>
              <li><strong>File type:</strong> <span id="file-extension"></span></li>
              <li><strong>File size:</strong> <span id="filesize"></span></li>
              <li><strong>Dimensions:</strong> <span id="file-dimensions"></span></li>
            </ul>
            <ul class="file-info-list">
              <li><strong>Uploaded by:</strong> <span id="uploader">nan</span></li>
              <li><strong>Upload date:</strong> <span id="upload-date">nan</span></li>
              <li><strong>Uploaded to:</strong> <span id="upload-folder">Images12</span></li>
            </ul>
          </div>
          <div class="col-sm-8 dynamic-data">
            <form class="form-horizontal">
              <div class="form-group">
                <label for="url" class="col-sm-2 control-label">URL</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="url" disabled>
                </div>
              </div>
              <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Titel</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="title" placeholder="Titel">
                </div>
              </div>
              <div class="form-group">
                <label for="alt" class="col-sm-2 control-label">Alt Texy</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="alt" placeholder="Alt Text">
                </div>
              </div>
            </form>
            <div class="text-right">
              <a href="" target="blank" id="full-image-link">Preview on new tab</a> | <a href="#" class="text-danger" id="delete-image">Delete image permantly</a>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save Changes</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/2d4e9228e5.js"></script>
<script src="function.js"></script>
<script type="text/javascript">
  
    Dropzone.autoDiscover = false;
  
    var myDropzone = new Dropzone(".dropzone", { 
       autoProcessQueue: false,
       maxFilesize: 3,
       acceptedFiles: ".jpeg,.jpg,.png,.gif",
       uploadMultiple:true,
    });
  
    $('#uploadFile').click(function(){
       myDropzone.processQueue();
    });
      
</script>
</body>
</html>