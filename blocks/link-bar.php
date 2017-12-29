<a id="<?php the_sub_field('id') ?>"></a>
<div class="link-bar row-wide no-padding no-margin text-center color-white">

    <?php $rows = get_sub_field('link-bar-block'); ?>

    <?php if( have_rows('link-bar-block') ):

        while( have_rows('link-bar-block') ): $row = the_row();

            $image = get_sub_field('link-block-bkg'); ?>

            <div class="large-<?php echo ( 12 / count($rows) ); ?> small-12 columns no-padding no-margin <?php the_sub_field('link-block-class'); ?>" style="background-image: url(<?php echo $image['url']; ?>);">

                <div class="link-block-content">
                    <h2><?php the_sub_field('link-block-text') ?></h2>
                    <a class="button banner-button small" href="<?php the_sub_field('link-block-url') ?>"><?php the_sub_field('link-block-btn-text') ?></a>
                </div>

            </div>

        <?php endwhile; ?>

    <?php endif; ?>

    <!-- <div class="row <?php the_sub_field('row_class'); ?>">
        <div class="small-12 columns">
            <?php the_sub_field('text') ?>
        </div>
    </div> -->
</div>
<div class="clear"></div>