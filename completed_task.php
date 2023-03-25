<?php

session_start();
require("dbconfig/dbconfig.php");
?>
            <div class="d-flex justify-content-end align-items-center mb-4 pt-2 pb-3">
            <a href="addTask.php"><u>My Todo-s</u></a>  
            <h2>Completed Tasks</h2>
              <p class="small mb-0 me-2 text-muted">Filter</p>
              <ul>
                <li><a href="completed_task.php">Completed</a></li>
                <li><a href="active_list.php">Active</a></li>
                <li><a href="todo_list.php">All</a></li>
              </ul>
              <hr class="my-4">
            </div>

<?php
            $username = $_SESSION['username'] ;

            $query = "SELECT * FROM todo_list WHERE username = '$username' AND status = 'completed'";
            $query_run = mysqli_query($con,$query);
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($query_run)){
                
              
              echo '<li
                class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent">
                <p class="lead fw-normal mb-0">'."Task: ". $row['task'].'</p>
              </li>';
              echo '<li
                class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent">
                <p class="lead fw-normal mb-0">'."Date Added: ". $row['date_added'].'</p>
              </li>';
              echo '<li
                class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent">
                <p class="lead fw-normal mb-0">'."Due: ". $row['due_date'].'</p>
              </li>';
              echo '<li
                class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent">
                <p class="lead fw-normal mb-0">'."Status: ". $row['status'].'</p>
              </li>';
              

              echo '<hr class="my-4">';

            }
            echo '<a href="addTask.php"><input type="button" value= "Add Task"></a><br>';
            echo '</ul>';
            
            ?>
           