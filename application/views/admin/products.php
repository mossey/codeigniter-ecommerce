<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <span class="h4">Produse</span>
                <a class="btn btn-xs btn-success pull-right" href="<?php echo site_url('admin/products/create'); ?>">Adauga</a>
            </header>

            <div class="panel-body">
                <?php if (!empty($products)) { ?>
                    <table class="table table-responsive m-b-none text-sm">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Nume</th>
                            <th width="599">Descriere</th>
                            <th>Categorie</th>
                            <th>Pret</th>
                            <th width="120">Data adaugata</th>
                            <th width="100">Status</th>
                            <th width="100"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($products as $product) { ?>
                            <tr>
                                <td><?php echo !empty($product->image) ? '<img height="25" src="'.site_url('img.php?src=uploads/'.$product->image).'">' : ''; ?></td>
                                <td><?php echo $product->name_romanian; ?></td>
                                <td><?php echo $product->description_romanian; ?></td>
                                <td><?php echo $product->category_name_romanian; ?></td>
                                <td><?php echo $product->price.' '.$general->currency; ?></td>
                                <td><?php echo date('d M Y', strtotime($product->date)); ?></td>
                                <td><?php echo $product->active == 1 ? '<span class="text-success">In stoc</span>' : '<span class="text-danger">Nu este in stoc</span>'; ?></td>
                                <td><a href="<?php echo site_url('admin/products/edit/'.$product->id); ?>" class="btn btn-xs btn-info">Editeaza</a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <div class="alert alert-warning">
                        <p>La moment nu sunt produse.</p>
                    </div>
                <?php } ?>
            </div>
        </section>
    </div>
</div>