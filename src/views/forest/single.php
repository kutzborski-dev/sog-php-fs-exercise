<?php
    view('partials/header');
?>

<a href="?page=home">< Back</a>

<h2>Forest details</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Forest</th>
        <td><?= $forest->getName() ?></td>
    </tr>
    <tr>
        <th>State</th>
        <td><?= $forest->getState() ?></td>
    </tr>
</table>

<h2>Wildfire details</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>FPA ID</th>
        <th>Fire name</th>
        <th>Fire code</th>
        <th>Discovery date</th>
        <th>Cause</th>
    </tr>
    <?php
        foreach($forest->getFires() as $fire) {
    ?>
        <tr>
            <td><?= $fire->getFpaId() ?></td>
            <td><?= $fire->getName() ?></td>
            <td><?= $fire->getCode() ?></td>
            <td><?= $fire->getDiscoveryDate() ?></td>
            <td><?= $fire->getCause() ?></td>
        </tr>
    <?php
        }
    ?>
</table>

<?php
    view('partials/footer');