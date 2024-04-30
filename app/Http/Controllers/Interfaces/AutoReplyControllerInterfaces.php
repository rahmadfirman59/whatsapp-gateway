<?php

namespace App\Http\Controllers\Interfaces;

use App\Http\Requests\AutoReplyRequest;
use App\Services\AutoReplyServices\AutoReplyServices;
use Illuminate\Http\Request;

interface AutoReplyControllerInterfaces
{
    public function __construct(AutoReplyServices $autoReplyServices);

    public function index(Request $request);

    public function create();

    public function store(AutoReplyRequest $request);

    public function edit($id);

    public function update(Request $request,$id);

    public function delete($id);

}
