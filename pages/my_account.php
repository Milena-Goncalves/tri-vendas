
<?php include "../models/account.php"; ?>

<div class="vh-100 gradient-custom">
<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class="image d-flex flex-column justify-content-center align-items-center">
            <button class="btn btn-secondary">
                <img src="https://i.imgur.com/wvxPV9S.png" height="100" width="100" />
            </button> 
            <span class="name mt-3"><?= htmlspecialchars(
                $userInfo["username"] ?? "Anonymous"
            ) ?></span> 
            <span class="idd"><?= htmlspecialchars(
                $userInfo["email"] ?? "No Email"
            ) ?></span>
            <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                <span class="idd1">User ID: <?= htmlspecialchars(
                    $userId ?? "Unknown"
                ) ?></span> 
            </div> 
            <div class=" d-flex mt-2">
                <a href="create_ad.php" class="btn1 btn-dark">Create Ad</a>
            </div>
            <div class="text mt-3">
                <span>Your bio goes here. Edit your profile to update this information.</span>
            </div>
            <div class=" px-2 rounded mt-4 date ">
                <span class="join">Joined <?= date(
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
                            <div class="delete-button">
                            <form action="delete_ad.php" method="POST">
                                <input type="hidden" name="ad_id" value="<?= htmlspecialchars(
                                    $ad["ad_id"]
                                ) ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            </div>
                            <p>
                                <?= htmlspecialchars($ad["description"]) ?>
                            </p>
                            <h5>Price: <?= htmlspecialchars(
                                $ad["price"]
                            ) ?></h5>
                            <p class="address"><span class="lnr lnr-map"></span> Category: <?= htmlspecialchars(
                                $ad["category_name"]
                            ) ?></p>
                            <p class="address"><span class="lnr lnr-database"></span> Post Date: <?= $ad[
                                "post_date"
                            ] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No ads found. <a href="create_ad.php">Create your first ad!</a></p>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>

<?php include "compar/footer.php"; ?>
