<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ErrorResource extends JsonResource
{

    static $wrap = 'errors';
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'success'=> false,
            'message'=>'Error',
            'errors'=> parent::toArray($request)
        ];
    }

   // return (new Class($data->getMeaasgeBag()))->response()->setStatusCode(422);
}
