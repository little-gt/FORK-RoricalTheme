<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<section class="section section-components">
    <div class="container container-lg align-items-center" style="text-align: center;">
        <div class="row">
            <div class="col-sm-3 col-6">
                <h3>
                    <span><?php _e('归档'); ?></span>
                </h3>
                <?php
                $archives = $this->widget('Widget_Contents_Post_Date', 'limit=3&type=month&format=F Y');
                while ($archives->next()):
                ?>
                <a href="<?php echo $archives->permalink; ?>" class="alert fade show" role="alert">
                    <div class="alert alert-success">
                        <span class="alert-inner--text">
                            <strong><?php echo $archives->date; ?></strong>
                        </span>
                    </div>
                </a>
                <?php endwhile; ?>
            </div>

            <div class="col-sm-3 col-6">
                <h3>
                    <span><?php _e('最新文章'); ?></span>
                </h3>
                <?php
                $recentPosts = $this->widget('Widget_Contents_Post_Recent', 'pageSize=3');
                while ($recentPosts->next()):
                ?>
                <a href="<?php echo $recentPosts->permalink; ?>" class="alert fade show" role="alert">
                    <div class="alert alert-info">
                        <span class="alert-inner--text">
                            <strong><?php echo $recentPosts->title; ?></strong>
                        </span>
                    </div>
                </a>
                <?php endwhile; ?>
            </div>

            <div class="col-sm-3 col-6">
                <h3>
                    <span><?php _e('最近回复'); ?></span>
                </h3>
                <?php
                $recentComments = $this->widget('Widget_Comments_Recent', 'ignoreAuthor=true&limit=3');
                $recentComments->to($comments);
                while ($comments->next()):
                ?>
                <a href="<?php echo $comments->permalink; ?>" class="alert fade show" role="alert">
                    <div class="alert alert-warning">
                        <span class="alert-inner--text">
                            <strong><?php echo $comments->author(false); ?></strong>: <?php echo $comments->excerpt(19, '...'); ?>
                        </span>
                    </div>
                </a>
                <?php endwhile; ?>
            </div>

            <div class="col-sm-3 col-6">
                <h3>
                    <span><?php _e('搜索文章'); ?></span>
                </h3>
                <div class="form-group">
                    <form method="post" id="search" action="<?php echo $this->options->siteUrl; ?>" role="search">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                            </div>
                            <input class="form-control" type="text" id="s" name="s" placeholder="搜索">
                        </div>
                        <input class="btn btn-1 btn-outline-primary submit" type="submit" value="搜索吧！">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>