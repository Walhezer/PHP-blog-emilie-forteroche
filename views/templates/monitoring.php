<h2>Monitoring des Articles</h2>

<?php
$columns = [
    'title' => 'Titre',
    'date_creation' => 'Date de publication',
    'views' => 'Nombre de vues',
    'nb_comments' => 'Nombre de commentaires'
];
?>

<div class="adminComments">
    <table>
        <thead>
            <tr>
                <?php foreach ($columns as $col => $label): ?>
                    <th>
                        <a
                            href="index.php?action=monitoring&sort=<?= $col ?>&order=<?= ($sort === $col && $order === 'ASC') ? 'DESC' : 'ASC' ?>">
                            <?= $label ?>
                            <?php if ($sort === $col)
                                echo $order === 'ASC' ? ' ↑' : ' ↓'; ?>
                        </a>
                    </th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articlesWithStats as $article): ?>
                <tr>
                    <td><?= htmlspecialchars($article['title']) ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($article['date_creation'])) ?></td>
                    <td><?= (int) $article['views'] ?></td>
                    <td><?= (int) $article['nb_comments'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<nav class="adminButtons">
    <a class="submit" href="http://localhost/PHP-blog-emilie-forteroche/index.php?action=adminComments">Gestion des
        commentaires</a>
    <a class="submit" href="http://localhost/PHP-blog-emilie-forteroche/index.php?action=monitoring">Monitoring</a>
    <a class="submit" href="index.php?action=admin">Retour à l'administration</a>
</nav>