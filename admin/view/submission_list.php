<?php
include('header.php');
?>

<?php if($assignment_submission){ ?>

    <section class="list" id="list">

        <header class="list__row list__header">
            <h1>Submissions</h1>
            <form action="." method="get" id="list__header_select" class="list__header_select " >
            <input type="hidden" name="action" value="get_submission"/>
            <select name="course_id" required>
                <option value="0">View All</option>
                <?php
                    foreach($courses as $course): ?>
                    <?php  if($course_id == $course['courseID']){ ?>
                        
                        <option value="<?= $course['courseID'] ?>" selected>
                   
                    <?php } else{  ?>
                   
                        <option value="<?= $course['courseID'] ?>">
                    <?php  } ?>
                    <?= $course['courseName']?>
                    </option>
               <?php endforeach; ?>
            </select>
            <button class="add-button bold"> <i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
        </header>

        <?php foreach($assignment_submission as $submission): 
            if($submission['is_checked'] == '0'){ ?>
        <div class="list__row">
           
            <div class="list_item">
            <small>
                        <div>
                        <b>Course Name: </b>
                        <span class="bold">
                        <?=$submission['courseName']?></span>
                        </div> 
                       <div>
                        <b>Enrollment ID:</b>
                        <?=$submission['EnrollmentNo']?>
                        </div>
                        <div>
                        <b>Due Date:</b>
                        <?=$submission['duedate']?>
                        </div>
            <form action="." method="post" >
                       <input type="hidden" name="action" value="review_assignment">
                        <input type="hidden" name="submissionno" value="<?=$submission['ID']?>">
                        <div class="add__inputs">
                        <b>Marks:</b>
                        <input type="text" name="marks" placeholder="Enter Marks">
                        </div>
            </small>
                                                        
            </div>

            <div class="list__item ">
                        <small>
                        <div>
                        <b>Course Name: </b>                    
                        <span class="bold">
                        <?=$submission['Description']?>
                        </span>
                        </div> 
                         <div>
                        <b> Submitted File:</b>
                        <?php  $file = $submission['assignmentFile'];?>
                        <a href="<?php echo "../../AssignmentTracker/submissions/".$file;?>"> <?php echo $file;?></a>
                        </div>
                        <div>
                        <b> Submitted on:</b>
                        <?=$submission['date']?>
                        </div> 
                        <div class="add__inputs">
                        <b>Comments:</b>
                        <input type="text" name="comments" placeholder="Any Comments here..">
                        </div>

                        </small> 
           
            </div>
            <style>
              .add-button{
                  padding: 10px;
                  background-color: lightskyblue;
              }
            </style>
            <input class="add-button" type="submit" value="Submit"/>
            </form> 

        </div>
       

        <?php 
            } 
            endforeach; ?>

    </section>

    <?php } else { ?>
        <section class="list" id="list">

        <header class="list__row list__header">
            <h1>Submissions</h1>
            <form action="." method="get" id="list__header_select" class="list__header_select " >
            <input type="hidden" name="action" value="get_submission"/>
            <select name="course_id" required>
                <option value="0">View All</option>
                <?php
                    foreach($courses as $course): ?>
                    <?php  if($course_id == $course['courseID']){ ?>
                        
                        <option value="<?= $course['courseID'] ?>" selected>
                   
                    <?php } else{  ?>
                   
                        <option value="<?= $course['courseID'] ?>">
                    <?php  } ?>
                    <?= $course['courseName']?>
                    </option>
               <?php endforeach; ?>
            </select>
            <button class="add-button bold"> <i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
        </header>
        <br><br>
        <p class="b">No submission done on this course</p>
        <br>
        </section>
    <?php } ?>
    

<!------------------------------------------------------------------------------------------>
            <style>
                 .add-button{
                    padding: 10px;
                    margin-left: 100px;
                  background-color: lightskyblue;
                 }
            </style>
    <section class="list" id="list">
       <header class="list__row list__header ">
            <h1>Doubts</h1>
        </header>   
        <?php 
          // echo '<pre>';
          // print_r($doubts); 
         
               foreach($doubts as $doubts):
                   if($doubts['is_seen'] == 0){
         ?>
        <div class="list__row">
            <div class="list_item">          
                <div>
                <b>Enrollment No: </b>         
                <?= $doubts['enrollment']; ?>  
                </div>
                
                <div>
                <b>Course Name: </b>            
                <?= $doubts['courseName']; ?>   
                </div>
            </div>
            <div class="list__item"> 
               <div>
                <b>Questions : </b>           
                <?= $doubts['Questions']; ?>    
                </div>   
                <form method="post" action=".">  
                <input type="hidden" value="solve_doubt" name="action"/>
                <input type="hidden" name="doubt_id" value="<?= $doubts['ID']; ?>  "/>

                 <div class="add__inputs">
                <input type="text" name="answer" placeholder="Answer here...">
                </div> 
               
            </div>
            <div class="list_item">
            <input class="add-button" type="submit" value="Submit"/>
            </form>
            </div>
        </div>
         <?php  
          }   
            endforeach;   
        ?>
    </section>

            
    <br>
    <p><a class="viewcourse" href=".">View / Add Assignments </a></p>
    <br>
    <br>

    <?php
    include('view/footer.php');
    ?>

