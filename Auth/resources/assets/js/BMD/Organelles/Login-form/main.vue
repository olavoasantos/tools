<template>
    <li>
        <!-- Button show modal -->
        <a @click="isVisible = true">
            <slot>Login</slot>
        </a>

        <form @submit.prevent="submit"
              @keydown="form.errors.clear($event.target.name)"
        >
            <modal v-if="isVisible" @close="isVisible = false">
                <template slot="title">
                    Login
                </template>
                <template>
                    <!-- E-mail input -->
                    <div :class="{ 'form-control' : true, 'has-error' : form.errors.has('email')}"
                         :data-message="form.errors.get('email')"
                         data-label="E-mail"
                    >
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <input type="text" placeholder="E-mail" name="email" v-model="form.email">
                    </div>

                    <!-- Password input -->
                    <div :class="{ 'form-control' : true, 'has-error' : form.errors.has('password')}"
                         :data-message="form.errors.get('password')"
                         data-label="Password"
                    >
                        <div class="icon">
                            <i class="fa fa-lock"></i>
                        </div>
                        <input type="password" placeholder="Password" name="password" v-model="form.password">
                    </div>
                </template>
                <template slot="footer">
                    <!-- Button Submit -->
                    <button style="font-size: inherit" :class="{
                                'item action' : true,
                                'is-disabled' : form.errors.any()
                            }"
                            type="submit"
                    >Login
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
                    return {email: '', password: ''}
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
                this.form.post('/login')
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