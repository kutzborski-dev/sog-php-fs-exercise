<ul>
    <?php
        foreach($forests as $forest) {
    ?>
        <li><a href="?page=forest&forest=<?= strToSlug($forest->getName()) ?>"><?= $forest->getName() ?></a></li>
    <?php
        }
    ?>
</ul>