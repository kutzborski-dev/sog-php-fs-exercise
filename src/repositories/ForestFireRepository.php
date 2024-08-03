<?php

namespace App\Repositories;

use App\Core\Database;
use App\Models\Forest;
use App\Models\ForestFire;

class ForestFireRepository {
    private static $defaultColumns = '`FPA_ID`, `FIRE_NAME`, `FIRE_CODE`, `DISCOVERY_DATE`, `STAT_CAUSE_DESCR` AS `FIRE_CAUSE`';

    public static function getAll(): array {
        $result = Database::query('SELECT '. self::$defaultColumns .' FROM Fires ORDER BY `FIRE_YEAR` DESC');
        $forests = [];

        foreach($result as $forest) {
            $forests[] = new Forest($forest['FOREST_NAME'], $forest['STATE']);
        }

        return $forests;
    }

    public static function getBySlug(string $slug): array {
        // Turn slug back to title-format string
        $name = slugToTitle($slug);

        $sql = 'SELECT '. self::$defaultColumns .' FROM Fires WHERE `FIRE_NAME` = :name ORDER BY `FIRE_YEAR` DESC';
        $result = Database::query($sql, ['name' => $name]);
        $forests = [];

        foreach($result as $forest) {
            $forests[] = new Forest($forest['FOREST_NAME'], $forest['STATE']);
        }

        return $forests;
    }

    public static function getByForest(Forest $forest): array {
        if(!empty($forest->getFires())) return $forest->getFires();

        // Get fires from the database
        $sql = 'SELECT '. self::$defaultColumns .' FROM Fires WHERE `NWCG_REPORTING_UNIT_NAME` = :name ORDER BY `FIRE_YEAR` DESC';
        $result = Database::query($sql, ['name' => $forest->getName()]);
        $fires = [];

        foreach($result as $fire) {
            $fires[] = new ForestFire($fire['FPA_ID'], $fire['FIRE_NAME'], $forest->getName(), $fire['FIRE_CODE'], $fire['DISCOVERY_DATE'], $fire['FIRE_CAUSE']);
        }

        return $fires;
    }


    public static function getByForestSlug(string $forestSlug): array {
        // Turn slug to forest name
        $forestName = slugToTitle($forestSlug);
        $forest = new Forest($forestName);

        return self::getByForest($forest);
    }
}