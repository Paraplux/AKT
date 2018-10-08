<?php
include'../components/header.php';
include'../components/navbar.php';
 ?>


<div class="news">

    <section class="press">
            <h1>Rien que des nouveautés</h1>
            <p class="main-news"><img src="../images/Tendance-et-dEcoration-Akt-Jewels-1.jpg" alt="Nouveau !" /></p>
            <p class="ma">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad eligendi atque perferendis exercitationem numquam quae laboriosam perspiciatis, minima vel natus voluptate iste praesentium? Tempora quia veritatis deleniti ratione minima ea? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi facilis culpa molestias natus excepturi quas corporis exercitationem, quo impedit error provident deleniti magni fugiat eveniet explicabo recusandae laboriosam odit totam?</p>

        <button class="accordion">Title press</button>
        <div class="panel">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat.</p>
        </div>

        <button class="accordion">Title press</button>
        <div class="panel">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat.</p>
        </div>

        <button class="accordion">Title press</button>
        <div class="panel">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat.</p>
        </div>

    </section>

    <section class="blog">


        <article><span class="title">Article 1</span><br /> Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Laborum culpa quos, accusamus et quaerat suscipit, hic qui dolore adipisci veritatis magni tenetur ullam
            quia in doloribus eveniet voluptatem ab delectus.</article>

        <article><span class="title">Article 2</span><br /> Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Quam incidunt obcaecati asperiores voluptate eos deserunt distinctio numquam accusamus sunt illo molestiae
            aspernatur beatae minima possimus dolores, ducimus ex, aperiam vel.</article>

        <article><span class="title">Article 3</span><br /> Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Possimus, quas tenetur dolorum voluptatibus et, alias odit maiores aliquam. Molestias ipsa dolores, commodi
            tempora quis dolore omnis! Temporibus possimus impedit blanditiis.</article>


    </section>

</div>
<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
</script>




<?php include'../components/footer.php'; ?>