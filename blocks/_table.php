<?php if( have_rows('table') ): ?>
<table>  
  <?php while ( have_rows('table') ): the_row(); ?>      
      <?php if(get_sub_field('type') == 'title') :?>
        <thead>
          <tr>
            <th><?php the_sub_field('text') ?></th>
          </tr>
        </thead>            
      <?php elseif(get_sub_field('type') == 'header') :?>
        <tr>
          <th><?php the_sub_field('text') ?></th>
        </tr>
      <?php else :?>
        <tr>
          <td>
            <?php if(get_sub_field('link')) :?><a href="<?php the_sub_field('link'); ?>" class="jump"><?php the_sub_field('text') ?></a>
            <?php else :?>
              <?php the_sub_field('text') ?>
            <?php endif; ?>
            </td>
        </tr>
      <?php endif; ?>            
   
  <?php endwhile; ?>
</table>
<?php endif;?>  