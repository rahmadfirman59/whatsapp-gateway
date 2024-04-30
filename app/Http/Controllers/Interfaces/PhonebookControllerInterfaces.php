<?php

namespace App\Http\Controllers\Interfaces;

use App\Http\Requests\PhonebookRequest;
use App\Services\PhonebookService\PhonebookServices;
use Illuminate\Http\Request;

interface PhonebookControllerInterfaces
{

    public function __construct(PhonebookServices $phonebookServices);

    public function index(Request $request);

    public function create();

    public function store(PhonebookRequest $request);

    public function edit($id);

    public function update(Request $request,$id);

    public function delete($id);
}
