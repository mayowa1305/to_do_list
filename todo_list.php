<?php
    
    session_start();
    require("dbconfig/dbconfig.php");

            
            $username = $_SESSION['username'] ;
            $query = "SELECT * FROM todo_list WHERE username = '$username'";
            $query_run = mysqli_query($con,$query);
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($query_run)){
                
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
              echo '<form action="todo.php" method="post">
            <input type="submit" name="status" value="completed">
            </form>';
            
            if (isset($_POST['status'])){
                
                $status = "completed";

               
                $task = $row['task'];
                $query1 = "UPDATE todo_list
                SET status = '$status'
                WHERE task = '$task'";
                $query_run1 = mysqli_query($con,$query1);
                
            }
              echo '<hr class="my-4">';

            }
            echo '<a href="to_do.php"><input type="button" value= "Add Task"></a><br>';
            echo '</ul>';
            
            ?>
           
        