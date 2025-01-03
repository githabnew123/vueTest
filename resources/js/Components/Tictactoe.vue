<template>
  <div class="tic-tac-toe">
    <h1>Tic Tac Toe</h1>
    <div class="board">
      <div
        v-for="(cell, index) in board"
        :key="index"
        class="cell"
        @click="makeMove(index)"
      >
        {{ cell }}
      </div>
    </div>
    <div class="status">
      <p v-if="winner">Winner: {{ winner }}</p>
      <p v-else>Current Player: {{ currentPlayer }}</p>
    </div>
    <button @click="resetGame">Reset Game</button>
  </div>
</template>

<script>
export default {
  name: "TicTacToe",
  data() {
    return {
      board: Array(9).fill(null),
      currentPlayer: "X",
      winner: null,
    };
  },
  methods: {
    makeMove(index) {
      if (!this.board[index] && !this.winner) {
        this.board[index] = this.currentPlayer;
        if (this.checkWinner()) {
          this.winner = this.currentPlayer;
        } else {
          this.currentPlayer = this.currentPlayer === "X" ? "O" : "X";
        }
      }
    },
    checkWinner() {
      const winningCombinations = [
        [0, 1, 2],
        [3, 4, 5],
        [6, 7, 8],
        [0, 3, 6],
        [1, 4, 7],
        [2, 5, 8],
        [0, 4, 8],
        [2, 4, 6],
      ];
      return winningCombinations.some((combination) => {
        const [a, b, c] = combination;
        return (
          this.board[a] &&
          this.board[a] === this.board[b] &&
          this.board[a] === this.board[c]
        );
      });
    },
    resetGame() {
      this.board = Array(9).fill(null);
      this.currentPlayer = "X";
      this.winner = null;
    },
  },
};
</script>

<style scoped>
.tic-tac-toe {
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: Arial, sans-serif;
}
.board {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 5px;
  margin: 20px 0;
}
.cell {
  width: 100px;
  height: 100px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 1px solid #ccc;
  font-size: 2em;
  cursor: pointer;
  user-select: none;
}
.cell:hover {
  background-color: #f0f0f0;
}
.status {
  margin-bottom: 20px;
}
button {
  padding: 10px 20px;
  font-size: 1em;
  cursor: pointer;
  border: none;
  background-color: #007bff;
  color: white;
  border-radius: 5px;
}
button:hover {
  background-color: #0056b3;
}
</style>
