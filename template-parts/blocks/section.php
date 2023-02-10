<?php
/**
 * Block template file: template-parts/blocks/section.php
 *
 * Section Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'section-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-section';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$section_bg = get_field( 'section_bg' ); ?>

<style type="text/css">
    
    <?php if ( $section_bg ) :
        $classes .=" section-bg";
        ?>
        <?php echo '#' . $id; ?>:after {
            background: url('<?php echo esc_url( $section_bg['url'] );?>');
        }
    <?php endif; ?>
</style>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-5 order-2 order-md-1 content py-3">
                <h2><?php the_field( 'section_heading' ); ?></h2>
                <?php the_field( 'section_content' ); ?>
            </div>
            <div class="col-md-7 order-1 order-md-2 py-3">	
                <?php $section_image = get_field( 'section_image' ); ?>
                <?php if ( $section_image ) : ?>
                    <img src="<?php echo esc_url( $section_image['url'] ); ?>" alt="<?php echo esc_attr( $section_image['alt'] ); ?>" />
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>