<template>
    <div class="popup">
        <div class="popup__header">
            <span style="color: #cccccc"><h2>Settings</h2></span>
            <span>


        </span>
        </div>
        <div class="popup__content">
            <slot></slot>
        </div>

        <div class="popup__footer">
            <my-button type="submit" @click.prevent="$emit('save')">
                <span id="boot-icon" class="bi bi-send-check-fill" style="font-size: 1rem; color: rgb(255, 255, 255); opacity: 1;">Save</span>
                </my-button>
            <my-button type="submit" @click.prevent="close"><i class="fa fa-close " style="color: white; cursor: pointer" >Close</i></my-button>
        </div>


    </div>
</template>

<script>
export default {
    name: "popup-window",
    methods: {
        close() {
            this.$emit('close')
        },
        save() {
            this.$emit('save')
        }
    }
}
</script>

<style lang="scss">
.popup {
    padding: 16px;
    position: fixed;
    top: 50px;
    width: 400px;
    background-color: #1a202c;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.5), 0 5px 0 rgba(0, 0, 0, 0.2);

    &__header, &__footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    &__content {

        justify-content: center;
        align-content: center;
    }

}

</style>
