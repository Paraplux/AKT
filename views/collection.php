<?php 
include '../components/header.php';
include '../components/navbar.php';
?>

<link rel="stylesheet" href="../css/collection.css">

<div class="collection-container">
    <div class="toggle-carousel-main"><i class="fas fa-arrow-up"></i></div>
            <div class="carousel-main js-flickity" data-flickity-options='{"contain": true, "wrapAround": true, "cellSelector": ".object-main"}'>
                <div id="carousel-toggler-01" class="object-main toggle-carousel-1"><img src="../collection_thumbs/arch_1.jpg" alt=""></div>
                <div id="carousel-toggler-02" class="object-main toggle-carousel-2"><img src="../collection_thumbs/nature_1.jpg" alt=""></div>
                <div id="carousel-toggler-03" class="object-main toggle-carousel-3"><img src="../collection_thumbs/people_1.jpg" alt=""></div>
                <div id="carousel-toggler-04" class="object-main toggle-carousel-1"><img src="../collection_thumbs/Francois-Ghys.jpg" alt=""></div>
                <div id="carousel-toggler-05" class="object-main toggle-carousel-2"><img src="../collection_thumbs/nature_1.jpg" alt=""></div>
                <div id="carousel-toggler-06" class="object-main toggle-carousel-3"><img src="../collection_thumbs/people_1.jpg" alt=""></div>
                <div id="carousel-toggler-07" class="object-main toggle-carousel-1"><img src="../collection_thumbs/arch_1.jpg" alt=""></div>
                <div id="carousel-toggler-08" class="object-main toggle-carousel-2"><img src="../collection_thumbs/nature_1.jpg" alt=""></div>
                <div id="carousel-toggler-09" class="object-main toggle-carousel-3"><img src="../collection_thumbs/people_1.jpg" alt=""></div>
            </div>
        
            <div class="carousel-sec carousel-01 js-flickity" data-flickity-options='{"contain": true, "wrapAround": true }'>
                <div class="object object-1"><img src="../collection_thumbs/arch_1.jpg" alt=""></div>
                <div class="object object-1"><img src="../collection_thumbs/arch_2.jpg" alt=""></div>
                <div class="object object-1"><img src="../collection_thumbs/arch_3.jpg" alt=""></div>
            </div>
        
            <div class="carousel-sec carousel-02 js-flickity" data-flickity-options='{"contain": true, "wrapAround": true }'>
                <div class="object object-2"><img src="../collection_thumbs/nature_1.jpg" alt=""></div>
                <div class="object object-2"><img src="../collection_thumbs/nature_2.jpg" alt=""></div>
                <div class="object object-2"><img src="../collection_thumbs/nature_3.jpg" alt=""></div>
            </div>
        
            <div class="carousel-sec carousel-03 js-flickity" data-flickity-options='{"contain": true, "wrapAround": true }'>
                <div class="object object-3"><img src="../collection_thumbs/people_1.jpg" alt=""></div>
                <div class="object object-3"><img src="../collection_thumbs/people_2.jpg" alt=""></div>
                <div class="object object-3"><img src="../collection_thumbs/people_3.jpg" alt=""></div>
            </div>
    
            <div class="carousel-sec carousel-04 js-flickity" data-flickity-options='{"contain": true, "wrapAround": true }'>
                <div class="object object-3"><img src="../collection_thumbs/Francois-Ghys.jpg" alt=""></div>
                <div class="object object-3"><img src="../collection_thumbs/Francois-Ghys.jpg" alt=""></div>
                <div class="object object-3"><img src="../collection_thumbs/Francois-Ghys.jpg" alt=""></div>
            </div>
</div>

<script src="../js/flickity.js"></script>
<script src="../js/collection.js"></script>

<?php
include '../components/footer.php';
?>