<?php

namespace App\Services\AutoReplyServices;

use App\Models\AutoReply;

class AutoReplyServices implements AutoReplyServicesInterfaces
{
    protected $autoReply;


    public function __construct(AutoReply $autoReply)
    {
        $this->autoReply = $autoReply;
    }

    public function find($value, $column = 'id')
    {
        // TODO: Implement find() method.
        return $this->autoReply->where($column,$value)->first();
    }

    public function search($param)
    {
        // TODO: Implement search() method.
        $autoreply = $this->autoReply->orderby('id');

        $keyword = $param['keyword'] ?? "";
        if ($keyword !== '') $autoreply->where('keyword','like',"%$keyword%");

        $autoreply = $autoreply->paginate(10);

        return $autoreply;
    }

    public function create($param)
    {
        // TODO: Implement create() method.
        return $this->autoReply->create($param);
    }

    public function update($param, $id)
    {
        // TODO: Implement update() method.
        $autoreply = $this->autoReply->find($id);

        if ($autoreply) $autoreply->update($param);
        return $autoreply;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $autoreply = $this->autoReply->find($id);

        if ($autoreply) $autoreply->delete($id);
        return $autoreply;
    }
}
