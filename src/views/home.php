<?php
    view('partials/header');
?>

<h2>Index of forest that had fires, from newest to oldest</h2>

<?php
    view('forest/partials/list', ['forests' => $forests]);

    view('partials/footer');