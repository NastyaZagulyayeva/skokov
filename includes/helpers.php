<?php

function post_excerpt($post, $limit = 30)
{
    $content = strip_tags($post->post_content);
    $result = substr($content, 0, $limit);
    $result .= (strlen($content) < $limit) ? '' : '...';

    return $result;
}

function masonry_class_selector($index)
{
    switch ($index) {
        case 0:
        case 1:
        case 4:
            return 'col-xl-4 grid-item--width2 grid-item--height2';
        case 6:
        case 7:
        case 9:
        case 10:
            return 'col-xl-2 grid-item--height3';
        case 8:
            return 'col-xl-2 grid-item--height4';
        default:
            return 'col-xl-2';
    }
}