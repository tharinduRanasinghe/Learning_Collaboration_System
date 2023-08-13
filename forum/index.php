<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="AUAHA Collaborative Learning">
    <title>AUAHA - Forum</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="../assets/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
        href="../assets/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="../assets/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="../assets/img/apple-touch-icon-144x144-precomposed.png">

    <!-- BASE CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/vendors.css" rel="stylesheet">
    <link href="../assets/css/icon_fonts/css/all_icons.min.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="../assets/css/custom.css" rel="stylesheet">
</head>

<body>
    <?php include 'partials/dbconnect.php';?>
    <?php include 'partials/header.php';?>

    <!-- Category container starts here -->
    <section id="hero_in" class="general">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span>Auaha Forum </h1>
            </div>
        </div>
    </section>


    <!-- Categories-->
    <div class="container" id="ques">
        <div class="row">
            <!-- Getting all the categories in the database -->
            <?php
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn,$sql);

            //fetch all Categories
            while($row = mysqli_fetch_assoc($result)){
                $id = $row['category_id'];
                $cat = $row['category_name'];
                $desc = $row['category_description'];

                echo ' 
                <div class="col-md-4 my-2">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="../assets/img/card/card-'. $id .'.png" width="400px" depth="300px" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title"><a href="threadlist.php?category_id='. $id .'"> '. $cat .'</a></h5>
                        <p class="card-text">'. substr($desc,0,150) .'...</p>
                        <a href="threadlist.php?category_id='. $id .'" class="btn btn-primary">View Thread</a>
                    </div>
                </div>
            </div>';
            }
            
            ?>
        </div>
    </div>

    <?php include 'partials/footer.php'?>

    <!-- COMMON SCRIPTS -->
    <script src="../assets/js/jquery-2.2.4.min.js"></script>
    <script src="../assets/js/common_scripts.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/assets/validate.js"></script>


        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>