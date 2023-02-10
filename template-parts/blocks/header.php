<?php
/**
 * Block template file: template-parts/blocks/header.php
 *
 * Header Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'header-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-header';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$imageClass='';
?>



<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="container py-3 py-md-5">
        <div class="row">
            <?php if ( have_rows( 'banner' ) ) : ?>
                <div class="col-md-10 mx-auto">
                    <?php while ( have_rows( 'banner' ) ) : the_row(); ?>
                        <?php $Desktop = get_sub_field( 'Desktop' ); ?>
                        
                        <?php $Mobile = get_sub_field( 'Mobile' ); ?>
                        <?php if ( $Mobile ) :
                            $imageClass='d-none d-md-block';
                        endif; ?>
                        <?php if ( $Desktop ) : ?>
                            <div class="banner <?php echo $imageClass;?>">
                                <img src="<?php echo esc_url( $Desktop['url'] ); ?>" alt="<?php echo esc_attr( $Desktop['alt'] ); ?>" />
                            </div>
                        <?php endif; ?>
                        <?php if ( $Mobile ) : ?>
                            <div class="banner d-md-none">
                                <img src="<?php echo esc_url( $Mobile['url'] ); ?>" alt="<?php echo esc_attr( $Mobile['alt'] ); ?>" />
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-md-5 offset-md-1">
                <p>
                    <?php the_field( 'header_text' ); ?>
                </p>
            </div>
            
            <div class="col-md-5">
                <?php if ( have_rows( 'call_to_action' ) ) : ?>
                    <?php while ( have_rows( 'call_to_action' ) ) : the_row(); ?>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="<?php the_sub_field( 'placeholder' ); ?>" aria-label="<?php the_sub_field( 'placeholder' ); ?>" aria-describedby="submit">
                            <button class="btn btn-success" type="button" id="submit"><?php the_sub_field( 'button_text' ); ?></button>
                            <small><?php the_sub_field( 'instructions' ); ?></small>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>