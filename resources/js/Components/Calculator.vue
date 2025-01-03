<template>
    <div class="calculator">
      <div class="display">
        <input type="text" v-model="currentValue" readonly />
      </div>
      <div class="buttons">
        <button v-for="button in btns" :key="button" @click="handleClick(button)">
          {{ button }}
        </button>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: "Calculator",
    data() {
      return {
        currentValue: "",
        btns: [
          "7", "8", "9", "/",
          "4", "5", "6", "*",
          "1", "2", "3", "-",
          "0", ".", "=", "+",
          "C"
        ],
      };
    },
    methods: {
      handleClick(button) {
        if (button === "C") {
          this.currentValue = "";
        } else if (button === "=") {
          try {
            this.currentValue = eval(this.currentValue).toString();
          } catch (e) {
            this.currentValue = "Error";
          }
        } else {
          this.currentValue += button;
        }
      },
    },
  };
  </script>
  
  <style scoped>
  .calculator {
    max-width: 300px;
    margin: auto;
    border: 1px solid #ccc;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  .display {
    background: #f4f4f4;
    padding: 10px;
    text-align: right;
    font-size: 1.5em;
  }
  .display input {
    width: 100%;
    border: none;
    background: none;
    font-size: inherit;
    text-align: right;
    outline: none;
  }
  .buttons {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1px;
    background: #ccc;
  }
  .buttons button {
    background: white;
    border: none;
    padding: 20px;
    font-size: 1.2em;
    cursor: pointer;
    outline: none;
    transition: background 0.2s;
  }
  .buttons button:hover {
    background: #f0f0f0;
  }
  .buttons button:active {
    background: #ddd;
  }
  </style>
  