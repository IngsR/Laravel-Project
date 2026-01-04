<?php

namespace App\DTOs\Post;

use Illuminate\Http\UploadedFile;

class UpdatePostDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $content,
        public readonly ?UploadedFile $image,
    ) {}

    public static function fromRequest(array $data, ?UploadedFile $image = null): self
    {
        return new self(
            title: $data['title'],
            content: $data['content'],
            image: $image,
        );
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
        ];
    }
}
