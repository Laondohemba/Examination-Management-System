<?php

namespace App\Policies;

use App\Models\Examiner;
use App\Models\Response;
use Illuminate\Auth\Access\Response;

class ResponsePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Examiner $examiner): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Examiner $examiner, Response $response): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Examiner $examiner): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Examiner $examiner, Response $response): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Examiner $examiner, Response $response): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Examiner $examiner, Response $response): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Examiner $examiner, Response $response): bool
    {
        return false;
    }
}
