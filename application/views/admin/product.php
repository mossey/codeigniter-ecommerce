<style>
    .product-filters-category {
        background: #EFEFEF;
        padding: 10px 20px;
        margin-bottom: 10px;
        border-radius: 5px;
    }
    .product-filters-category .checkbox {
        display: inline-block;
        margin-right:25px;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <form method="post" action="<?php echo site_url('admin/products/save'); ?>" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo !empty($product) ? $product->id : ''; ?>">
            <section class="panel">
                <header class="panel-heading">
                    <?php if (!empty($product) && !empty($product->image)) { ?>
                        <img src="<?php echo site_url('img.php?src=uploads/'.$product->image); ?>" height="50" class="m-r-lg">
                    <?php } ?>
                    <span class="h4"><?php echo !empty($product) ? $product->name_romanian : 'Nou produs'; ?></span>
                </header>
                <div class="panel-body"><p class="text-muted"></p>
                    <div class="form-group">
                        <label>Nume (romana) *</label>
                        <input type="text" name="name_romanian"  required class="form-control" value="<?php echo !empty($product) ? $product->name_romanian : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nume (rusa) *</label>
                        <input type="text" name="name_russian" required class="form-control" value="<?php echo !empty($product) ? $product->name_russian : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Descriere (romana)</label>
                        <textarea name="description_romanian" required class="form-control"><?php echo !empty($product) ? $product->description_romanian : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Descriere (rusa)</label>
                        <textarea name="description_russian" required class="form-control"><?php echo !empty($product) ? $product->description_russian : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Categorie *</label>
                        <select name="category" required class="form-control">
                            <option value="">Alege o categorie</option>
                            <?php if (!empty($categories)) { ?>
                                <?php foreach ($categories as $category) { ?>
                                    <option value="<?php echo $category->id; ?>" <?php echo !empty($product) && $product->category == $category->id ? 'selected' : ''; ?> ><?php echo $category->name_romanian; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pret (<?php echo $general->currency; ?>) *</label>
                        <input type="text" name="price" required placeholder="e.g. 150" class="form-control" value="<?php echo !empty($product) ? $product->price : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Pret special (<?php echo $general->currency; ?>)</label>
                        <input type="text" name="special_price" placeholder="Rescrie pretul original" class="form-control" value="<?php echo !empty($product) ? $product->special_price : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Oferta speciala (romana)</label>
                        <input type="text" name="special_content_romanian" placeholder="Apare text special (rosu)" class="form-control" value="<?php echo !empty($product) ? $product->special_content_romanian : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Oferta speciala (rusa)</label>
                        <input type="text" name="special_content_russian" class="form-control" value="<?php echo !empty($product) ? $product->special_content_russian : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Imagine</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group form-checkbox">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="active" value="1" <?php echo ((!empty($product) && $product->active == 1) || empty($product)) ? 'checked' : ''; ?>>
                                In stoc
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Filtre</label>
                        <?php if (!empty($filters)) { ?>
                            <?php foreach ($filters as $category) { ?>
                                <div class="product-filters-category">
                                    <b><?php echo $category->name; ?></b><br>
                                    <?php if (!empty($category->filters)) { ?>
                                        <?php foreach ($category->filters as $filter) { ?>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="filters[]" value="<?php echo $filter->id; ?>" <?php echo (!empty($product) && !empty($product->filters) && !empty($product->filters[$filter->id])) ? 'checked' : ''; ?>>
                                                    <?php echo $filter->name; ?>
                                                </label>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <footer class="panel-footer text-right bg-light lter">
                    <a href="<?php echo site_url('admin/products'); ?>" class="btn btn-s-xs">Inapoi</a>
                    <?php if (!empty($product)) { ?>
                        <a href="<?php echo site_url('admin/products/delete/'.$product->id); ?>" class="confirm btn btn-danger btn-s-xs">Sterge</a>
                    <?php } ?>
                    <button type="submit" class="btn btn-success btn-s-xs">Salveaza</button>
                </footer>
            </section>
        </form>
    </div>
</div>