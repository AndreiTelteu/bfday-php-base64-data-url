<?php
namespace Bfday\Base64DataUrl;

interface ResultInterface
{
    public function setMimeType(string $mimeType): ResultInterface;
    public function getMimeType(): string;
    public function setCharset(string $charset): ResultInterface;
    public function getCharset(): string;
    public function setData(string $data): ResultInterface;
    public function getData(): string;

    /**
     * @return string|bool
     */
    public function getBlobData();
    public function toArray(): array;
    public function toString(): string;
}