    </main>

    <footer class="site-footer">
        <div class="container">
            <p>
                © <?php echo date('Y'); ?> <?php bloginfo('name'); ?> —
                Un espace inclusif pour les personnes LGBTQIA+ et allié·e·s.
            </p>
        </div>
    </footer>
</div><!-- .site -->

<script>
document.addEventListener("DOMContentLoaded", function() {
    const toggle = document.querySelector(".nav-toggle");
    const header = document.querySelector(".site-header");

    if (!toggle || !header) return;

    toggle.addEventListener("click", () => {
        const isOpen = header.classList.toggle("nav-open");
        toggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
    });
});
</script>

<?php wp_footer(); ?>
</body>
</html>
