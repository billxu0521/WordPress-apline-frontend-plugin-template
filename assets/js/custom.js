

function dropdown() {
    return {
        show: false,
        open() { this.show = true },
        close() { this.show = false },
        isOpen() { return this.show === true },
    }
}

console.log('hello from custom.js')