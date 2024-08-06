<?php
include("../../../root.php");
?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Langue</title>
    <link rel="shortcut icon" href="<?=base_url;?>public/images/user.png" type="image/x-icon">
    <link rel="stylesheet" href="<?=base_url;?>public/css/add.css">
  </head>
  <body>
  <div class="container">
        <div class="title">
            <p>Ajouter une Langue</p>
        </div>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="user_details">

                <div class="input_box">
                    <label for="t_name">Name</label>
                    <input type="text" name="t_name" id="t_name" placeholder="Enter name of Team" required>
					<label for="birth">Birthday</label>
                    <input type="date" name="birth" id="birth" required>
                </div>
                <div class="input_box">
                    <label for="mng">Manager</label>
                    <input type="text" name="mng" id="mng" placeholder="Manager" required>
					<label for="chc">Coach</label>
                    <input type="text" name="chc" id="chc" placeholder="Coach" required>
                </div>
				<div class="input_box">
				    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter email" required>
					<label for="phone">Number</label>
                    <input type="text" name="phone" id="phone" placeholder="+257 65101020" required>
                </div>
                <div class="input_box">
                     <label for="file">Logo</label>
                     <input type="file" class="form-control" name="file" id="file">
                </div>
            </div>
            <div class="reg_btn">
            <input type="submit" value="Enregistrer" name="save">
            </div>

        </form>
    </div>
  </body>
  </html>