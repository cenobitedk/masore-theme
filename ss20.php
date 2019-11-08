<?php
/**
 * Template Name: ss20
 * Description: Masore frontpage.
 */
$context = Timber::get_context();
$timber_post = new Timber\Post();
$context['post'] = $timber_post;
Timber::render('page-ss20.twig', $context );
