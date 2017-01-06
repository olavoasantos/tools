# Alert system
v0.1

## Requires
- Laravel
- Vue.js
- Stylus (+Rupture)
- BMD nucleus

## Usage
### Back-end
```php
    alert()->success('Updated successfully');
```

### Front-end
```javascript
    Vue.$alert.success('Updated successfully');
```

## Installation
- Add to `./composer.json`:
```json
    {
      "autoload": {
        "files": [ "app/Helpers/Alert.php" ]
      }
    }
```

- Add to `./resources/views/layout/{main-layout}.blade.php`:
```blade
    <!-- Alert -->
    <alert-controller>
        @include('components.alert')
    </alert-controller>
```

- Add to `./resources/assets/js/app.js`:
```javascript
    import Alert from "./Core/Alert/Alert";
    Vue.prototype.$alert = new Alert;
    
    // Organelles
    Vue.component('alert-controller', require('./BMD/Organelles/Alert-controller/main.vue'));
   
    // Molecules
    Vue.component('alert', require('./BMD/Molecules/Alert/main.vue')); 
```

# Docs
## class `Alert`
### Parameters
##### Internal parameters
- `__alerts`
    - Type: `{array}`
    - An array containing a list of fired Alert objects.
___
- `__data`
    - Type: `{object}`
    - An object containing the data of an unfired Alert.
___
### `hightlight(body)`
Sets the highlight text for the Alert.
#### @Params
- `body`
    - Type: `{string}`
    - String containing the highlighted text.
    
#### @Returns
- `$this`
    - Type: `{Alert}`
    - Returns itself (for fluency sake).

___
### `message(body)`
Sets the message text for the Alert.
#### @Params
- `body`
    - Type: `{string}`
    - String containing the message text.
    
#### @Returns
- `$this`
    - Type: `{Alert}`
    - Returns itself (for fluency sake).
    
___
### `type(string)`
Sets the type for the Alert.
#### @Params
- `string`
    - Type: `{string}`
    - String containing the alert type.
    - Options: `primary` | `error` | `success` | `warning` | `info`
    
#### @Returns
- `$this`
    - Type: `{Alert}`
    - Returns itself (for fluency sake).
    
___
### `icon(code)`
Sets the icon for the Alert.
#### @Params
- `code`
    - Type: `{string}`
    - String containing the icon code.
    - Options: Check font-awesome's documentation.
    
#### @Returns
- `$this`
    - Type: `{Alert}`
    - Returns itself (for fluency sake).

___
### `fire(alert)`
Fires the new Alert.
#### @Params
- `alert`
    - Type: `{object}`
    - Default: `null`
    - Object with the new Alert data. If is `null`, the stored data is pushed.

___
### `flash(message)`
It fires a default Alert.
#### @Params
- `message`
    - Type: `{string}`
    - A string containing the Alert message.

___
### `error(message)`
It fires an error Alert.
#### @Params
- `message`
    - Type: `{string}`
    - A string containing the Alert message.
    
___
### `success(message)`
It fires a success Alert.
#### @Params
- `message`
    - Type: `{string}`
    - A string containing the Alert message.

___
### `warning(message)`
It fires a warning Alert.
#### @Params
- `message`
    - Type: `{string}`
    - A string containing the Alert message.
    
___
### `info(message)`
It fires an info Alert.
#### @Params
- `message`
    - Type: `{string}`
    - A string containing the Alert message.

___
### `all()`
Fetches all the stored alerts.
#### @Returns
- `$alerts`
    - Type: `{object}`
    - An object containing all the alerts pushed.
    
___
### `clear()`
Clears all the stored alerts.

___
### `reset()`
Resets the data from the Alert object.