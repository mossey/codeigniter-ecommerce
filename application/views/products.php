<section>
    <div class="container">
        <div class="row">
            <form method="post" class="products-form">
                <input type="hidden" name="ajax" value="1" />
                <div class="col-sm-3">
                    <?php $this->load->view('partials/main_sidebar'); ?>
                </div>

                <div class="col-sm-9 padding-right">
                    <?php if (!empty($products)) { ?>
                        <div class="features_items">
                            <h2 class="title text-center"><?php echo !empty($main_category) ? $main_category->{'name_'.$language} : lang('msg_all_products'); ?></h2>

                            <div class="filter-selects">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" style="padding-top: 7px">Sorteaza dupa : </label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="sort_by">
                                                <option value="price_low">Pret mic</option>
                                                <option value="price_high">Pret mare</option>
                                                <option value="popular">Produsele populare</option>
                                                <option value="name_asc">Nume A-Z</option>
                                                <option value="name_desc">Nume Z-A</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <br><br>

                            <div class="products-inside">
                                <?php foreach ($products as $product) { ?>
                                    <?php $this->load->view('partials/product', ['product' => $product]); ?>
                                <?php } ?>
                                <div class="clearfix"></div>
                                <?php echo !empty($links) ? $links : ''; ?>
                            </div>

                            <div class="loader10"></div>
                        </div>
                    <?php } ?>
                </div>
            </form>
        </div>
    </div>
</section>