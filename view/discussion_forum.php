<?php
include('header.php');
?>
<style>
    .seen {
    color: rgb(0, 183, 255);
    text-shadow: 1px 1px 1px #ccc;
    font-size: 1.0rem;
    }
    .unseen{
    color:gray;
    text-shadow: 1px 1px 1px #ccc;
    font-size: 1.0rem; 
    }
    .like{
    color:green;
    text-shadow: 1px 1px 1px #ccc;
    font-size: 1.0rem;
   
    }
    .dislike{
    color:red;
    text-shadow: 1px 1px 1px #ccc;
    font-size: 1.0rem;
    }
    .btn{
        border: none;
        outline: none;
        background-color: white;
    }
</style>

<section class="list" id="list">

    <header class="list__row list__header">
        <h1>Disscussion Forum</h1>
    </header>
    <?php foreach($doubts as $doubts): ?>
    <div class="list__row">
        <div class="list_item">
        <small>
        <b>Course Name: </b>        
        <?= $doubts['courseName']?>
        <br>

        <b>Enrollment No : </b>        
        <?= $doubts['enrollment']?>
        <br>
        <p class="bold">
        <b>Questions : </b>        
        <?= $doubts['Questions']?>
        </p>
        <?php $seen = $doubts['is_seen'];

        if($seen !== '0'){?>
         
        <b> Solution </b>
        <?= $doubts['Answers']?>
        <br><br>
       
        <span> &nbsp; <i class="seen fa fa-eye" aria-hidden="true"></i></span>
            <?php } 
            else 

            {?> <br>

            <span>  &nbsp; <i class="unseen fa fa-eye-slash" aria-hidden="true"></i></span>
            <?php } ?>
             &nbsp;
             <a class="btn" href="./?action=like&doubt_id=<?=$doubts['ID'] ?>"><i class="like fa fa-thumbs-o-up" aria-hidden="true"></i></a>
             <?= $doubts['likes']?>
             &nbsp;
            <a class="btn" href="./?action=dislike&doubt_id=<?=$doubts['ID'] ?>"> <i class="dislike fa fa-thumbs-o-down" aria-hidden="true"></i></a>
             <?= $doubts['dislikes']?>
             &nbsp;
        </small>
        </div>
    </div>
    <?php endforeach; ?>
</section>


<p><a class="viewcourse" href=".?action=view_marks">View Marks</a></p>

<section id="add" class="add">
    <h2>Ask Any Doubts </h2>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_doubt">
       
        <div class="add__inputs">
                <label> Enrollment No : </label>
                <input type="text" name="EnrollmentNo" maxlength="50" placeholder="Enrollment No" autofocus required>
                <br>
                <select name="course_id" required>
                    <option value=""> Select Course</option>
                    <?php foreach($courses as $course): ?>
                    <option value="<?= $course['courseID']?>">
                    <?= $course['courseName']?>
                    </option>  
                    <?php endforeach; ?>
                </select>
                <label> Question : </label>
                <input type="text" name="Question" maxlength="50" placeholder="Enter Your Question" autofocus required>
            
                </div>

                <div class="add__addItem">
                <br><br>
                <br><br>
                <button class="add-button bold"> Ask </button>
        </div>
    </form>


</section>
<br>
<p><a class="viewcourse" href=".">View Assignments </a></p>
<br>
<br>
<?php
include('view/footer.php');
?>
