# jnjxp.calerator
Iterate over dates like a calendar.

- `Year` is a collection of `Month`s.
- `Month` is a collection of `Week`s.
- `Week` is a collection of `Day`s.

## Install
```shell
composer require jnjxp/calerator
```

## Usage

```php
foreach (new Year(2016) as $month) {
    foreach($month as $week) {
        foreach ($week as $day){
            //...
        }
    }
}

```
