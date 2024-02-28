<?php include "../models/category.php"; ?>

<section class="banner-area relative" id="home">  
    <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-center">
                <div class="banner-content col-lg-12">
                    <?php if ($isUserLoggedIn): ?>
                        <h1 class="text-white">
                        Bem vindo, <span><?php echo htmlspecialchars(
                            $name["name"]
                        ); ?></span></h1>
                    <?php else: ?>
                        <h1 class="text-white"> Mais de <span>10 mil</span> produtos vendidos no nosso site!</h1>
                    <?php endif; ?>  
                    <form action="search.php" method="GET">
                        <div class="row justify-content-center form-wrap">
                            <div class="col-lg-4 form-cols">                   
                                <input type="text" class="form-control" name="search" placeholder="What are you looking for?">
                            </div>
                            <div class="col-lg-3 form-cols">
                                <div class="default-select" id="default-selects2">
                                    <select name="category">
                                        <option value="">All Category</option>
                                        <?php foreach (
                                            $categories
                                            as $category
                                        ): ?>
                        <option value="<?php echo htmlspecialchars(
                            $category["category_id"]
                        ); ?>">
                            <?php echo htmlspecialchars($category["name"]); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                            </div>                                      
                        </div>
                        <div class="col-lg-2 form-cols">
                            <button type="submit" class="btn btn-info">
                              <span class="lnr lnr-magnifier"></span> Search
                            </button>
                        </div>                              
                    </div>
                </form> 
                <p class="text-white"> <span>Search by tags:</span> Technology, Business, Consulting, IT Company, Design, Development</p>
            </div>                                          
        </div>
    </div>
</section>
			<!-- End banner Area -->	


			<section class="post-area section-gap">
    <div class="container">
        <div class="row justify-content-center d-flex">
            <div class="col-lg-8 post-list">

                <?php
                include "../models/ads.php";
                foreach ($ads as $ad) {
                    $imagePath = !empty($ad["image_path"])
                        ? $ad["image_path"]
                        : "img/default.png";

                    echo '
                        <div class="single-post d-flex flex-row">
                            <div class="thumb" style="margin-right: 45px;">
                                <img src="' .
                        $ad["image_path"] .
                        '" alt="" style="width: 100px; height: auto;">
                                <ul class="tags">
                                    <li>
                                        <a href="#">' .
                        $ad["category_name"] .
                        '</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="details">
                                <div class="title d-flex flex-row justify-content-between">
                                    <div class="titles">
                                        <a href="single.html"><h4>' .
                        htmlspecialchars($ad["title"]) .
                        '</h4></a>
                                        <h6>Postado por: ' .
                        htmlspecialchars($ad["user_name"]) .
                        '</h6>                    
                                    </div>
                                    <ul class="btns" style="padding-left: 200px;">
                                        <li><a href="#"><span class="lnr lnr-heart"></span></a></li>
                                        <li><a href="detalhes.php?ad_id=' .
                        $ad["ad_id"] .
                        '">Ver anúncio</a></li>
                                    </ul>
                                </div>
                                <p>
                                    ' .
                        htmlspecialchars($ad["description"]) .
                        '
                                </p>
                                <h5>Preço: ' .
                        htmlspecialchars($ad["price"]) .
                        '€</h5>
                                <p class="address"><span class="lnr lnr-map"></span> Categoria: ' .
                        htmlspecialchars($ad["category_name"]) .
                        '</p>
                                <p class="address"><span class="lnr lnr-database"></span> Data de Postagem: ' .
                        $ad["post_date"] .
                        '</p>
                            </div>
                        </div>
                    ';
                }
                ?>
            </div>
        </div>
    </div>
</section>
							
<?php include "compar/footer.php"; ?>
