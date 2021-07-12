<template>
    <div class="flex my-2">
        <p :class="block">{{phone}}</p>
        <form :action="action" method="post" :class="hidden">
            <input type="hidden" name="_token" :value="csrf_token">
            <input type="hidden" name="_method" value="PUT">
            <input type="text" name="name" class="bg-gray-100 px-2 py-0.5 rounded" :value="phoneNumber" placeholder="Edit">    
            <button type="submit" class="px-2 py-0.5 rounded text-white bg-green-500">Update</button>
        </form>
        <button @click="openForm()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rounded p-0.5 bg-blue-500 text-white mx-1" fill="none" v-if="cancel" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 rounded p-0.5 bg-red-500 text-white mx-1" fill="none" v-else viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </button>
    </div>
</template>

<script>
    export default {
        props: ['phone', 'update', 'csrf'],
        data() {
            return {
                hidden: "hidden",
                block: "block",
                phoneNumber: this.phone,
                action: this.update,
                csrf_token: this.csrf,
                cancel: true
            }
        },
        methods: {
            openForm(){
                if (this.hidden == "hidden") {
                    this.hidden = ''
                    this.block = "hidden"
                    this.cancel = false
                } else {
                    this.hidden = 'hidden'
                    this.block = 'block'
                    this.cancel = true
                }
            }
        },
    }
</script>