<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tech Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="components/fontawesome-free-5.11.2-web/css/all.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--    fonts-->
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=McLaren&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
<nav id="navbar" class="navbar fixed-top navbar-expand-md" style="display:flex;">
    <a class="navbar-brand" href="index.php"><img style="width: 100%;height: 100%;" src="img/logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-align-justify"></i>
    </button>
    <div class="collapse navbar-collapse" id="navigation">
        <div class="navbar-nav">
            <ul class="navbar-nav text-center">
                <li class="nav-item"><a class="nav-item nav-link" href="info/info.html"><i class="far fa-question-circle"></i> about</a></li>
                <li class="nav-item"><a class="nav-item nav-link" href="info/contact.html"><i class="far fa-address-book"></i> contact</a></li>
                <li class="nav-item"><a href="users.php" class="nav-item nav-link"><i class="fas fa-users"></i> our users</a></li>
                <li class="nav-item"><button id="regbut" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> registration</button></li>
            </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form method="POST" action="registration.php">
                        <?php include('errors.php'); ?>
                            <div class="form-group">
                                <label for="name-form">Name and Surname</label>
                                <input type="text" class="form-control" id="name-form" name="username" placeholder="name">
                                <input type="text" class="form-control" id="surname-form" name="usersurname" placeholder="surname">
                            </div>
                            <div class="form-group">
                                <label for="mail-form">Email address</label>
                                <input type="email" class="form-control" id="mail-form" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                            <label for="group-select">Mais ID and group</label>
                            <select name="group" class="custom-select" id="groupSelect">
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                            </select>
                            <input class="form-control" name="maisID" id="maisID" type="number">
                            </div>
                            <div class="form-group">
                            <button id="submit-form" type="submit" class="btn" name="reg_user">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="users-list">
    <?php
    $users = [];
    $db = mysqli_connect('localhost', 'root', '', 'users');
    $query = mysqli_query($db, "SELECT * FROM `users_table`;");
    $result = mysqli_fetch_all($query);
    //var_dump($result);
    if(empty($result)){
        echo '<h2>Oops... seems like there is no users</h2>';
    }else {
        echo '<h2><i class="fas fa-users"></i> List of our users:</h2>
                <ol>';
        foreach ($result as $row) {
            array_push($users, $row);
        }
            foreach ($users as $user){
                echo '<li><strong>Name:</strong> ' . $user[1] . ' <strong>Surname:</strong> '. $user[2] .' </li>';

            }
            echo '</ol>';
    }
        ?>
</section>
<div style="text-align:center;">
    <a href="queries.txt">SQL script to creat table of users</a>
</div>
<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-xs-12 text-center text-md-left">
                <img src="img/logo.png">
            </div>
            <div class="col-md-9 col-xs-12 text-center text-md-right">
                <ul>
                    <li><strong>Our articles:</strong></li>
                    <li><a href="articles/ghome.html">Google Home and It`s features</a></li>
                    <li><a href="articles/neunet.html">Artificial Neural Networks </a></li>
                    <li><a href="articles/chatbot.html">What Are Chatbots?</a></li>
                    <li><a href="articles/airpods.html">New Airpods Pro is here</a></li>
                    <li>
                        <script language="javascript">
                            months = ['January', 'Febraury', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                            var d=new Date();
                            var weekday=new Array(7);
                            weekday[0]="Sunday";
                            weekday[1]="Monday";
                            weekday[2]="Tuesday";
                            weekday[3]="Wednesday";
                            weekday[4]="Thursday";
                            weekday[5]="Friday";
                            weekday[6]="Saturday";

                            var d = new Date();
                            (d.getFullYear());

                            var theDate = new Date(document.lastModified);
                            theDate.setTime((theDate.getTime()+(60*60)) )
                            with (theDate) {
                                document.write("<i> Last updated 'users.php' "+weekday[getDay()]+' '+getDate()+' '+months[getMonth()]+' '+d.getFullYear()+' '+getHours()+':'+getMinutes()+ " GMT</i>")}

                        </script>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

</body>
</html>