<div class="row-wide no-padding-bottom block-text block">
    <div class="small-12 columns">
        <?php if (have_rows('banners')): ?>
            <?php while (have_rows('banners')) : the_row(); ?>
                <?php $image = get_sub_field('background'); ?>
                <div>
                    <?php if (get_sub_field('banner_link')) : ?><a href="<?php the_sub_field('banner_link'); ?>" style="position: absolute;width: 100%; height: <?php echo $image['height'] ?>px;" target="<?php the_sub_field('link_target'); ?>"></a><?php endif; ?>
                    <div class="no-padding" style="background-image: url(<?php echo $image['url'] ?>); background-size: cover; background-position: center center;">
                        <div class="row hero <?php the_sub_field('wrapper_class') ?>" style="padding: 5rem 0;">
                            <div class="large-12 columns short-banner-text <?php the_sub_field('text_class') ?>">
                                <?php the_sub_field('text') ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
<div class="clear"></div>