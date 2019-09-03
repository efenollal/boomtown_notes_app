<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>{{!edit ? 'Create' : 'Edit'}} Note</h2>
                <div class="alert alert-danger" role="alert" v-if="errors.note">{{errors.note[0]}}</div>
                <form @submit.prevent="edit ? updateNote(post.note.id) : createNote()">
                    <div class="form-group">
                    <textarea v-show="!edit" class="form-control" v-model="post.note" rows="10" cols="30" placeholder="Add your note"></textarea>
                    <textarea v-show="edit" class="form-control" v-model="post.note.note" rows="10" cols="30" placeholder="Add your note"></textarea>
                    </div>
                    <div class="form-group">
                        <button v-show="!edit" type="submit" class="btn btn-primary btn-md">Add Note</button>
                        <button v-show="edit" type="submit" class="btn btn-primary btn-md">Update Note</button>
                        <a href="/notes" class="btn btn-warning btn-md ">Back to notes</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['edit', 'id'],
    data() {
        return {
            message: '',
            errors: [],
            post: {note: ''}
        }
    },
    created() {
        console.log(this.post)
        if (this.edit) {
            this.fetchNote();
        }
    },
    methods: {
        fetchNote() {
            Axios
            .get(`/notes/fetch-note/${this.id}`)
            .then((response) => {
                this.post = response.data;
            });
        },
        createNote() {
            Axios
            .post('/notes', {note: this.post.note})
            .then((response) => {
                this.message = response.data;
                window.location.href = '/notes';
            })
            .catch((error) => {
                if (error.response.status == 422) {
                    this.errors = error.response.data.errors;
                }
            });
        },
        updateNote(id) {
            Axios
            .patch(`/notes/${id}`, this.post)
            .then((response) => {
                if (response.status == 200) {
                    window.location.href = '/notes';
                    this.post.note = '';
                }
            })
            .catch((error) => {
                if (error.response.status == 500) {
                    console.log(error.response)
                    this.errors = {note: ['Error updating note. Please try again later']}
                }
            });
        }
    }
}
</script>
