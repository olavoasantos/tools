<template>
    <div>
        <div class="overlay is-visible" @click="$emit('close')"></div>
        <div class="modal is-visible">
            <div class="header">
                <div class="title">
                    <slot name="title"></slot>
                </div>
            </div>
            <div class="content">
                <slot></slot>
            </div>
            <div class="footer">
                <div v-if="isClosable" @click="$emit('close')" class="item action">Close</div>
                <slot name="footer"></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            isClosable: {
                default: true
            }
        }
    }
</script>