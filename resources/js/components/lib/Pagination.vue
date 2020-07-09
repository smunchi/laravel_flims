<template>
    <nav v-if="pages() > 1" aria-label="Page navigation">
        <ul class="pagination">
            <li :class="{disabled: current <= 1}">
                <a :disabled="current <= 1"
                    @click.prevent="previousBtnClick(current)"
                    href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li v-for="(page,index) in pagesWithDot"
                :class="{active: page === current}"
                :key="index">
                <input v-if="activeIndex === index && !(typeof page === 'number')"
                   v-model="inputValue"
                   @keyup.enter="inputFormClick()"
                   type="text" class="form-control small-width">
                <a v-else :class="{disabled:(page === current) || !(typeof page === 'number')}"
                   @click.prevent="btnClick(page, index)"
                   href="#">{{page}}</a>
            </li>
            <li :class="{disabled: current >= lastPage}">
                <a :disabled="current >= lastPage" @click.prevent="nextBtnClick(current)"
                   href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default {
        name: "pagination",
        data() {
            return {
                current: 1,
                showInput: false,
                inputValue: null,
                activeIndex: ''
            }
        },
        props: {
            perPage: {
                type: Number,
                required: false,
                default: 10
            },
            total: {
                type: Number,
                required: true
            },
            currentPage: {
                type: Number,
                required: false,
                default: 1
            }
        },
        watch: {
            currentPage() {
                this.current = this.currentPage
            }
        },
        computed: {
            pagesWithDot() {
                let paginateNumbers = []
                let visible = 1
                let pages = this.pages()
                if (pages < visible) {
                    return []
                }
                let isDotPrint = false;
                for (let start = 1; start <= pages; start++) {
                    if(
                        (start >= (this.current - visible) && start <= (this.current + visible)) ||
                        ((start <= visible) || (start>= pages - (visible -1)))
                    ) {
                        isDotPrint = true;
                        paginateNumbers.push(start);
                    } else {
                        if (isDotPrint) {
                            paginateNumbers.push('...')
                        }
                        isDotPrint = false
                    }
                }
                return paginateNumbers
            },
            lastPage() {
                let pagesLength = this.pagesWithDot.length
                if ( pagesLength > 0) {
                    return this.pagesWithDot[pagesLength - 1]
                }
            }
        },
        mounted() {
            this.current = this.currentPage
        },
        methods: {
            inputFormClick() {
                this.current = parseInt(this.inputValue)
                this.$emit('current', this.current)
                this.inputValue = this.activeIndex = ''
            },
            btnClick(number, index) {
                this.activeIndex = index
                if (!(typeof number === 'number')) return;
                this.current = number
                this.$emit('current', this.current)
            },
            previousBtnClick() {
                if (this.current <= 1) {
                    return;
                }
                let current = this.current
                this.current = current - 1
                this.$emit('current', this.current)
            },
            nextBtnClick() {
                if ( this.current >= this.lastPage) {
                    return;
                }
                this.current += this.current
                this.$emit('current', this.current)
            },
            pages() {
                let divide = this.total/this.perPage
                let mod = this.total%this.perPage
                if (divide > 0 && mod > 0) {
                    return parseInt(divide) + 1
                }
                return divide
            }
        }
    }
</script>

<style scoped>
    .small-width {
        width: 4rem !important;
    }
</style>
