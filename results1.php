<?php
    include 'config.php';
    include 'connect.php';
    include 'functions.php';
    include 'doc-head.php';
?>

<body>

<h1>1 person, 1 vote</h1>
<?php

$candidates = getCandidates();
$results = results($mysqli, '1p1v');

$voteTally = [];
$i = 0;
foreach ($candidates as $candidate) : 
    $voteTally[$i]['candidate'] = $candidate;
    $voteTally[$i]['count'] = 0;
    foreach ($results as $item) :
        if ($item['vote'] == $candidate) :
            $voteTally[$i]['count'] ++;
        endif;
    endforeach;
    $i++;
endforeach;

foreach ($voteTally as $item) :
    echo("$item[candidate] received  $item[count] votes <br />");
endforeach;


?>




</body>

