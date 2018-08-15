<?php
class wuxiaohu_menu extends Walker_Nav_Menu
{
   
     public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';


        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $q_children = explode(" ",$class_names);
        $adate = $qclass = $dropdown = '';
		/*
		用来输出数组的函数，看看数组包含哪些元素
		
		print_r($q_children);
		echo $q_children;
		
		用来输出数组的函数，看看数组包含哪些元素
		*/
		 
		 
		/* 
			自带的布局文件： wp-includes/class-walker-nav-menu.php 在这个文件改二级菜单样式  
			
			$output .= "\n$indent<ul class=\"sub-menu\">\n";
			改为
			$output .= "\n$indent<div class=\"sub-menu\"><ul>\n";
			
			$output .= "$indent</ul>\n";
			改为
			$output .= "$indent</ul></div>\n";
		*/
		 
		 
        if(in_array('current-menu-item', $q_children)||in_array('current-menu-parent', $q_children)||in_array('current-category-ancestor', $q_children)||in_array('current-post-ancestor', $q_children)||in_array('current-post-parent', $q_children)){
            $qclass .= ' active';
        }

        
        $output .= $indent . '<li' . $id . 'class="'. $qclass.'" '.$dropdown.'>';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

}