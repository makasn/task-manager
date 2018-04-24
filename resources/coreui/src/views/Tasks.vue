<template>
  <div class="animated fadeIn">
    <div class="mb-4">
      <i class="fa fa-pencil-square-o fa-lg fa-2x" @click="largeModal = true"></i>
    </div>
    <b-row>
      <b-col v-for="task in tasks" :key="task.id" sm="6" md="4">
        <b-card :header="task.name">
          テスト用カード
        </b-card>
      </b-col>
    </b-row>
    <b-modal title="Create Task" size="lg" v-model="largeModal" @ok="largeModal = false" hide-footer = true>
      <b-input-group class="mb-3">
        <b-input-group-prepend><b-input-group-text><i class="icon-user"></i></b-input-group-text></b-input-group-prepend>
        <input id="name" type="name" class="form-control" v-model="name" placeholder="name" required autofocus>
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
        http.post('task/create', {name: this.name}, res => {
            this.largeModal = false
            this.$router.push('/tasks')
        }, error => {
            this.showAlert = true
            this.alertMessage = 'Failed to create.'
        })
    },
  }
}
</script>
