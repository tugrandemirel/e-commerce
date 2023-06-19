<?php

if(! function_exists('productCountCalculation'))
{
    function productCountCalculation($count)
    {
        if($count >= 1000)
        {
            $count = $count / 1000;
            $count = round($count, 1);
            return $count.'B';
        }
        else
        {
            return $count;
        }

    }
}

if (! function_exists('avgCalculation'))
{
    // Product reviews calculation
    function avgCalculation($reviewModel)
    {
        $sum = 0;
        $count = 0;
        foreach ($reviewModel as $model) // $reviewModel = $products
        {
            if (is_object($model))
            {
                foreach ($model->reviews as $review) // $model->reviews = $product->reviews
                {
                    $count++; // review count. example: one product has 10 reviews, another product has 20 reviews. so, total review count is 30.
                    $sum += $review->rating; // sum of all ratings. example: one product has 10 reviews, another product has 20 reviews. so, total rating is 30.
                }
            }
        }
        if ($count == 0) // if no review, then return 0
            return 0;

        $avg = $sum / $count; // 1900 / 24431 = 0.0778
        $avg = round($avg, 1);
        if ($avg < 1)
            $avg = 1;
        return $avg;

    }
}

