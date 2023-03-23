<?php
    session_start();
    require("dbconfig/dbconfig.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    #list1 .form-control {
    border-color: transparent;
  }
  #list1 .form-control:focus {
    border-color: transparent;
    box-shadow: none;
  }
  #list1 .select-input.form-control[readonly]:not([disabled]) {
    background-color: #fbfbfb;
  }
</style>
</head>
<body>
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card" id="list1" style="border-radius: .75rem; background-color: #eff1f2;">
          <div class="card-body py-4 px-4 px-md-5">

            <p class="h1 text-center mt-3 mb-4 pb-3 text-primary">
              <i class="fas fa-check-square me-1"></i>
              <u>My Todo-s</u>
            </p>

            <div class="pb-2">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row align-items-center">
                    <form action="" method="post">
                        <label><b>Input task:</b></label><br>
                    <input name = "task" type="text" class="form-control form-control-lg" id="exampleFormControlInput1"
                      placeholder="Add new..."><br><br>
                      <label><b>Due Date:</b></label><br>
                    <input type="date" name= "due_date">
                    <div>
                      <br><button name= "submit" type="submit" class="btn btn-primary">Add</button>
                    </form>
                    
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-end align-items-center mb-4 pt-2 pb-3">
              <p class="small mb-0 me-2 text-muted">Filter</p>
              <select class="select">
                <option value="1">All</option>
                <option value="2">Completed</option>
                <option value="3">Active</option>
                <option value="4">Has due date</option>
              </select>
              <p class="small mb-0 ms-4 me-2 text-muted">Sort</p>
              <select class="select">
                <option value="1">Added date</option>
                <option value="2">Due date</option>
              </select>
              <a href="#!" style="color: #23af89;" data-mdb-toggle="tooltip" title="Ascending"><i
                  class="fas fa-sort-amount-down-alt ms-2"></i></a>
            </div>
            <?php
            $username = $_SESSION['username'] ;
            $query = "SELECT * FROM todo_list WHERE username = '$username'";
            $query_run = mysqli_query($con,$query);
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($query_run)){
           /* echo "<li>"."Task: ". $row['task']. "</li>";
            echo "<li>"."Date Added : ". $row['date_added']. "</li>";
            echo "<li>"."Due_Date : ". $row['due_date']. "</li>";
              }
            echo "</ul>"; */ 
           
            #echo '<ul class="list-group list-group-horizontal rounded-0 bg-transparent">';
            
              echo '<li
                class="list-group-item d-flex align-items-center ps-0 pe-3 py-1 rounded-0 border-0 bg-transparent">
                <div class="form-check">
                  <input class="form-check-input me-0" type="checkbox" value="1" id="flexCheckChecked1"
                    aria-label="..."  />
                </div>
              </li>';
              echo '<li
                class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent">
                <p class="lead fw-normal mb-0">'."Task: ". $row['task'].'</p>
              </li>';
              echo '<li
                class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent">
                <p class="lead fw-normal mb-0">'."Task: ". $row['date_added'].'</p>
              </li>';
              echo '<li
                class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent">
                <p class="lead fw-normal mb-0">'."Task: ". $row['due_date'].'</p>
              </li>';
              echo '<hr class="my-4">';
            }
            echo '</ul>';
            ?>
          </div>
          
</section>
<?php 
    if (isset($_POST['submit']))
    {
        $task = $_POST['task'];
        $due_date = $_POST['due_date'];
        $date_added = date('d-m-y');
        $username = $_SESSION['username'] ;

        $query = "insert into todo_list values('','$username','$task','$date_added','$due_date')";
        $query_run = mysqli_query($con,$query);
        if ($query_run){
            echo "task added";
        } else{
            echo mysqli_error($con);
        }

    }

    
?>
</body>
</html>
