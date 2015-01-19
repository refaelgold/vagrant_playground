<?php
/**
 * Created by PhpStorm.
 * User: refaelgold
 * Date: 10/5/14
 * Time: 1:17 AM
 */

print_r($_FILES);

move_uploaded_file($_FILES['file']['tmp_name'],"uploads/".$_FILES["file"]["name"]);
