import './bootstrap'
import { createApp } from 'vue'
import Choice from './components/RandomChooser.vue'

const app = createApp({
    components: {
        Choice
    }
})

app.mount('#app')
