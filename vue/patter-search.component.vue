<template>
  <form action="/search" method="get" v-on:submit="verifyForm">
    <input type="hidden" name="pattern" v-model="patternString">
    <input type="hidden" name="category" v-model="category">

    <p class="text-3xl font-semibold my-4 text-center">
      Prefix Lorem
    </p>

    <div class="flex flex-no-wrap w-full max-w-sm justify-between mx-auto">

      <!--Prefix group-->
      <div class="flex flex-col text-center">
        <label class="advanced-search-label">
          <strong>1.</strong> Select a letter
        </label>
        <div class="flex flex-no-wrap flex-row">
          <select v-on:change="selectOnChange"
                  v-on:keydown="selectOnKey"
                  placeholder="ANY"
                  data-hj-whitelist
                  autocomplete="off"
                  type="text"
                  v-model="pattern.prefix"
                  data-pattern="prefix"
                  class="advanced-search-select"
                  :class="{'text-aliceblue-900': !pattern.prefix.length}"
                  maxlength="1">
            <option class="disabled" value="">ANY</option>
            <option v-for="option in this.lettersAvailable" :value="option">{{ option }}</option>
          </select>
        </div>
      </div>

      <!--Numbers group-->
      <div class="flex flex-col text-center flex-grow content-center items-center">
        <label class="advanced-search-label">
          <strong>2.</strong> Select a number
        </label>
        <div class="flex flex-no-wrap flex-row">
          <select v-on:change="selectOnChange"
                  v-on:keydown="selectOnKey"
                  placeholder=""
                  data-hj-whitelist
                  autocomplete="off"
                  type="text"
                  v-model="pattern.numbers"
                  data-pattern="numbers"
                  class="advanced-search-select"
                  :class="{'text-aliceblue-900': !pattern.numbers.length}">
            <option class="disabled" value="">ANY</option>
            <option v-for="number in this.numbersAvailable" :value="number">{{ number }}</option>
          </select>
        </div>
      </div>

      <!--Letter group-->
      <div class="flex flex-col text-center">
        <label class="advanced-search-label">
          <strong>3.</strong> Enter your letters
        </label>
        <div class="flex flex-no-wrap flex-row">
          <input v-on:input="inputOnChange"
                 v-on:keydown="inputOnKey"
                 v-mask="'A'"
                 placeholder=""
                 data-hj-whitelist
                 type="text"
                 autocomplete="off"
                 v-model="pattern.letter1"
                 class="advanced-search-input mr-1"
                 maxlength="1"/>
          <input v-on:input="inputOnChange"
                 v-on:keydown="inputOnKey"
                 v-mask="'A'"
                 placeholder=""
                 data-hj-whitelist
                 type="text"
                 autocomplete="off"
                 v-model="pattern.letter2"
                 class="advanced-search-input mr-1"
                 maxlength="1"/>
          <input v-on:input="inputOnChange"
                 v-on:keydown="inputOnKey"
                 v-mask="'A'"
                 placeholder=""
                 data-hj-whitelist
                 type="text"
                 autocomplete="off"
                 v-model="pattern.letter3"
                 class="advanced-search-input"
                 maxlength="1"/>
        </div>
      </div>
    </div>

    <div>
      <div class="flex flex-row flex-no-wrap justify-center items-center max-w-sm mx-auto my-2">
        <div class="flex flex-row items-center justify-between relative shadow flex-grow mr-2">
          <div class="relative w-full flex-1">
            <div class="w-full flex flex-row items-center h-14">
              <p data-hj-whitelist class="
                            whitespace-no-wrap overflow-hidden shadow bg-yellow-500  text-black rounded block text-center font-number text-5xl px-1
                            w-full h-14 font-number text-center flex items-center justify-center text-center mx-auto flex-row"
                 v-html="patternView"
              >
              </p>
            </div>
          </div>
        </div>
        <button type="submit"
                class="text-white text-xl md:text-3xl px-3 pt-1 border-l border-gray-400 w-14 h-14 leading-4 bg-black shadow">
          <i class="fa fa-search"></i>
        </button>
      </div>
      <p class="text-xs text-center text-red-400 py-2">{{ errorMessage }}</p>
    </div>
  </form>

</template>

<script>
import {mask} from 'vue-the-mask'

