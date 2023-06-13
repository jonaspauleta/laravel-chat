module.exports = {
    env: {
        node: true,
    },
    extends: [
        "plugin:vue/vue3-essential",
        "@vue/eslint-config-typescript/recommended",
        "@vue/eslint-config-prettier",
    ],
    rules: {
        // override/add rules settings here, such as:
        // 'vue/no-unused-vars': 'error'
        "vue/require-default-prop": "off",
        "vue/multi-word-component-names": "off",
        "@typescript-eslint/no-explicit-any": "off",
    },
};
