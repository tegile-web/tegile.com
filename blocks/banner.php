<div class="row-wide <?php the_sub_field('width_class'); ?> block block-banner">   
    <div class="<?php the_sub_field('banners-class'); ?> slider-featured no-autoplay slider-default">
        <span class="next" onclick="$(this).parent().slickNext();"></span>
        <span class="prev"  onclick="$(this).parent().slickPrev();"></span>
        <?php if (have_rows('banners')): ?>
            <?php while (have_rows('banners')) : the_row(); ?>
                <?php $image = get_sub_field('background'); ?>
                <div>
                    <?php if (get_sub_field('banner_link')) : ?><a href="<?php the_sub_field('banner_link'); ?>" style="position: absolute;width: 100%; height: <?php echo $image['height'] ?>px;" target="<?php the_sub_field('link_target'); ?>"></a><?php endif; ?>
                    <div style="background-image: url(<?php echo $image['url'] ?>); padding: 0px;">
                            <div class="<?php the_sub_field('class') ?> padding-wrapper-hero-home">
                                <div class="row">
                                    <div class="small-12 columns">
                                        <?php the_sub_field('text') ?>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>