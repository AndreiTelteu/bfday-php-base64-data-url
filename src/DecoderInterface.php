<?php
namespace Bfday\Base64DataUrl;

interface DecoderInterface
{
    /**
     * Using some logic creates result which can be used to fetch parsed data, modify and recreate new result
     *
     * @param string $s
     *
     * @return ResultInterface
     */
    public function run(string $s): ResultInterface;
}