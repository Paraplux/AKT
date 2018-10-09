<?php 
include '../components/header.php';
include '../components/navbar.php';
?>
<link rel="stylesheet" href="../css/about.css">

<div class="about-page">


    <div class="presentation">

Lorem ipsum dolor sit, amet consectetur adipisicing <br/>
Exercitationem totam earum aut modi? Vitae recusandae aspernatur quisquam,<br/> 
totam asperiores dolorem expedita sed quae odit eveniet placeat perspiciatis suscipit sint ex.


    </div>

    <div class="formulaire">

  <form action="" method="POST">

    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
  </div>
</div>


<?php
include '../components/footer.php';
?>