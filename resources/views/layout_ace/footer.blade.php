<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-7">
                    <div class="block-subscribe">
                        <div class="newsletter">
                            <form method="post" action="{{url("/add/newsletter")}}">
                                @csrf
                                <h4>newsletter</h4>
                                <input type="text" placeholder="Enter your email address" class="input-text required-entry validate-email" title="Sign up for our newsletter" name="newsletter">
                                <button class="subscribe" title="Subscribe" type="submit"><span>Subscribe</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-2 col-lg-2 col-md-2 col-xs-6 coppyright" style="margin-top: 25px">
                    &copy; {{Date('Y')}}. All Rights Reserved.
                </div>
                <div class="col-lg-10 col-md-10 col-xs-6 company-links">
                    <ul class="row links">
                        <li><div class="phone-footer"><i class="email-icon">&nbsp;</i>info@ace.com.pk</div></li>
                        <li><div class="phone-footer"><i class="phone-icon">&nbsp;</i>+92 303 1234567</div></li>
                        <li><div class="phone-footer"><i class="add-icon">&nbsp;</i>123 Main Street, Multan</div></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/parallax.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/common.js')}}"></script>
<script type="text/javascript" src="{{{asset('assets/js/revslider.js')}}}"></script>
<script type="text/javascript" src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/spinner/jquery.bootstrap-touchspin.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.jcarousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/cloudzoom.js')}}"></script>
<script type='text/javascript'>

    jQuery(document).ready(function(){
        jQuery('#rev_slider_4').show().revolution({
            dottedOverlay: 'none',
            delay: 5000,
            startwidth: 770,
            startheight: 460,

            hideThumbs: 200,
            thumbWidth: 200,
            thumbHeight: 50,
            thumbAmount: 2,

            navigationType: 'thumb',
            navigationArrows: 'solo',
            navigationStyle: 'round',

            touchenabled: 'on',
            onHoverStop: 'on',

            swipe_velocity: 0.7,
            swipe_min_touches: 1,
            swipe_max_touches: 1,
            drag_block_vertical: false,

            spinner: 'spinner0',
            keyboardNavigation: 'off',

            navigationHAlign: 'center',
            navigationVAlign: 'bottom',
            navigationHOffset: 0,
            navigationVOffset: 20,

            soloArrowLeftHalign: 'left',
            soloArrowLeftValign: 'center',
            soloArrowLeftHOffset: 20,
            soloArrowLeftVOffset: 0,

            soloArrowRightHalign: 'right',
            soloArrowRightValign: 'center',
            soloArrowRightHOffset: 20,
            soloArrowRightVOffset: 0,

            shadow: 0,
            fullWidth: 'on',
            fullScreen: 'off',

            stopLoop: 'off',
            stopAfterLoops: -1,
            stopAtSlide: -1,

            shuffle: 'off',

            autoHeight: 'off',
            forceFullWidth: 'on',
            fullScreenAlignForce: 'off',
            minFullScreenHeight: 0,
            hideNavDelayOnMobile: 1500,

            hideThumbsOnMobile: 'off',
            hideBulletsOnMobile: 'off',
            hideArrowsOnMobile: 'off',
            hideThumbsUnderResolution: 0,

            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0,
            startWithSlide: 0,
            fullScreenOffsetContainer: ''
        });
    });
</script>

<script>
    <?php $i=0;$error="error"; $n=' $.notify('?>
    @if ($message = Session::get('success'))


        <?php $i=1; $n.=$message;$error = "success";?>

    @elseif ($message = Session::get('error'))

        <?php $i=1;$n.=$message;$error = "error";?>


    @elseif ($message = Session::get('warning'))


        <?php $i=1;$n.=$message;$error = "warning";?>


    @elseif ($message = Session::get('info'))
        <?php $i=1;$n.=$message;$error = "info";?>
    @endif
    <?php  $n.=','.$error.')'; if($i==1) echo $n;?>

</script>
