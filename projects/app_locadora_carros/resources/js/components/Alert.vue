<template>
    <div :class="style" role="alert">
        This is a success alert—check it out!
        {{type}}
    </div>
</template>

<script>
    export default {
        props: ['type'],
        computed: {
            style() {
                return "alert alert-" + this.type;
            }
        }
    }
</script>
