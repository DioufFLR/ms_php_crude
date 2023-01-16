<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout disc</title>
</head>
<body>
<h1>Ajouter un vinyle</h1>

    <button><a href="discs.php">Revenir aux discs</a></button>

    <form action="script_disc_ajout.php" method="post">

        <label for="name">Title</label><br>
        <input type="text" name="name" id="name" >
        <br>
        <label for="artist">Artist</label><br>
        <input type="text" name="artist" id="artist" >
        <br>
        <label for="year">Year</label><br>
        <input type="text" name="year" id="year" >
        <br>
        <label for="genre">Genre</label><br>
        <input type="text" name="genre" id="genre" >
        <br>
        <label for="label">Label</label><br>
        <input type="text" name="label" id="label" >
        <br>
        <label for="price">Price</label><br>
        <input type="text" name="price" id="price" >
        <br>
        <label for="file">Picture</label><br>
        <input type="file" name="file">

        <input type="submit">
    </form>

</body>
</html>