export default {
  directives: {mask},
  name: "LoremIpsumComponent",
  props: [
    'data'
  ],
  mounted() {
    let pattern = this.data.pattern;
    if (pattern !== '' && this.data.category === this.category) {
      pattern = pattern.split('-');
      this.pattern.prefix = pattern[0] ?? '';
      this.pattern.numbers = pattern[1] ?? '';
      this.pattern.letter1 = pattern[2] ?? '';
      this.pattern.letter2 = pattern[3] ?? '';
      this.pattern.letter3 = pattern[4] ?? '';
    }
  },
  data() {
    return {
      category: 'prefix-style',
      pattern: {
        prefix: '',
        numbers: '',
        letter1: '',
        letter2: '',
        letter3: '',
      },
      errorMessage: '',
      lettersAvailable: [
        "A", "B", "C", "D", "E", "F", "G", "H", "J", "K", "L",
        "M", "N", "P", "R", "S", "T", "V", "W", "X", "Y",
      ],
      numbersAvailable: [
        "1", "2", "3", "4", "5", "6", "7", "8", "9", "10",
        "11", "12", "13", "14", "15", "16", "17", "18", "19", "20",
        "21", "22", "23", "24", "25", "26", "27", "28", "29", "30",
        "31", "33", "40", "44", "50", "55", "60", "66", "70", "77",
        "80", "88", "90", "99", "100", "111", "121", "123", "155",
        "200", "222", "300", "321", "333", "400", "444", "500", "555",
        "600", "666", "700", "777", "800", "888", "900", "999",
      ],
    }
  },
  computed: {
    patternView() {
      if (this.isPatternEmpty()) {
        return "Lo IPS"
      }

      return this.previewLetter('prefix') +
          this.previewNumber('numbers') + '&nbsp;' +
          this.previewLetter('letter1') +
          this.previewLetter('letter2') +
          this.previewLetter('letter3');
    },

    patternString() {
      let pattern = '';
      let prefix = this.pattern.prefix;
      let numbers = this.pattern.numbers;
      let letter1 = this.pattern.letter1;
      let letter2 = this.pattern.letter2;
      let letter3 = this.pattern.letter3;
      pattern = prefix + '-' + numbers + '-' + letter1 + '-' + letter2 + '-' + letter3;
      return pattern;
    }
  },

  methods: {

    isPatternEmpty() {
      return (!Object.keys(this.patternFiltered()).length);
    },

    patternFiltered() {
      let filtered = {};
      for (let key in this.pattern) {
        if (this.pattern[key] !== '' && this.pattern[key] !== '*') {
          filtered[key] = this.pattern[key];
        }
      }
      return filtered;
    },

    isAny(char) {
      return (char === '*' || char === '');
    },

    selectOnChange(event) {
      this.focusNextInput(event.target);
    },

    selectOnKey(event) {
      let input = event.target;
      if (event.key === 'Backspace') {
        this.focusPreviousInput(input);
        event.stopPropagation();
      }
    },

    inputOnKey(event) {
      let input = event.target;
      if (event.key === 'Backspace') {
        if (event.target.value.length === 0) {
          this.focusPreviousInput(input);
          event.stopPropagation();
        }
      }
    },

    inputOnChange(event) {
      let input = event.target;
      if (input.value.length > 0) {
        this.focusNextInput(input);
      }
    },

    getCurrentInputIndex(inputs, current) {
      let currentInputIndex = 0;
      [].forEach.call(inputs, (el, index) => {
        if (el === current) {
          currentInputIndex = index;
        }
      });
      return currentInputIndex;
    },

    focusNextInput(currentInput) {
      let inputs = this.$el.querySelectorAll('input, select');
      let currentInputIndex = this.getCurrentInputIndex(inputs, currentInput);
      let nextInput = inputs[currentInputIndex + 1];
      if (!!nextInput) {

        if (nextInput.nodeName === 'INPUT' && nextInput.value.length !== 0) {
          nextInput.setSelectionRange(0, nextInput.value.length);
        }

        nextInput.focus();
      }
    },

    focusPreviousInput(currentInput) {
      let inputs = this.$el.querySelectorAll('input, select');
      let currentInputIndex = this.getCurrentInputIndex(inputs, currentInput);
      let previousInput = inputs[currentInputIndex - 1];
      if (!!previousInput) {

        if (previousInput.nodeName === 'SELECT') {
          let patternKey = previousInput.dataset['pattern'];
          this.pattern[patternKey] = '';
        }

        previousInput.focus();
      }
    },

    previewLetter(patternKey) {
      let defaultLettersHtml = "<span class='text-base px-3 text-center font-bold leading-none text-gray-800'>A<br>B<br>C</span>";
      let patternChar = this.pattern[patternKey] ?? '';
      return this.isAny(patternChar) ? defaultLettersHtml : patternChar;
    },

    previewNumber(patternKey) {
      let defaultNumbersHtml = "<span class='text-base px-3 text-center font-bold leading-none text-gray-800'>1<br>2<br>3</span>";
      let patternChar = this.pattern[patternKey] ?? '';
      return this.isAny(patternChar) ? defaultNumbersHtml : patternChar;
    },

    showError(error) {
      this.errorMessage = error;
    },
    hideError() {
      this.errorMessage = '';
    },
    verifyForm(event) {
      if (this.isPatternEmpty()) {
        this.showError('Provide at least 1 value');
        event.preventDefault();
        event.stopPropagation();
      }
      if (this.errorMessage !== '') {
        event.preventDefault();
        event.stopPropagation();
      }
    }
  }
}
</script>
<style>
.prefix-advanced-search select option {
  @apply text-black
}

.prefix-advanced-search select {
  -webkit-appearance: none;
  -moz-appearance: none;
  padding: 0 45px 0 20px;
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='8'%3E%3Cpath fill='%230D1821' d='M8 6L0 0v2l8.006 6L16 2V0L8 6z'/%3E%3C/svg%3E");
  background-size: 13px 8px;
  background-position: right 20px top 25px;
  background-repeat: no-repeat;
}
</style>