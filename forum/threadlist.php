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

    <?php
    $id = $_GET['category_id'];
    $sql = "SELECT * FROM `categories` WHERE category_id = $id";

    $result = mysqli_query($conn,$sql);

    //fetch all Categories
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['category_id'];
        $cat = $row['category_name'];
        $desc = $row['category_description'];
        
    }  
                
    ?>

    <!-- Category container starts here -->
    <section id="hero_in" class="general">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span>Auaha Forum </h1>
            </div>
        </div>
    </section>

    <?php
        $showAlert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if($method=='POST'){
            // Insert thread into db
            $th_title = $_POST['title'];
            $th_desc = $_POST['desc'];
            $sno = $_POST['sno']; 

            //replacing < with &lt and > with &gt
            $th_title = str_replace(">", "&gt;",  $th_title);
            $th_title = str_replace("<", "&lt;",  $th_title);
            $th_desc = str_replace(">", "&gt;", $th_desc);
            $th_desc = str_replace("<", "&lt;", $th_desc);

            $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ( '$th_title', '$th_desc', '$id', '$sno', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            $showAlert = true;
            if ($showAlert){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your thread has been added. Please wait for community to respond
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
        }
    
    ?>


    <!-- Categories-->
    <div class="container" id="ques">
        <div class="jumbotron">
            <h1 class="display-4 ">Welcome to <?php echo $cat;?> Forum</h1>
            <p class="lead"> <?php echo $desc;?></p>
            <hr class="my-4">
            <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not
                post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post
                questions. Remain respectful of other members at all times.</p>
            <p class="text-danger">If your forum account has been permanently sanctioned, the behavior exhibited on the
                account was determined to be in violation of our Terms of Use. Please review the <a
                    href="userrules.php">user rules</a> closely
                before engaging in this forum. Auaha Support staff is unable to overturn a permanent sanction once it
                has been placed on your forum account. </p>
            <p class="lead"><a class="btn btn-info btn-lg" href="userrules.php" role="button">User Rules</a></p>
            <!-- <p>Posted by: <em><?php echo $posted_by; ?></em></p> -->
        </div>
    </div>

    <!-- showing the comment posting contetn only when logged in -->
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo '    
    <div class="container">
        <h1>Ask a Question</h1>
        <form class="my-4" action="' . $_SERVER["REQUEST_URI"] . '" method="post">
    <div class="mb-3">
        <label for="title" class="form-label">Problem Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp"
            placeholder="Keep your title as short as possible" required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Elaborate Your Problem</label>
        <textarea class="form-control" id="desc" name="desc" rows="8" required></textarea>
    </div>
    <input type="hidden" name="sno" id="sno" value="' . $_SESSION["sno"]. '">
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>';
    }
    else{
    echo '
    <div class="container">
        <div class="alert alert-warning d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                <use xlink:href="#exclamation-triangle-fill" />
            </svg>
            <div>
                Please login to post a question
            </div>
        </div>
    </div>';
    }
    ?>


    <div class="container" id="ques">
        <h1>Browse Questions</h1>
        <?php
        $id = $_GET['category_id'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id = $id";
        $result = mysqli_query($conn,$sql);
        $noResult = true;

        //fetch all Categories that need to be updated after enter to a thread
        while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
            $tid = $row['thread_id'];
            $th_use_id = $row['thread_user_id'];
            $title = $row['thread_title'];
            $tdesc = $row['thread_desc'];
            $thread_time = $row['timestamp'];
            $sql2 = "SELECT user_name FROM `users` WHERE sno = $th_use_id";
            $result2 = mysqli_query($conn,$sql2);
            $row2 = mysqli_fetch_assoc($result2);
            


        
            //assigning each question by thread
        echo '<div class="media my-4">
            <img class="mr-3" src="../assets/img/userdefault.png" width="54px" alt="Generic placeholder image">
            <div class="media-body">'.
                
                '<h5 class="mt-0"><a class="text-dark" href="thread.php?thread_id='. $tid .'">'. $title.'</a></h5>
                '. $tdesc.'
            </div>'.'<p class="fw-bold my-2">Asked By: ' . $row2['user_name'] .' at '. $thread_time .'</p>'.'
        </div>';
        }  
        if ($noResult){
            echo         '<div class="jumbotron">
            <h1 class="display-6 text-warning">No Questions Were Found</h1>
            <p class="lead">Be the first person to ask a question</p>
        </div>';
        }
                
        ?>
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