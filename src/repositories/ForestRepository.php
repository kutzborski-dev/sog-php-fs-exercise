<?php

namespace App\Repositories;

use App\Core\Database;
use App\Models\Forest;

class ForestRepository {
    public static function getAll(): array {
        $result = Database::query('SELECT `NWCG_REPORTING_UNIT_NAME` as `FOREST_NAME`, `STATE` FROM Fires GROUP BY `NWCG_REPORTING_UNIT_NAME` ORDER BY `FIRE_YEAR` DESC');
        $forests = [];

        foreach($result as $forest) {
            $forests[] = new Forest($forest['FOREST_NAME'], $forest['STATE']);
        }

        return $forests;
    }

    public static function getBySlug(string $slug): Forest {
        // Turn slug back to title-format string
        $name = slugToTitle($slug);

        $sql = 'SELECT `NWCG_REPORTING_UNIT_NAME` as `FOREST_NAME`, `STATE` FROM Fires WHERE `NWCG_REPORTING_UNIT_NAME` = :name ORDER BY `FIRE_YEAR` DESC';
        $result = Database::query($sql, ['name' => $name])[0] ?? null;

        if(!$result) return null;

        return new Forest($result['FOREST_NAME'], $result['STATE']);
    }
}