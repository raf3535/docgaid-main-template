<div class="google_review">
    <div class="stars">
        <img src="<?= CHILD_URL ?>/assets/app/svg/google.svg" alt="google icon" class="google-icon">
        <?php
        echo "<div class='stars'>";
        $index = 100;
        for ($i = 0; $i < 5; $i++) {
            echo do_shortcode('[icon name="star" class="star"]');
            $index += 100;
        }
        echo "</div>";
        ?>
    </div>
    <p class="text">Client Rated 5-Star Law Firm</p>
</div>