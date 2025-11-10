<h1>Monitoring des Articles</h1>

<table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Date de publication</th>
            <th>Nombre de vues</th>
            <th>Nombre de commentaires</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articlesWithStats as $article): ?>
        <tr>
            <td><?=htmlspecialchars($article['title']) ?></td>
            <td><?= date('d/m/Y H:i', strtotime($article['date_creation'])) ?></td>
            <td><?= htmlspecialchars($article['views']) ?></td>
            <td><?= htmlspecialchars($article['nb_comments']) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php?action=admin">Retour à l'adminisatration</a>

