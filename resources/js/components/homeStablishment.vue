<template>
    <div class="container">
        <categoryOne></categoryOne>
        <categoryTwo></categoryTwo>
    </div>
</template>

<script>
    import categoryOne from './categoryOne';
    import categoryTwo from './categoryTwo';

    export default {
        components: {
            categoryOne,
            categoryTwo
        },
    }
</script>