<nav>
    <ul>
        <li><a href="/index.php">Accueil</a></li>
        <?php if (!empty(Auth::getCurrentUser())): ?>
            <li><a href="/home.php">Dashboard</a></li>
            <li><a href="/notes.php">Mes notes</a></li>
            <li><a href="/products.php">Les produits</a></li>
            <li>
                <form action="/handlers/auth-handler.php" method="POST" id="logoutForm">
                    <input name="action" value="logout" hidden>
                    <a href="javascript:void(0);" onclick="document.getElementById('logoutForm').submit();">Se déconnecter</a>
                </form>
            </li>
        <?php else: ?>
            <li><a href="/login.php">Se connecter</a></li>
            <li><a href="/register.php">S'inscrire</a></li>
        <?php endif; ?>
    </ul>
</nav>