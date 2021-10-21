<?php
$min = 0;
$max = 1;
$x = rand(2,10);
$d = 1;
$m = 0;

$mat = [];

for ( $i = 0; $i < $x; $i++) {
    $j = $i;
    $k = 0;
    for ( $j = $i; $j >= 0; $j--) {
        $mat[$k][$j] = rand($min, $max);
        $k++;
    }
}

for ( $k = 1; $k < $x; $k++) {
    $i = $m = $k;
    for ( $j = $x-1; $j >= $m; $j--) {
        $mat[$i][$j] = rand($min, $max);
        $i++;
    }
}

echo "-----  Matriz Generada  -----"."<br>"."<br>";
echo "<table border='1' cellspacing='0'>";
for ( $i = 0; $i < $x; $i++) {
    echo "<tr>";
    for($j = 0; $j < $x; $j++) {
        echo "<td  width='30' align='center' >".$mat[$i][$j]."</td>";
    }
    echo "</tr>";
}
echo "</table>"
?>