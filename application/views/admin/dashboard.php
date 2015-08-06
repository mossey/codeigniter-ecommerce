<div class="row">
    <div class="col-lg-2">
        <section class="panel no-borders hbox">
            <aside class="bg-primary r-l text-center v-middle">
                <a href="<?php echo site_url('admin/categories/create'); ?>">
                    <div class="wrapper"><i class="fa fa-plus fa-2x"></i></div>
                </a>
            </aside>
            <aside>
                <div class="wrapper text-center">
                    <p class="h1"><?php echo $categories_total; ?></p>
                    <span>Categorii</span>
                </div>
            </aside>
        </section>
    </div>
    <div class="col-lg-2">
        <section class="panel no-borders hbox">
            <aside class="bg-success r-l text-center v-middle">
                <a href="<?php echo site_url('admin/products/create'); ?>">
                    <div class="wrapper"><i class="fa fa-plus fa-2x"></i></div>
                </a>
            </aside>
            <aside>
                <div class="wrapper text-center">
                    <p class="h1"><?php echo $products_total; ?></p>
                    <span>Produse</span>
                </div>
            </aside>
        </section>
    </div>
    <div class="col-lg-4">
        <section class="panel no-borders hbox">
            <aside>
                <div class="wrapper text-center">
                    <p class="h1"><?php echo $orders_today_total; ?></p>
                    <span>Comenzi astazi</span>
                </div>
            </aside>
        </section>
    </div>
    <div class="col-lg-4">
        <section class="panel no-borders hbox">
            <aside>
                <div class="wrapper text-center">
                    <p class="h1"><?php echo $orders_total; ?></p>
                    <span>Comenzi total</span>
                </div>
            </aside>
        </section>
    </div>
</div>
<br><br>
<?php $this->load->view('admin/partials/table_orders'); ?>