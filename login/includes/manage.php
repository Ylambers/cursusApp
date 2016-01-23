<?php
/**
 * Created by PhpStorm.
 * User: Yaron
 * Date: 22-1-2016
 * Time: 22:28
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

if($role == 1){
    $idCursus = $_GET['id'];
    $idUser = $row['id'];

    $error = 0;
    if($error == 0){
        $query = "INSERT INTO cursus_registratie (id_user, id_cursus) VALUES ('$idUser', '$idCursus');";

        if (!mysqli_query($db, $query)) {
            die('Error ' . mysqli_error($db));
        }else{
            header('location: cursus.php');
        }
    }
}

if($role == 2){
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

    $manageId = $_GET['id'];

    $allCursus =  "SELECT * FROM cursus WHERE id='$manageId'";
    $queryCursus = mysqli_query($db, $allCursus);
    $rowQuery = mysqli_fetch_array($queryCursus);

    /* Seperate date to var */
    list($day, $month, $year) = explode("-",  $rowQuery['event_date']);
    $date = $day. '-' .$month .'-'. $year;

    if(isset($_POST['updateCursus'])){
        $month = mysqli_real_escape_string($db, $_POST['month']);
        $day = mysqli_real_escape_string($db, $_POST['day']);
        $year = mysqli_real_escape_string($db, $_POST['year']);

        $event_name = mysqli_real_escape_string($db, $_POST['event_name']);
        $description = mysqli_real_escape_string($db, $_POST['description']);
        $place = mysqli_real_escape_string($db, $_POST['place']);
        $start_time = mysqli_real_escape_string($db, $_POST['start_time']);
        $end_time = mysqli_real_escape_string($db, $_POST['end_time']);
        $places = mysqli_real_escape_string($db, $_POST['places']);

        $error = 0;

        if(strlen($event_name) < 5){$error++; echo 'Graag meer characters invoeren / minimaal 5' . "<br/>" ;}
        if(strlen($description) < 5){$error++; echo 'Graag meer characters invoeren / minimaal 5'. "<br/>" ;}
        if(strlen($place) < 3){$error++; echo 'Graag meer characters invoeren / minimaal 3'. "<br/>";}
        if($start_time > $end_time){$error++; echo 'Graag een geldige datum invoeren'. "<br/>";}
        if($end_time < $start_time){$error++; echo 'Graag een geldige datum invoeren'. "<br/>";}
        if($places > 500){$error++; echo 'Niet meer als 500 plaatsen ingeven' . "<br />";}

        if($error == 0){
            $query = "UPDATE cursus SET event_name = '$event_name', place='$place', start_time= '$start_time', end_time = '$end_time', event_date = '$date', description = '$description', places = '$places' WHERE cursus.id='$manageId' ";
            if (!mysqli_query($db, $query)) {
                die('Error ' . mysqli_error($db));
            }else{
            header("Refresh:0");
            }
        }
    }

    echo '
        <form method="POST" action="" name="updateCursus" role="form" xmlns="http://www.w3.org/1999/html">
            <label>Naam:</label>
            <input type="text" name="event_name" id="name" value="'.$rowQuery['event_name'].'"> </input>

            <label>Beschrijving</label>
            <input type="text" name="description" id="description" value="'.$rowQuery['description'].' "> </input>

            <label>Plaats</label>
            <input type="text" name="place" id="place" value="'.$rowQuery['place'].' " />

            <label>Starttijd</label>
            <select name="start_time" id="start_time">
                <option id="start_time" value="'.$rowQuery['start_time'].'">'.$rowQuery['start_time'].'</option>
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
            <select name="end_time" id="end_time">
                <option id="end_time" value="'.$rowQuery['end_time'].'">'.$rowQuery['end_time'].'</option>
                <option id="end_time" value="00:00">00:00</option>
                <option id="end_time" value="00:30">00:30</option>
                <option id="end_time" value="01:00">01:00</option>
                <option id="end_time" value="01:30">01:30</option>
                <option id="end_time" value="02:00">02:00</option>
                <option id="end_time" value="02:30">02:30</option>
                <option id="end_time" value="03:00">03:00</option>
                <option id="end_time" value="03:30">03:30</option>
                <option id="end_time" value="04:00">04:00</option>
                <option id="end_time" value="04:30">04:30</option>
                <option id="end_time" value="05:00">05:00</option>
                <option id="end_time" value="05:30">05:30</option>
                <option id="end_time" value="06:00">06:00</option>
                <option id="end_time" value="06:30">06:30</option>
                <option id="end_time" value="07:00">07:00</option>
                <option id="end_time" value="07:30">07:30</option>
                <option id="end_time" value="08:00">08:00</option>
                <option id="end_time" value="08:30">08:30</option>
                <option id="end_time" value="09:00">09:00</option>
                <option id="end_time" value="09:30">09:30</option>
                <option id="end_time" value="10:00">10:00</option>
                <option id="end_time" value="10:30">10:30</option>
                <option id="end_time" value="11:00">11:00</option>
                <option id="end_time" value="11:30">11:30</option>
                <option id="end_time" value="12:00">12:00</option>
                <option id="end_time" value="12:30">12:30</option>
                <option id="end_time" value="13:00">13:00</option>
                <option id="end_time" value="13:30">13:30</option>
                <option id="end_time" value="14:00">14:00</option>
                <option id="end_time" value="14:30">14:30</option>
                <option id="end_time" value="15:00">15:00</option>
                <option id="end_time" value="15:30">15:30</option>
                <option id="end_time" value="16:00">16:00</option>
                <option id="end_time" value="16:30">16:30</option>
                <option id="end_time" value="17:00">17:00</option>
                <option id="end_time" value="17:30">17:30</option>
                <option id="end_time" value="18:00">18:00</option>
                <option id="end_time" value="18:30">18:30</option>
                <option id="end_time" value="19:00">19:00</option>
                <option id="end_time" value="19:30">19:30</option>
                <option id="end_time" value="20:00">20:00</option>
                <option id="end_time" value="20:30">20:30</option>
                <option id="end_time" value="21:00">21:00</option>
                <option id="end_time" value="21:30">21:30</option>
                <option id="end_time" value="22:00">22:00</option>
                <option id="end_time" value="22:30">22:30</option>
                <option id="end_time" value="23:00">23:00</option>
                <option id="end_time" value="23:30">23:30</option>
            </select>

            <label>Datum</label>
            <select name="month">
                <option name="month" value="'.$month.'">'.$month.'</option>
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
                <option name="1" value="'.$day.'">'.$day.'</option>
                <option name="1" value="1">1</option>
                <option name="2" value="2">2</option>
                <option name="3" value="3">3</option>
                <option name="4" value="4">4</option>
                <option name="5" value="5">5</option>
                <option name="6" value="6">6</option>
                <option name="7" value="7">7</option>
                <option name="8" value="8">8</option>
                <option name="9" value="9">9</option>
                <option name="10" value="10">10</option>
                <option name="11" value="11">11</option>
                <option name="12" value="12">12</option>
                <option name="13" value="13">13</option>
                <option name="14" value="14">14</option>
                <option name="15" value="15">15</option>
                <option name="16" value="16">16</option>
                <option name="17" value="17">17</option>
                <option name="18" value="18">18</option>
                <option name="19" value="19">19</option>
                <option name="20" value="20">20</option>
                <option name="21" value="21">21</option>
                <option name="22" value="22">22</option>
                <option name="23" value="23">23</option>
                <option name="24" value="24">24</option>
                <option name="25" value="25">25</option>
                <option name="26" value="26">26</option>
                <option name="27" value="27">27</option>
                <option name="28" value="28">28</option>
                <option name="29" value="29">29</option>
                <option name="30" value="30">30</option>
                <option name="31" value="31">31</option>
            </select>

            <select name="year">
                <option name="year" value="'.$year.'">'.$year.'</option>
                <option name="year" value="2016">2016</option>
                <option name="year" value="2016">2017</option>
                <option name="year" value="2016">2018</option>
                <option name="year" value="2016">2019</option>
            </select>

            <label>Aantal plekken</label>
            <input type="number" name="places" min="1" max="500" value="'.$rowQuery['places'].'"/>

            <input type="submit" name="updateCursus" value="Aanmaken"/>
        </form>

    ';


}
