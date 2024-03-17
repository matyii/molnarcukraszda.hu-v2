<div class="d-flex flex-wrap justify-content-center gap-2 pt-5">
<?php
$buttonTypes = array(
    'all' => 'Összes',
    'cakes' => 'Torták',
    'dessert' => 'Sütemények',
    'drink' => 'Üdítők',
    'coffee' => 'Kávék',
    'ice_creams' => 'Fagylaltok'
);

$currentType = isset($_GET['type']) ? $_GET['type'] : '';

foreach ($buttonTypes as $type => $label) {
    $activeClass = ($type === $currentType) ? 'active' : '';
    echo '<a href="?type=' . $type . '" class="btn btn-outline-dark ' . $activeClass . '">' . $label . '</a>';
}
?>
</div>