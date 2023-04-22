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
    public function getLocation(Request $request): array
    {
        $ipSeek = new IpSeek();
        $ipSeek->getLocationByIp("129.226.205.74");
    }
}
```
