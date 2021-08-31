<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TodoCollectionResource extends ResourceCollection
{    
    public $collects = TodoResource::class;
}
