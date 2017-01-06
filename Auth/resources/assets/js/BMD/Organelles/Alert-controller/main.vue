<template>
    <div class="alert">
        <slot></slot>
        <alert v-for="alert in alerts"
               :highlight="alert.highlight"
               :type="alert.type"
               :message="alert.message"
               :icon="alert.icon"
        ></alert>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                alerts: this.$alert.all()
            };
        },
    }
</script>