<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;

class PayBillController extends ApiGuardController
{
    public function index()
    {
    	 try {

            $book = ['testing','testing'];

            return $this->response->withItem($book, new BookTransformer);

        } catch (ModelNotFoundException $e) {

            return $this->response->errorNotFound();

        }
    }
}
