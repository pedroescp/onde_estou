<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Calcula a diferença de tempo
        $diff = Carbon::now()->diffForHumans($this->updated_at, true);

        $teste = [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'company' => new CompaniesResource($this->company),
            'sector' => new SectorResource($this->sector),
            'return_forecast' => $this->return_forecast,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'updated_ago' => $diff,
        ];

        return $teste;
    }
}
