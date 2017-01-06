class Alert {

    /**
     * Creates a new Alert instance.
     */
    constructor() {
        this.__alerts = [];

        this.data = {
            highlight: '',
            message: '',
            icon: 'info',
            type: 'primary'
        };
    }

    /**
     * Sets the highlight for the new Alert.
     *
     * @param highlight
     */
    highlight(highlight) {
        this.data['highlight'] = highlight;

        return this;
    }

    /**
     * Sets the message for the new Alert.
     *
     * @param message
     */
    message(message) {
        this.data['message'] = message;

        return this;
    }

    /**
     * Sets the type for the new Alert.
     *
     * @param type
     */
    type(type) {
        this.data['type'] = type;

        return this;
    }

    /**
     * Sets the icon for the new Alert.
     *
     * @param icon
     */
    icon(icon) {
        this.data['icon'] = icon;

        return this;
    }

    /**
     * Pushes the new alert.
     *
     * @param alert
     */
    push(alert = null) {
        if(alert !== null) {
            this.__alerts.push(alert);
        } else {
            this.__alerts.push(this.data);
        }
        this.reset();
    }

    /**
     * Pushes an alert.
     *
     * @param message
     */
    flash(message) {
        this.message(message);
        this.icon('bell');
        this.type('primary');
        this.highlight('');
        this.push();
    }

    /**
     * Pushes an error alert.
     *
     * @param message
     */
    error(message) {
        this.message(message);
        this.icon('exclamation');
        this.type('danger');
        this.highlight('Error!');
        this.push();
    }

    /**
     * Pushes an success alert.
     *
     * @param message
     */
    success(message) {
        this.message(message);
        this.icon('check');
        this.type('success');
        this.highlight('Yay!');
        this.push();
    }

    /**
     * Pushes an warning alert.
     *
     * @param message
     */
    warning(message) {
        this.message(message);
        this.icon('exclamation-triangle');
        this.type('warning');
        this.highlight('Hey!');
        this.push();
    }

    /**
     * Pushes an info alert.
     *
     * @param message
     */
    info(message) {
        this.message(message);
        this.icon('info');
        this.type('info');
        this.highlight('Hey!');
        this.push();
    }

    /**
     * Resets the Alert.
     */
    reset() {
        this.data = {
            highlight: '',
            message: '',
            icon: 'info',
            type: 'info'
        };
    }

    /**
     * Returns all alerts.
     *
     * @returns {Array|*}
     */
    all() {
        return this.__alerts;
    }

    /**
     * Clears all alerts.
     */
    clear() {
        this.__alerts = [];
    }

}

export default Alert;