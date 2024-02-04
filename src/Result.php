<?php
namespace Bfday\Base64DataUrl;

class Result implements ResultInterface
{
    protected $mimeType;
    protected $charset;
    protected $data;

    /**
     * Creates result from array. Checks if array consist only of known keys
     *
     * @param array $data
     *
     * @return Result
     * @throws \RuntimeException
     */
    public static function createFromArray(array $data): self
    {
        $o = new static();
        $knownKeys = [
            'mimeType',
            'charset',
            'data',
        ];
        foreach ($knownKeys as $knownKey) {
            $o->$knownKey = isset($data[$knownKey]) && is_string($data[$knownKey]) ? $data[$knownKey] : '';
        }

        return $o;
    }

    public function setMimeType(string $mimeType): ResultInterface
    {
        $this->mimeType = $mimeType;

        return $this;
    }

    /**
     * @return string - mime type of data if were provided
     */
    public function getMimeType(): string
    {
        return $this->mimeType;
    }

    /**
     * Sets charset (doesn't check if valid)
     *
     * @param string $charset
     *
     * @return ResultInterface
     */
    public function setCharset(string $charset): ResultInterface
    {
        $this->charset = $charset;

        return $this;
    }

    /**
     * @return string - returns charset if were provided
     */
    public function getCharset(): string
    {
        return $this->charset;
    }

    /**
     * Sets raw base64 encoded data (doesn't check if valid)
     *
     * @param string $data
     *
     * @return ResultInterface
     */
    public function setData(string $data): ResultInterface
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return string - base64 encoded data
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * Returns decoded binary data
     *
     * @return string|bool - false if provided data have an error
     */
    public function getBlobData()
    {
        return base64_decode($this->getData(), true);
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }

    /**
     * Compiles base64 data url using values of current object
     *
     * @return string
     */
    public function toString(): string
    {
        $res = 'data:' . $this->getMimeType();
        if (!empty($this->charset)) {
            $res .= ';charset=' . $this->charset;
        }

        return $res . ';base64,' . $this->getData();
    }

    public function __toString(): string
    {
        return $this->toString();
    }
}