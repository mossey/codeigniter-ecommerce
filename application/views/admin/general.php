<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-lg-12">
        <form method="post" action="<?php echo site_url('admin/general/save'); ?>">
            <section class="panel">
                <header class="panel-heading"><span class="h4">Date generale</span></header>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Text pentru logo *</label>
                        <input name="General[logo_text]"
                               value="<?php echo !empty($general->logo_text) ? $general->logo_text : ''; ?>" type="text"
                               class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <input name="General[logo_file]" type="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Despre</label>
                        <textarea name="General[about]" class="form-control"
                                  rows="3"><?php echo !empty($general->about) ? $general->about : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Valuta</label>
                        <input name="General[currency]"
                               value="<?php echo !empty($general->currency) ? $general->currency : ''; ?>" type="text"
                               class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Telefon</label>
                        <input name="General[telephone]"
                               value="<?php echo !empty($general->telephone) ? $general->telephone : ''; ?>" type="text"
                               class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Mobil</label>
                        <input name="General[mobile]"
                               value="<?php echo !empty($general->mobile) ? $general->mobile : ''; ?>" type="text"
                               class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Adresa</label>
                        <input name="General[address]"
                               value="<?php echo !empty($general->address) ? $general->address : ''; ?>" type="text"
                               class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Latitudinea Mapa</label>
                        <input name="General[lat]"
                               value="<?php echo !empty($general->lat) ? $general->lat : ''; ?>" type="text"
                               class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Longitudinea Mapa</label>
                        <input name="General[long]"
                               value="<?php echo !empty($general->long) ? $general->long : ''; ?>" type="text"
                               class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Email *</label>
                        <input name="General[email]"
                               value="<?php echo !empty($general->email) ? $general->email : ''; ?>" type="text"
                               class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Livrarea (pagina produsului)</label>
                        <textarea name="General[delivery_product]"
                               class="form-control"><?php echo !empty($general->product_delivery) ? $general->product_delivery : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Livrarea (gratuit de la XX Lei)</label>
                        <input type="text" name="General[delivery_free_from]" value="<?php echo !empty($general->delivery_free_from) ? $general->delivery_free_from : ''; ?>" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Google analytics</label>
                        <textarea name="General[analytics]" class="form-control"
                                  placeholder="Script Google Analytics (http://www.google.com/analytics/)"><?php echo !empty($general->analytics) ? $general->analytics : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Link Facebook</label>
                        <input name="General[link_facebook]"
                               value="<?php echo !empty($general->link_facebook) ? $general->link_facebook : ''; ?>"
                               type="text" class="form-control" placeholder="ex: https://www.facebook.com/TED">
                    </div>
                    <div class="form-group">
                        <label>Link Google+</label>
                        <input name="General[link_google]"
                               value="<?php echo !empty($general->link_google) ? $general->link_google : ''; ?>"
                               type="text" class="form-control" placeholder="ex: https://plus.google.com/+TED">
                    </div>
                    <div class="form-group">
                        <label>Link Linkedin</label>
                        <input name="General[link_linkedin]"
                               value="<?php echo !empty($general->link_linkedin) ? $general->link_linkedin : ''; ?>"
                               type="text" class="form-control"
                               placeholder="ex: https://www.linkedin.com/company/610087">
                    </div>
                </div>
                <footer class="panel-footer text-right bg-light lter">
                    <button type="submit" class="btn btn-success btn-s-xs">Salveaza</button>
                </footer>
            </section>
        </form>
    </div>
</div>