<?php
function gsdtest($content)
{
	return $content;
}

add_filter('the_content', 'gsdtest');

get_template_part('archive', get_post_format());