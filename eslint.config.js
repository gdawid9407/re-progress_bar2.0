module.exports = {
  env: {
    browser: true,
    es2021: true
  },
  extends: ['eslint:recommended'],
  parserOptions: {
    ecmaVersion: 12,
    sourceType: 'module'
  },
  rules: {
    'no-var': 'error',               // wymusza let/const zamiast var
    'prefer-const': 'error',         // preferuje const jeśli nie ma reassign
    'arrow-spacing': ['error',{      // wymaga spacji wokół strzałki
      before: true,
      after: true
    }],
    'quotes': ['error','single'],    // pojedyncze cudzysłowy
    'semi': ['error','always']       // średniki na końcu instrukcji
  }
};
