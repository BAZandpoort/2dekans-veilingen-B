<?php

$routes = [
  '/' => [
    'view' => 'index.php',
    'title' => 'Home',
    'auth_roles' => [],
    'nav' => true,
    'footer' => true,
  ],
  // Account routes
  '/account/login' => [
    'view' => 'account/login.php',
    'title' => 'Login',
    'auth_roles' => ['guest'],
    'nav' => true,
    'footer' => true,
  ],
  '/account/logout' => [
    'view' => 'account/logout.php',
    'title' => 'Logout',
    'auth_roles' => ['member', 'admin'],
    'nav' => false,
    'footer' => false,
  ],
  '/account/register' => [
    'view' => 'account/register.php',
    'title' => 'Register',
    'auth_roles' => ['guest'],
    'nav' => true,
    'footer' => true,
  ],
  // Catalog routes
  '/catalog/products' => [
    'view' => 'catalog/products.php',
    'title' => 'Products',
    'auth_roles' => ['member', 'guest', 'admin'],
    'nav' => true,
    'footer' => true,
    ],
  // '/searchbar' => [
  //   'view' => 'zoekbalk.php',
  //   'title' => 'Search',
  //   'auth_roles' => ['member', 'guest', 'admin'],
  //   'nav' => true,
  //   'footer' => true,
  // ],
  // Member routes
  '/dashboard/products/add' => [
    'view' => 'member/addProduct.php',
    'title' => 'Add Products',
    'auth_roles' => ['member'],
    'nav' => true,
    'footer' => false,
  ],
  '/dashboard/see-translations' => [
    'view' => 'member/see-translations.php',
    'title' => 'See translations',
    'auth_roles' => ['member'],
    'nav' => true,
    'footer' => false,
  ],
  '/dashboard/edit-translation' => [
    'view' => 'member/edit-translation.php',
    'title' => 'Edit translations',
    'auth_roles' => ['member'],
    'nav' => true,
    'footer' => false,
  ],
  '/dashboard/add-translation' => [
    'view' => 'member/add-translation.php',
    'title' => 'Add translations',
    'auth_roles' => ['member'],
    'nav' => true,
    'footer' => false,
  ],
  // Error routes
  '/404' => [
    'view' => 'errors/404.php',
    'title' => 'Not Found',
    'auth_roles' => [],
    'nav' => false,
    'footer' => false,
  ],
  '/account/language-select' => [
    'view' => 'account/language_select.php',
    'title' => 'Language select',
    'auth_roles' => ['guest'],
    'nav' => true,
    'footer' => true,
  ],
];
