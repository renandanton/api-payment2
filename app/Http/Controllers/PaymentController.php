<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PaymentRepository;

class PaymentController extends ApiController
{
  
    /**
     * repository
     *
     * @var App\Repositories\PaymentRepository
     */
    protected $repository;
  
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PaymentRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function create(Request $request) {
      $data = $request->all();
      return $this->setStatusCode(200)->respond(
          $this->repository->create($data)
      );
    }
}
