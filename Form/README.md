# Form system
v0.1

## Requires
- Laravel
- Axios

## Usage
```javascript
    form = new Form({
        'email': '',
        'password': '',
    });
```

## Installation
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
    import Form from "./Core/Form/Form";
    window.Form = Form;
```

## Docs
### data()
Fetches all relevant data for the Form.
#### @Returns
- `$data`
    - Type: `{Object}`
    - Object containing the relevant information from the form.

### reset()
Resets the Form fields.

### post(url)
Sends a promise-based POST request to the given URL.
#### @Params
 - `url`
    - Type: `{string}`
    - A string containing the URL to which the request is sent.
    
#### @Returns
- `$promise`
    - Type: `{Promise}`
    - A promise with the response data from the server.    
    
### put(url)
Sends a promise-based PUT request to the given URL.
#### @Params
 - `url`
    - Type: `{string}`
    - A string containing the URL to which the request is sent.
    
#### @Returns
- `$promise`
    - Type: `{Promise}`
    - A promise with the response data from the server.

### patch(url)
Sends a promise-based PATCH request to the given URL.
#### @Params
 - `url`
    - Type: `{string}`
    - A string containing the URL to which the request is sent.
    
#### @Returns
- `$promise`
    - Type: `{Promise}`
    - A promise with the response data from the server.

### delete(url)
Sends a promise-based DELETE request to the given URL.
#### @Params
 - `url`
    - Type: `{string}`
    - A string containing the URL to which the request is sent.
    
#### @Returns
- `$promise`
    - Type: `{Promise}`
    - A promise with the response data from the server.

### submit(requestType, url)
Submits the Form through a promise-based ajax request.
#### @Params
- `requestType`
    - Type: `{string}`
    - A string containing the request type.
 - `url`
    - Type: `{string}`
    - A string containing the URL to which the request is sent.
    
#### @Returns
- `$promise`
    - Type: `{Promise}`
    - A promise with the response data from the server.

### onSuccess(response)
Handles a successful Form submission.
#### @Params
- `response`
    - Type: `{mixed}`
    - An object containing the server response.
    
#### @Returns
- `$response`
    - Type: `{object}`
    - An object containing the server response.

### onFail(errors)
Handles a failed Form submission.
#### @Params
- `errors`
    - Type: `{object}`
    - An object containing the server response.
    