<template>
    <div class="favoriting">
        <label for="id-of-input" class="custom-checkbox">
            <input type="checkbox" id="id-of-input"/>
            <i class="fa fa-heart"></i>
        </label>
    </div>
</template>
<style>
label {
    /* Presentation */
    font-size: 16px
}

/* Required Styling */

label input[type="checkbox"] {
    display: none;
}

.custom-checkbox {
    position: relative;
    cursor: pointer;
}

.custom-checkbox .fa {
    color: gray;
    font-size: 16px;
}

.custom-checkbox .fa-heart {
    color: red;
    transition: opacity 0.2s ease-in-out;
}

.custom-checkbox input[type="checkbox"]:checked ~ .fa-heart {
    color: red;
    opacity: 1;
}
</style>
<script>
export default {
    name: 'favoriteButton'
}
</script>
