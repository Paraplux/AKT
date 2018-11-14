<?php 
include '../components/header.php';
include '../components/navbar.php';
?>

<link rel="stylesheet" href="../css/fullscreen.css">
<link rel="stylesheet" href="../css/collection.css">


<div class="container">
    <div class="collection-head">
        <div class="collection-head-thumb"></div>
        <span class="collection-head-title"><span>COLLECTION</span></span>
    </div>
    <div class="collection-carousels">
            <div class="carousel-nav js-flickity" data-flickity-options='{"contain": true, "wrapAround": true, "pageDots": false, "fullscreen": true}'>
                <div id="carousel-toggler-01" class="object-main toggle-carousel-1"><img src="../images/collection_thumbs/arch_1.jpg" alt=""></div>
                <div id="carousel-toggler-02" class="object-main toggle-carousel-2"><img src="../images/collection_thumbs/nature_1.jpg" alt=""></div>
                <div id="carousel-toggler-03" class="object-main toggle-carousel-3"><img src="../images/collection_thumbs/people_1.jpg" alt=""></div>
                <div id="carousel-toggler-04" class="object-main toggle-carousel-1"><img src="../images/collection_thumbs/Francois-Ghys.jpg" alt=""></div>
                <div id="carousel-toggler-05" class="object-main toggle-carousel-2"><img src="../images/collection_thumbs/nature_1.jpg" alt=""></div>
                <div id="carousel-toggler-06" class="object-main toggle-carousel-3"><img src="../images/collection_thumbs/people_1.jpg" alt=""></div>
                <div id="carousel-toggler-07" class="object-main toggle-carousel-1"><img src="../images/collection_thumbs/arch_1.jpg" alt=""></div>
                <div id="carousel-toggler-08" class="object-main toggle-carousel-2"><img src="../images/collection_thumbs/nature_1.jpg" alt=""></div>
                <div id="carousel-toggler-09" class="object-main toggle-carousel-3"><img src="../images/collection_thumbs/people_1.jpg" alt=""></div>
            </div>
        
            <div class="carousel-sec carousel-01 js-flickity" data-flickity-options='{"contain": true, "wrapAround": true, "pageDots": false, "fullscreen": true }'>
                <div class="object object-1"><img src="../images/collection_thumbs/arch_1.jpg" alt=""></div>
                <div class="object object-1"><img src="../images/collection_thumbs/arch_2.jpg" alt=""></div>
                <div class="object object-1"><img src="../images/collection_thumbs/arch_3.jpg" alt=""></div>
                
            </div>
        
            <div class="carousel-sec carousel-02 js-flickity" data-flickity-options='{"contain": true, "wrapAround": true, "pageDots": false, "fullscreen": true }'>
                <div class="object object-2"><img src="../images/collection_thumbs/nature_1.jpg" alt=""></div>
                <div class="object object-2"><img src="../images/collection_thumbs/nature_2.jpg" alt=""></div>
                <div class="object object-2"><img src="../images/collection_thumbs/nature_3.jpg" alt=""></div>
            </div>
        
            <div class="carousel-sec carousel-03 js-flickity" data-flickity-options='{"contain": true, "wrapAround": true, "pageDots": false, "fullscreen": true }'>
                <div class="object object-3"><img src="../images/collection_thumbs/people_1.jpg" alt=""></div>
                <div class="object object-3"><img src="../images/collection_thumbs/people_2.jpg" alt=""></div>
                <div class="object object-3"><img src="../images/collection_thumbs/people_3.jpg" alt=""></div>
            </div>
    
            <div class="carousel-sec carousel-04 js-flickity" data-flickity-options='{"contain": true, "wrapAround": true, "pageDots": false, "fullscreen": true }'>
                <div class="object object-3"><img src="../images/collection_thumbs/Francois-Ghys.jpg" alt=""></div>
                <div class="object object-3"><img src="../images/collection_thumbs/Francois-Ghys.jpg" alt=""></div>
                <div class="object object-3"><img src="../images/collection_thumbs/Francois-Ghys.jpg" alt=""></div>
            </div>
    </div>
</div>

<script src="../js/collection.js"></script>

<?php
include '../components/footer.php';
?>