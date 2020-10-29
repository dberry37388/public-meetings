<template>
    <div id="agendaItems" class="pr-md-4">
        <h2 class="mb-4">Meeting Agenda</h2>

        <button class="btn btn-sm btn-primary mb-2" @click="toggleShow" v-show="!addItem">Add Item</button>

        <div class="alert alert-success" v-show="showSuccessMessage">New Item was added!</div>

        <div v-show="addItem">
            <div class="form-group">
                <input type="text" class="form-control" v-model="newTopic">
            </div>

            <div class="form-group mt-2">
                <textarea class="form-control" rows="4" v-model="newDescription"></textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-sm btn-dark" @click="addItemToAgenda">Update</button>
                <button class="btn btn-sm btn-danger" @click="toggleShow">Cancel</button>
            </div>
        </div>

        <ul class="list-group">
            <li class="list-group-item" v-for="(agendaItem, index) in currentItems">
                <agenda-item :item="agendaItem"></agenda-item>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: 'AgendaItems',
        props: {
            items: Array,
            authorized: Number
        },
        data() {
            return {
               currentItems: this.items,
                addItem: false,
                newTopic: '',
                newDescription: '',
                showSuccessMessage: false,
            }
        },
        methods: {
            toggleShow() {
                this.addItem = !this.addItem
            },
            addItemToAgenda() {
                this.currentItems.push({
                    topic: this.newTopic,
                    description: this.newDescription
                });

                this.newTopic = '';
                this.newDescription = '';
                this.addItem = false;
                this.showSuccessMessage = true;
            }
        },
    };
</script>
