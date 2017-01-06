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
        "files": [ "app/Helpers/Flash.php" ]
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

## Docs
### hightlight(body)
Sets the highlight text for the Alert.
#### @Params
- `body`
    - Type: `{string}`
    - String containing the highlighted text.
    
#### @Returns
- `$this`
    - Type: `{Alert}`
    - Returns itself (for fluency sake).

### message(body)
Sets the message text for the Alert.
#### @Params
- `body`
    - Type: `{string}`
    - String containing the message text.
    
#### @Returns
- `$this`
    - Type: `{Alert}`
    - Returns itself (for fluency sake).
    
### type(string)
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
    
### icon(code)
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

### push(alert)
Pushes the new Alert.
#### @Params
- `alert`
    - Type: `{object}`
    - Default: `null`
    - Object with the new Alert data. If is `null`, the stored data is pushed.

### flash(message)
It pushes a default Alert.
#### @Params
- `message`
    - Type: `{string}`
    - A string containing the Alert message.

### error(message)
It pushes an error Alert.
#### @Params
- `message`
    - Type: `{string}`
    - A string containing the Alert message.
    
### success(message)
It pushes a success Alert.
#### @Params
- `message`
    - Type: `{string}`
    - A string containing the Alert message.

### warning(message)
It pushes a warning Alert.
#### @Params
- `message`
    - Type: `{string}`
    - A string containing the Alert message.
    
### info(message)
It pushes an info Alert.
#### @Params
- `message`
    - Type: `{string}`
    - A string containing the Alert message.

### all()
Fetches all the stored alerts.
#### @Returns
- `$alerts`
    - Type: `{object}`
    - An object containing all the alerts pushed.
    
### clear()
Clears all the stored alerts.

### reset()
Resets the data from the Alert object.