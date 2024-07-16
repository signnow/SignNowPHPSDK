<?php

declare(strict_types=1);

namespace SignNow\Api\Folder\Response\Data\Document;

readonly class Attachment
{
    public function __construct(
        private string $id,
        private string $userId,
        private string $pageNumber,
        private string $width,
        private string $height,
        private string $x,
        private string $y,
        private string $created,
        private ?string $lineHeight = null,
        private ?string $originalAttachmentName = null,
        private ?string $filename = null,
        private ?string $fileType = null,
        private ?string $mimeType = null,
        private ?string $fileSize = null,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getPageNumber(): string
    {
        return $this->pageNumber;
    }

    public function getWidth(): string
    {
        return $this->width;
    }

    public function getHeight(): string
    {
        return $this->height;
    }

    public function getX(): string
    {
        return $this->x;
    }

    public function getY(): string
    {
        return $this->y;
    }

    public function getLineHeight(): ?string
    {
        return $this->lineHeight;
    }

    public function getCreated(): string
    {
        return $this->created;
    }

    public function getOriginalAttachmentName(): ?string
    {
        return $this->originalAttachmentName;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function getFileType(): ?string
    {
        return $this->fileType;
    }

    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }

    public function getFileSize(): ?string
    {
        return $this->fileSize;
    }

    public function toArray(): array
    {
        return [
           'id' => $this->getId(),
           'user_id' => $this->getUserId(),
           'page_number' => $this->getPageNumber(),
           'width' => $this->getWidth(),
           'height' => $this->getHeight(),
           'x' => $this->getX(),
           'y' => $this->getY(),
           'line_height' => $this->getLineHeight(),
           'created' => $this->getCreated(),
           'original_attachment_name' => $this->getOriginalAttachmentName(),
           'filename' => $this->getFilename(),
           'file_type' => $this->getFileType(),
           'mime_type' => $this->getMimeType(),
           'file_size' => $this->getFileSize(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['user_id'],
            $data['page_number'],
            $data['width'],
            $data['height'],
            $data['x'],
            $data['y'],
            $data['created'],
            $data['line_height'] ?? null,
            $data['original_attachment_name'] ?? null,
            $data['filename'] ?? null,
            $data['file_type'] ?? null,
            $data['mime_type'] ?? null,
            $data['file_size'] ?? null,
        );
    }
}
