<!DOCTYPE html>
<html lang="lv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="index.php" method="post">
        <label>Ievadi <b>pirmo</b> dienas uzdevumu:</label>
        <input type="text" name="issue_1"><br>
        <label>Izpildes laiks (minūtēs):</label>
        <input type="text" name="time_1"><br><br>
        <label>Ievadi <b>otro</b> dienas uzdevumu:</label>
        <input type="text" name="issue_2"><br>
        <label>Izpildes laiks (minūtēs):</label>
        <input type="text" name="time_2"><br><br>
        <label>Ievadi <b>trešo</b> dienas uzdevumu:</label>
        <input type="text" name="issue_3"><br>
        <label>Izpildes laiks (minūtēs):</label>
        <input type="text" name="time_3"><br><br>
        <input type="submit" name="" value="Iesniegt">
    </form>

</body>

</html>

<?php

$time = new DateTimeImmutable(date("H:i"));

$issues = array($_POST["issue_1"], $_POST["issue_2"], $_POST["issue_3"]);

$minutes = array($_POST["time_1"], $_POST["time_2"], $_POST["time_3"]);

for ($i = 0; $i < 3; $i++) {

    if (is_numeric($minutes[$i])) {

        $endTime = $time->add(new DateInterval('PT' . $minutes[$i] . 'M'));
        $final = $endTime->format('H:i');

        echo "Uzdevums \"" . $issues[$i] . "\" jāizpilda līdz pulkstens " . $final . " .<br>";
    } else {
        echo "Kļūda! Jāaizpilda lauciņi korekti!";
        break;
    }
}

?>