<?php

namespace App\Repositories;

use App\Models\Payment;

class PaymentRepository implements RepositoryInterface
{
    public function getAll()
    {
        return Payment::all();
    }

    public function find($id)
    {
        return Payment::find($id);
    }

    public function create($data)
    {
        return Payment::create($data);
    }
}
