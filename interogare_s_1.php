<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Proiect</title>
        <link rel="stylesheet" href="style.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>

    <body>
        <div class="wrapper">
            <form action="interogare_s_12.php" method="get">
                <h1>Interogarea 1</h1>
                <h2>Se selecteaza data si se afiseaza toate animalele care au programare in acea data</h2>
                <div class="input-box">
                    <input type="datetime-local" name="datain" placeholder="Data" required>
                </div>
                <button type="submit" class="btn" name="submit">Cauta</button>
            </form>
        </div>

    </body>
</html>