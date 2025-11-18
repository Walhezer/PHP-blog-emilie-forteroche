<h2>Gestion des commentaires</h2>

<?php if (empty($comments)): ?>
    <p>Aucun commentaire à afficher.</p>
<?php else: ?>
    <div class="adminComments">
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
            <tr>
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
    </div>
<?php endif; ?>

<?php if (isset($totalPages) && $totalPages > 1): ?>
    <nav class="pagination">

        <!-- Lien PRECEDENT -->
        <?php if ($currentPage > 1): ?>
            <a href="index.php?action=adminComments&page=<?= $currentPage - 1 ?>">« Précédent</a>
        <?php endif; ?>

        <!-- Liens 1, 2, 3, ... -->
        <?php for ($page = 1; $page <= $totalPages; $page++): ?>
            <?php if ($page == $currentPage): ?>
                <span class="current-page"><?= $page ?></span>
            <?php else: ?>
                <a href="index.php?action=adminComments&page=<?= $page ?>"><?= $page ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <!-- Lien SUIVANT -->
        <?php if ($currentPage < $totalPages): ?>
            <a href="index.php?action=adminComments&page=<?= $currentPage + 1 ?>">Suivant »</a>
        <?php endif; ?>

    </nav>
<?php endif; ?>

<nav class="adminButtons">
    <a class="submit" href="http://localhost/PHP-blog-emilie-forteroche/index.php?action=adminComments">Gestion des
        commentaires</a>
    <a class="submit" href="http://localhost/PHP-blog-emilie-forteroche/index.php?action=monitoring">Monitoring</a>
    <a class="submit" href="index.php?action=admin">Retour à l'administration</a>
</nav>