<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <span class="h4">Oferte</span>
                <a class="btn btn-xs btn-success pull-right"
                   href="<?php echo site_url('admin/offers/create'); ?>">Adauga</a>
            </header>

            <div class="panel-body">
                <?php if (!empty($offers)) { ?>
                    <table class="table table-responsive m-b-none text-sm">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Titlu</th>
                            <th width="599">Descriere</th>
                            <th>Produse</th>
                            <th>Pret</th>
                            <th width="120">Data adaugata</th>
                            <th width="100"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($offers as $offer) { ?>
                            <tr>
                                <td><?php echo !empty($offer->image) ? '<img height="25" src="' . site_url('img.php?src=uploads/' . $offer->image) . '">' : ''; ?></td>
                                <td><?php echo $offer->title_romanian; ?></td>
                                <td><?php echo character_limiter($offer->content_romanian, 300); ?></td>
                                <td><?php echo count($offer->products); ?></td>
                                <td><?php echo $offer->price; ?></td>
                                <td><?php echo date('d M Y', strtotime($offer->date)); ?></td>
                                <td><a href="<?php echo site_url('admin/offers/edit/' . $offer->id); ?>"
                                       class="btn btn-xs btn-info">Editeaza</a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <div class="alert alert-warning">
                        <p>La moment nu sunt oferte adaugate.</p>
                    </div>
                <?php } ?>
            </div>
        </section>
    </div>
</div>