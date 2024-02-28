
<?php include "../models/account.php"; ?>

<div class="vh-100 gradient-custom">
<div class="container mb-4 p-3 d-flex justify-content-center">
    <div style="
    padding-top: 9rem;
    color: #ffffff;
    font-size: 18px;">
        <div class="image d-flex flex-column justify-content-center align-items-center border border-white p-5">
        <svg xmlns="http://www.w3.org/2000/svg" width="60px" height="60px" fill="#ffffff" class="bi bi-person-circle" viewBox="0 0 16 16 " style="
    margin: 15px;">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                    </svg>
            <span class="name mt-4"><?= htmlspecialchars(
                $userInfo["username"] ?? "Anonymous"
            ) ?></span> 
            <span class="idd mt-4"><?= htmlspecialchars(
                $userInfo["email"] ?? "No Email"
            ) ?></span> 
            <div class=" d-flex mt-4">
            <a href="create_ad.php" class="btn btn-light align-items-right">Criar anuncio</a>
            </div>
                
            <div class="text mt-3">
                <span></span>
            </div>
            <div class=" px-2 rounded mt-3 date ">
                <span class="join">Desde: <?= date(
                    "F, Y",
                    strtotime($userInfo["register_date"] ?? "now")
                ) ?></span>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center d-flex">
        <div class="col-lg-8 post-list">
            <?php if (!empty($ads)): ?>
                <?php foreach ($ads as $ad): ?>
                    <div class="single-post d-flex flex-row">
                        <div class="thumb" style="margin-right: 45px;">
                            <img src="<?= htmlspecialchars(
                                $ad["image_path"] ?? "img/default.png"
                            ) ?>" alt="" style="width: 100px; height: auto;">
                            <ul class="tags">
                                <li>
                                    <a href="#"><?= htmlspecialchars(
                                        $ad["category_name"]
                                    ) ?></a>
                                </li>
                            </ul>
                        </div>
                        <div class="details">
                            <div class="title d-flex flex-row justify-content-between">
                                <div class="titles">
                                    <a href="single.html"><h4><?= htmlspecialchars(
                                        $ad["title"]
                                    ) ?></h4></a>                   
                                </div>
                            </div>
                            <div class="delete-button" style="
    display: grid;
    margin-block: -2rem;
    margin-left: 25rem;">
                            <form action="delete_ad.php" method="POST">
                                <input type="hidden" name="ad_id" value="<?= htmlspecialchars(
                                    $ad["ad_id"]
                                ) ?>">
                                <button type="submit" class="btn btn-outline-secondary">Delete</button>
                            </form>
                            </div>
                            <p>
                                <?= htmlspecialchars($ad["description"]) ?>
                            </p>
                            <h5>Price: <?= htmlspecialchars(
                                $ad["price"]
                            ) ?></h5>
                            <p class="address"><span class="lnr lnr-map"></span> Categoria: <?= htmlspecialchars(
                                $ad["category_name"]
                            ) ?></p>
                            <p class="address"><span class="lnr lnr-database"></span> Data Postada: <?= $ad[
                                "post_date"
                            ] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Não há anuncios. <a href="create_ad.php">Crie seu primeiro anuncio!</a></p>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>

<?php include "compar/footer.php"; ?>
