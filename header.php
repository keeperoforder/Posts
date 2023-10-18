<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <style>
        .category-link.active {
            font-weight: bold;
        }
    </style>
</head>
    <h1>The Journal</h1>
    <header>
        <nav>
            <ul id="category-list">
                <li><a href="#" class="category-link active" data-category="all">ALL</a></li>
                <li><a href="#" class="category-link" data-category="beauty">BEAUTY</a></li>
                <li><a href="#" class="category-link" data-category="skincare">SKINCARE</a></li>
                <li><a href="#" class="category-link" data-category="style">STYLE</a></li>
                <li><a href="#" class="category-link" data-category="wellness">WELLNESS</a></li>
            </ul>
        </nav>
    </header>
    <?php wp_head(); ?>