Base64 data url scheme library
-
Library to work with base64 data URL scheme.
More info about scheme you can read here https://ru.wikipedia.org/wiki/Data:_URL.

How to use
=
The simplest way is:
```
/**
* @var $res Result
*/
$decoder = (new Decoder())->run($logoBase64DataUrl);
echo json_encode($decoder->toArray());
echo $decoder->getMimeType();
echo $decoder->getCharset();
echo $decoder->getData();
```

How to install
=
Run from bash:
```
composer require bfday/php-base64-data-url
```

Authors
=
Stepanov Stanislav