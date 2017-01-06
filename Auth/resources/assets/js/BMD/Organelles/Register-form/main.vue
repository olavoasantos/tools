<template>
    <li>
        <!-- Button to show modal -->
        <a @click="isVisible = true">
            <slot>Register</slot>
        </a>

        <!-- Form -->
        <form @submit.prevent="submit"
              @keydown="form.errors.clear($event.target.name)"
        >
            <modal v-if="isVisible" @close="isVisible = false">

                <!-- Modal Title -->
                <template slot="title">
                    Register
                </template>

                <!-- Form inputs -->
                <template>
                    <!-- Name input -->
                    <div :class="{ 'form-control' : true, 'has-error' : form.errors.has('name')}"
                         :data-message="form.errors.get('name')"
                         data-label="Name"
                    >
                        <input type="text" placeholder="Name" name="name" v-model="form.name">
                    </div>

                    <!-- E-mail input -->
                    <div :class="{ 'form-control' : true, 'has-error' : form.errors.has('email')}"
                         :data-message="form.errors.get('email')"
                         data-label="E-mail"
                    >
                        <input type="email" placeholder="E-mail" name="email" v-model="form.email">
                    </div>

                    <!-- Password input -->
                    <div :class="{ 'form-control' : true, 'has-error' : form.errors.has('password')}"
                         :data-message="form.errors.get('password')"
                         data-label="Password"
                    >
                        <input type="password" placeholder="Password" name="password" v-model="form.password">
                    </div>

                    <!-- Password confirmation input -->
                    <div :class="{ 'form-control' : true, 'has-error' : form.errors.has('password_confirmation')}"
                         :data-message="form.errors.get('password_confirmation')"
                         data-label="Confirm password"
                    >
                        <input type="password" placeholder="Confirm password" name="password_confirmation"
                               v-model="form.password_confirmation">
                    </div>
                </template>

                <!-- Modal footer -->
                <template slot="footer">

                    <!-- Submit button -->
                    <button style="font-size: inherit" :class="{
                                'item action' : true,
                                'is-disabled' : form.errors.any()
                            }"
                            type="submit"
                            :disabled="form.errors.any()"
                    >Register
                    </button>

                </template>
            </modal>
        </form>
    </li>
</template>

<script>
    export default {
        props: {
            fields: {
                required: true,
                default() {
                    return {
                        name: '',
                        email: '',
                        password: '',
                        password_confirmation: '',
                    };
                }
            }
        },
        data() {
            return {
                form: new Form(this.fields),
                isVisible: false,
            };
        },
        methods: {
            submit() {
                this.form.post('/register')
                    .then((response) => {
                        location.reload();
                    })
                    .catch((response) => {
                        this.$alert.error('Something went wrong');
                    });
            }
        }
    }
</script>