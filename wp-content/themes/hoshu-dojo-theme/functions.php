<?php

function getStylesheetUri() {
    echo esc_url( get_template_directory_uri() ) . '/style.css';
}

function getImgDirectory() {
    echo esc_url( get_template_directory_uri() ) . '/src/img';
}

function component($partial) {
    echo get_template_part('_' . $partial);
}

?>
