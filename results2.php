<?php
    error_reporting(E_ALL);
    include 'config.php';
    include 'connect.php';
    include 'functions.php';
    include 'doc-head.php';

error_reporting(E_ALL);

?>


<body>

<h1>Modified Quadratic Voting</h1>
<?php

$candidates = getCandidates();
$results = results2($mysqli);

$voteTally = [];
$i = 0;

foreach ($candidates as $candidate) :
    // echo ('adding up votes for ' . $candidate . '<br>');

    $voteTally[$i]['candidate'] = $candidate;
    $voteTally[$i]['count'] = 0;

    // get all the votes for that candidate
    foreach ($results as $item) :
        // echo ('looping through results<br>');

        parse_str($item['vote'], $voteArray);
        // var_dump($voteArray);
        // var_dump($voteArray);
        $voteTally[$i]['count'] += $voteArray[$candidate];
    endforeach;
    $i++;
endforeach;

 

// foreach ($candidates as $candidate) : 
//     $voteTally[$i]['candidate'] = $candidate;
//     $voteTally[$i]['count'] = 0;
//         foreach ($results as $item) :
//             if ($item['vote'] == $candidate) :
//                 $voteTally[$i]['count'] ++;
//             endif;
//         endforeach;
//     $i++;
// endforeach;

foreach ($voteTally as $item) :
    echo("$item[candidate] received  $item[count] votes <br />");
endforeach;


?>




</body>

