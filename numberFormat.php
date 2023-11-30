<?php

function numberFormat($num) {
    echo number_format($num, 0, '', '.') . '₫';
}