<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Blog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
      @media screen and (max-width: 760px) {
            .your-class {
             height: 430px;
              padding: 50px; /* Adjust this if necessary, as 50% padding is very large and likely not intended */
            }
        }
</style>
<body>
    <header class="p-4 bg-dark text-center">
        <h1><a href="index.php" class="text-light text-decoration-none">Simple Blog</a></h1>
    </header>
    <div class="post-list mt-5">
        <div class="container">
            <?php
                $id = $_GET['id'];
                if ($id) {
                    include("connect.php");
                    $sqlSelect = "SELECT * FROM posts WHERE id = $id";
                    $result = mysqli_query($conn,$sqlSelect);
                    while ($data = mysqli_fetch_array($result)) {
                    ?>
                       <div class="post bg-light p-4 mt-5">
                        <h1>TITLE: <?php echo $data['title']; ?></h1>
                        <p> <h3>DATE:</h3> <?php echo $data['date']; ?> </p>
                        <p> <h3>CONTENT:</h3><?php echo $data['content']; ?> </p>
                        <p> <h3> SUMMARY:</h3><?php echo $data['summary'];?> </p>
                     <p><h3>PHOTO</h3><img src="<?php echo $data["photo_path"]; ?>" alt="Post Image" style="max-width: 100px;"></p>

                       </div>
                    <?php
                    }
                }else{
                    echo "No post found";
                }
            ?>
         </div>
    </div>
    <div class="footer bg-dark p-4 mt-4">
        <a href="admin/index.php" class="text-light">Admin Panel</a>
    </div>
</body>
</html>