<?php

namespace App\Repositories;

use App\Models\Charge;
use App\Services\CalculationService;

class ChargeRepository implements RepositoryInterface
{
  
  /**
   * repository
   *
   * @var App\Repositories\PaymentRepository
   */
  protected $payment;
  
  /**
   * repository
   *
   * @var App\Services\CalculationService
   */
  protected $calculation;

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct(PaymentRepository $payment, CalculationService $calculation)
  {
      $this->payment = $payment;
      $this->calculation = $calculation;
  }
    
    public function getAll()
    {
        return Charge::all();
    }

    public function find($id)
    {
        return Charge::find($id);
    }

    public function create($data)
    {
        $payment = $this->payment->find($data['payment_id']);
        $data['amount'] = $this->calculation->calculation($data['amount'] ,$payment->type);
        return Charge::create($data);
    }
}
