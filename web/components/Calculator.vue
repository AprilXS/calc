<template>
  <div>
    <form @submit.prevent="calculate" ref="calcForm">
      <div>
        <label for="num1">Number 1:</label>
        <input type="number" v-model="num1" id="num1" required />
      </div>
      <div>
        <label for="num2">Number 2:</label>
        <input type="number" v-model="num2" id="num2" required />
      </div>
      <div>
        <label for="operator">Operator:</label>
        <select v-model="operator" id="operator" required>
          <option value="add">Add</option>
          <option value="sub">Subtract</option>
          <option value="mul">Multiply</option>
          <option value="div">Divide</option>
        </select>
      </div>
      <button type="submit" :disabled="isSubmitting">Calculate</button>
    </form>
    <div v-if="result !== null">
      <p>Result: {{ result }}</p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      num1: '',
      num2: '',
      operator: 'add',
      result: null,
      csrfToken: null, // To store the CSRF token
      csrfTokenFetched: false, // Flag to track if CSRF token has been fetched
      isSubmitting: false // Flag to track form submission state
    };
  },
  async mounted() {
    // Fetch CSRF token only if not already fetched
    if (!this.csrfTokenFetched) {
      await this.fetchCsrfToken();
    }
  },
  methods: {
    async fetchCsrfToken() {
      try {
        const csrfResponse = await fetch('http://localhost:8000/get-csrf-token', {
          credentials: 'include' // Include cookies
        });
        if (!csrfResponse.ok) {
          throw new Error('Failed to get CSRF token.');
        }
        const csrfData = await csrfResponse.json();
        this.csrfToken = csrfData.csrf_token;
        this.csrfTokenFetched = true;
      } catch (error) {
        console.error('Error fetching CSRF token:', error.message);
      }
    },
    async calculate() {
      try {
        this.csrfToken = decodeURIComponent(this.csrfToken); // Decode the token
        // Ensure CSRF token is fetched before sending request
        if (!this.csrfToken) {
          throw new Error('CSRF token not fetched.');
        }

        // Prevent double submission
        if (this.isSubmitting) {
          return;
        }
        this.isSubmitting = true;

        // Prepare API request
        const url = `http://localhost:8000/${this.operator}`;
        console.log(this.csrfToken);
        const response = await fetch(url, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': this.csrfToken
          },
          body: JSON.stringify({
            num1: this.num1,
            num2: this.num2
          }),
          credentials: 'include' // Include cookies
        });

        // Handle response
        if (response.ok) {
          const data = await response.json();
          this.result = data.result;
        } else {
          throw new Error('Failed to calculate.');
        }
      } catch (error) {
        console.error('Error calculating:', error.message);
      } finally {
        this.isSubmitting = false; // Reset form submission flag
      }
    }
  }
};
</script>

<style scoped>
/* Add your styles here */
</style>
