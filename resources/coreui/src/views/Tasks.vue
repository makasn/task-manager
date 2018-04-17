<template>
  <div class="animated fadeIn">
    <b-row>
      <b-col v-for="task in tasks" :key="task.id" sm="6" md="4">
        <b-card :header="task.name">
          テスト用カード
        </b-card>
      </b-col>
    </b-row><!--/.row-->
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
    }
  },
  methods: {
    fetchTasks() {
      http.get('tasks', res => {
          this.tasks = res.data
      })
    },
  }
}
</script>
