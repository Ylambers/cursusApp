<?php
/**
 * Created by PhpStorm.
 * User: Yaron
 * Date: 21-1-2016
 * Time: 19:37
 */
include_once('database.php');

session_start();

$email = $_SESSION['email'];
$user_email = "SELECT * FROM user WHERE email LIKE '%$email%'";
$result = mysqli_query($db, $user_email);
$row = mysqli_fetch_assoc($result);
$userName = $row['firstname'] ." ". $row['lastname']. "<br/>";
$role = $row['user_level'];
$id = $row['id'];
if(!empty($_SESSION['email'])){
    echo '<div class="menubar">';
    echo "<h2>"."Welkom ". $userName."</h2>"."<br/>";
    if($role == 2){
        echo '<a href="cursus.php"> curus aanmaken / aanpassen </a> ';
    }else{
        echo '<a href="user.php">Gegevens bewerken </a> ';
    }
    echo '<a href="logout.php">Uitloggen </a> ';
    echo '</div>';
}else{
    header('location: ../index.php');
}


if ($role == 2){


    if(isset($_POST['cursus'])){

        /* Date */
        $month = mysqli_real_escape_string($db, $_POST['month']);
        $day = mysqli_real_escape_string($db, $_POST['day']);
        $year = mysqli_real_escape_string($db, $_POST['year']);
        $date = $day ." " .$month ." ".$year;

        $name = mysqli_real_escape_string($db, $_POST['name']);
        $description = mysqli_real_escape_string($db, $_POST['description']);
        $place = mysqli_real_escape_string($db, $_POST['place']);
        $start_time = mysqli_real_escape_string($db, $_POST['start_time']);
        $end_time = mysqli_real_escape_string($db, $_POST['end_time']);

        $error = 0;

//        if(strlen($name < 5)){$error++; echo 'graag een langere naam in vullen';}
//        if(strlen($description < 5)){$error++; echo 'graag een langere beschrijving in vullen';}
//        if(strlen($place < 3)){$error++; echo 'graag een langere plaatsnaam in vullen';}
//        if(strlen($end_time < $start_time)){$error++; echo 'Graag een correcte tijd invoeren';}

        if($error == 0){
//            $query = "INSERT INTO curcus SET name='$name', description='$description', place='$place', start_time='$start_time', end_time='$end_time', date='$date' ";
            $query = "INSERT INTO cursus (event_name, description, place, start_time, end_time, event_date ) VALUES ($description, $name,$place, $start_time, $end_time, $date)";

            if (!mysqli_query($db, $query)) {
                die('Error ' . mysqli_error($db));
            }else{
                header("Refresh:0");
            }
        }

    }

    echo '
        <form method="POST" action="" role="form" xmlns="http://www.w3.org/1999/html">
            <label>Naam:</label>
            <input type="text" name="name" id="name" />

            <label>Beschrijving</label>
            <input type="text" name="description" id="description" />

            <label>Plaats</label>
            <input type="text" name="place" id="place" />

            <label>Starttijd</label>
            <select name="start_time" id="start_time">
                <option id="start_time" value="00:00">00:00</option>
                <option id="start_time" value="00:30">00:30</option>
                <option id="start_time" value="01:00">01:00</option>
                <option id="start_time" value="01:30">01:30</option>
                <option id="start_time" value="02:00">02:00</option>
                <option id="start_time" value="02:30">02:30</option>
                <option id="start_time" value="03:00">03:00</option>
                <option id="start_time" value="03:30">03:30</option>
                <option id="start_time" value="04:00">04:00</option>
                <option id="start_time" value="04:30">04:30</option>
                <option id="start_time" value="05:00">05:00</option>
                <option id="start_time" value="05:30">05:30</option>
                <option id="start_time" value="06:00">06:00</option>
                <option id="start_time" value="06:30">06:30</option>
                <option id="start_time" value="07:00">07:00</option>
                <option id="start_time" value="07:30">07:30</option>
                <option id="start_time" value="08:00">08:00</option>
                <option id="start_time" value="08:30">08:30</option>
                <option id="start_time" value="09:00">09:00</option>
                <option id="start_time" value="09:30">09:30</option>
                <option id="start_time" value="10:00">10:00</option>
                <option id="start_time" value="10:30">10:30</option>
                <option id="start_time" value="11:00">11:00</option>
                <option id="start_time" value="11:30">11:30</option>
                <option id="start_time" value="12:00">12:00</option>
                <option id="start_time" value="12:30">12:30</option>
                <option id="start_time" value="13:00">13:00</option>
                <option id="start_time" value="13:30">13:30</option>
                <option id="start_time" value="14:00">14:00</option>
                <option id="start_time" value="14:30">14:30</option>
                <option id="start_time" value="15:00">15:00</option>
                <option id="start_time" value="15:30">15:30</option>
                <option id="start_time" value="16:00">16:00</option>
                <option id="start_time" value="16:30">16:30</option>
                <option id="start_time" value="17:00">17:00</option>
                <option id="start_time" value="17:30">17:30</option>
                <option id="start_time" value="18:00">18:00</option>
                <option id="start_time" value="18:30">18:30</option>
                <option id="start_time" value="19:00">19:00</option>
                <option id="start_time" value="19:30">19:30</option>
                <option id="start_time" value="20:00">20:00</option>
                <option id="start_time" value="20:30">20:30</option>
                <option id="start_time" value="21:00">21:00</option>
                <option id="start_time" value="21:30">21:30</option>
                <option id="start_time" value="22:00">22:00</option>
                <option id="start_time" value="22:30">22:30</option>
                <option id="start_time" value="23:00">23:00</option>
                <option id="start_time" value="23:30">23:30</option>
            </select>

            <label>Eindtijd</label>
            <select name="end_time" id="start_time">
                <option id="start_time" value="00:00">00:00</option>
                <option id="start_time" value="00:30">00:30</option>
                <option id="start_time" value="01:00">01:00</option>
                <option id="start_time" value="01:30">01:30</option>
                <option id="start_time" value="02:00">02:00</option>
                <option id="start_time" value="02:30">02:30</option>
                <option id="start_time" value="03:00">03:00</option>
                <option id="start_time" value="03:30">03:30</option>
                <option id="start_time" value="04:00">04:00</option>
                <option id="start_time" value="04:30">04:30</option>
                <option id="start_time" value="05:00">05:00</option>
                <option id="start_time" value="05:30">05:30</option>
                <option id="start_time" value="06:00">06:00</option>
                <option id="start_time" value="06:30">06:30</option>
                <option id="start_time" value="07:00">07:00</option>
                <option id="start_time" value="07:30">07:30</option>
                <option id="start_time" value="08:00">08:00</option>
                <option id="start_time" value="08:30">08:30</option>
                <option id="start_time" value="09:00">09:00</option>
                <option id="start_time" value="09:30">09:30</option>
                <option id="start_time" value="10:00">10:00</option>
                <option id="start_time" value="10:30">10:30</option>
                <option id="start_time" value="11:00">11:00</option>
                <option id="start_time" value="11:30">11:30</option>
                <option id="start_time" value="12:00">12:00</option>
                <option id="start_time" value="12:30">12:30</option>
                <option id="start_time" value="13:00">13:00</option>
                <option id="start_time" value="13:30">13:30</option>
                <option id="start_time" value="14:00">14:00</option>
                <option id="start_time" value="14:30">14:30</option>
                <option id="start_time" value="15:00">15:00</option>
                <option id="start_time" value="15:30">15:30</option>
                <option id="start_time" value="16:00">16:00</option>
                <option id="start_time" value="16:30">16:30</option>
                <option id="start_time" value="17:00">17:00</option>
                <option id="start_time" value="17:30">17:30</option>
                <option id="start_time" value="18:00">18:00</option>
                <option id="start_time" value="18:30">18:30</option>
                <option id="start_time" value="19:00">19:00</option>
                <option id="start_time" value="19:30">19:30</option>
                <option id="start_time" value="20:00">20:00</option>
                <option id="start_time" value="20:30">20:30</option>
                <option id="start_time" value="21:00">21:00</option>
                <option id="start_time" value="21:30">21:30</option>
                <option id="start_time" value="22:00">22:00</option>
                <option id="start_time" value="22:30">22:30</option>
                <option id="start_time" value="23:00">23:00</option>
                <option id="start_time" value="23:30">23:30</option>
            </select>

            <label>Datum</label>
            <select name="month">
                <option name="month" value="januari">januari</option>
                <option name="month" value="februari">februari</option>
                <option name="month" value="maart">maart</option>
                <option name="month" value="april">april</option>
                <option name="month" value="mei">mei</option>
                <option name="month" value="juni">juni</option>
                <option name="month" value="juli">juli</option>
                <option name="month" value="augustus">augustus</option>
                <option name="month" value="september">september</option>
                <option name="month" value="oktober">oktober</option>
                <option name="month" value="november">november</option>
                <option name="month" value="december">december</option>
            </select>

            <select name="day">
                <option name="1" value="1">1</option>
                <option name="2" value="1">1</option>
                <option name="3" value="1">1</option>
                <option name="4" value="1">1</option>
                <option name="5" value="1">1</option>
                <option name="6" value="1">1</option>
                <option name="7" value="1">1</option>
                <option name="8" value="1">1</option>
                <option name="9" value="1">1</option>
                <option name="10" value="1">1</option>
                <option name="11" value="1">1</option>
                <option name="12" value="1">1</option>
                <option name="13" value="1">1</option>
                <option name="14" value="1">1</option>
                <option name="15" value="1">1</option>
                <option name="16" value="1">1</option>
                <option name="17" value="1">1</option>
                <option name="18" value="1">1</option>
                <option name="19" value="1">1</option>
                <option name="20" value="1">1</option>
                <option name="21" value="1">1</option>
                <option name="22" value="1">1</option>
                <option name="23" value="1">1</option>
                <option name="24" value="1">1</option>
                <option name="25" value="1">1</option>
                <option name="26" value="1">1</option>
                <option name="27" value="1">1</option>
                <option name="28" value="1">1</option>
                <option name="29" value="1">1</option>
                <option name="30" value="1">1</option>
                <option name="31" value="1">1</option>
            </select>

            <select name="year">
                <option name="year" value="2016">2016</option>
                <option name="year" value="2016">2017</option>
                <option name="year" value="2016">2018</option>
                <option name="year" value="2016">2019</option>
            </select>

            <input type="submit" name="cursus" value="Aanmaken"/>
        </form>
    ';
}