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
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'nickname' => $this->user->name,
            'company' => new CompaniesResource($this->company),
            'sector' => new SectorResource($this->sector),
            'return_forecast' => $this->return_forecast,
            'created_at' => Carbon::parse($this->created_at)->locale('pt_BR')->format('d/m/Y H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->locale('pt_BR')->format('d/m/Y H:i:s'),
            'updated_ago' => 'Atualizado ' . Carbon::parse($this->updated_at)->locale('pt_BR')->diffForHumans(null, true) . ' atrás',
        ];
    }
}
