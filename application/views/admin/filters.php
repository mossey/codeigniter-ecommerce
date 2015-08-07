<style>
    .filter-categories {}
    .filter-categories .filter-category {
        margin-bottom: 20px;
        border-bottom: 1px solid #92CF5C;
        padding-bottom: 20px;
    }
    .filter-categories input {
        margin: 5px 0;
        max-width: 400px;
    }
    .filter-categories > input {}
    .filter-categories .fc-filters > input {}
    .filter-categories .category-title {}
    .filter-categories .filters-title {
        margin-top: 15px;
    }
</style>

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <span class="h4">Filtre</span>
            </header>

            <div class="panel-body">
                <form method="post" action="<?php echo site_url('admin/filters/save'); ?>">
                    <a class="btn btn-xs btn-success add-filter-default add-filter" style="display:none" data-href="<?php echo site_url('admin/filters/filter'); ?>">Adauga un filtru</a>

                    <div class="filter-categories">
                        <?php if (!empty($filters)) { ?>
                            <?php foreach ($filters as $key => $filter_category) { ?>
                                <div class="filter-category" data-key="<?php echo $key; ?>">
                                    <h5 class="category-title">Categorie</h5>
                                    <input type="text" name="filters[<?php echo $key; ?>][name]" class="form-control" required placeholder="Categorie pentru filtre (ex: Brand, Tip, Culoara)" value="<?php echo $filter_category->name; ?>" />

                                    <h5 class="filters-title">Filtre</h5>
                                    <div class="fc-filters">
                                        <?php if (!empty($filter_category->filters)) { ?>
                                            <?php foreach ($filter_category->filters as $filter) { ?>
                                                <input type="text" name="filters[<?php echo $key; ?>][filters][]" class="form-control" required placeholder="Nume filtru (ex: Gillete, Pachet, Galben)" value="<?php echo $filter->name; ?>" />
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                    <a class="btn btn-xs btn-success add-filter" data-href="<?php echo site_url('admin/filters/filter'); ?>">Adauga un filtru</a>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>

                    <a class="btn btn-xs btn-primary add-category" data-href="<?php echo site_url('admin/filters/category'); ?>">Adauga o categorie</a>
                    <button type="submit" class="btn btn-xs btn-success">Salveaza</button>
                </form>
            </div>
        </section>
    </div>
</div>

<script>
    $(document).on('click', '.add-category', function(){
        var $filter_categories = $('.filter-categories'),
            filter_categories = $filter_categories.find('.filter-category').length;

        $filter_categories.append('' +
            '<div class="filter-category" data-key="'+filter_categories+'">' +
                '<h5 class="category-title">Categorie</h5>'+
                '<input type="text" name="filters['+filter_categories+'][name]" class="form-control" required placeholder="Categorie pentru filtre (ex: Brand, Tip, Culoara)" />'+
                '<h5 class="filters-title">Filtre</h5>'+
                '<div class="fc-filters"></div>'+$('.add-filter-default').clone().show()[0].outerHTML+
            '</div>'+
        '');

        return false;
    });
    $(document).on('click', '.add-filter', function(){
        var $filters = $(this).parents('.filter-category').find('.fc-filters'),
            filter_category = $(this).parents('.filter-category').data('key');

        $filters.append('<input type="text" name="filters['+filter_category+'][filters][]" class="form-control" required placeholder="Nume filtru (ex: Gillete, Pachet, Galben)" />');

        return false;
    });
</script>