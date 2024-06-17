<!DOCTYPE html>
<html lang="en">
<?php 

include("functions-quiz.php");



?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>De Castro - DMS</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

/* Full height image header */
.bgimg-1 {
  background-position: center;
  background-size: cover;
  background-image: url("/w3images/mac.jpg");
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}
    </style>
</head>
<body>

    <div class="split left">
  <div class="centered">
    <!-- Add icon library -->


    <div style="border: 1px solid #ccc; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);" class = "card">
  <img src="images/My_profile.jpg" alt="John" style="width:100%">
  <p style = "margin-top: 5%; "class="title">About Me</p>
  <p style="text-align: justify; margin: 0; font-size: 12px;">
    Hello! I'm Greg Francis De Castro, a Bachelor of Science in Information Technology (BSIT) student. Welcome to my Document Management System for School Records project. This system is designed to streamline and simplify the management of academic records, ensuring efficiency and security in handling important school documents. Through this project, I aim to demonstrate my skills in IT and contribute to improving educational administrative processes.
  </p>
</div>

  </div>
</div>

<div  class="split right">
  <!-- Navbar (sit on top) -->
<div style="width: 70%;" class="w3-top">
<div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="#home" class="w3-bar-item w3-button w3-wide"></a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
    <a href="De Castro - DMS.php" class="w3-bar-item w3-button">Home</a>
      <a href="assessment.php" class="w3-bar-item w3-button">Assignment</a>
      <a href="quiz.php" class="w3-bar-item w3-button">Quiz</a>
      <a href="lab.php" class="w3-bar-item w3-button">Laboratory</a>
      <a href="exam.php"  class="w3-bar-item w3-button">Exam</a>
      <a href="project.php" class="w3-bar-item w3-button">Project</a>
      <a href="letter.php" class="w3-bar-item w3-button">Letter</a>
      
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>



  
    <div class="container mt-4">


        <div style="margin-top: 5%;" class="row">
            <div  class="col-md-12">
                <div style="max-width: 100%;" class="card">
                    <div class="card-header">
                        <h4>Quiz
                            <a href="quiz-create.php" class="btn btn-primary float-end">ADD </a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Date Posted</th>
                                    <th>Document No.</th>
                                    <th>Title</th>
                                    <th>File</th>
                                    <th>Uploaded by</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

            $select = mysqli_query($con, "SELECT * FROM `quizzes`");
            if (mysqli_num_rows($select) > 0) {
              while ($row = mysqli_fetch_assoc($select)) {

                ?>

                <tr>
                  <td>
                    <?php echo $row['date_created']; ?>
                  </td>
                  <td>
                  <?php echo 'Q-000' . $row['qid'];   ?>
                  </td>
                  <td>
                    <?php echo $row['title']; ?>
                  </td>
                  <td>
                    <a style="font-size: medium;" download="<?php echo $row['file']; ?>" href="uploaded_files/<?php echo $row['file']; ?>"><?php
                          echo $row['file']; ?></a>
                  </td>
                  <td>
                    <?php echo $row['uploaded_by']; ?>
                  </td>
                  <td>
                    
                    <a style="font-size: medium; margin-right: 5%;" href="quiz-edit.php?edit=<?php echo $row['qid']; ?>" class="btn btn-success btn-sm">
                      <i class="fas fa-edit"></i> update </a>
                      <a style="font-size: medium;" href="quiz.php?delete=<?php echo $row['qid']; ?>" class="btn btn-danger btn-sm"
                      onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i>
                      delete </a>
                  </td>
                </tr>

                <?php
              }
              ;
            } else {
              echo "<div class='empty'>No Quiz Added</div>";
            }
            ;
            ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  




</div>
    
</body>
</html>