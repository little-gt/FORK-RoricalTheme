<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
</div>

<footer class="footer shadow bg-white">
    <div class="container align-items-center justify-content-md-between">
        <div class="row">
            <div class="col-md-6">
                Copyright © <?php echo date('Y'); ?> <?php $this->options->title(); ?>.
            </div>
            <div class="col-md-6">
                <ul class="nav nav-footer justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php $this->options->siteUrl(); ?>">主页</a>
                    </li>
                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while ($pages->next()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</footer>

<?php $this->footer(); ?>

<!-- Third party libraries -->
<script src="<?php $this->options->themeUrl('./assets/vendor/popper/popper.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('./assets/vendor/bootstrap/bootstrap.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('./assets/vendor/headroom/headroom.min.js'); ?>"></script>
<!-- Optional JS -->
<script src="<?php $this->options->themeUrl('./assets/vendor/onscreen/onscreen.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('./assets/vendor/nouislider/js/nouislider.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('./assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>"></script>
<!-- Argon JS -->
<script src="<?php $this->options->themeUrl('./assets/js/argon.js?v=1.0.0'); ?>"></script>
<!-- MathJax -->
<script src="https://lf26-cdn-tos.bytecdntp.com/cdn/expire-1-M/mathjax/2.7.2/MathJax.js?config=TeX-AMS-MML_HTMLorMML" type="application/javascript"></script>

<script type="text/javascript">
let isMathjaxConfig = false; // Prevents multiple calls to Config for performance reasons

const initMathjaxConfig = () => {
    if (!window.MathJax) {
        return;
    }
    window.MathJax.Hub.Config({
        showProcessingMessages: false, // Disable loading messages
        messageStyle: "none", // Hide messages
        jax: ["input/TeX", "output/HTML-CSS"],
        tex2jax: {
            inlineMath: [["$", "$"], ["\\(", "\\)"]], // Inline math delimiters
            displayMath: [["$$", "$$"], ["\\[", "\\]"]], // Display math delimiters
            skipTags: ["script", "noscript", "style", "textarea", "pre", "code", "a"] // Skip certain tags
        },
        "HTML-CSS": {
            availableFonts: ["STIX", "TeX"], // Available fonts
            showMathMenu: false // Disable right-click menu
        }
    });
    isMathjaxConfig = true; // Configured
};

function init() {
    const pres = document.querySelectorAll('pre');
    const lineNumberClassName = 'line-numbers';

    pres.forEach(item => {
        item.className = item.className === '' ? lineNumberClassName : `${item.className} ${lineNumberClassName}`;
    });

    Prism.highlightAll(true, null);

    if (typeof emojify !== "undefined") {
        emojify.run();
    }

    if (!isMathjaxConfig) { // If MathJax has not been configured
        initMathjaxConfig();
    }

    try {
        window.MathJax.Hub.Queue(["Typeset", MathJax.Hub, document.getElementById('main')]);
        window.onload();
    } catch (e) {
        console.error(e);
    }
}

// Prism
<script src="<?php $this->options->themeUrl('./assets/js/prism.js'); ?>"></script>
<!-- Clipboard -->
<script src="<?php $this->options->themeUrl('./assets/js/clipboard.min.js'); ?>"></script>

<script type="text/javascript">
$(document).ready(function () {
    // Configure image lightbox
    show();
    $('img[data-original]:not(img[no-viewer])').viewer({
        url: 'data-original'
    });

    hide();

    const header = document.querySelector("#navbar-main");
    const headroom = new Headroom(header, {
        tolerance: 5,
        offset: 210
    });
    headroom.init();

    if (page === 1) {
        $("#navbar-main").addClass("bg-info alpha-4");
    } else {
        $("#navbar-main").removeClass("bg-info alpha-4");
    }

    $("img").lazyload({ effect: "fadeIn", threshold: 700 });

    $(document).pjax('a[href^="<?php Helper::options()->siteUrl(); ?>"]:not(a[target="_blank"], a[no-pjax])', {
        container: '#main',
        fragment: '#main',
        timeout: 8000
    }).on('pjax:send', function () {
        const viewer = $('img[data-original]:not(img[no-viewer])').data('viewer');
        if (viewer) {
            viewer.destroy();
        }
        show();
    }).on('pjax:complete', function () {
        $("img").lazyload({ effect: "fadeIn", threshold: 700 });
        setTimeout(() => {
            $('img[data-original]:not(img[no-viewer])').viewer({
                url: 'data-original'
            });
        }, 300);

        if (page === 1) {
            $("#navbar-main").addClass("bg-info alpha-4");
        } else {
            $("#navbar-main").removeClass("bg-info alpha-4");
        }
        init();
        hide();
    });

    $("#search").submit(function () {
        const att = $(this).serializeArray();
        for (const i in att) {
            if (att[i].name === "s") {
                $.pjax({
                    url: "<?php $this->options->siteUrl(); ?>search/" + att[i].value + "/",
                    container: '#main',
                    fragment: '#main',
                    timeout: 8000
                }).on('pjax:send', function () {
                    show();
                }).on('pjax:complete', function () {
                    $("img").lazyload({ effect: "fadeIn", threshold: 700 });
                    hide();
                });
            }
        }
        return false;
    });

    init();
});

// Loading spinner
<div class="loading blur-item" id="loading" style="display: none;">
    <div class="spinner-box center">
        <div class="pulse-container">
            <div class="pulse-bubble pulse-bubble-1"></div>
            <div class="pulse-bubble pulse-bubble-2"></div>
            <div class="pulse-bubble pulse-bubble-3"></div>
        </div>
    </div>
</div>

<?php if ($this->options->powermode === "able"): ?>
<!-- Typing effect configuration -->
<script src="<?php $this->options->themeUrl('./assets/js/activate-power-mode.js'); ?>"></script>
<script>
$(document).ready(function () {
    POWERMODE.colorful = true; // Make power mode colorful
    POWERMODE.shake = false; // Turn off shake
    document.body.addEventListener('input', POWERMODE);
});
</script>
<?php endif; ?>

<?php if ($this->options->clickanime === "able"): ?>
<!-- Click animation configuration -->
<canvas id="clickcanvas"></canvas>
<script src="<?php $this->options->themeUrl('./assets/js/click.js'); ?>"></script>
<?php endif; ?>

<!-- Scroll to top button -->
<a href="javascript:$('html,body').animate({ scrollTop: 0 }, 500)">
    <button id="upbtn" class="btn btn-icon-only rounded-circle btn-info up-btn">
        <span class="btn-inner--icon"><i class="ni ni-bold-up" aria-hidden="true"></i></span>
    </button>
</a>
<script>
$(window).scroll(function () {
    if ($(window).scrollTop() >= 500) {
        if (!$("#upbtn").hasClass("upbtn-show")) {
            $("#upbtn").addClass("upbtn-show");
        }
    } else {
        if ($("#upbtn").hasClass("upbtn-show")) {
            $("#upbtn").removeClass("upbtn-show");
        }
    }
});
</script>

<!-- Other scripts -->
<script type="text/javascript">
// Adaptive iframe code
function changeFrameHeight() {
    const ifm = document.getElementById("Adaptiveiframepage");
    ifm.height = document.documentElement.clientHeight;
    ifm.width = document.body.clientWidth;
}

window.onresize = function () {
    changeFrameHeight();
};
</script>
</body>
</html>