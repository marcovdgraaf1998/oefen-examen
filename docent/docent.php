<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Welkom, <?=$first_name?></h1>
        <p class="text-center">Bekijk hier alle formulieren</p>
        <div class="text-center mt-4 mb-4">
            <a class="text-center btn btn-danger" href="includes/logout.php">Uitloggen</a>
        </div>
    <table class="table" cellspacing="0">
        <tr>
            <th>Studentnummer</th>
            <th>Klas</th>
            <th>Naam</th>
            <th>Adres</th>
            <th>Leeftijd</th>
            <th>Afstand GLR</th>
            <th>Reistijd GLR</th>
            <th>Begintijd</th>
            <th>Eindtijd</th>
            <th>Opmerkingen</th>
        </tr>
        <tbody id="table">
            <?php while($row = mysqli_fetch_array($result)) : ?>
                <?php if($row['user_level'] == 1 && $row['filled_in'] == 1) : ?>
                    <tr>
                        <td><?= $row['student_number'];?></td>
                        <td><?= $row['class'];?></td>
                        <td><?= $row['first_name'] . ' ' . $row['last_name'];?></td>
                        <td><?= $row['address'] . ' ' . $row['zipcode'] . ' ' . $row['residence'] ;?></td>
                        <td><?= $row['age']?></td>
                        <td><?= $row['distance'];?></td>
                        <td><?= $row['travel_time'];?></td>
                        <td><?= $row['start_time'];?></td>
                        <td><?= $row['end_time'];?></td>
                        <td><?= $row['comment'];?></td>
                    </tr>
                <?php endif ?>
            <?php endwhile ?>
        </tbody>
    </table>
    </div>
</body>
</html>