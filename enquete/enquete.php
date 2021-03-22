<?php
    require_once '../includes/config.php';
    require_once '../includes/session.php';

    # Haal sessie waardes binnen
    $id = $_SESSION['id'];
    $email = $_SESSION['email'];
    $user_level = $_SESSION['user_level'];
    $first_name = $_SESSION['first_name'];
    $filled_in = $_SESSION['filled_in'];

    # Verkrijg waarden van form van user
    if (is_numeric($id)) {
        $queryEdit = mysqli_query($mysqli, "SELECT * FROM oefenexamen_enquetes WHERE id = $id");
    
        if (mysqli_num_rows($queryEdit) == 1) {
            $rowEdit = mysqli_fetch_array($queryEdit);
        } else {
            return;
        }
    } else {
        echo "Er is iets misgegaan, onjuist ID";
        exit;
    }

    $result = mysqli_query($mysqli, "SELECT * FROM oefenexamen_enquetes ORDER BY last_name");

    # Check of form is verstuurd of fout
    if (isset($_GET['enquete'])) {
        $enqueteCheck = $_GET['enquete'];

        if ($enqueteCheck == 'success') {
            echo '<div class="alert alert-success text-center" role="alert">Uw formulier is verstuurd! U kunt nu uitloggen.</div>';
        } else if ($enqueteCheck == 'failed') {
            echo '<div class="alert alert-error text-center" role="alert">Er is een fout opgetreden.</div>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulier</title>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css'/>
    </head>
    <body>
        <?php if($filled_in == 0) : ?>
            <div class="container">
                <div class="student">
                    <div class="text-center mt-4">
                        <a class="text-center btn btn-danger" href="../includes/logout.php">Uitloggen</a>
                    </div>
                    <h3 class="text-center mt-4">Hallo, <?=$first_name?></h3>
                    <h1 class="text-center mb-5">Enquete Grafisch Lyceum Rotterdam</h1>
                    <form action="../process/form.php" method="post">
                        <input type="hidden" name="id" value="<?=$id;?>">
                        <div class="row mb-4">
                            <div class="col">
                                <label for="distance">Hoeveel kilometer woon je van het GLR? (in km)</label>
                                <input type="number" class="form-control" id="distance" name="distance" required>
                            </div>
                            <div class="col">
                                <label for="travel-time">Hoe lang doe je er over om van huis naar GLR te reizen? (in min)</label>
                                <input type="number" class="form-control" id="travel-time" name="travel-time" required>
                            </div>
                        </div>
                    <div class="row mb-4">
                        <div class="col">
                            <label for="transport">Welk(e) vervoermiddel(len) gebruik je om naar het GLR te reizen?</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="train" name="transport[]" value="Trein">
                                <label class="form-check-label" for="train">Trein</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="tram" name="transport[]" value="Tram">
                                <label class="form-check-label" for="tram">Tram</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="metro" name="transport[]" value="Metro">
                                <label class="form-check-label" for="metro">Metro</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="bus" name="transport[]" value="Bus">
                                <label class="form-check-label" for="bus">Bus</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="car" name="transport[]" value="Auto">
                                <label class="form-check-label" for="car">Auto</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="walking" name="transport[]" value="Lopend">
                                <label class="form-check-label" for="walking">Lopend</label>
                            </div>
                        </div>
                    </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="start-time">Wat vind je van de begintijd van de lessen (8:15 uur)?</label>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="too-early" name="start-time" value="Te vroeg">
                                    <label class="form-check-label" for="too-early">Te vroeg</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="good" name="start-time" value="Goed">
                                    <label class="form-check-label" for="good">Goed</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="too-late" name="start-time" value="Te laat">
                                    <label class="form-check-label" for="too-late">Te laat</label>
                                </div>
                            </div>
                            <div class="col">
                                <label for="end-time">Wat vind je van de eindtijd van de lessen (17:15 uur)?</label>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="too-early" name="end-time" value="Te vroeg">
                                    <label class="form-check-label" for="too-early">Te vroeg</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="good" name="end-time" value="Goed">
                                    <label class="form-check-label" for="good">Goed</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="too-late" name="end-time" value="Te laat">
                                    <label class="form-check-label" for="too-late">Te laat</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <label for="comment">Heb je verder nog opmerkingen over het reizen naar het GLR?</label>
                                <textarea class="form-control" id="comment" name="comment"></textarea>
                            </div>
                        </div>
                    <input type="submit" class="btn btn-primary float-right" id="submit" name="submit" value="Verzenden">
                </form>
            </div>
        </div>
        <?php elseif ($filled_in == 1) :  ?>
            <?php while($row = mysqli_fetch_array($result)) : ?>
                <?php if($row['email'] == $email) : ?>
                    <div class="alert alert-primary text-center" role="alert">Dit zijn uw ingevulde gegevens</div>
                    <div class="text-center mt-4">
                        <a class="text-center btn btn-danger" href="../includes/logout.php">Uitloggen</a>
                    </div>
                    <div class="container">
                        <h3 class="text-center mt-4">Hallo, <?=$first_name;?></h3>
                        <h1 class="text-center mb-5">Enquete Grafisch Lyceum Rotterdam</h1>
                        <form action="../process/form.php" method="post">
                            <input type="hidden" name="id" value="<?=$id;?>">
                            <div class="row mb-4">
                                <div class="col">
                                    <label for="distance">Hoeveel kilometer woon je van het GLR?</label>
                                    <input type="text" class="form-control" id="distance" name="distance" value="<?=$rowEdit['distance']?>">
                                </div>
                                <div class="col">
                                    <label for="travel-time">Hoe lang doe je er over om van huis naar GLR te reizen?</label>
                                    <input type="text" class="form-control" id="travel-time" name="travel-time" value="<?=$rowEdit['travel_time']?>">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <label for="transport">Welk(e) vervoermiddel(len) gebruik je om naar het GLR te reizen?</label>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="train" name="transport[]" <?php if (strpos($rowEdit['transport'], 'Trein') !== false) echo 'checked="checked"'; ?> value="Trein">
                                        <label class="form-check-label" for="train">Trein</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="tram" name="transport[]" <?php if (strpos($rowEdit['transport'], 'Tram') !== false) echo 'checked="checked"'; ?> value="Tram">
                                        <label class="form-check-label" for="tram">Tram</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="metro" name="transport[]" <?php if (strpos($rowEdit['transport'], 'Metro') !== false) echo 'checked="checked"'; ?> value="Metro">
                                        <label class="form-check-label" for="metro">Metro</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="bus" name="transport[]" <?php if (strpos($rowEdit['transport'], 'Bus') !== false) echo 'checked="checked"'; ?> value="Bus">
                                        <label class="form-check-label" for="bus">Bus</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="car" name="transport[]" <?php if (strpos($rowEdit['transport'], 'Auto') !== false) echo 'checked="checked"'; ?> value="Auto">
                                        <label class="form-check-label" for="car">Auto</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="walking" name="transport[]" <?php if (strpos($rowEdit['transport'], 'Lopend') !== false) echo 'checked="checked"'; ?> value="Lopend">
                                        <label class="form-check-label" for="walking">Lopend</label>
                                    </div>
                                </div>
                            </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="start-time">Wat vind je van de begintijd van de lessen (8:15 uur)?</label>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="too-early" name="start-time" value="Te vroeg" <?php if ($rowEdit['start_time'] == 'Te vroeg') echo 'checked="checked"'?>>
                                            <label class="form-check-label" for="too-early">Te vroeg</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="good" name="start-time" value="Goed" <?php if ($rowEdit['start_time'] == 'Goed') echo 'checked="checked"'?>>
                                            <label class="form-check-label" for="good">Goed</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="too-late" name="start-time" value="Te laat" <?php if ($rowEdit['start_time'] == 'Te laat') echo 'checked="checked"'?>>
                                            <label class="form-check-label" for="too-late">Te laat</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="end-time">Wat vind je van de eindtijd van de lessen (17:15 uur)?</label>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="too-early" name="end-time" value="Te vroeg" <?php if ($rowEdit['end_time'] == 'Te vroeg') echo 'checked="checked"'?>>
                                            <label class="form-check-label" for="too-early">Te vroeg</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="good" name="end-time" value="Goed" <?php if ($rowEdit['end_time'] == 'Goed') echo 'checked="checked"'?>>
                                            <label class="form-check-label" for="good">Goed</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="too-late" name="end-time" value="Te laat" <?php if ($rowEdit['end_time'] == 'Te laat') echo 'checked="checked"'?>>
                                            <label class="form-check-label" for="too-late">Te laat</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="comment">Heb je verder nog opmerkingen over het reizen naar het GLR?</label>
                                        <textarea class="form-control" id="comment" name="comment"><?php echo $rowEdit['comment'] ;?></textarea>
                                    </div>
                                </div>
                            <input type="submit" class="btn btn-warning float-right" name="submit" id="submit" value="Aanpassen">
                        </form>
                    </div>
                <?php endif ?>
            <?php endwhile ?>
        <?php endif ?>
    </body>
</html>