<?php
$is_auth = rand(0, 1);

$user_name = 'Paul'; // укажите здесь ваше имя

$categories = ['Доски и лыжи', 'Крепления', 'Ботинки','Одежда','Инструменты','Разное'];

$adverts = [
    [
        'title' => '2014 Rossignol District Snowboard',
        'category' => 'Доски и лыжи',
        'price' => 10999,
        'url' => 'img/lot-1.jpg',
        'time_lot_end' => '2022-04-13'
    ],
    [
        'title' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => 'Доски и лыжи',
        'price' => 159999,
        'url' => 'img/lot-2.jpg',
        'time_lot_end' => '2022-04-15'
    ],
    [
        'title' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => 'Крепления',
        'price' => 8000,
        'url' => 'img/lot-3.jpg',
        'time_lot_end' => '2022-04-16'
    ],
    [
        'title' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => 'Ботинки',
        'price' => 10999,
        'url' => 'img/lot-4.jpg',
        'time_lot_end' => '2022-04-12'
    ],
    [
        'title' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => 'Одежда',
        'price' => 7500,
        'url' => 'img/lot-5.jpg',
        'time_lot_end' => '2022-04-16'
    ],
    [
        'title' => 'Маска Oakley Canopy',
        'category' => 'Разное',
        'price' => 5400,
        'url' => 'img/lot-6.jpg',
        'time_lot_end' => '2022-04-12'
    ]
];

function format_price ($price) {
    $ceil_price = ceil($price);
    if ($ceil_price < 1000) {
        return $ceil_price.' ₽';
    }
    $format_price = number_format($ceil_price, 0, '', ' ');

    return $format_price.' ₽';
}

function back_hors_min ($time_lot_end) {
    $cur_date = strtotime('now');
    $lot_end_date = strtotime($time_lot_end);
    $diff = $lot_end_date - $cur_date;
    $hors = floor($diff / 3600);
    $diff = $diff % 3600;
    $min =  floor($diff / 60);
    return [$hors, $min];
}

require_once ('helpers.php');

$main_content = include_template('main.php', [
    'categories' => $categories,
    'adverts' => $adverts
]);
$layout_content = include_template('layout.php',[
    'content' => $main_content,
    'title' => 'Главная',
    'is_auth' => rand(0, 1),
    'user_name' => 'Paul',
    'categories' => $categories
    ]);

print($layout_content);

?>


