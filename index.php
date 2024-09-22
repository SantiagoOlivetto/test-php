
<?php
    const API_URL = "https://whenisthenextmcufilm.com/api";
    # New cURL session;  ch = cURL handle
    $ch = curl_init(API_URL);
    // We want to recive the result of the petition but not show it straight on screen
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    /* Execute the petition and save the result */
    $result = curl_exec($ch);
    $data = json_decode($result, true);

    curl_close($ch);
?>

<head>
    <title>Next Marvel Movie</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    >
</head>

<main>
    <section>
        <h2>The next marvel movie</h2>
        <img 
        src=<?= $data["poster_url"] ?> width="300" alt="Poster"
        style="border-radius: 16px;"
        />
    </section>
    <hgroup>
        <h2><?= $data["title"]?> in <?=$data["days_until"]?> days</h2>
        <p>Release date: <?= $data["release_date"] ?></p>
        <p>Next movie: <?= $data["following_production"]["title"] ?></p>

    </hgroup>
</main>


<style>
    :root{
        color-scheme: light dark;
    }
    body{
        display: grid;
        place-content: center;
    }
</style>