<!-- home.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Home Page</title>
</head>

<body>
    <form action="addAlliment" method="POST">
        <div class="input-group">
            <span class="input-group-text">nom de l'alliment</span>
            <input type="text" aria-label="First name" class="form-control" name="name" placeholder="nom de l'alliment" autocomplete="off">
            <input type="text"aria-label="First name" class="form-control" name="quantity" placeholder="quantitée" autocomplete="off">
            <button type="submit" class="btn btn-outline-secondary">ajouter</button>
        </div>
    </form>
    <h2>Liste des aliments :</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">nom</th>
                <th scope="col">quantité</th>
                <th scope="col">date d'ajout</th>
                <th scope="col">suprimer</th>
                <th scope="col">ajouter +1</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alliments as $alliment) : ?>
                <tr>
                    <th scope="row"><?= $alliment['id'] ?></th>
                    <td><?= $alliment['name'] ?></td>
                    <td><?= $alliment['quantity'] ?></td>
                    <td><?= $alliment['date'] ?></td>
                    <td>
                     <a href="delete/<?= $alliment['id'] ?>" class="btn btn-danger">suprimer -1</a>
                    </td>
                    <td>
                        <a href="add/<?= $alliment['id'] ?>" class="btn btn-success">ajouter +1</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>