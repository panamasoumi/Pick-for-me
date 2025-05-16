<template>
  <div class="container">
    <h1>🤔نمیدونم کدوم </h1>
    <div class="inputs">
      <input v-model="option1" placeholder="گزینه اول" />
      <input v-model="option2" placeholder="گزینه دوم" />
    </div>
    <button @click="choose" :disabled="loading">
      {{ loading ? 'در حال انتخاب...' : 'انتخاب کن 🎯' }}
    </button>

    <div class="result" v-if="result">
      <span class="animated">✅{{ result }}</span>
    </div>

    <audio ref="sound" src="/sound.mp3" preload="auto"></audio>
  </div>
</template>

<script>
export default {
  data() {
    return {
      option1: '',
      option2: '',
      result: '',
      loading: false
    }
  },
  methods: {
    choose() {
      const options = [this.option1, this.option2].filter(Boolean)
      if (options.length < 2) {
        alert('لطفاً هر دو گزینه رو وارد کن!')
        return
      }

      this.loading = true
      this.result = ''

      setTimeout(() => {
        const winner = options[Math.floor(Math.random() * options.length)]
        this.result = winner
        this.loading = false
        this.$refs.sound.play()
      }, 1500)
    }
  }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;700&display=swap');

.container {
  font-family: 'Vazirmatn', sans-serif;
  text-align: center;
  margin-top: 100px;
  padding: 30px;
  background: linear-gradient(to right, #ffecd2, #fcb69f);
  border-radius: 16px;
  width: 90%;
  max-width: 500px;
  margin-left: auto;
  margin-right: auto;
  box-shadow: 0 8px 24px rgba(0,0,0,0.2);
}

h1 {
  font-size: 2rem;
  color: #333;
  margin-bottom: 30px;
}

.inputs {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

input {
  padding: 12px;
  border: 2px solid #ddd;
  border-radius: 8px;
  font-size: 1rem;
  text-align: center;
}

button {
  margin-top: 20px;
  padding: 12px 24px;
  background-color: #ff6f61;
  color: white;
  border: none;
  border-radius: 30px;
  font-size: 1.2rem;
  cursor: pointer;
  transition: all 0.3s ease;
}

button:hover {
  background-color: #e34d38;
}

.result {
  margin-top: 30px;
}

.animated {
  display: inline-block;
  font-size: 2rem;
  animation: bounce 0.8s ease infinite alternate;
  color: #222;
}

@keyframes bounce {
  0%   { transform: scale(1); }
  100% { transform: scale(1.2); }
}
</style>
