<?php

$file = "./data/users.txt";
$fh = fopen($file,'r+');
$users = '';
$email = $_GET['email'];
while(!feof($fh)) {

    $user = explode(',',fgets($fh));    
    $role = trim($user[0]);
    $emails = trim($user[1]);
    $passwords = trim($user[2]);
    $firstnames = trim($user[3]);
   
    if (!empty($role) AND !empty($emails)) {
        if ($emails == $email) {            
            
            $line = $role . ', ' . $emails . ', ' . $passwords . ', ' . $firstnames;
            
        }

       
     }
}

$contents = file_get_contents($file);
$contents = str_replace($line, '', $contents);
$contents = trim($contents);
file_put_contents($file, $contents);

$files = $file;
$lines = file($files, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

unset($lines[$index]);

file_put_contents($files, implode("\n", $lines));

header("Location: index.php");

?>
