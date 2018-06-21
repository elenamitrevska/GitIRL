<span class="comments-link">
	<a href="<?php echo esc_url( get_comments_link() ); ?>">
	<i class="fa fa-comment-o" title="<?php esc_attr_e( 'comment icon', 'mission-news' ); ?>"></i>
		<?php
		if ( ! comments_open() && get_comments_number() < 1 ) :
			comments_number( esc_html__( 'Коментарите се затворени', 'mission-news' ), esc_html__( '1 Коментар', 'mission-news' ), esc_html__( '% Коментари', 'mission-news' ) );
		else :
			comments_number( esc_html__( 'Напиши Коментар', 'mission-news' ), esc_html__( '1 Коментар', 'mission-news' ), esc_html__( '% Коментари', 'mission-news' ) );
		endif;
		?>
	</a>
</span>