<?php 

// getting db connection

require('dbcon.php');
require('function.php');


// checking user logged in or not with login function

if(login()){
    $uid = $_COOKIE['uid'];
    
    $query = "SELECT * FROM user_info WHERE id = :id";
    $statement = $connection->prepare($query);
    $statement->execute(
        array(
            'id' => $uid
        )
    );
    $count = $statement->rowCount();
    if($count > 0){
        $result = $statement->fetchAll();
        foreach($result as $row){
            $username = $row['username'];
            $email = $row['email'];
            $registration = $row['registration_date'];
            $registration = strtotime($registration);
            $registration = date('M d y',$registration);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font-awesome bootstrap custom css -->
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/master.css">
    <title>Ajax Functions</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Ajax</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="nav-link dropdown-toggle" id="navbarDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="https://picsum.photos/25/25" alt="#" width="25" height="25"
                            class="rounded rounded-circle">
                        <span class='d-inline-block'><?php echo $username; ?></span>
                    </a>
                    <div class="dropdown-menu w-50 fade" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                        <img src="http://picsum.photos/150/150" class="rounded rounded-circle shadow my-5" alt="">
                        <h5 class="card-title text-primary"><?php echo $username; ?></h5>
                        <h5 class="card-title text-primary"><?php echo $email; ?></h5>
                        <h5 class="card-title text-primary"><?php echo $registration; ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jquery proper js bootstrap js and font awesome js and master js -->
    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.js"></script>
    <script src="js/master.js"></script>
</body>

</html>

<?php 
}else{
    header('location:login');
} 
?>