<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{


    public function predictCo($date)
    {
        $readings = Reading::all();
        $x_arr = [];
        $y_arr = [];

        foreach ($readings as $reading) {
            $x_arr[] = strtotime($reading->created_at);
            $y_arr[] = $reading->co;
        }

        $w = $this->linear_regression($x_arr, $y_arr);

        $datetime = strtotime($date);

        return $w['slope'] * $datetime + $w['intercept'];
    }

    public function linear_regression( $x, $y ) {

        $n     = count($x);     // number of items in the array
        $x_sum = array_sum($x); // sum of all X values
        $y_sum = array_sum($y); // sum of all Y values

        $xx_sum = 0;
        $xy_sum = 0;

        for($i = 0; $i < $n; $i++) {
            $xy_sum += ( $x[$i]*$y[$i] );
            $xx_sum += ( $x[$i]*$x[$i] );
        }

        // Slope
        $slope = ( ( $n * $xy_sum ) - ( $x_sum * $y_sum ) ) / ( ( $n * $xx_sum ) - ( $x_sum * $x_sum ) );

        // calculate intercept
        $intercept = ( $y_sum - ( $slope * $x_sum ) ) / $n;

        return array(
            'slope'     => $slope,
            'intercept' => $intercept,
        );
    }

}
