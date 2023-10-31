<?php
    $file = "./data/users.txt";
    $fh = fopen($file,'r+');    
   
    $users = '';
    $email = $_GET['email'];  
    if (isset($_REQUEST['submit'])) {
       
    
    $newemail = $_POST['email'];
    $newfirstnames = $_POST['firstname'];
    $newpasswords = $_POST['password'];
    $newrole = $_POST['role'];

    
    while(!feof($fh)) {
    
        $user = explode(',',fgets($fh));
    
            $role = trim($user[0]);
            $emails = trim($user[1]);
            $passwords = trim($user[2]);
            $firstnames = trim($user[3]);
            
        if (!empty($role) AND !empty($emails)) {

            if ($emails == $email) {            
                
                $role = $newrole;
                $emails = $newemail;
                $passwords = $newpasswords ;
                $firstnames = $newfirstnames;
                
            }            
    
            $users .=  $role . ', ' . $emails . ', ' . $passwords . ', ' . $firstnames;
            $users .= "\r\n";
         }
    }
    $contents = file_get_contents($file);
    $contents = trim($users);
    file_put_contents($file, $contents);
    fclose($fh);
    header("Location: index.php");
        
    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-5">
        <h1 class="text-center">Edit  details</h1>

        <form action="" method="POST">

        <div class="form-group">
            <label for="Your Name">First name</label>
            <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $_GET['name']; ?>">
            
        </div>
      
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="<?php echo $_GET['email']; ?>">
            
        </div>

        <div class="form-group">
            <label for="email">Password</label>
            <input type="password" class="form-control" name="password" id="email" value="<?php echo $_GET['pass']; ?>">
        </div>

        
        <div class="form-group">
            <label for="email">Role</label>
           <select name="role" id="" class="form-control">
                <option value="<?php echo $_GET['role']; ?>" selected><?php echo $_GET['role']; ?></option>
                <option value="admin" >Admin</option>
                <option value="user" >User</option>
           </select>
        </div>



        <p class="text-warning">
            <?php //echo $errorMessage; ?>
        </p>

        <button type="submit" class="btn btn-warning" name="submit">Update data</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>