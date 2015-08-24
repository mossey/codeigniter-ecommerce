<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <span class="h4">Newsletters</span>
            </header>

            <div class="panel-body">
                <form method="post" action="<?php echo site_url('admin/newsletter/save'); ?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-5">
                            <?php if (!empty($users)) { ?>
                                <table class="table table-responsive m-b-none text-sm">
                                    <thead>
                                    <tr>
                                        <th>Nume</th>
                                        <th>Email</th>
                                        <th>Telefon</th>
                                        <th>Adresa</th>
                                        <th width="120">Data inregistrarii</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($users as $user) { ?>
                                        <tr>
                                            <td><?php echo $user->name; ?></td>
                                            <td><?php echo $user->email; ?></td>
                                            <td><?php echo $user->telephone; ?></td>
                                            <td><?php echo $user->address; ?></td>
                                            <td><?php echo date('d.m.Y', strtotime($user->date)); ?></td>
                                            <td><input type="checkbox" name="subscribers[]" value="<?php echo $user->id; ?>" checked /></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            <?php } ?>
                        </div>
                        <div class="col-md-6 col-md-offset-1">
                            <div class="form-group">
                                <label class="col-md-2">Subiect * : </label>
                                <div class="col-md-10">
                                    <input type="text" required name="subject" class="form-control" />
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label class="col-md-2">Imaginea : </label>
                                <div class="col-md-10">
                                    <input type="file" name="image" class="form-control" />
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label class="col-md-2">Text * : </label>
                                <div class="col-md-10">
                                    <textarea required class="form-control"></textarea>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success pull-right">Trimite</button>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <br>
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
                                    <p>La moment nu sunt campanii de email trimise.</p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>