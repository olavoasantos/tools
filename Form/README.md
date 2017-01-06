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

# Docs
## class `Form`
### Parameters
- `errors`
    - Type: `{FormErrors}`
    - A FormError instace containing the Form's errors.
___

- `status`
    - Type: `{string}`
    - A string containing the Forms status.

___

##### Internal parameters
- `__data`
    - Type: `{object}`
    - Object containing the Forms data.
    
    \*\* This data is accessible through `Form[{param}]`.
___

- `__status`
    - Type: `{object}`
    - Object containing a list of default status.
    - Options: `default` | `loading`
### data()
Fetches all relevant data for the Form.

#### @Returns
- `$data`
    - Type: `{Object}`
    - Object containing the relevant information from the form.

___

### reset()
Resets the Form fields.

___

### setStatus(name)
Sets the Form status. If the status name is not contained in the `__status` list, the name will be set as the status.

#### @Params
- `name`
    - Type: `{string}`
    - A string containing the status name.
___

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
    
___

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

___

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

___

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

___

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

___

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

___

### onFail(errors)
Handles a failed Form submission.

#### @Params
- `errors`
    - Type: `{object}`
    - An object containing the server response.

 

___
___



## class `FormError`
### Parameters
- `errors`
    - Type: `{object}`
    - An object containing a list of errors.
___

### `has(field)`
Determine if an errors exists for the given field.

#### @Params
- `field`
    - Type: `{string}`
    - A string containing the field name.
    
#### @Returns
- `$boolean`
    - Type: `{boolean}`
    - Returns `true` if there are Errors related to the field; `false` if there aren't.

___

### `any()`
Determine if we have any errors.

#### @Returns
- `$boolean`
    - Type: `{boolean}`
    - Returns `true` if there are Errors; `false` if there aren't.
___

### `get(field)`
Retrieve the error message for a field.

#### @Params
- `field`
    - Type: `{string}`
    - A string containing a field name.
    
#### @Returns
- `$error`
    - Type: `{object}`
    - If existent, it returns an object with the error.
___

### `push(errors)`
Pushes the new errors.

#### @Params
- `errors`
    - Type: `{object}`
    - An object containing a list of errors.

___

### `clear(field)`
Clear one or all error fields.

#### @Params
- `field`
    - Type: `{string|false}`
    - Default: `false`
    - A string containing a field name. If `false`, clears all. 
___