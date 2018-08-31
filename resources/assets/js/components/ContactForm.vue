<template lang="html">
    <div class="contactform">
        <form @submit.prevent="addContact" class="text-left">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name" v-model="contact.contact_name" >
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Your Email" v-model="contact.contact_email" >
            </div>
            <div class="form-group">
                <input type="" class="form-control" placeholder="Website" v-model="contact.contact_web" >
            </div>
            <div class="form-group">
                <textarea rows="10" class="form-control" placeholder="Your Message" v-model="contact.contact_message"  ></textarea>
            </div>
            <button type="submit" class="btn btn-pm">Save</button>
            <button @click="" class="btn btn-dark">Reset</button>
        </form>
    </div>
</template>

<script>
    export default{
        data(){
            return{

                contacts: [],
                contact: {
                _token: document.querySelector("meta[name='csrf-token']").getAttribute("content"),
                contact_name: '',
                contact_web:'',
                contact_message: '',
                contact_email:'',
                status:'',
                },
                contact_id:'',
                search:'',
                pagination: {},
                flag: false,
                edit: false,
                editMode: false,
                createMode: true,
                };
        },
        methods:{
            addContact() {
            if (this.edit === false) {
                    // Add
                    fetch('api/contacts', {
                    method: 'post',
                    body: JSON.stringify(this.contact),
                    headers: {
                        'content-type': 'application/json'
                    }
            })
            .then(res => res.json())
            .then(data => {
                this.contact.contact_name = '';
                this.contact.contact_web = '';
                this.contact.contact_email = '';
                this.contact.contact_message = '';
                alert('Contact Added');
                this.fetchData();
            })
            .catch(err => console.log(err));
            } else {
                // Update
                fetch('api/contacts', {
                method: 'put',
                body: JSON.stringify(this.contact),
                headers: {
                    'content-type': 'application/json'
                }
                })
                .then(res => res.json())
                .then(data => {
                    this.contact.contact_name = '';
                    this.contact.contact_web = '';
                    this.contact.contact_email = '';
                    this.contact.contact_message = '';
                    alert('Contact Updated');
                    this.fetchData();
                })
                .catch(err => console.log(err));
            }
            this.editMode = false;
            },
        }
    }
</script>