<?php

namespace App\Services\AutoReplyServices;

use App\Models\AutoReply;

interface AutoReplyServicesInterfaces
{
    public function __construct(AutoReply $autoReply);

    public function find($value,$column = 'id');

    public function search($param);

    public function create($param);

    public function update($param,$id);

    public function delete($id);
}
