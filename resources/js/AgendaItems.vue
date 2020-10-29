<template>
    <div id="agendaItems" class="pr-md-4">
        <div class="d-flex justify-content-between mb-4">
            <h2>Meeting Agenda</h2>

            <div class="btn-group">
                <button class="btn btn-sm btn-primary mb-2" @click="toggleShow" v-show="!addItem" v-if="authorized">Add Item</button>
                <button class="btn btn-sm btn-default mb-2" @click="toggleAgendaPrivacy" v-show="!addItem" v-if="authorized && !isPrivate">Make Private</button>
                <button class="btn btn-sm btn-default mb-2" @click="toggleAgendaPrivacy" v-show="!addItem" v-if="authorized && isPrivate">Make Public</button>
            </div>
        </div>

        <div v-if="authorized">

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
        </div>

        <div v-if="isPrivate && !authorized">
            <div class="alert alert-info">
                The agenda for this meeting is private.
            </div>
        </div>

        <div v-else>
            <ul class="list-group">
                <li class="list-group-item" v-for="(agendaItem, index) in items">
                    <agenda-item :item="agendaItem"></agenda-item>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'AgendaItems',
        props: {
            meeting: Object,
            authorized: Number
        },
        data() {
            return {
                items: this.meeting.agenda_items,
                isPrivate: this.meeting.is_agenda_private,
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
                axios.post('/api/meetings/add-item', {
                    meeting_id: this.meeting.id,
                    topic: this.newTopic,
                    description: this.newDescription
                }).then(response => {
                    this.items.push({
                        topic: this.newTopic,
                        description: this.newDescription
                    });

                    this.newTopic = '';
                    this.newDescription = '';
                    this.addItem = false;
                    this.showSuccessMessage = true;
                });
            },
            toggleAgendaPrivacy() {
                let isPrivate = !this.isPrivate;

                axios.post('/api/meetings/make-agenda-private', {
                    meeting_id: this.meeting.id,
                    privacy: isPrivate
                }).then(response => {
                    console.log(response);
                });

                this.isPrivate = isPrivate;
            },
        },
    };
</script>
