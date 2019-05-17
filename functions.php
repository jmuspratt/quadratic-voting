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

function results($mysqli, $table) {
  $sql = "SELECT * FROM $table LIMIT 100";
  $stmt = $mysqli->prepare($sql);
  $stmt->execute();
  $output = [];
  $result = $stmt->get_result();
  while ($data = $result->fetch_assoc()) {
      $output[] = $data;
  }
  return $output;
  }


?>
