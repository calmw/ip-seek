# ip-seek

- composer package
- get location by ip
- php >= 8.0.26

#### install

- ``` composer require calmw/ipseek --ignore-platform-reqs ```

#### usage

```php
use Calm\IpSeek;

class Location
{
    public function getLocationByIp($ip): array
    {
        $ipSeek = new IpSeek();
        $ipSeek->getLocationByIp($ip);
    }
}

```
