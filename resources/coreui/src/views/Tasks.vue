<template>
  <div class="animated fadeIn">
    <div class="mb-4">
      <i class="fa fa-pencil-square-o fa-lg fa-2x" @click="largeModal = true"></i>
    </div>
    <b-row>
      <b-col v-for="task in tasks" :key="task.id" sm="6" md="4">
        <b-card :header="task.name">
          {{ task.description }}
        </b-card>
      </b-col>
    </b-row>
    <b-modal title="Create Task" size="lg" v-model="largeModal" @ok="largeModal = false" hide-footer>
      <p class="alert alert-danger" role="alert" v-if="showAlert">
      {{ alertMessage }}
      </p>
      <b-input-group class="mb-3">
        <b-input-group-prepend><b-input-group-text><i class="fa fa-tasks"></i></b-input-group-text></b-input-group-prepend>
        <input id="name" type="name" class="form-control" v-model="name" placeholder="name" required autofocus>
      </b-input-group>
      <b-input-group class="mb-3">
        <b-input-group-prepend><b-input-group-text><i class="fa fa-pencil"></i></b-input-group-text></b-input-group-prepend>
        <input id="description" type="text" class="form-control" v-model="description" placeholder="description" autofocus>
      </b-input-group>
      <b-input-group class="mb-3">
        <b-input-group-prepend><b-input-group-text><i class="fa fa-calendar"></i></b-input-group-text></b-input-group-prepend>
        <input id="start_date" type="date" class="form-control" v-model="start_date" placeholder="start_date" autofocus>
      </b-input-group>
      <b-input-group class="mb-3">
        <b-input-group-prepend><b-input-group-text><i class="fa fa-calendar"></i></b-input-group-text></b-input-group-prepend>
        <input id="end_date" type="date" class="form-control" v-model="end_date" placeholder="end_date" autofocus>
      </b-input-group>
      <b-row>
        <b-col cols="6">
          <b-button @click="create" type="submit" variant="primary" class="px-4">Create</b-button>
        </b-col>
      </b-row>
    </b-modal>
  </div>
</template>

<script>
import userStore from '../../../assets/js/stores/userStore.js'
import http from '../../../assets/js/services/http.js'

export default {
  name: 'tasks',
  created() {
    this.fetchTasks()
  },
  data() {
    return {
      tasks: [],
      name: '',
      description: '',
      start_date: '',
      end_date: '',
      showAlert: false,
      alertMessage: '',
      userState: userStore.state,
      largeModal: false,
    }
  },
  methods: {
    fetchTasks() {
      http.get('tasks', res => {
          this.tasks = res.data
      })
    },
    create() {
      var req = {
        name: this.name,
        description: this.description,
        start_date: this.start_date,
        end_date: this.end_date,
      }
      http.post('task/create', req, res => {
          this.largeModal = false
          this.fetchTasks();
      }, error => {
          this.showAlert = true
          this.alertMessage = 'Failed to create.'
      })
    },
  }
}
</script>
