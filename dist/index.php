<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>User Authentication and Role Management System</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Roles management</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">profile</a>
                    
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                  
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                              
                               
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["firstname"] ?></a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="logout.php">logout</a>
                                       
                                       
                                      
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <?php

                    if($_SESSION["role"] == 'admin')
                    {
                        ?>
                <div class="container-fluid">
                    <h1 class="mt-4">Simple Sidebar</h1> <br>
                
                    <a href="admin.php" class="btn btn-primary">Add new user</a><br><br>
                    
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                          
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $fp = fopen("./data/users.txt", "r");
                          $roles = array();
                          $emails = array();
                          $passwords = array();
                          $firstnames = array();
                          while (($values = fgetcsv($fp)) !== false) {
                              array_push($roles, trim($values[0]));
                              array_push($emails, trim($values[1]));
                              array_push($passwords, trim($values[2]));
                              array_push($firstnames, trim($values[3]));
                          }
                          fclose($fp);
                          for ($i = 0; $i < count($roles); $i++) {
                              echo "<tr>";
                              echo "<th scope='row'>" . ($i + 1) . "</th>";
                              echo "<td>" . $firstnames[$i] . "</td>";
                              echo "<td>" . $emails[$i] . "</td>";
                              echo "<td>" . $roles[$i] . "</td>";
                              //Create a delete button which will be in the action row and when that delete button is hit all the data in that column will be deleted.
                              
                              echo "<td>";
                                echo "<a href='edit.php?email=" . $emails[$i] ."&name=" . $firstnames[$i] ."&pass=" . $passwords[$i] ."&role=" . $roles[$i] ."' class='btn btn-warning'>Edit</a></br></br>";
                                
                                  echo "<a href='delete.php?email=" . $emails[$i] . "' class='btn btn-danger'>Delete</a>";
                                  echo "</td>";
                        
                            



                            //   echo "<td><button type='button' class='btn btn-warning'>
                            //   Edit</button></td>";
                            //   echo "<td><button type='button' class='btn btn-danger'> Delete</button></td>";
                              
                             



                              echo "<td> </td>";
                              echo "</tr>";
                          }
                          ?>
                        

                       
                       
                      </table>
                </div>
                <?php
                 }
                 else{

                    echo$_SESSION["role"];
                    echo "</br>";
                    echo$_SESSION["firstname"];
                    echo "</br>";
                    echo$_SESSION["email"];
                    echo "</br>";
                
                 }
                 ?>
                 
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
