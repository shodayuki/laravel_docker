<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->resource['user_id'],
            'name' => $this->resource['user_name'],
            'links' => [
                'self' => [
                    'href' => sprintf(
                        'https://example.com/users/%s',
                        $this->resource['user_id']
                    )
                ]
            ]
        ];
    }
}
