<?php
$arUrlRewrite=array (
  2 => 
  array (
    'CONDITION' => '#^/en/articles/([0-9a-zA-Z-]+)/.*#',
    'RULE' => '?ELEMENT_ID=$1',
    'ID' => '',
    'PATH' => '/en/articles/index.php',
    'SORT' => 1,
  ),
  3 => 
  array (
    'CONDITION' => '#^/jp/catalog/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/jp/catalog/index.php',
    'SORT' => 100,
  ),
  4 => 
  array (
    'CONDITION' => '#^/en/catalog/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/en/catalog/index.php',
    'SORT' => 100,
  ),
  0 => 
  array (
    'CONDITION' => '#^/articles/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/articles/index.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/catalog/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/catalog/index.php',
    'SORT' => 100,
  ),
);
