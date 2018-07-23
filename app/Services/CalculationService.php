<?php

namespace App\Services;

class CalculationService implements CalculationInterface
{
    public function calculation($amount, $type)
    {
        $convertAmount = 0; 
        
        if ($type == 'dd') {
          $convertAmount = ((($amount * 7) / 100) + $amount);
        } else {
          $convertAmount = ((($amount * 10) / 100) + $amount);
        }
        
        return $convertAmount;
    }
}
