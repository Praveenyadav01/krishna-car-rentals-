<?php 
session_start(); 
if (isset($_SESSION['username'])) { 
    ?>
        <!DOCTYPE html> 
 
        <html lang="en"> 
 
        <head> 
            <meta charset="UTF-8"> 
            <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
            <title>view Book cars </title> 
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
rel="stylesheet"integrity="sha384QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2b
 RjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"   
integrity="sha384YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7
 N6jIeHz"crossorigin="anonymous"></script> 
            <link rel="stylesheet" href="css/adddoctor.css"> 
            <link rel="stylesheet" href="css/view.css"> 
            <link rel="stylesheet" href="css/card.css"> 
        </head> 
        <body> 
            <?php 
            include ('config_db.php'); 
            ?> 
            <a href="logout.php"> LOGOUT</a>
<table class="table table-hover table-light table-striped" border="1px" 
width="100%"cellspacing="0"> 
                <th>id</th> 
                <th>first name</th> 
                <th>last Name</th> 
                <th>phone</th> 
                <th>email</th> 
                <th>pickup date</th> 
                <th>pickup time</th>
                <th>days</th>
                <th>return date</th> 
 

 
                </tr> 
                <?php 
              

                  $sql = "SELECT * FROM booking "; 
                $result = mysqli_query($conn, $sql); 
                $i = 0; 
                while ($row = mysqli_fetch_assoc($result)) { 
                    $i++; 
                    ?> 
                    <tr> 
                        <td>  
                            <?= $row['ID']; ?> 
                        </td> 
                        <td> 
                            <?= $row['fname']; ?> 
                        </td> 
                        <td> 
                            <?= $row['lname']; ?> 
                        </td> 
                        <td> 
                            <?= $row['phone']; ?> 
                        </td> 
                        <td> 
                            <?= $row['email']; ?> 
                        </td> 
                        <td> 
                            <?= $row['pickupD']; ?> 
                        </td> 
                        <td> 
                        <?= $row['pickupT']; ?>
                        </td> 
                        <td><?= $row['days']; ?></td>
                        <td><?= $row['returnDate']; ?></td>
                    </tr> 
                <?php } ?> 
            </table> 
        </body> 
        </html> 
    <?php } else { 
        header('location:Login.php?err=2'); 
    }
        ?> 