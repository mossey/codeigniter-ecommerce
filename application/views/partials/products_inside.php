<?php if (!empty($products)) { ?>
    <?php foreach ($products as $product) { ?>
        <?php $this->load->view('partials/product', ['product' => $product]); ?>
    <?php } ?>
    <div class="clearfix"></div>
    <?php echo !empty($links) ? $links : ''; ?>
<?php } ?>
