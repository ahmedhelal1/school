<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GradeResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => [
                "en" => $this->getTranslation('name', 'en') ?? "N/A",
                "ar" => $this->getTranslation('name', 'ar') ?? "غير متوفر",
            ],
            "notes" => $this->notes,
        ];
    }
}
