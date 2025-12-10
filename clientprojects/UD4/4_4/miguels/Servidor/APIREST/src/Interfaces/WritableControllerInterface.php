<?php

namespace Interfaces;

interface WritableControllerInterface
{
    public function store();
    public function update($id);
    public function delete($id);
}
