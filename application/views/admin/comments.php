<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <span class="h4">Comentarii</span>
            </header>

            <div class="panel-body">
                <?php if (!empty($comments)) { ?>
                    <table class="table table-responsive m-b-none text-sm">
                        <thead>
                        <tr>
                            <th>Nume</th>
                            <th>Email</th>
                            <th>Mesaj</th>
                            <th>Link spre comentariu</th>
                            <th>Data</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($comments as $comment) { ?>
                            <tr>
                                <td><?php echo $comment->name; ?></td>
                                <td><?php echo $comment->email; ?></td>
                                <td><?php echo character_limiter($comment->message, 300); ?></td>
                                <td><a href="<?php echo !empty($comment->product_id) ? site_url('produs-'.$comment->product_id) : site_url('pagina/'.$comment->page_id); ?>"><?php echo !empty($comment->product_id) ? site_url('produs-'.$comment->product_id) : site_url('pagina/'.$comment->page_id); ?></a></td>
                                <td><?php echo date('d M Y', strtotime($comment->date)); ?></td>
                                <td><a href="<?php echo site_url('admin/comments/delete/' . $comment->id); ?>" class="btn btn-xs btn-danger">Sterge</a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <div class="alert alert-warning">
                        <p>La moment nu este nici un comentariu adaugat.</p>
                    </div>
                <?php } ?>
            </div>
        </section>
    </div>
</div>