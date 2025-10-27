    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="text-uppercase">LBS Events</h5>
                    <p class="text-muted">Plateforme de gestion d'événements de Lomé Business School</p>
                </div>
                <div class="col-md-4">
                    <h5 class="text-uppercase">Liens utiles</h5>
                    <ul class="list-unstyled">
                        <li><a href="/public/pages/en-savoir-plus.php" class="text-white-50">En savoir plus</a></li>
                        <li><a href="/public/pages/partenaires.php" class="text-white-50">Partenaires</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="text-uppercase">Contact</h5>
                    <p class="text-muted">© <?php echo date('Y'); ?> LBS Event. Tous droits réservés.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" 
            crossorigin="anonymous"></script>
    
    <!-- Custom JS -->
    <script src="<?php echo js_url('main.js'); ?>"></script>
    
    <?php if (isset($additionalJS)): ?>
        <?php foreach ($additionalJS as $js): ?>
            <script src="<?php echo $js; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>

