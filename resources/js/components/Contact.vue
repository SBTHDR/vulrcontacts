<template>
	<div class="row p-5" >
		<div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>Contacts List</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Title</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="list in lists" :key="list.id">
                            <th scope="row">{{ list.id }}</th>
                            <td>{{ list.name }}</td>
                            <td>{{ list.title }}</td>
                            <td>{{ list.phone }}</td>
                            <td>
                                <button @click="editContact(list)" class="btn btn-sm btn-primary">Edit</button>
                                <button @click="deleteContact(list.id)" class="btn btn-sm btn-danger">Delete</button>
                            </td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 id="addTeacher">Contacts Form</h5>
                </div>
                <div class="card-body">
                    <div>
                        <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" class="form-control" id="name" v-model="item.name" placeholder="Contact name">
                          <span class="text-danger" id="nameError"></span>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" v-model="item.title" placeholder="Contact title">
                            <span class="text-danger" id="titleError"></span>
                          </div>
                          <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" v-model="item.phone" placeholder="Contact phone">
                            <span class="text-danger" id="phone"></span>
                          </div>
                        <button @click="save" id="addButton" class="btn btn-primary">{{ isEdit ? 'Update Contact' : 'Add Contact' }}</button>
                    </div>
                </div>
            </div>
        </div>
	</div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'Contact',
  data() {
  	return {
  		lists: [],
  		item: {
  			name: '',
  			title: '',
  			phone: ''
  		},
  		contact_id: null,
  		isEdit: false
  	}
  },
  created() {
  	this.fetchAll();
  },
  methods: {
  	fetchAll() {
  		axios.get('/api/contacts')
  			.then(res => this.lists = res.data)
  	},
  	
  	save() {
  		let method = axios.post;
  		let url = '/api/contacts'

  		if (this.isEdit) {
  			method = axios.put;
  			url = `/api/contacts/${this.contact_id}`
  		}

  		try {
  			method(url, this.item)
  				.then(res => this.fetchAll());
  				this.item = {
		  			name: '',
		  			title: '',
		  			phone: ''
		  		};
		  		this.contact_id = null;
		  		this.isEdit = false;
  		} catch (err) {
  			console.log(err);
  		}
  	},

  	editContact(contact) {
  		this.item = {
  			name: contact.name,
  			title: contact.title,
  			phone: contact.phone
  		}
  		this.contact_id = contact.id,
  		this.isEdit = true
  	},

  	deleteContact(id) {
  		try {
  			axios.delete(`/api/contacts/${id}`)
  				.then(res => this.fetchAll())
  		} catch (e) {
  			console.log(err);
  		}
  	}

  }
}
</script>

<style scoped>
</style>