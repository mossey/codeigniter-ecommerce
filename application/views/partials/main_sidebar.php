<div class="left-sidebar">
    <?php if (!empty($categories)) { ?>
        <h2><?php echo lang('msg_categories'); ?></h2>
        <div class="category-products">
            <?php foreach ($categories as $category) { ?>
                <?php if (!empty($category->products)) { ?>
                    <a href="<?php echo site_url('categorie/' . url_title(convert_accented_characters($category->{'name_'.$language})) . '-' . $category->id); ?>" class="cp-category <?php echo (!empty($main_category) && $main_category->id == $category->id) ? 'active' : ''; ?>">
                        <span class="pull-right">(<?php echo $category->products; ?>)</span> <?php echo $category->{'name_'.$language}; ?>
                    </a>
                <?php } ?>
            <?php } ?>
        </div>
    <?php } ?>

    <?php if (!empty($filters)) { ?>
        <br>
        <br>
        <h2><?php echo lang('msg_filters'); ?></h2>
        <div class="filters">
            <?php foreach ($filters as $category) { ?>
                <div class="filter-category">
                    <h5><?php echo end($category)['category_name']; ?></h5>
                    <?php foreach ($category as $filter) { ?>
                        <div class="filter-name">
                            <input type="checkbox" name="sidebar_filters[]" <?php echo !empty($sidebar_filters) && in_array($filter['filter_id'], $sidebar_filters) ? 'checked' : ''; ?> value="<?php echo $filter['filter_id']; ?>" id="filter-<?php echo $filter['filter_id']; ?>" />
                            <label for="filter-<?php echo $filter['filter_id']; ?>"><?php echo $filter['filter_name']; ?></label>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    <?php } ?>


    <script language="JavaScript" type="text/javascript" src="http://www.curs.md/ro/curs_provider/F7F7F0/260/595657"></script>

    <div class="m2meteo2_informer">
        <div class="m2meteo_title" style="background: #65AE17;">
            <a target="_blank" title="Meteo în  Chişinău" href="http://meteo2.md/ro/Prognoza_Meteo/Chişinău/Chişinău/"><?php echo lang('msg_weather_chisinau'); ?></a>
        </div>
        <script language="JavaScript" type="text/javascript" src="http://meteo2.md/configurator/html_informer.php?show_js=1&lang=ro&region=57&location=618426&color=65AE17&title_on=1&color_1=%23ffffff&size=260&cfg_1=1&cfg_3=1&cfg_4=1&cfg_5=1"></script>
    </div></div>
    </div></div>

<br>
<br>
</div>