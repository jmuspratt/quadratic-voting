<?php
    include 'config.php';
    include 'connect.php';
    include 'functions.php';
    include 'doc-head.php';
?>

<body>

<h1>Modified Quadratic Voting</h1>
<?php

$candidates = getCandidates();
$results = results($mysqli, 'quadratic');

$voteTally = [];
$i = 0;

foreach ($candidates as $candidate) :

    $voteTally[$i]['candidate'] = $candidate;
    $voteTally[$i]['count'] = 0;

    // get all the votes for that candidate
    foreach ($results as $item) :
        parse_str($item['vote'], $voteArray);
        $voteTally[$i]['count'] += $voteArray[$candidate];
    endforeach;
    $i++;
endforeach;

foreach ($voteTally as $item) :
    echo("$item[candidate] received  $item[count] votes <br />");
endforeach;
?>




</body>

