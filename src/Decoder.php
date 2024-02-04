<?php
namespace Bfday\Base64DataUrl;

class Decoder implements DecoderInterface
{
    /**
     * Using internal logic creates filled result
     *
     * @param string $s
     *
     * @return ResultInterface
     */
    public function run(string $s): ResultInterface
    {
        preg_match('/data:(?P<mimeType>[a-zA-Z0-9\/]+)(;charset=(?P<charset>))?;base64,(?P<data>.*)/', $s, $matches);

        return Result::createFromArray($matches);
    }
}
