import FormErrors from "./FormErrors";

class Form {

    /**
     * Creates a new Form instance.
     *
     * @param data
     */
    constructor(data) {
        this.__data = data;
        this.__status = {
            'default': null,
            'loading': 'is-loading',
        }

        for (let field in data) {
            this[field] = data[field];
        }

        this.errors = new FormErrors();
        this.setStatus('default');
    }

    /**
     * Fetches all relevant data for the Form.
     *
     * @returns {{}}
     */
    data() {
        let data = {};

        for (let field in this.__data) {
            data[field] = this[field];
        }

        return data;
    }

    /**
     * Resets the Form fields.
     */
    reset() {
        // It resets the fields
        for (let field in this.__data) {
            this[field] = this.__data[field];
        }

        // It resets the errors
        this.errors.clear();
    }

    /**
     * Send a POST request to the given URL.
     * .
     * @param {string} url
     */
    post(url) {
        return this.submit('post', url);
    }

    /**
     * Send a PUT request to the given URL.
     * .
     * @param {string} url
     */
    put(url) {
        return this.submit('put', url);
    }

    /**
     * Send a PATCH request to the given URL.
     * .
     * @param {string} url
     */
    patch(url) {
        return this.submit('patch', url);
    }

    /**
     * Send a DELETE request to the given URL.
     * .
     * @param {string} url
     */
    delete(url) {
        return this.submit('delete', url);
    }

    /**
     * Submit the form.
     *
     * @param {string} requestType
     * @param {string} url
     */
    submit(requestType, url) {
        this.setStatus('loading');
        return new Promise((resolve, reject) => {
            $http[requestType.toLowerCase()](url, this.data())
                .then(response => {
                    this.onSuccess(response.data);
                    this.setStatus('default');

                    resolve(response.data);
                })
                .catch(error => {
                    this.onFail(error.response.data);
                    this.setStatus('default');

                    reject(error.response.data);
                });
        });
    }

    /**
     * Handle a successful form submission.
     *
     * @param {object} data
     */
    onSuccess(response) {
        return response;
    }

    /**
     * Handle a failed form submission.
     *
     * @param {object} errors
     */
    onFail(errors) {
        this.errors.push(errors);
    }

    /**
     * Sets the status of the Form.
     * @param name
     */
    setStatus(name) {
        if (name in this.__status) {
            this.status = this.__status[name];
        } else {
            this.status = name;
        }
    }
}

export default Form;