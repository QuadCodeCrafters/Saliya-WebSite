<?php
$shopItemID = $_POST['submitBtn'];
$name = $_POST['name'];
$email = $_POST['email'];
$rating = $_POST['rating'];
$review = $_POST['review'];
$today = date("d-m-Y");
$itemID = $_POST['allreviewbtn'];
$statement = "";
//echo "<script>alert('{$shopItemID}');</script>";
//echo "<script>alert('{$itemID}');</script>";
// SQL DB connection start
require_once 'sqlConnection.php'; //sql connection 
// SQL DB connection end
$query = "INSERT INTO cusReview(cusName,review,date,rating,shopItemID,mail) VALUES (?,?,?,?,?,?) ";
$params = [$name,$review,$today,$rating,$shopItemID,$email];
        $getResults = sqlsrv_query($conn, $query,$params);
        if ($getResults === false) {
            error_log(print_r(sqlsrv_errors(), true));
            die("Query failed.");
        }
        else{
            //echo "<script>alert('data inserted');</script>";
            //header('location:allReviews.php');
            $statement = "Your review has been inserted";
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0b2154, #5a7be2);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background: white;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            max-width: 420px;
            width: 100%;
            text-align: center;
        }
        .form-label {
            font-size: 1.2rem;
            font-weight: 600;
            color: #0b2154;
        }
        .custom-btn {
            background: #0b2154;
            border: none;
            padding: 12px;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s ease-in-out;
            border-radius: 8px;
        }
        .custom-btn:hover {
            background: #081a43;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-container">
                    <form method="post" action="allReviews.php">
                        <div class="mb-4">
                            <label class="form-label"> <?php echo "{$statement}"; ?> </label>
                        </div>
                        <input type="hidden" name="allreviewbtn" value="<?php echo "{$itemID}" ?>" id="allreviewbtn">
                        <button type="submit" name="submitBtn" id="submitBtn" class="btn btn-primary w-100 custom-btn">
                            Go back
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


