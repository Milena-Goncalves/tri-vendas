<?php require "../models/create_ads.php"; ?>
<?php require "../pages/compar/header.php"; ?>
<div class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100" style="margin: 15% 0 15% 0;">
            <div class="col-md-offset-4 col-md-10 col-sm-offset-3 col-sm-6">
                <div class="form-container g-3 align-items-center">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
</svg>
    <?php if ($adCreated): ?>
        <h3 class="title">Anúncio criado com sucesso!</h3>
                <?php else: ?>
                    <h3 class="title pb-20 pt-20">Criar Anúncio</h3>

                    
                    <form class="form-vertical" action="create_ad.php" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-30">
                            <input type="text" id="title" name="title" class="form-control" placeholder="Título do Anúncio" required>
                        </div>
                        <div class="form-group mb-30">
                        <textarea class="form-control" rows="5" id="description" name="description" placeholder="Descrição do Anúncio" required></textarea>
                        </div>
                        <div class="form-group">
                            <div class="default-select form-select mb-30" id="default-selects2">
                            <select id="category" name="category" class="form-control" required>
                            <?php foreach ($categories as $category): ?>
                        <option value="<?php echo htmlspecialchars(
                            $category["category_id"]
                        ); ?>">
                            <?php echo htmlspecialchars($category["name"]); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                        </div>
                        <div class="form-group mb-30">
                            <input type="text" id="location" name="location" class="form-control" placeholder="Localização" required>
                        </div>
                        <div class="form-group mb-30">
                            <input class="form-control" type="text" id="price" name="price" placeholder="0.00€" required>
                        </div>
                        <div class="form-group mb-30">
    <input type="file" id="image" name="image" class="form-control">
</div>
                        <div class="form-group d-flex justify-content-center">
                        <button class="btn signin" type="submit" name="submit" value="Criar Anúncio">Criar Anúncio</button>
                    <?php endif; ?>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../pages/compar/footer.php"; ?>


