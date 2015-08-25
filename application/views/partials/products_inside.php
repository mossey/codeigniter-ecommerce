<?php if (!empty($products)) { ?>
    <?php foreach ($products as $product) { ?>
        <?php $this->load->view('partials/product', ['product' => $product]); ?>
    <?php } ?>
    <div class="clearfix"></div>
    <?php echo !empty($links) ? $links : ''; ?>
<?php } else { ?>
    <div class="col-md-12">
        <p>Nu sunt produse pentru cautarea dvs.</p>
    </div>
<?php } ?>