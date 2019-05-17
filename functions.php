<?php

function getCandidates() {
  $candidates = [
    'Biden',
    'Booker',
    'Harris',
    'Buttigieg',
    'Castro',
    'deBlasio',
    'Gabbard',
    'Gillibrand',
    'Hickenlooper',
    'Inslee',
    'Klobuchar',
    'Moulton',
    'ORourke',
    'Sanders',
    'Warren',
];

return $candidates;

}

function addVoteRecord($mysqli, $table, $voter, $vote) {
  $sql = "INSERT INTO $table (voter, vote)  VALUES (?, ?)";
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param("ss", $voter, $vote);
  $stmt->execute();
}

function results1($mysqli) {
  $sql = "SELECT * FROM 1p1v LIMIT 100";
  $stmt = $mysqli->prepare($sql);
  $stmt->execute();
  // $results = $stmt->get_result();
  // Extract result set and loop rows
  $output = [];
  $result = $stmt->get_result();
  while ($data = $result->fetch_assoc()) {
      $output[] = $data;
  }
  return $output;
  }


  function results2($mysqli) {
    $sql = "SELECT * FROM quadratic LIMIT 100";
    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
    // $results = $stmt->get_result();
    // Extract result set and loop rows
    $output = [];
    $result = $stmt->get_result();
    while ($data = $result->fetch_assoc()) {
        $output[] = $data;
    }
    return $output;
    }
  

?>
