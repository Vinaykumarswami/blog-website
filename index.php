<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Blog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            background-color: #E1DEE9;
            color: #333;
            font-family: Arial, sans-serif;
        }

        .bg-dark {
            background-color: #355070 !important;
            color: #fff;
        }

        .bg-light {
            background-color: #fff;
            color: #333;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .footer {
            background-color: #355070;
            color: #fff;
            text-align: center;
        }

        .post-title {
            color: #B56576;
            font-size: 1.5rem;
        }

        .post-content {
            font-size: 1rem;
            margin-top: 10px;
        }

        .post-image {
            max-width: 100%;
            border-radius: 5px;
        }

        .read-more-btn {
            background-color: #B56576;
            border: none;
        }

        .read-more-btn:hover {
            background-color: #6D597A;
        }

        .post-list .row:hover {
            transform: scale(1.02);
            transition: transform 0.2s;
        }

        .post-list {
            margin-top: 30px;
        }
        @media screen and (max-width: 760px) {
            .your-class {
             height: 430px;
              padding: 50px; /* Adjust this if necessary, as 50% padding is very large and likely not intended */
            }
        }
    </style>
</head>
<body>
    <header class="p-4 bg-dark text-center">
        <h1><a href="index.php" class="text-light text-decoration-none">Simple Blog</a></h1>
    </header>
    <div class="post-list">
        <div class="container">
            <?php
                include("connect.php");
                $sqlSelect = "SELECT * FROM posts";
                $result = mysqli_query($conn,$sqlSelect);
                while ($data = mysqli_fetch_array($result)) {
                ?>
                    <div class="row mb-4 p-4 bg-light">
                        <div class="col-sm-2">
                            <h6><?php echo $data["date"]; ?></h6>
                        </div>
                        <div class="col-sm-3">
                            <h2 class="post-title"><?php echo $data["title"]; ?></h2>
                        </div>
                        <div class="col-sm-4">
                            <p class="post-content"><?php echo substr($data["content"], 0, 100) . '...'; ?></p>
                        </div>
                        <div class="post-image mb-2">
                         <h4>Photo</h4>
                          <img src="<?php echo $data["photo_path"]; ?>" alt="Post Image" class="img-fluid rounded">
                        </div>
                        <div class="col-sm-1 d-flex align-items-center">
                            <a href="view.php?id=<?php echo $data['id']; ?>" class="btn read-more-btn">READ MORE</a>
                        </div>
                    </div>
                <?php
                }
            ?>
         </div>
    </div>
    <div class="footer bg-dark p-4 mt-4">
        <a href="admin/index.php" class="text-light">Admin Panel</a>
    </div>
</body>
</html>
