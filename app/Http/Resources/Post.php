<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);

        return [
            'id' => $this->id,
            'name' => $this->name,
            'photo' => asset('storage/' . $this->photo),
             'status' => $this->status,
            'category' => $this->category,
            'youtubelink' => $this->youtubelink,
//           'namecategory' => $this->namecategory->name

        ];
    }

    public function uploadTest(Request $request) {

        if(!$request->hasFile('image')) {
            return response()->json(['upload_file_not_found'], 400);
        }
        $file = $request->file('image');
        if(!$file->isValid()) {
            return response()->json(['invalid_file_upload'], 400);
        }
        $path = public_path() . '/uploads/images/store/';
        $file->move($path, $file->getClientOriginalName());
        return response()->json(compact('path'));
    }
}
