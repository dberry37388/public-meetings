<template>
    <div>
        <div v-show="!edit">
            <h5 class="mb-1">
                {{ topic }}
            </h5>

            <p class="mb-1" v-show="!edit">
                {{ description }}
            </p>

            <button class="btn btn-sm btn-dark mt-2" @click="toggleShow">Edit</button>
        </div>

        <div v-show="edit">
            <div class="form-group">
                <input type="text" class="form-control" v-model="topic">
            </div>

            <div class="form-group mt-2">
                <textarea class="form-control" rows="4" v-model="description"></textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-sm btn-dark" @click="updateItem">Update</button>
                <button class="btn btn-sm btn-danger" @click="toggleShow">Cancel</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "agendaItem",
        props: {
            item: Object
        },
        data() {
            return {
                topic: this.item.topic,
                description: this.item.description,
                edit: false,
            }
        },
        methods: {
            toggleShow() {
                this.edit = !this.edit
            },
            updateItem() {
                axios.put('/api/meetings/update-agenda-item', {
                    agenda_id: this.item.id,
                    topic: this.topic,
                    description: this.description
                }).then(response => {
                    console.log(response);
                    this.edit = false;
                });
            }
        },
    }
</script>
