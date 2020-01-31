    <footer class="c-footer">
        <nav class="c-footer__links" role="navigation">
            <div class="c-footer__inner">
                <h2 class="u-visually-hidden">Site Content</h2>

                <?php
                // <h3 class="u-visually-hidden">Region</h3>
                // <ul class="c-footer__region">
                //     <li><a href="#">Japan</a></li>
                //     <li><a href="#">US / Canada</a></li>
                //     <li><a href="#">Mexico</a></li>
                // </ul>
                ?>

                <h3 class="u-visually-hidden">Social Links</h3>
                <ul class="c-footer__social">
                    <li><a href="https://www.facebook.com/HoshuDojo" class="c-icon c--replace" data-icon-name="facebook">Facebook</a></li>
                    <li><a href="https://twitter.com/hoshudojo" class="c-icon c--replace" data-icon-name="twitter">Twitter</a></li>
                    <li><a href="https://plus.google.com/u/1/+HoshuDojoNA/about" class="c-icon c--replace" data-icon-name="google">Google Plus</a></li>
                    <li><a href="https://www.youtube.com/user/HoshuDojo" class="c-icon c--replace" data-icon-name="youtube">Youtube</a></li>
                    <li><a href="http://hoshudojo.tumblr.com/" class="c-icon c--replace" data-icon-name="tumblr">Tumblr</a></li>
                </ul>

                <h3 class="u-visually-hidden">Navigation</h3>
                <ul class="c-footer__nav">
                    <li><a href="/">Home</a></li>
                    <li><a href="/locations">Locations</a></li>
                    <li><a href="/events">Events</a></li>
                </ul>
            </div>
        </nav>

        <div class="c-footer__newsletter">
            <!-- Begin MailChimp Signup Form -->
            <!--link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css"-->
            <div id="mc_embed_signup">
                <form action="//hoshudojo.us9.list-manage.com/subscribe/post?u=932de532d91ec18ef1f144adf&amp;id=f13bddc5a9" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                    <h2 class="c-h3">Subscribe to our mailing list</h2>

                    <div class="c-field-row">
                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;"><input type="text" name="b_932de532d91ec18ef1f144adf_f13bddc5a9" tabindex="-1" value=""></div>

                        <div class="c-field mc-field-group">
                            <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span></label>
                            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                        </div>

                        <div class="c-field mc-field-group x-first-name">
                            <label for="mce-FNAME">First Name </label>
                            <input type="text" value="" name="FNAME" class="" id="mce-FNAME">
                        </div>

                        <div class="c-field mc-field-group x-last-name">
                            <label for="mce-LNAME">Last Name </label>
                            <input type="text" value="" name="LNAME" class="" id="mce-LNAME">
                        </div>

                        <div class="c-field c--shrink clear">
                            <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button c-button">
                        </div>
                    </div>

                    <div class="c-field-row">
                        <div class="c-field indicates-required">
                            <div class="c-label">
                                <span class="asterisk">*</span> indicates required
                            </div>
                        </div>
                    </div>

                    <div class="c-field-row">
                        <div id="mce-responses" class="clear">
                            <div class="response" id="mce-error-response" style="display:none"></div>
                            <div class="response" id="mce-success-response" style="display:none"></div>
                        </div>
                    </div>
                </form>
            </div>
            <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
            <!--End mc_embed_signup-->
        </div>

        <div class="c-footer__info" role="contentinfo">
            <div class="c-text-content c--padded">
                <div class="c-frame">
                    <p class="c-h6">We teach All Japan Kendo Federation Jodo in association with the All United States Kendo Federation and the Canadian Kendo Federation</p>
                    <p class="c-h6">© Copyright 2012 – 2015</p>
                </div>
            </div>
        </div>
    </footer>

    <!--script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script-->

    <!--script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script-->
    <?php wp_footer(); ?>
    <script src="<?php getJavascriptUri(); ?>"></script>
</body>
</html>
