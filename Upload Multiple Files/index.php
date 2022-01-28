<?php
define('DS', DIRECTORY_SEPARATOR);
$errors=[];
    if(isset($_POST['submit'])){
        $count=count($_FILES['uploads']['name']);
        if(empty($_FILES['uploads']['name'][0])){
            $errors['uploads']='<div class="alert alert-danger">Please select at least one file</div>';
        }
        else{
            for($i=0,$ii=$count;$i < $ii;$i++){
                $file_name=$_FILES['uploads']['name'][$i];
                $file_size=$_FILES['uploads']['size'][$i];
                $file_tmp=$_FILES['uploads']['tmp_name'][$i];
                $file_ext=strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
                $file_name_new=time().''.rand(10000,99999).'.'.$file_ext;
                $file_destination='uploads/'.$file_name_new;
                if(!in_array($file_ext,['jpg','jpeg','png','gif','pdf','mp4'])){
                    $errors['uploads']='<div class="alert alert-danger">Please upload only jpg,jpeg,png,gif,pdf,mp4 files</div>';
                }
                if($file_size > 2097152){
                    $errors['uploads']="<div class='alert alert-danger'>File size must be less than 2MB</div>";
                }
                if(empty($errors)){
                  if(!is_dir('uploads')){
                    mkdir('uploads');
                  }
                  if($file_ext=='jpg' || $file_ext=='jpeg' || $file_ext=='png' || $file_ext=='gif'){
                    if(!is_dir('uploads'.DS.'images')){
                        mkdir('uploads'.DS.'images');
                    }
                    $file_destination='uploads'.DS.'images'.DS.$file_name_new;
                    move_uploaded_file($file_tmp,$file_destination);
                }
                elseif($file_ext=='pdf'){
                    if(!is_dir('uploads'.DS.'pdf')){
                        mkdir('uploads'.DS.'pdf');
                    }
                    $file_destination='uploads'.DS.'pdf'.DS.$file_name_new;
                    move_uploaded_file($file_tmp,$file_destination);
                }
                elseif($file_ext=='mp4'){
                    if(!is_dir('uploads'.DS.'videos')){
                        mkdir('uploads'.DS.'videos');
                    }
                    $file_destination='uploads'.DS.'videos'.DS.$file_name_new;
                    move_uploaded_file($file_tmp,$file_destination);
                }
                  }

                    
            }
        }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Upload Multiple Files</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
          <div class="row">
              <div class="col-md-4 offset-4 mt-5">
                <?php foreach($errors as $error):?>
                    <?php echo $error;?>
                <?php endforeach;?>
                  <h3>Upload multiple files</h3>
      <form method="POST" enctype="multipart/form-data">
        <input type="file" name="uploads[]" multiple>
        <input class="form-control btn btn-primary" name="submit" type="submit" value="Upload">
      </form>
              </div>
      </div>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>