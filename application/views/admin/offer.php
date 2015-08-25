<div class="row">
    <div class="col-lg-12">
        <form method="post" action="<?php echo site_url('admin/offers/save'); ?>" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo !empty($offer) ? $offer->id : ''; ?>"/>

            <section class="panel">
                <?php echo !empty($offer->image) ? '<img height="100" style="margin:20px" src="' . site_url('img.php?src=uploads/' . $offer->image) . '">' : ''; ?>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Pina (data) *</label>
                        <input name="until_date" type="text" id="datepicker" required value="<?php echo !empty($offer) ? date('d.m.Y', strtotime($offer->until_date)) : ''; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Imagine</label>
                        <input name="image" type="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Pret (<?php echo $general->currency; ?>) *</label>
                        <input name="price" type="text" required value="<?php echo !empty($offer) ? $offer->price : ''; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Content (romana)</label>
                        <textarea name="content_romanian" class="form-control" rows="10"><?php echo !empty($offer) ? $offer->content_romanian : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Content (rusa)</label>
                        <textarea name="content_russian" class="form-control" rows="10"><?php echo !empty($offer) ? $offer->content_russian : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Produse *</label>
                        <?php if (!empty($products)) { ?>
                            <?php $unserializedProducts = !empty($offer) ? unserialize($offer->products) : array(); ?>
                            <?php foreach ($products as $product) { ?>
                                <div class="product-filters-category">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="products[]" value="<?php echo $product->id; ?>" <?php echo !empty($offer) && in_array($product->id, $unserializedProducts) ? 'checked' : ''; ?>>
                                            <?php echo $product->name_romanian; ?>
                                        </label>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <footer class="panel-footer text-right bg-light lter">
                    <a href="<?php echo site_url('admin/offers'); ?>" class="btn btn-s-xs">Inapoi</a>
                    <?php if (!empty($offer)) { ?>
                        <a href="<?php echo site_url('admin/offers/delete/'.$offer->id); ?>" class="confirm btn btn-danger btn-s-xs">Sterge</a>
                    <?php } ?>
                    <button type="submit" class="btn btn-success btn-s-xs">Salveaza</button>
                </footer>
            </section>
        </form>
    </div>
</div>