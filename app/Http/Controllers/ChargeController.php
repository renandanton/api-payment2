<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ChargeRepository;

class ChargeController extends ApiController
{
  
    /**
     * repository
     *
     * @var App\Repositories\ChargeRepository
     */
    protected $repository;
  
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ChargeRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function index() {
      return $this->respond($this->repository->getAll());
    }
    
    public function show($id) {
        $charge = $this->repository->find($id);
        if (! $charge) {
            return $this->respondNotFound('Charge id '.$id.' does not exist.');
        }
        return $this->respond(collect($charge)->only(['payment_id', 'amount']));
    }
    
    public function create(Request $request) {
      $data = $request->all();
      return $this->setStatusCode(200)->respond(
          $this->repository->create($data)
      );
    }
}
