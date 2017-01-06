# Alert system
v0.1

## Requires
- Laravel
- Vue.js
- Stylus (+Rupture)
- BMD nucleus

## Usage
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
```ecmascript 6
    import Alert from "./Core/Alert/Alert";
    Vue.prototype.$alert = new Alert;
    
    // Organelles
    Vue.component('alert-controller', require('./BMD/Organelles/Alert-controller/main.vue'));
   
    // Molecules
    Vue.component('alert', require('./BMD/Molecules/Alert/main.vue')); 
```