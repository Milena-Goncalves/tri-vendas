
<?php include "../models/search_model.php"; ?>

<section class="banner-area relative" id="home">  
    <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-center">
                <div class="banner-content col-lg-12">

                <p class="text-white"> <span>Search by tags:</span> Technology, Business, Consulting, IT Company, Design, Development</p>
                </div>                                          
             </div>
        </div>
</section>

<?php
foreach ($searchResults as $result) {
    echo "<div>";
    echo "<h2>" .
        htmlspecialchars($result["title"], ENT_QUOTES, "UTF-8") .
        "</h2>";
    echo "<p>" .
        htmlspecialchars($result["description"], ENT_QUOTES, "UTF-8") .
        "</p>";
    // Adicione mais detalhes conforme necessário
    echo "</div>";
}

include "compar/footer.php";


?>
