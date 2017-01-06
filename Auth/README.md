# User Auth system
v0.1

## Requires
- Laravel
- Vue.js
- Axios
- Alert system (check docs for installation instructions)
- Form system (check docs for installation instructions)

## Usage
- To login, add to your view:
```blade
    <login-form></login-form>
```

- To register, add to your view:
```blade
    <register-form></register-form>
```

## Installation
### Back-end
- Add to `./vendor/laravel/framework/src/Illuminate/Foundation/Auth/AuthenticatesUsers.php`:
```php
    /**
         * The user has been authenticated.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  mixed  $user
         * @return mixed
         */
        protected function authenticated(Request $request, $user)
        {
    	    if($request->ajax()) {
    		    return response('success');
    	    }
        }
```

- Add to `./vendor/laravel/framework/src/Illuminate/Foundation/Auth/RegistersUsers.php`:
```php
    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
	    /**
	     * Create the new User's profile.
	     */
	    $profile = new Profile;
	    $profile->name = $request['name'];
	    $profile->generateSlug(
	    // Value to be used
		    $request['email'],
		    // Prefix
		    '@',
		    // Closure to prepare value
		    function($values) {
			    return explode( "@", $values)[0];
		    }
	    );

	    $user->profile()->save($profile);

	    if($request->ajax()) {
		    return response('success');
	    }
    }
```

### Front-end
- Add to `./resources/assets/js/bootstrap.js`:
```javascript
    /**
     * Vue is a modern JavaScript library for building interactive web interfaces
     * using reactive data binding and reusable components. Vue's API is clean
     * and simple, leaving you to focus on building your next great project.
     */
    
    window.Vue = require('vue');
    window.$http = require('axios');
    
    /**
     * We'll register a HTTP interceptor to attach the "CSRF" header to each of
     * the outgoing requests issued by this application. The CSRF middleware
     * included with Laravel will automatically verify the header's value.
     */
    
    $http.interceptors.request.use((config) => {
        config.headers['X-CSRF-TOKEN'] = App.csrfToken
        return config;
    });
```

- Add to `./resources/assets/js/app.js`:
```javascript
    // Initiate Alert
    import Alert from "./Core/Alert/Alert";
    Vue.prototype.$alert = new Alert;
    
    // Initiate Form
    import Form from "./Core/Form/Form";
    window.Form = Form;
    
    /**
    * Components
    */
    // Organelles
    Vue.component('login-form', require('./BMD/Organelles/Login-form/main.vue'));
    Vue.component('register-form', require('./BMD/Organelles/Register-form/main.vue'));
    Vue.component('alert-controller', require('./BMD/Organelles/Alert-controller/main.vue'));
    
    // Molecules
    Vue.component('alert', require('./BMD/Molecules/Alert/main.vue'));
    Vue.component('modal', require('./BMD/Molecules/Modal/main.vue'));
```
