<?php

class UserDB {

    public static function save_to_db($first, $last) {
        $file = new SplFileObject("db_user.csv", "r+");
        $id = 0;
        while (!$file->eof()) {
            $id++;
            $file->fgets();
        }
        $file->fputcsv([$id, $first, $last], "\t");
    }

    public static function read_from_db($query = []) {
        $file = new SplFileObject("db_user.csv");
        $hits = [];
        
        while (!$file->eof()) {
            $parts = preg_split('/\s+/', $file->fgets());
            if (count($parts) == 4) {
                $entry = [
                    "number" => intval($parts[0]),
                    "first" => $parts[1],
                    "last" => $parts[2]
                ];

                $predicate = True;
                foreach ($query as $key => $val) {
                    if ($val != "" && $val != $entry[$key]) {
                        $predicate = False;
                        break;
                    }
                }
                if ($predicate) {
                    $hits[] = $entry;
                }
            }
        }
        return $hits;
    }
}
