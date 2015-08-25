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
                                <h3>Utilizatori inregistrati</h3><br>

                                <table class="table table-responsive m-b-none text-sm">
                                    <thead>
                                    <tr>
                                        <th>Nume</th>
                                        <th>Email</th>
                                        <th>Telefon</th>
                                        <th>Adresa</th>
                                        <th>Limba</th>
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
                                            <td><?php echo $user->language == 'romanian' ? 'Romana' : 'Rusa'; ?></td>
                                            <td><?php echo date('d.m.Y', strtotime($user->date)); ?></td>
                                            <td><input type="checkbox" name="subscribers[]" value="<?php echo $user->id; ?>" <?php echo $user->subscribed == 0 ? 'disabled' : 'checked'; ?> /></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            <?php } ?>
                        </div>
                        <div class="col-md-6 col-md-offset-1">
                            <h3>Campanie noua</h3><br>
                            <div class="form-group">
                                <label class="col-md-2">Subiect (romana) * : </label>
                                <div class="col-md-10">
                                    <input type="text" required name="subject_romanian" class="form-control" />
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label class="col-md-2">Subiect (rusa) * : </label>
                                <div class="col-md-10">
                                    <input type="text" required name="subject_russian" class="form-control" />
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
                                <label class="col-md-2">Text (romana) * : </label>
                                <div class="col-md-10">
                                    <textarea required name="content_romanian" class="form-control"></textarea>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="form-group">
                                <label class="col-md-2">Text (rusa) * : </label>
                                <div class="col-md-10">
                                    <textarea required name="content_russian" class="form-control"></textarea>
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
                            <h3>Campanii trimise</h3><br>
                            <?php if (!empty($newsletters)) { ?>
                                <table class="table table-responsive m-b-none text-sm">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Subiect</th>
                                        <th width="500">Mesaj</th>
                                        <th>Catre</th>
                                        <th width="120">Data trimisa</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($newsletters as $newsletter) { ?>
                                        <tr>
                                            <td><?php echo !empty($newsletter->image) ? '<img height="25" src="' . site_url('img.php?src=uploads/' . $newsletter->image) . '">' : ''; ?></td>
                                            <td><?php echo $newsletter->subject_romanian; ?></td>
                                            <td><?php echo character_limiter($newsletter->content_romanian, 300); ?></td>
                                            <td><?php echo !empty($newsletter->subscribers) && $newsletter->subscribers != 1 ? $newsletter->subscribers. ' persoane' : $newsletter->subscribers.' persoana'; ?></td>
                                            <td><?php echo date('d.m.Y', strtotime($newsletter->date)); ?></td>
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