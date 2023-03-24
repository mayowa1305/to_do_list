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
                    <form action="to_do.php" method="post">
                        <label><b>Input task:</b></label><br>
                    <input name = "task" type="text" class="form-control form-control-lg" id="exampleFormControlInput1"
                      placeholder="Add new..."><br><br>
                      <label><b>Due Date:</b></label><br>
                    <input type="date" name= "due_date">
                    <div>
                      <br><input name= "submit" type="submit" class="btn btn-primary" value="add"><br><br>
                      <a href="todo.php"><input type="button" value= "View Task"></a><br>
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
            
          
</section>
<?php 
    if (isset($_POST['submit']))
    {
        $task = $_POST['task'];
        $due_date = $_POST['due_date'];
        $date_added = date('d-m-y');
        $username = $_SESSION['username'] ;

        $query = "insert into todo_list values('','$username','$task','','$date_added','$due_date')";
        $query_run = mysqli_query($con,$query);
        if ($query_run){
            echo "task added";
        } else{
            echo mysqli_error($con);
        }


    }
          
            
            
    
/*
        $username = $_SESSION['username'] ;
        $query = "SELECT * FROM todo_list WHERE username = '$username'";
        $query_run = mysqli_query($con,$query);
        
        
       
    }

  */  
?>

<script>
    var checkbox = document.getElementById("flexCheckChecked1");

// Add an event listener for when the checkbox is clicked
checkbox.addEventListener("click", function() {
  // Create a new XMLHttpRequest object
  var xhttp = new XMLHttpRequest();

  // Set the callback function to execute when the response is received
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log("Checkbox value updated.");
    }
  };

  // Send the AJAX request to the PHP script with the checkbox value
  xhttp.open("GET", "update_checkbox.php?value=" + checkbox.checked, true);
  xhttp.send();
});
</script>
</body>
</html>
