Class ArrayHelpersClass {

    public static function uniqueMultiDimensionalArray($array, $key) {
        $t = array();
        $i = 0;
        $k = array();
        foreach($array as $v) {
            if (!in_array($v[$key], $k, true)) {
                $k[$i] = $v[$key];
                $t[$i] = $v;
            }
            $i++;
        }
        return $t;
    }

    public static function sortArray($array, $sortByKey, $sortDirection)
    {
        $sortArray = array();
        $tempArray = array();

        foreach ( $array as $key => $value ) {
            $tempArray[] = $value[ $sortByKey ];
        }

        if( $sortDirection === 'ASC' ) {
            asort( $tempArray );
        }
        else {
            arsort( $tempArray );
        }

        foreach ( $tempArray as $key => $temp ) {
            $sortArray[] = $array[ $key ];
        }
        return $sortArray;

    }

    public function arraySearchIdByKey($id, $key, $array ) {
        $results = array();
        foreach ( $array as $val ) {
            if ( $val[$key] === $id ) {
                $results[] = $val;
            }
        }
        return $results;
    }
    
    public function sortAssociativeArrayByKey($array, $key, $direction){

        switch ($direction){
            case "ASC":
                usort($array, function ($first, $second) use ($key) {
                    return $first[$key] <=> $second[$key];
                });
                break;
            case "DESC":
                usort($array, function ($first, $second) use ($key) {
                    return $second[$key] <=> $first[$key];
                });
                break;
            default:
                break;
        }

        return $array;
    }

}
