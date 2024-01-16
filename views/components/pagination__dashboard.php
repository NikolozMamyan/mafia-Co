
<div class="pagination__dashboard mt-5 d-flex justify-content-center">
    <?php
    // Calcule le nombre total de pages
    $sql = "SELECT COUNT(*) as total FROM utilisateurs";
    $result = $db->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $totalPages = ceil($row['total'] / $itemsPerPage);

    // Affiche les liens de pagination
    for ($i = 1; $i <= $totalPages; $i++) {
        echo "<a href='?page=$i'>$i</a> ";
    }
    ?>
</div>