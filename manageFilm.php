<?php
    require('libs/db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete user</title>

    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="asset/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="asset/css/local.css" />
    <link rel="stylesheet" type="text/css" href="asset/css/delete.css" />

    <script type="text/javascript" src="asset/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>   
</head>
<body>
    <div id="wrapper">
        <?php
            include("common.php");
        ?>
       <div class="container">
            <div class="row" id="search-user">
                
            </div>
            <div class="row" id="list-user">
                <div class="col-md-1"></div>
                <div class="col-md-8">
                    <!-- get from database -->
                    <?php
                        if(isset($_POST["button_search"])){
                            $qry = isset($_POST["qry"]) ? $_POST["qry"] : '';
                            
                            $sql_name = "SELECT * FROM film WHERE name LIKE '%{$qry}%'";
                            $sql_name2 = "SELECT * FROM film WHERE name2 LIKE '%{$qry}%'";
                            $sql_director = "SELECT * FROM film WHERE director LIKE '%{$qry}%'";
                            $sql_actor = "SELECT * FROM film WHERE actor LIKE '%{$qry}%'";
                            $sql_description = "SELECT * FROM film WHERE description LIKE '%{$qry}%'";

                            $sql = $sql_name . " UNION ". $sql_name2 . " UNION ".$sql_director . " UNION ".$sql_actor. " UNION ". $sql_description;
                            $result = mysqli_query($link, $sql);
                            if (mysqli_num_rows($result) > 0) { ?>
                                <!-- output data of each row -->
                                <table class="table" style="margin: 10px 0px">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Name 2</th>
                                            <th scope="col">Director</th>
                                            <th scope="col">Actor</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php while($row = mysqli_fetch_assoc($result)) {  ?>
                                    <tr>
                                        <th> <?php echo $row["id"] ?> </th>
                                        <th> <?php echo $row["name"] ?> </th>
                                        <th> <?php echo $row["name2"] ?> </th>
                                        <th> <?php echo $row["director"] ?> </th>
                                        <th> <?php echo $row["actor"] ?> </th>
                                        <th> <?php echo $row["description"] ?> </th>
                                    </tr>
                                <?php 
                                }
                            } else {
                                echo "No user like ".$qry;
                            }
                        }
                            mysqli_close($link);
                    ?>
                        </tbody>
                    </table>
                </div>
            
            </div>
        </div>
    </div>
</body>
</html>