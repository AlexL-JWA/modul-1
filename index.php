<?php
/**
 * Index file.
 */

require_once __DIR__ . '/module_1.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Module - 1</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Index file</h1>
            <h2>Call function getLocalTime()</h2>
            <div>
                <ul>
                    <?php
                    $data = getLocalTime();

                    if (!empty($data)) {
                        foreach ($data as $key => $item) {
                            ?>
                            <li><b><?php echo $key; ?>:</b> <?php echo $item; ?></li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>
            <h2>call function factorialWithCache()</h2>
            <div>
                <p>
                    <?php
                    echo 'Factorial: ' . find_csv_file(5);
                    ?>
                </p>
            </div>
            <h2>call function reverse()</h2>
            <div><p>
                    <?php
                    $string = 'WorldTimeAPI is a simple web service which returns the current local time for a given timezone as either plain-text or JSON';
                    echo reverse($string); ?>
                </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
