<?php

function __autoload($className) {
    $file = "include/".$className.'.php';
    if(file_exists($file)) {
        require_once $file;
    }
}

// build test data
$participants = array(
    new Participant("Ott", "Tanak", "Martin", "Jarveoja", 20, 1 ),
    new Participant("Thierry","Neuville", "Martijn", "Wydaeghe", 21, 1),
    new Participant("Gus", "Greensmith", "Cris", "Patterson", 7, 2),
    new Participant("Teemu", "Suninen", "Mikko", "Markkula", 9, 3)
    );

$stages = array(
  new Stage("Monte Carlo Stage 1", 1, 20.58),
    new Stage("Monte Carlo Stage 2", 1, 20.78),
    new Stage("Monte Carlo Stage 3", 3, 19.61),
    new Stage("Monte Carlo Stage 4", 2, 21.61)
);

$date = '2021-01-21 10:00:00';
$dateTime = new DateTime($date);
$timestamp = $dateTime->format('U');

# build trips
$trips = array(new Trip($participants[0], $stages[0], $timestamp, 60000),
    new Trip($participants[0], $stages[1], $timestamp, 60400),
    new Trip($participants[0], $stages[2], $timestamp, 60000),
    new Trip($participants[0], $stages[3], $timestamp, 70000),
    new Trip($participants[1], $stages[0], $timestamp, 60100),
    new Trip($participants[1], $stages[1], $timestamp, 60300),
    new Trip($participants[1], $stages[2], $timestamp, 60040),
    new Trip($participants[1], $stages[3], $timestamp, 60800),
    new Trip($participants[2], $stages[0], $timestamp, 90000),
    new Trip($participants[2], $stages[1], $timestamp, 60001),
    new Trip($participants[2], $stages[2], $timestamp, 67000),
    new Trip($participants[2], $stages[3], $timestamp, 60060),
    new Trip($participants[3], $stages[0], $timestamp, 60003),
    new Trip($participants[3], $stages[1], $timestamp, 62300),
    new Trip($participants[3], $stages[2], $timestamp, 60780),
    new Trip($participants[3], $stages[3], $timestamp, 60999)
    );

# sample data test before sorting
/*
foreach ($trips as $t){
    echo "Pilot: {$t->getParticipant()->getPilotName()} Stage: {$t->getStage()->getName()}  Brauciena ilgums: {$t->getDuration()}\n";
}
*/

# sort by stages and by durations
usort($trips, function ($a, $b){
    if($a->getStage()->getName() == $b->getStage()->getName()){
        return $a->getDuration() - $b->getDuration();
    }
    return strcmp($a->getStage()->getName(), $b->getStage()->getName());
});

# sample data test after sorting
/*
foreach ($trips as $t){
    echo "Sorted by stages - Pilot: {$t->getParticipant()->getPilotName()} Stage: {$t->getStage()->getName()}  Brauciena ilgums: {$t->getDuration()}\n";
}
*/
?>
<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Rally data table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Atrumposma nosaukums / garums</th>
        <th scope="col">Ekipāža</th>
        <th scope="col">Pilots / Stūrmanis</th>
        <th scope="col">Brauciena garums</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $i = 1;
    foreach ($trips as $t){

    ?>
    <tr>
        <th scope="row"><?php echo $i ?></th>
        <td><?php echo "{$t->getStage()->getName()} / {$t->getStage()->getDistance()}"?></td>
        <td><?php echo "{$t->getParticipant()->getTeamNr()}"?></td>
        <td><?php echo "{$t->getParticipant()->getPilotName()} {$t->getParticipant()->getPilotSurname()} / {$t->getParticipant()->getCoPilotName()} {$t->getParticipant()->getCoPilotSurname()}"?></td>
        <td><?php echo "{$t->getDuration()}"?> sek.</td>
    </tr>
    <?php
        $i++;
    }
    ?>
    </tbody>
</table>
</body>
</html>

