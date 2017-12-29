<?php $image = get_sub_field('background'); ?>
<div style="background-image: url(<?php echo $image['url'] ?>);" class="row-wide hero-banner <?php the_sub_field('block_wrapper_class'); ?>">
    <div class="fade-away"></div>
    <div class="row margin-bottom-200rem <?php the_sub_field('row_class'); ?>">
        <div class="<?php the_sub_field('inner_wrapper_class') ?>">
            <div class="small-12 columns <?php the_sub_field('column_class') ?>">
                <?php the_sub_field('text') ?>
            </div>
        </div>
    </div>
    <?php if(get_sub_field('scroll_arrow_destination')) :?>
    <p class="scroll-arrow"><a href="#<?php the_sub_field('scroll_arrow_destination') ?>" class="smooth-scroll"><i class="fa fa-angle-double-down"></i></a></p>
    <?php endif;?>
</div>