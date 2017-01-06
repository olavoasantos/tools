<template>
    <div :class="cardClass" @mouseenter="stopTimer" @mouseleave="startTimer" v-if="isVisible">
        <div class="alert-icon">
            <span class="icon">
                <i :class="iconClass"></i>
            </span>
        </div>
        <div v-if="highlight" class="highlight">
            {{ highlight }}
        </div>
        <div v-if="message" class="message">
            {{ message }}
        </div>
    </div>
</template>

<script>
    export default {
        props: ['type', 'icon', 'highlight', 'message'],
        data() {
            return {
                timer: null,
                isVisible: true,
            }
        },
        computed: {
            iconClass() {
                return `fa fa-${this.icon}`;
            },
            cardClass() {
                return `alert-card is-${this.type}`;
            },
            isntHidden() {
                return (this.isVisible && !this.wasHidden)
            }
        },
        mounted() {
            this.startTimer();
        },
        methods: {
            startTimer() {
                this.timer = setTimeout(() => {
                    this.dismiss();
                }, 3000);
            },
            stopTimer() {
                clearTimeout(this.timer);
            },
            dismiss() {
                this.isVisible = false;
            }
        },
    }
</script>