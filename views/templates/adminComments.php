<h1>Gestion des commentaires</h1>

<?php if (empty($comments)): ?>
    <p>Aucun commentaire à afficher.</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Auteur</th>
                <th>Contenu</th>
                <th>Date</th>
                <th>Article</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comments as $index => $comment): ?>
            <tr style="background-color: <?= $index % 2 === 0 ? '#f8f8f8' : '#ffffff' ?>;">
                <td><?= htmlspecialchars($comment['pseudo']) ?></td>
                <td><?= htmlspecialchars(substr($comment['content'], 0, 50)) ?>...</td>
                <td><?= date('d/m/Y H:i', strtotime($comment['date_creation'])) ?></td>
                <td><?= htmlspecialchars($comment['title']) ?></td>
                <td>
                    <a href="index.php?action=deleteComment&id=<?= $comment['id'] ?>"
                       onclick="return confirm('Confirmer la suppression de ce commentaire ?');">
                       Supprimer
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<p><a href="index.php?action=admin">Retour à l'administration</a></p>
